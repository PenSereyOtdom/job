@extends('layouts.user')

@section('title', 'Jobs')

@section('content')
@include('layouts.navbar')
<div class="container">
    @foreach($jobDetail as $job)
        <div class="row">
            <div class="col-lg-8 mt-5">
                <!-- Job Detail layout -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h2 class="card-title font-weight-bold">{{$job->job_title}}</h2>
                                <p class="card-text">{{$job->company_name}}</p>
                            </div>
                            <div class="col-3 my-auto">
                                <div class="picture-container">
                                    <div class="square-picture">
                                    @if( isset($job->profile) )
                                        <img src="{{ asset('/storage/company_profile/' . $job->profile) }}" alt="Profile" class="card-img-top">
                                    @else
                                        <img src="{{asset('/img/user_company.jpg')}}" alt="Profile" class="card-img-top">
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="mb-3 font-weight-bold">Job Summary</h5>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-5"><small class="text-secondary">Job Classification:</small></div>
                                    <div class="col-7"><small>{{$job->job_classification}}</small></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-5"><small class="text-secondary">Type of Job:</small></div>
                                    <div class="col-7"><small>{{$job->job_type}}</small></div>
                                </div>
                            </div>
                        </div>
                        <hr class="m-2">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-5"><small class="text-secondary">Job Industry:</small></div>
                                    <div class="col-7"><small>{{$job->job_industry}}</small></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-5"><small class="text-secondary">Experience Level:</small></div>
                                    <div class="col-7"><small>{{$job->experience_level}}</small></div>
                                </div>
                            </div>
                        </div>
                        <hr class="m-2">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-5"><small class="text-secondary">Qualification:</small></div>
                                    <div class="col-7"><small>{{$job->qualification}}</small></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-5"><small class="text-secondary">Hiring:</small></div>
                                    <div class="col-7"><small>{{$job->number_of_hiring}}</small></div>
                                </div>
                            </div>
                        </div>
                        <hr class="m-2">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-5"><small class="text-secondary">Salary:</small></div>
                                    <div class="col-7"><small>{{$job->salary}}</small></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-5"><small class="text-secondary">Language:</small></div>
                                    <div class="col-7"><small>{{$job->language}}</small></div>
                                </div>
                            </div>
                        </div>
                        <hr class="m-2">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-5"><small class="text-secondary">Location:</small></div>
                                    <div class="col-7"><small>{{$job->location}}</small></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-5"><small class="text-secondary">Closing Date:</small></div>
                                    <div class="col-7"><small>{{$job->closing_date}}</small></div>
                                </div>
                            </div>
                        </div>

                    <!-- Job Description -->
                        @if(isset($job->description))
                        <h5 class="mt-3 font-weight-bold">Job Description</h5>
                        <p><?php echo $job->description; ?></p>
                        @else
                        @endif

                        <!-- Job Requirement -->
                        @if(isset($job->requirement))
                        <h5 class="font-weight-bold">Job Requirement</h5>
                        <p><?php echo $job->requirement; ?></p>
                        @else
                        @endif

                        <!-- Job Condition -->
                        @if(isset($job->condition))
                        <h5 class="font-weight-bold">Job Conditon</h5>
                        <p><?php echo $job->condition; ?></p>
                        @else
                        @endif

                        <!-- About Company -->
                        <h5 class="font-weight-bold">About Company</h5>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus eaque eligendi necessitatibus,
                        voluptatibus excepturi maiores omnis inventore quidem. Suscipit aspernatur eveniet accusantium adipisci 
                        nemo fuga reiciendis, tempore cumque nam voluptatem.</p>

                        <!-- Contact Informantion -->
                        <h5 class="font-weight-bold">Contact Informantion</h5>
                        @if(Auth::check())
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-4"><small class="text-secondary">Name:</small></div>
                                    <div class="col-8"><small>{{$job->recruiter_name}}</small></div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">   
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-4"><small class="text-secondary">Phone Number:</small></div>
                                    <div class="col-8"><small>{{$job->phone_number}}</small></div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-4"><small class="text-secondary">Email:</small></div>
                                    <div class="col-8"><small>{{$job->email}}</small></div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-4"><small class="text-secondary">Address:</small></div>
                                    <div class="col-8"><small>{{$job->address}}</small></div>
                                </div>
                            </div>
                        </div>
                        @else
                            @include('layouts.signin')
                        @endif
                    </div>
                </div>
            

                <!-- More jobs from this company -->
                <div class="card my-5">
                    <div class="card-body">
                        <h4 class="mb-4 font-weight-bold">More jobs form this company</h4>
                        <div class="row">
                            <div class="col-lg-10">
                                <h5 class="card-title mb-0 font-weight-bold"><a href="#">Senior Accountant</a></h5>
                                <small class="card-text">ABA Bank Co.Ltd</small>
                            </div>
                            <div class="col-lg-2 my-auto">
                                <p class="text-warning font-weight-bold">Negotiable</p>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-lg-10">
                                <h5 class="card-title mb-0 font-weight-bold"><a href="#">Senior Accountant</a></h5>
                                <small class="card-text">ABA Bank Co.Ltd</small>
                            </div>
                            <div class="col-lg-2 my-auto">
                                <p class="text-warning font-weight-bold">Negotiable</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Column -->
            <div class="col-lg-4">
                <!-- Apply and Save job -->
                <div class="card my-5">
                    <div class="card-body">
                        <div class="text-center">
                            <p><button type="button" id="apply-btn" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-lg btn-primary font-weight-bold w-100">
                                @if($apply->confirmed == '1')
                                    Withdraw Application
                                @else
                                    Apply Now
                                @endif
                            </button></p>
                            <form action="{{url('save', $job->id)}}" method="POST">
                                @csrf
                                <input name="id" value="{{$job->id}}" type="hidden">
                                <input name="saved" value="{{$save->saved ^ 1}}" type="hidden">
                                <p class="mb-0"><button class="btn btn-lg btn-outline-primary font-weight-bold w-100" name="save" value="1" type="submit"> 
                                @if($save->saved == '1')
                                    <i class="fa fa-star"></i>
                                @else
                                    <i class="fa fa-star-o"></i>
                                @endif
                                    Save Job </button></p>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Related Job -->
                <div class="card my-4">
                    <div class="card-body">
                        <h4 class="mb-4 font-weight-bold">Related Jobs</h4>
                        <div class="row">
                            <div class="col-lg-10">
                                <h5 class="card-title mb-0 font-weight-bold"><a href="#">Senior Accountant</a></h5>
                                <small class="card-text mb-0 text-secondary">ABA Bank Co.Ltd</small>
                                <p class="mb-0"><small class="text-warning">500$</small></p>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-lg-10">
                                <h5 class="card-title mb-0 font-weight-bold"><a href="#">Senior Accountant</a></h5>
                                <small class="card-text mb-0 text-secondary">ABA Bank Co.Ltd</small>
                                <p class="mb-0"><small class="text-warning">Negotiable</small></p>
                            </div>
                            <div class="col-lg-2">
                                <p class="text-warning font-weight-bold">Hot</p>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-lg-10">
                                <h5 class="card-title mb-0 font-weight-bold"><a href="#">Senior Accountant</a></h5>
                                <small class="card-text mb-0 text-secondary">ABA Bank Co.Ltd</small>
                                <p class="mb-0"><small class="text-warning">Negotiable</small></p>
                            </div>
                            <div class="col-lg-2">
                                <p class="text-warning font-weight-bold">Hot</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($count_cv == '1')
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="{{url('jobDetail', $job->id)}}" method="POST">
                                @csrf
                                <input name="id" value="{{$job->id}}" type="hidden">
                                <input name="confirmed" value="{{$apply->confirmed ^ 1}}" type="hidden">
                                <div class="modal-header">
                                    <h5 class="font-weight-bold" id="exampleModalLongTitle">
                                    @if($apply->confirmed == '1')
                                        Withdrawing Application
                                    @else
                                        Applying Job
                                    @endif
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                    @if($apply->confirmed == '1')
                                        Do you really want to withdraw your application from this company?
                                    @else
                                        Please remember that your resume will be sent to the company you’re applying for.
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">
                                        @if($apply->confirmed == '1')
                                            Yes, do it now
                                        @else
                                            Apply Now
                                        @endif
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="border border-0 modal-content bg-danger">
                            <div class="modal-body text-center bg-white">
                                <h3 class="font-weight-bold py-3">Applying Job</h3>
                                <p><i class="fa fa-exclamation-circle" aria-hidden="true"></i> You don't have your resume yet. Please create your resume first.</p>
                                <button type="button" class="btn btn-outline-primary mr-2" data-dismiss="modal">Cancel</button>
                                <a href="{{url('/cv')}}">
                                    <button type="button" class="btn btn-primary" href="/cv">Create Resume</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        @endforeach
    </div>
@endsection

