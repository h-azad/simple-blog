<?php

namespace App\Http\Controllers\AdminControllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index()
  {
      $posts = Post::latest()->paginate(10);

      return view('admin.pages.manage-post', compact('posts'));
  }

  public function show($id)
  {
      $post = Post::findOrFail($id);
      return view('frontend.posts.show', compact('post'));
  }


  public function create()
  {
      return view('admin.pages.add-post');
  }


  public function store(Request $request)
  {
      $validator = Validator::make($request->all(), [
        'title'     => 'required|max:200',
        'subtitle'     => 'required|max:150',
        'image'     => 'required|mimes:jpeg,png,gif',
        'status'    =>  'required',
        'description'  => 'required'
      ]);

      if ($validator->fails()) {
        return redirect(route('admin.addPost'))
                    ->withErrors($validator)
                    ->withInput();
      }

      Post::create([
          'title'     => $request->title,
          'subtitle'     => $request->subtitle,
          'image'     => $request->image->store('images','public'),
          'status'    => $request->status,
          'description' => $request->description
      ]);

      return redirect(route('admin.addPost'))->with('success', 'post was created successfully');
  }

  public function edit($id)
  {
    try {
      $post = Post::findOrFail($id);
      return view('admin.pages.edit-post', compact('post'));
    } catch (\Exception $e) {
      return redirect()->back();
    }
  }


  public function update(Request $request, $id)
  {
    try {
      $validator = Validator::make($request->all(), [
        'title'     => 'required|max:200',
        'subtitle'     => 'required|max:150',
        'image'     => 'mimes:jpeg,png,gif',
        'status'    =>  'required',
        'description'  => 'required'
      ]);

      if ($validator->fails()) {
        return redirect(route('admin.editPost',$id))
                    ->withErrors($validator)
                    ->withInput();
      }

      $post = Post::findOrFail($id);

      $post->title = $request->title;
      $post->subtitle = $request->subtitle;
      if ($request->hasFile('image')) {
        $post->image = $request->image->store('images','public');
      }
      $post->status = $request->status;
      $post->description = $request->description;

      $post->save();

      return redirect(route('admin.editPost',$id))->with('success', 'Post info updated successfully.');
    } catch (\Exception $e) {
      return redirect()->back();
    }
  }

  public function destroy($id)
  {
    try {
      $post = Post::findOrFail($id);
      Storage::delete($post->image);
      $post->delete();

      return redirect(route('admin.managePost'))->with('success', 'Post was deleted');
    } catch (\Exception $e) {
      return redirect()->back();
    }
  }

  public static function total()
  {
    $count = Post::count();

    return $count;
  }

  public static function latest_post()
  {
    try {
      $latest = Post::orderBy('created_at', 'desc')->first();

      return date('d/m/y', strtotime($latest->created_at));
    } catch (\Exception $e) {
      
    }
  }
}
