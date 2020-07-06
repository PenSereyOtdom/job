@extends('layouts.admin')

@section('title', 'Create Blog')

@section('content')
      <!-- Forms Section-->
  <section class="forms"> 
        <div class="container-fluid">
            <div class="row">
            <!-- Form Elements -->
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-header d-flex align-items-center">
                          <h3 class="h4">Create Blog</h3>
                      </div>
                      <div class="card-body">
                          <form class="form-horizontal" method="POST" action="{{url('/create/career')}}" enctype="multiple/form-data">
                              {!! csrf_field() !!}
                              
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Title Blog<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <textarea class="form-control" name="title" id="title" placeholder="Please enter title blog..." rows="50">{{ old('additional_info') }}</textarea>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Body Blog <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <textarea class="form-control" name="content" id="content" placeholder="Please enter body blog..." rows="50">{{ old('additional_info') }}</textarea>
                                </div>
                              </div>

                              <div class="line"></div>
                              <div class="form-group row">
                                <div class="col-sm-4 offset-sm-3">
                                  <button type="submit" class="btn btn-primary">Create Blog</button>
                                </div>
                              </div>

                          </form>
                      </div>
                  </div>
              </div>
            </div>
        </div>
  </section>

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
  <script>
      //CKEditor
      CKEDITOR.replace( 'title' );
      window.onload = function() {
        CKEDITOR.replace( 'content', {
          filebrowserUploadUrl: '{{ route('upload',['_token' => csrf_token() ]) }}',
          filebrowserUploadMethod: 'form'
        });
      };
  </script>

@endsection