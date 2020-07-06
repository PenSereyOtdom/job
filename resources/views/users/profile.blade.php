@extends('layouts.users')

@section('title', 'Profile')

@section('content')
@include('layouts.navbar')
<!-- Page Content -->
<div class="my-profile container">
    <!-- Profile Nav -->
    @include('layouts.profileNav')
    <!-- Profile Section -->
    <div class="card mb-5">
        <div class="container p-5">
        @foreach ($user_info as $user)
            <div class="row">
                <div class="col-lg-3 col-md-12 text-center">
                    @if($user->user_profile)
                    <img src="{{asset('storage/user_profile/' . $user->user_profile)}}" class="profile-pic-preview rounded-circle img-thumbnail">
                    @else
                    <img src="{{asset('/img/user_male.png')}}" class="profile-pic-preview rounded-circle img-thumbnail">
                    @endif
                </div>
                <div class="col-lg-9 col-md-12 my-auto">
                    <h4 class="font-weight-bold p-2">My Profile</h4>
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <p class="small p-2">Username:</p>
                        </div>
                        <div class="col-md-9 col-6">
                            <p class="small p-2 font-weight-bold">{{ $user->name }}</p>
                        </div>
                        <div class="col-md-3 col-6">
                            <p class="small p-2">Phone Number:</p>
                        </div>
                        <div class="col-md-9 col-6">
                            <p class="small p-2">{{ $user->phone_number }}</p>
                        </div>
                    </div>
                    <div class="button-center">
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#updateInfo">Edit Profile</button>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>

<!-- ................Modal Pop up..................... -->
        
    <div class="modal fade" id="updateInfo" tabindex="-1" role="dialog" aria-labelledby="updateInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateInfoLabel">Update Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" action="{{action('Users\ProfileController@update', $edit_info->id)}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="container">
                            <div class="text-center mb-4">
                                @if($edit_info->user_profile)
                                    <img class="profile-pic rounded-circle img-thumbnail" src="{{ asset('storage/user_profile/' . $edit_info->user_profile) }}"/>
                                @else
                                    <img class="profile-pic rounded-circle img-thumbnail" src="{{asset('/img/user_male.png')}}"/>
                                @endif
                                <div class="p-image mt-2">
                                    <i class="fa fa-camera upload-button"></i>
                                    <input class="file-upload" name="user_profile" type="file" id="" accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps" style="display:none;">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-4"><label for="name">Username</label></div>
                                <div class="col-8"><input type="text" name="name" id="name" value="{{$edit_info->name}}" placeholder="Please enter your Reference..." class="form-control"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col-4"><label for="phone_number">Phone Number</label></div>
                                
                                <div class="col-8"><input type="text" name="phone_number" id="phone_number" value="{{$edit_info->phone_number}}" placeholder="Please enter your Reference..." class="form-control"></div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Change password -->
    <div class="my-profile container mt-5">
        <div class="card mb-5">
            <div class="container p-5">
                <div class="d-flex align-items-center">
                    <div class="col-12">
                        <div class="panel panel-default">
                            <h4 class="font-weight-bold">Change password</h4><br>

                            <div class="panel-body">
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                <form class="form-horizontal" method="POST" action="{{ route('setting') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                        <label for="current-password" class="col-md-4 control-label">Current Password</label>

                                        <div class="col-lg-6 col-12">
                                            <input id="current-password" type="password" class="form-control" name="current-password" required>

                                            @if ($errors->has('current-password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('current-password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                        <label for="new-password" class="col-md-4 control-label">New Password</label>

                                        <div class="col-lg-6 col-12">
                                            <input id="new-password" type="password" class="form-control" name="new-password" required>

                                            @if ($errors->has('new-password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('new-password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="new-password-confirm" class="col-md-5 control-label">Confirm New Password</label>

                                        <div class="col-lg-6 col-12">
                                            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-6 col-12">
                                            <button type="submit" class="btn btn-primary">
                                                Change Password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                       
                </div>
            </div>
        </div>
    </div>
    
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>   
<script>
    $(document).ready(function () {
      var readURL = function (input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('.profile-pic').attr('src', e.target.result);
              }
              reader.readAsDataURL(input.files[0]);
          }
      }
      $(".file-upload").on('change', function () {
          readURL(this);
      });

      $(".upload-button").on('click', function () {
          $(".file-upload").click();
      });
    });
</script>
@endsection
