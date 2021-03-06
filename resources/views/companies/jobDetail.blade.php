@extends('layouts.companies')

@section('title', 'Job Management')

@section('header', 'Job Management')

@section('content')
    @foreach($jobDetail as $job)
        <div class="container">
            <div class="card mb-4 p-5">
                <div class="card-close">
                    <form action="{{action('Companies\JobPostController@edit', $job->id)}}" method="post">
                        {{csrf_field()}}
                        <button class="btn btn-link" type="submit"><i type="submit" class="fas fa-edit"></i></button>
                    </form>
                </div>
                <div class="row">
                    <div class="col-lg-10">
                        <h2 class="card-title font-weight-bold">{{$job->job_title}}</h2>
                        <p class="card-text">ABA Bank Co.Ltd</p>
                    </div>
                    <div class="col-lg-2 my-auto">
                        <div class="picture-container">
                            <div class="square-picture">
                            @if( Auth::guard('company')->user()->company_profile )
                                <img src="{{ asset('storage/company_profile/' . Auth::guard('company')->user()->company_profile) }}" alt="Profile" class="card-img-top">
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
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-5"><small class="text-secondary">Job Classification:</small></div>
                            <div class="col-lg-7"><small>{{$job->job_classification}}</small></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-5"><small class="text-secondary">Type of Job:</small></div>
                            <div class="col-lg-7"><small>{{$job->job_type}}</small></div>
                        </div>
                    </div>
                </div>
                <hr class="m-2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-5"><small class="text-secondary">Job Industry:</small></div>
                            <div class="col-lg-7"><small>{{$job->job_industry}}</small></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-5"><small class="text-secondary">Experience Level:</small></div>
                            <div class="col-lg-7"><small>{{$job->experience_level}}</small></div>
                        </div>
                    </div>
                </div>
                <hr class="m-2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-5"><small class="text-secondary">Qualification:</small></div>
                            <div class="col-lg-7"><small>{{$job->qualification}}</small></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-5"><small class="text-secondary">Hiring:</small></div>
                            <div class="col-lg-7"><small>{{$job->number_of_hiring}}</small></div>
                        </div>
                    </div>
                </div>
                <hr class="m-2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-5"><small class="text-secondary">Salary:</small></div>
                            <div class="col-lg-7"><small>{{$job->salary}}</small></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-5"><small class="text-secondary">Language:</small></div>
                            <div class="col-lg-7"><small>{{$job->language}}</small></div>
                        </div>
                    </div>
                </div>
                <hr class="m-2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-5"><small class="text-secondary">Location:</small></div>
                            <div class="col-lg-7"><small>{{$job->location}}</small></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-5"><small class="text-secondary">Closing Date:</small></div>
                            <div class="col-lg-7"><small>{{$job->closing_date}}</small></div>
                        </div>
                    </div>
                </div>

                <!-- Job Description -->
                @if(isset($job->description))
                <h5 class="mt-5 font-weight-bold">Job Description</h5>
                <p><?php echo $job->description; ?></p>
                @else
                @endif
                <!-- Job Requirement -->
                @if(isset($job->requirement))
                <h5 class="mt-5 font-weight-bold">Job Requirement</h5>
                <p><?php echo $job->requirement; ?></p>
                @else
                @endif
                <!-- Job Condition -->
                @if(isset($job->condition))
                <h5 class="mt-5 font-weight-bold">Job Conditon</h5>
                <p><?php echo $job->condition; ?></p>
                @else
                @endif
                <!-- About Company -->
                <h5 class="mt-5 font-weight-bold">About Company</h5>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus eaque eligendi necessitatibus,
                voluptatibus excepturi maiores omnis inventore quidem. Suscipit aspernatur eveniet accusantium adipisci 
                nemo fuga reiciendis, tempore cumque nam voluptatem.</p>

                <!-- Contact Informantion -->
                <h5 class="mt-5 font-weight-bold">Contact Informantion</h5>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4"><small class="text-secondary">Name:</small></div>
                            <div class="col-lg-8"><small>{{$job->recruiter_name}}</small></div>
                        </div>
                    </div>
                </div>
                <hr class="my-2">
                <div class="row">   
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4"><small class="text-secondary">Phone Number:</small></div>
                            <div class="col-lg-8"><small>{{$job->phone_number}}</small></div>
                        </div>
                    </div>
                </div>
                <hr class="my-2">
                <div class="row">   
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4"><small class="text-secondary">Email:</small></div>
                            <div class="col-lg-8"><small>{{$job->email}}</small></div>
                        </div>
                    </div>
                </div>
                <hr class="my-2">
                <div class="row">   
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4"><small class="text-secondary">Address</small></div>
                            <div class="col-lg-8"><small>{{$job->address}}</small></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection