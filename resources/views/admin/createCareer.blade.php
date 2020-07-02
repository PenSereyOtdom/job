@extends('layouts.admin')

@section('title', 'Career Advise')

@section('header', 'Career Advise')

@section('content')
<!-- Forms Section-->
<section class="forms"> 
  <div class="container-fluid">
      <div class="row">
      <!-- Form Elements -->
        <div class="col-lg-12">
            <div class="card mx-3">
              <div class="container py-3">
                <h3>New Blog</h3>
                  <form class="form-horizontal" method="POST" action="{{url('/create/career')}}" enctype="multiple/form-data">
                      {!! csrf_field() !!} 


                      <div class="Input-group">
                        <div class="custom-file">
                            <input type="file" name="cover" class="custom-file-input">
                            <label class="custom-file-label">@lang('admin.choosefile')</label>
                        </div>
                      </div>

                      <div class="form-group">      
                          <input class="form-control" type="text" name="title" placeholder="Title blog...">
                      </div>
                      <div class="form-group">
                          <textarea class="form-control w-100" name="content" id="content" placeholder="Please enter body blog..." rows="30">{{ old('additional_info') }}</textarea>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">@lang('admin.createblog')</button>
                      </div>
                  </form>
                </div>
            </div>
        </div>
      </div>
  </div>
</section>

<script>

//CKEditor
CKEDITOR.replace( 'content' );

</script>

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

