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
                    <h3 class="h4">Edit Blog</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{action('Admin\CareerController@update', $editCareer->id)}}" enctype="multiple/form-data">
                        {!! csrf_field() !!}
                                               
                        <div class="line"></div>
                        <div class="form-group row">
                        <label class="col-sm-3 form-control-label" for="exampleFormControlTextarea1">Title Blog</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="title" name="title" placeholder="Please enter employee benefit...">{{$editCareer->title}}</textarea>
                        </div>
                        </div>

                        <div class="line"></div>
                        <div class="form-group row">
                        <label class="col-sm-3 form-control-label" for="exampleFormControlTextarea1">Body Blog</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="content" name="content" placeholder="Please enter employee benefit...">{{$editCareer->content}}</textarea>
                        </div>
                        </div>

                        <div class="line"></div>
                        <div class="form-group row">
                            <div class="col-sm-4 offset-sm-3">
                            <input name="on_off" value="checked" type="hidden">
                            <button type="submit" class="btn btn-primary">Save Change</button>
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
