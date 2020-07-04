@extends('layouts.admin')

@section('title', 'Career Advise')

@section('header', 'Career Advise')

@section('content')    
    <div class="container">
        <a href=" {{url('/create/career')}} ">
            <button class="btn btn-primary">New Post</button>
        </a>
    </div>
    @if(count($career) > '0')
    <div class="container mt-5">
        <div class="card">
            @foreach($career as $careers)
                <li class="list-group-item d-flex flex-row">
                    <div class="p-2" style="margin-left:20px;">
                        <div class="card-close">
                            <div class="dropdown">
                                <a href="{{url('/career/edit' ,$careers->id)}}" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                <form action="{{action('Admin\CareerController@destroy', $careers->id)}}" method="post" class="mt-3">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn">Delete</button>
                                </form>
                            </div>
                        </div>      
                        
                        @if(isset($careers->title))
                            <h3 style="color: #0d4e69;">Ttitle</h3>
                            <p><?php echo $careers->title; ?></p>

                        @else
                        @endif

                        @if(isset($careers->content))
                            <h3 style="color: #0d4e69;">Content</h3>
                            <p><?php echo $careers->content; ?></p>
                        @else
                        @endif

                    </div>
                </li>
            @endforeach
        </div>
    </div>
    @endif
@endsection
