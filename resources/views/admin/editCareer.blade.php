@extends('layouts.admin')

@section('title', 'Career Advise')

@section('header', 'Career Advise')

@section('content')
<section class="forms"> 
    <div class="container-fluid">
        <div class="row">
        <!-- Form Elements -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">@lang('admin.editblog')</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{action('Admin\CareerController@update', $editCareer->id)}}" enctype="multiple/form-data">
                        {!! csrf_field() !!}
                                               
                        <div class="line"></div>
                        <div class="form-group row">
                        <label class="col-sm-3 form-control-label" for="exampleFormControlTextarea1">@lang('admin.titleblog')</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="name" name="name" placeholder="Please enter employee benefit...">{{$editCareer->name}}</textarea>
                        </div>
                        </div>

                        <div class="line"></div>
                        <div class="form-group row">
                        <label class="col-sm-3 form-control-label" for="exampleFormControlTextarea1">@lang('admin.bodyblog')</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="body" name="body" placeholder="Please enter employee benefit...">{{$editCareer->body}}</textarea>
                        </div>
                        </div>

                        <div class="line"></div>
                        <div class="form-group row">
                            <div class="col-sm-4 offset-sm-3">
                            <input name="on_off" value="checked" type="hidden">
                            <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
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
      CKEDITOR.replace( 'name' );
      window.onload = function() {
      CKEDITOR.replace( 'body', {
        filebrowserUploadUrl: '{{ route('upload',['_token' => csrf_token() ]) }}',
        filebrowserUploadMethod: 'form'
      });
    };
  </script>

@endsection
