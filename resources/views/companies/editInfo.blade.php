@extends('layouts.companies')

@section('title', 'Setting')

@section('header', 'Edit Company Information')

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
            <form class="form-horizontal" action="{{action('Companies\CompaniesSettingController@update', $edit_info->id)}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="container-fluid">
                    <div class="row justify-content">
                        <div class="col-3">
                            <div class="container">
                                <div class="picture-container">
                                    <div class="picture">
                                    @if($edit_info->company_profile)
                                    <img src="{{ asset('storage/company_profile/' . $edit_info->company_profile) }}" class="picture-src" id="wizardPicturePreview" title="">
                                    <input type="file" id="wizard-picture" name="company_profile" accept="image/*">
                                    @else
                                    <img src="{{asset('/img/user_company.jpg')}}" class="picture-src" id="wizardPicturePreview" title="">
                                    <input type="file" id="wizard-picture" name="company_profile" accept="image/*">
                                    @endif
                                    </div>
                                    <div class="align-item-center">
                                        <i class="fa fa-camera"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-8">
                            <h3 class="font-weight-bold">Company Information</h3><hr>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Username</label>
                                <div class="col-sm-9">
                                <input type="text" name="name" value="{{$edit_info->name}}"
                                    placeholder="Please enter your company name..." class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Contact</label>
                                <div class="col-sm-9">
                                <input type="text" name="phone_number" class="form-control" value={{$edit_info->phone_number}}>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Address</label>
                                <div class="col-sm-9">
                                <textarea type="text" name="address" class="form-control">{{$edit_info->address}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">City</label>
                                <div class="col-sm-9">
                                <textarea type="text" name="city"
                                    class="form-control">{{$edit_info->city}}</textarea>
                                </div>
                            </div>

                            <h3 class="font-weight-bold">Recruiter Information</h3><hr>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Recruiter Name</label>
                                <div class="col-sm-9">
                                <input type="text" name="recruiter_name" class="form-control" value="{{$edit_info->recruiter_name}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Recruiter Position</label>
                                <div class="col-sm-9">
                                <input type="text" name="recruiter_position" class="form-control" value="{{$edit_info->recruiter_position}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Website</label>
                                <div class="col-sm-9">
                                <input type="text" name="website" class="form-control" value="{{$edit_info->website}}">
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <a class="btn btn-outline-primary" href="/company/setting">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
$(document).ready(function(){
// Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
        readURL(this);
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection