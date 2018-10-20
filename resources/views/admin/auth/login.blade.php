<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name',"Simple Blog")}}</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/login.css') }}">
  </head>
  <body>
    <div class="panda">
      <div class="ear"></div>
      <div class="face">
        <div class="eye-shade"></div>
          <div class="eye-white">
            <div class="eye-ball"></div>
          </div>
        <div class="eye-shade rgt"></div>
        <div class="eye-white rgt">
          <div class="eye-ball"></div>
        </div>
        <div class="nose"></div>
        <div class="mouth"></div>
      </div>
      <div class="body"> </div>
      <div class="foot">
        <div class="finger"></div>
      </div>
      <div class="foot rgt">
        <div class="finger"></div>
      </div>
    </div>

    <form method="post" action="{{ route('admin.login') }}" autocomplete="off">
      {{ csrf_field() }}
      <div class="hand"></div>
      <div class="hand rgt"></div>
      <h1>Admin Login</h1>
      <div class="form-group">
        <input type="email" name="email" required="required" class="form-control" value="{{ old('email') }}"/>
        <label class="form-label">Email</label>
      </div>
      <div class="form-group">
        <input name="password" id="password" type="password" required="required" class="form-control"/>
        <label class="form-label">Password</label>
        @if(Session::has('error'))
        <p class="alert">{{ Session::get('error') }}</p>
        @endif
        <button type="submit" class="btn">Login </button>
      </div>
    </form>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{ asset('admin-assets/js/login.js') }}"></script>
    @if(isset($errors))
    <script>
      $('form').addClass('wrong-entry');
        setTimeout(function(){
           $('form').removeClass('wrong-entry');
       },3000 );
    </script>
    @endif
  </body>
</html>
