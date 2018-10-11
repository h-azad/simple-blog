<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function get_post($id)
    {
      try {
        $post = Post::findOrFail($id);
        $post->views += 1;
        $post->save();
        
        return view('pages.post-details',compact('post'));

      } catch (\Exception $e) {
        return abort(404);
      }

    }
}
