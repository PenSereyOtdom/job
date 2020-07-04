@extends('layouts.admin')

@section('title', '')

@section('content')


<section class="cv-section">
    <div class="container">

    @if ($count_master < 1)

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-center">
                    <a href='{{url('create/master')}}'>
                        <button type="button" class="btn btn-outline-info btn-lg">@lang('admin.crmaster')</button>
                    </a>
                </div>
            </div>
        </div>
        
        @elseif ($count_master == 1)
            @foreach($display_master as $master)
                <section class="forms">
                    <div class="container-fluid">   
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-close d-flex">
                                        <form action="{{action('Admin\MasterDataController@edit', $master->id)}}" method="post">
                                            {{csrf_field()}}
                                            <button class="dropdown-item" type="submit" data-toggle="tooltip" data-placement="top" title="Edit Master"><i class="fas fa-edit"></i></button>
                                        </form>
                                        
                                    </div>
                                    <div class="card-header d-flex align-items-center">
                                        <h2>Master Data</h2>
                                    </div>

                                    <div class="card-body container">

                                        @if(count($display_salary)<= 1)
                                            <div class="line"></div>
                                            <h3 class="h4">Salary Rarng</h3><br>
                                        @endif
                                        @foreach ($display_salary as $ds)
                                            @if(isset($ds->salary_rarng))
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">@lang('admin.salary')</label>
                                                <div class="col-sm-9">
                                                    <p>{{$ds->salary_rarng}}</p>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach                             

                                        @if(count($display_jobType)<= 1)
                                            <div class="line"></div>
                                            <h3 class="h4">@lang('admin.jobtype')</h3><br>
                                        @endif
                                        @foreach ($display_jobType as $dj)
                                            @if(isset($dj->job_type))
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">@lang('admin.jobtype')</label>
                                                <div class="col-sm-9">
                                                    <p>{{$dj->job_type}}</p>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach

                                        @if(count($display_qualification)<= 1)
                                            <div class="line"></div>
                                            <h3 class="h4">@lang('admin.qualification')</h3><br>
                                        @endif
                                        @foreach ($display_qualification as $dq)
                                            @if(isset($dq->qualification))
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">@lang('admin.qualification')</label>
                                                <div class="col-sm-9">
                                                    <p>{{$dq->qualification}}</p>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                        
                                        @if(count($display_jobClassification)<= 1)
                                            <div class="line"></div>
                                            <h3 class="h4">@lang('admin.jobclass')</h3><br>
                                        @endif
                                        @foreach ($display_jobClassification as $djc)
                                            @if(isset($djc->job_classification))
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">@lang('admin.jobclass')</label>
                                                <div class="col-sm-9">
                                                    <p>{{$djc->job_classification}}</p>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                        
                                        @if(count($display_experienceLevel)<= 1)
                                            <div class="line"></div>
                                            <h3 class="h4">@lang('admin.experience')</h3><br>
                                        @endif
                                        @foreach ($display_experienceLevel as $de)
                                            @if(isset($de->experience_level))
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">@lang('admin.experience')</label>
                                                <div class="col-sm-9">
                                                    <p>{{$de->experience_level}}</p>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach

                                        @if(count($display_businessIndustry)<= 1)
                                            <div class="line"></div>
                                            <h3 class="h4">@lang('admin.business')</h3><br>
                                        @endif
                                        @foreach ($display_businessIndustry as $db)
                                            @if(isset($db->business_industrie))
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">@lang('admin.business')</label>
                                                <div class="col-sm-9">
                                                    <p>{{$db->business_industrie}}</p>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach                         

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>   
            @endforeach  
        @endif   
    </div>
</section>
@endsection