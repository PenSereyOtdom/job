@extends('layouts.admin')

@section('title', 'Setting')

@section('header', 'Setting')

@section('content')
<!-- Showing errors: like numeric field, required field... -->
@if($errors->any())
    @foreach ($errors->all() as $error)
        <div id="error" class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif
<div class="container">
    <div class="card px-5 py-3">
        <div class="card-body">
            <form class="form-horizontal" action="{{action('Admin\AdminSettingController@update', $edit_info->id)}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="container-fluid">
                    <div class="row justify-content">
                        <div class="col-3">
                            <div class="container">
                                <div class="picture-container">
                                    <div class="picture">
                                        @if($edit_info->admin_profile)
                                            <img class="picture-src" src="{{ asset('storage/admin_profile/' . $edit_info->admin_profile) }}"/>
                                            <input class="file-upload" name="admin_profile" type="file" id="" accept="image/*">
                                        @else
                                            <img class="picture-src" src="{{asset('/img/user_company.jpg')}}" id="adminPicturePreview"/>
                                            <input class="file-upload" name="admin_profile" type="file" id="" accept="image/*" id="admin-picture"/>
                                        @endif
                                    </div>
                                    <div class="align-item-center">
                                        <i class="fa fa-camera"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-8">
                            <h3 class="font-weight-bold">@lang('admin.companyinfo')</h3><hr>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">@lang('admin.username')</label>
                                <div class="col-sm-9">
                                <input type="text" name="name" value="{{$edit_info->name}}"
                                    placeholder="Please enter your company name..." class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">@lang('admin.contact')</label>
                                <div class="col-sm-9">
                                <input type="text" name="phone_number" class="form-control" value="{{$edit_info->phone_number}}">
                                </div>
                            </div>                
                
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary mr-2">@lang('admin.save')</button>
                                <a class="btn btn-outline-primary" href="/admin/setting">@lang('admin.cancel')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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