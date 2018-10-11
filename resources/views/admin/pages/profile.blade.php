@extends('admin.layouts.master')

@section('css')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
#changePassword, #quoteText{
  display: none;
}
.avatar-upload {
  position: relative;
  max-width: 100px;
  margin-left: 30%;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: -10px;
  z-index: 1;
  top: -5px;
  display: none;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: 'FontAwesome';
  color: #757575;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 120px;
  height: 120px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
</style>
@endsection

@section('contents')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <img src="{{ asset('admin-assets/img/background.jpg') }}" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                  <div class="avatar-upload">
                                      <div class="avatar-edit" data-toggle="tooltip" title="Upload New">
                                          <input type='file' name="profile_pic" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                          <label for="imageUpload"></label>
                                      </div>
                                      <div class="avatar-preview">
                                          <div id="imagePreview" style="background-image: url({{ ($admin->profile_pic)?asset('storage/'.$admin->profile_pic):'http://i.pravatar.cc/500?img=7' }});">
                                          </div>
                                      </div>
                                    </div>
                                  <!-- <img class="avatar border-white" src="{{ asset('admin-assets/img/faces/face-2.jpg') }}" alt="..."/> -->
                                  <h4 class="title">{{ $admin->first_name }} {{ $admin->last_name }}<br />
                                     <a href="#"><small>@chetfaker</small></a>
                                  </h4>
                                </div>
                                <p class="description text-center quote" data-toggle="tooltip" data-placement="bottom" title="Double Click To Edit">
                                  <span id="quote" >
                                    {{ $admin->quote }}
                                  </span>
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                                <p class="category">
                                  @include('admin.partials.notifications')
                                </p>
                            </div>
                            <div class="content">
                                <form method="post" action="{{ route('admin.profile') }}">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" class="form-control border-input" placeholder="First Name" value="{{ $admin->first_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text"  name="last_name" class="form-control border-input" placeholder="Last Name" value="{{ $admin->last_name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control border-input" placeholder="City" value="{{ $admin->city }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" name="country" class="form-control border-input" placeholder="Country" value="{{ $admin->country }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control border-input" placeholder="Email" value="{{ $admin->email }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="4" name="about_me" class="form-control border-input" placeholder="Here can be your description">{{ $admin->about_me }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                                    </div>

                                    <div class="clearfix"></div>

                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="header">
                                <h4 class="title">Change Password</h4>
                            </div>
                            <div class="content">
                                <form method="post" action="{{ route('admin.changePassword')}}">

                                  {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                <input type="password" name="current_password" class="form-control border-input" placeholder="Current Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" name="password" class="form-control border-input" placeholder="New Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="password_confirmation" class="form-control border-input" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="text-left">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Password</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

@endsection

@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".quote").click(function(){
        $("[data-toggle='tooltip']").tooltip('hide');
    });
});
$('#quote').editable({
    toggle: 'dblclick',
    type: 'text',
    pk: 1,
    name: 'quote',
    url: '{{ route("admin.profile.quote") }}',
    ajaxOptions: {
        type: 'post',
        dataType: 'json', //assuming json response
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    },
    title: 'Update Quote'
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);

            // Upload Profile Picture
            var myFormData = new FormData();
            myFormData.append('profile_pic', imageUpload.files[0]);
            myFormData.append('admin_id', {{ Auth::user()->id }});

            var request = $.ajax({
                            url: '{{ route('admin.profile.upload') }}',
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            processData: false, // important
                            contentType: false, // important
                            dataType : 'json',
                            data: myFormData
                          });
            console.log(request);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
$(".avatar-upload").hover(function() {
    $(".avatar-edit").css('display','block');
}, function(){
  $(".avatar-edit").css('display','none');
});

</script>
@endsection
