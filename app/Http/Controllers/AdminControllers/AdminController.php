<?php

namespace App\Http\Controllers\AdminControllers;

use Validator;
use Response;
use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Admin;
use App\AdminProfile;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_count = PostsController::total();
        $post_latest = PostsController::latest_post();

        return view('admin.pages.home', compact('post_count','post_latest'));
    }

    public function profile()
    {
      $admin = AdminProfile::findOrFail(Auth::user()->id);
      return view('admin.pages.profile', compact('admin'));
    }

    public function store_profile(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'first_name'     => 'required|max:150',
        'last_name'     => 'required|max:150',
        'city'     => 'required',
        'country'     => 'required',
        'email'    =>  'required|email',
        'about_me'    =>  'required',
        'admin_id'    =>  'required|exists:admins,id'
      ]);

      if ($validator->fails()) {
        return redirect(route('admin.addPost'))
                    ->withErrors($validator)
                    ->withInput();
      }

      try {

        $admin = AdminProfile::findOrFail($request->admin_id);
        $admin->admin_id = $request->admin_id;
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->city = $request->city;
        $admin->country = $request->country;
        $admin->email = $request->email;
        $admin->about_me = $request->about_me;
        $admin->save();

      } catch (\Exception $e) {
          AdminProfile::create([
            'admin_id'     => $request->admin_id,
            'first_name'     => $request->first_name,
            'last_name'     => $request->last_name,
            'city'    => $request->city,
            'country' => $request->country,
            'email' => $request->email,
            'about_me' => $request->about_me
        ]);
      }

      return redirect(route('admin.profile'))->with('success', 'Profile Updated Successfully');
    }

    public function upload_profile_pic(Request $request)
    {
      if (request()->ajax() && Auth::check()) {

        $validator = Validator::make($request->all(), [
          'profile_pic'     => 'required',
          'admin_id'     => 'required|exists:admins,id'
        ]);

        if ($validator->fails()) {
          return Response::json([
                      'error' => 'Validation Fail',
                      'trace' => $validator->errors()->first()
                 ], 401);
        }
        try {
          $admin = AdminProfile::findOrFail($request->admin_id);
          $admin->profile_pic = $request->profile_pic->store('admin_images','public');

          $admin->save();

          return Response::json([
                      'url' => $admin->profile_pic
                 ], 201);
        } catch (\Exception $e) {
          return Response::json([
                      'error' => $e->getMessages()
                 ], 500);
        }

      }else {
        return Response::json([
                    'error' => 'Unauthorized'
               ], 401);
      }
    }

    public function update_quote(Request $request)
    {

      if ($request->has('value') && Auth::check()) {
        $admin = AdminProfile::findOrFail(Auth::user()->id);
        $admin->quote = $request->value;
        $admin->save();

        return Response::json([
                    'quote' => $admin->quote
               ], 201);
      }

      return Response::json([
                  'error' => 'Unauthorized',
                  'value' => $request->all()
             ], 401);
    }

    public function change_password(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'current_password'     => 'required|min:6',
        'password'     => 'required|confirmed|min:6',
      ]);

      if ($validator->fails()) {
        return redirect(route('admin.profile'))
                    ->withErrors($validator)
                    ->withInput();
      }
      $user = Auth::user();

      if (Hash::check($request->current_password, $user->password)) {
          $user_id = $user->id;
          $obj_user = Admin::find($user_id)->first();
          $obj_user->password = Hash::make($request->password);
          $obj_user->save();

          return redirect(route('admin.profile'))->with('success', 'Password Updated Successfully');
      }
      else
      {
          return redirect(route('admin.profile'))->with('error', 'Password Not Matched');
      }
    }

}
