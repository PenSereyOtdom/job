@extends('layouts.user')

@section('title', 'Cv')

@section('content')
@include('layouts.navbar')
<!-- Page Content -->
<div class="container">
    <!-- Profile Nav -->
    @include('layouts.profileNav')
    <!-- Profile Section -->
    <div class="cv card mb-5">
        @if ($count_cv < 1)
        <div class="container text-center my-auto">
            <a href="{{url('create/cv')}}"><button class="btn btn-lg btn-primary">Create Resume</button></a>
        </div>
        @elseif ($count_cv == 1)
            @foreach($display_cv as $cv)
                <div class="container px-5 py-4">
                    <div class="card-close d-flex float-right">
                        <form action="{{action('User\CvController@edit', $cv->id)}}" method="post">
                            {{csrf_field()}}
                            <button class="btn btn-link" type="submit" data-toggle="tooltip" data-placement="top" title="Edit CV"><i class="fa fa-edit"></i></button>
                        </form>
                        <button class="btn btn-link" type="button" data-toggle="modal" data-target="#example1ModalCenter" data-placement="top" title="Delete CV"><i class="fa fa-trash"></i></button>
                        <div class="modal fade" id="example1ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="border border-0 modal-content bg-danger">
                                    <div class="modal-header justify-content-center">
                                        <i class="fa fa-trash fa-3x" style="color:white;"></i>
                                    </div>
                                    <div class="modal-body text-center bg-white">
                                        <p>Do you want to Delete your CV?</p>
                                        <small><i class="fa fa-exclamation-circle" aria-hidden="true"></i> If you delete your CV, You could not be able to get it back.</small>
                                        <form action="{{action('User\CvController@destroy', $cv->id)}}" method="post" class="mt-3">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body container">
                        <h4 class="font-weight-bold">Personal Statement</h4>
                        <div class="form-group row mb-0">
                            <label class="col-sm-3 form-control-label">Full Name</label>
                            <div class="col-sm-9">
                                <p>{{$cv->full_name}}</p>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <label class="col-sm-3 form-control-label">Email</label>
                            <div class="col-sm-9">
                                <p>{{$cv->email}}</p>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <label class="col-sm-3 form-control-label">Contact</label>
                            <div class="col-sm-9">
                                <p>0{{$cv->phone_number}}</p>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <label class="col-sm-3 form-control-label">Summary</label>
                            <div class="col-sm-9">
                                <p>{{$cv->summary}}</p>
                            </div>
                        </div>

                        @if(count($display_education)<= 1)
                            <h4 class="font-weight-bold">Education</h4>
                        @endif
                        @foreach ($display_education as $edu)
                            @if(isset($edu->school_name))
                            <div class="form-group row mb-0">
                                <label class="col-sm-3 form-control-label">School Name</label>
                                <div class="col-sm-9">
                                    <p>{{$edu->school_name}}</p>
                                </div>
                            </div>
                            @endif
                            @if(isset($edu->edu_start_date)&&isset($edu->edu_end_date))
                            <div class="form-group row mb-0">
                                <label class="col-sm-3 form-control-label">Date</label>
                                <div class="col-sm-9">
                                    <p>{{$edu->edu_start_date}} ~ {{$edu->edu_end_date}}</p>
                                </div>
                            </div>
                            @endif
                            @if(isset($edu->major))
                            <div class="form-group row mb-0">
                                <label class="col-sm-3 form-control-label">Major</label>
                                <div class="col-sm-9">
                                    <p>{{$edu->major}}</p>
                                </div>
                            </div>
                            @endif
                            @if(isset($edu->edu_detail))
                            <div class="form-group row mb-0">
                                <label class="col-sm-3 form-control-label">Educaction Detail</label>
                                <div class="col-sm-9">
                                    <p>{{$edu->edu_detail}}</p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                        
                        @if(count($display_experience)<= 1)
                            <h4 class="font-weight-bold">Experience</h4>
                        @endif
                        @foreach ($display_experience as $exp)
                            @if(isset($exp->exp_workplace_name))
                            <div class="form-group row mb-0">
                                <label class="col-sm-3 form-control-label">Workplace Name</label>
                                <div class="col-sm-9">
                                    <p>{{$exp->exp_workplace_name}}</p>
                                </div>
                            </div>
                            @endif
                            @if(isset($exp->exp_title))
                            <div class="form-group row mb-0">
                                <label class="col-sm-3 form-control-label">Experience Title</label>
                                <div class="col-sm-9">
                                    <p>{{$exp->exp_title}}</p>
                                </div>
                            </div>
                            @endif
                            @if(isset($exp->exp_start_date)&&isset($exp->exp_end_date))
                            <div class="form-group row mb-0">
                                <label class="col-sm-3 form-control-label">Date</label>
                                <div class="col-sm-9">
                                    <p>{{$exp->exp_start_date}} ~ {{$exp->exp_end_date}}</p>
                                </div>
                            </div>
                            @endif
                            @if(isset($exp->exp_detail))
                            <div class="form-group row mb-0">
                                <label class="col-sm-3 form-control-label">Experience Detail</label>
                                <div class="col-sm-9">
                                    <p>{{$exp->exp_detail}}</p>
                                </div>
                            </div>
                            @endif
                        @endforeach

                        @if(count($display_achievement)<= 1)
                            <h4 class="font-weight-bold">Achievement</h4>
                        @endif
                        @foreach ($display_achievement as $ach)
                            @if(isset($ach->ach_title))
                            <div class="form-group row mb-0">
                                <label class="col-sm-3 form-control-label">Achievement Title</label>
                                <div class="col-sm-9">
                                    <p>{{$ach->ach_title}}</p>
                                </div>
                            </div>
                            @endif
                            @if(isset($ach->ach_date))
                            <div class="form-group row mb-0">
                                <label class="col-sm-3 form-control-label">Date</label>
                                <div class="col-sm-9">
                                    <p>{{$ach->ach_date}}</p>
                                </div>
                            </div>
                            @endif
                            @if(isset($ach->ach_detail))
                            <div class="form-group row mb-0">
                                <label class="col-sm-3 form-control-label">Achievement Detail</label>
                                <div class="col-sm-9">
                                    <p>{{$ach->ach_detail}}</p>
                                </div>
                            </div>
                            @endif
                        @endforeach

                        @if(count($display_language)<= 1)
                            <h4 class="font-weight-bold">Language</h4>
                        @endif

                        @foreach ($display_language as $lang)

                            @if(isset($lang->lang))
                            <div class="form-group row mb-0">
                                <label class="col-sm-3 form-control-label">{{$lang->lang}}</label>
                                <div class="col-sm-9">
                                    <p>{{$lang->level}}</p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection