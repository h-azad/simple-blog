<div class="sidebar" data-background-color="white" data-active-color="danger">

<!--
Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
-->

  <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ url('/') }}" class="simple-text">
                {{ config('app.name') }}
            </a>
        </div>

        <ul class="nav">
            <li @if(Route::currentRouteName() == 'admin.dashboard') class="active" @endif>
                <a href="{{route('admin.dashboard')}}">
                    <i class="ti-panel"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li @if(Route::currentRouteName() == 'admin.addPost') class="active" @endif>
                <a href="{{route('admin.addPost')}}">
                    <i class="ti-pencil-alt"></i>
                    <p>Add Post</p>
                </a>
            </li>
            <li @if(Route::currentRouteName() == 'admin.managePost' || Route::currentRouteName() == 'admin.editPost') class="active" @endif>
                <a href="{{route('admin.managePost')}}">
                    <i class="ti-briefcase"></i>
                    <p>Manage Post</p>
                </a>
            </li>

            <li @if(Route::currentRouteName() == 'admin.profile') class="active" @endif>
                <a href="{{route('admin.profile')}}">
                    <i class="ti-user"></i>
                    <p>Profile</p>
                </a>
            </li>

        </ul>
  </div>
</div>
