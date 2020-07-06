@extends('layouts.companies')

@section('title', 'Job Management')

@section('header', 'Job Management')

@section('content')
<div class="container">
    <div class="card px-5 py-3">
        <h3 class="font-weight-bold mb-5">Create New Job</h3>
        <form class="form-horizontal" method="POST" action="{{url('/create/jobPost/')}}" enctype="multiple/form-data">
        
            {!! csrf_field() !!}

            <input type="hidden" name="service_id" value="{{ $service_id }}">


            <!-- Job Summary -->
            <h5 class="font-weight-bold mb-4">Job Summary</h5>
            <div class="form-group">
                <label class="form-control-label">Job Title</label>
                <input type="text" name="job_title" placeholder="Web Designer" class="form-control">    
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Job Classification</label>
                        <select data-placeholder="Choose Job Classification..." name="job_classification" class="form-control">
                            <option>Choose Job Classification...</option>
                            <?php foreach($display_jobClassification as $job_classification){ ?>
                            <option value="<?php echo $job_classification->job_classification ?>"><?php echo $job_classification->job_classification ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Job Industry</label>
                        <select data-placeholder="Choose Job Industry..." name="job_industry" class="form-control">
                            <option>Choose Job Industry...</option>
                            <?php foreach($display_businessIndustry as $business_industry){ ?>
                            <option value="<?php echo $business_industry->business_industry ?>"><?php echo $business_industry->business_industry ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Job Type</label>
                        <select data-placeholder="Choose Job Types..." name="job_type" class="form-control">
                            <option>Choose Job Types...</option>
                            <?php foreach($display_jobType as $job_type){ ?>
                                <option value="<?php echo $job_type->job_type ?>"><?php echo $job_type->job_type ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Location</label>
                        <select data-placeholder="Choose a Location..." name="location" class="form-control">
                            <option>Choose a Location...</option>
                            <option value="Banteay Meanchey">Banteay Meanchey</option>
                            <option value="Battambang">Battambang</option>         
                            <option value="Kampong Cham">Kampong Cham</option>
                            <option value="Kampong Chhnang">Kampong Chhnang</option>
                            <option value="Kampong Speu">Kampong Speu</option>
                            <option value="Kampong Thom">Kampong Thom</option>
                            <option value="Kampot">Kampot</option>
                            <option value="Kandal">Kandal</option>
                            <option value="Kep">Kep</option>
                            <option value="Koh Kong">Koh Kong</option>
                            <option value="Kratie">Kratie</option>
                            <option value="Mondulkiri">Mondulkiri</option>
                            <option value="Oddar Meanchey">Oddar Meanchey</option>
                            <option value="Pailin">Pailin</option>
                            <option value="Phnom Penh">Phnom Penh</option>
                            <option value="Preah Vihear">Preah Vihear</option>
                            <option value="Prey Veng">Prey Veng</option>
                            <option value="Pursat">Pursat</option>
                            <option value="Ratanakiri">Ratanakiri</option>
                            <option value="Siem Reap">Siem Reap</option>
                            <option value="Sihanoukville">Sihanoukville</option>
                            <option value="Stung Treng">Stung Treng</option>
                            <option value="Svay Rieng">Svay Rieng</option>
                            <option value="Takeo">Takeo</option>
                            <option value="Tbong Khmum">Tbong Khmum</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Salary Range</label>
                        <select data-placeholder="Choose Salary..." name="salary" class="form-control">
                            <option>Choose Salary...</option>
                            <?php foreach($display_salary as $salary_range){ ?>
                            <option value="<?php echo $salary_range->salary_range ?>"><?php echo $salary_range->salary_range ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Qualification</label>
                        <select data-placeholder="Choose Qualification..." name="qualification" class="form-control">
                            <option>Choose Qualification...</option>
                            <?php foreach($display_qualification as $qualification){ ?>
                            <option value="<?php echo $qualification->qualification ?>"><?php echo $qualification->qualification ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Experience Level</label>
                        <select data-placeholder="Choose Experience Level..." name="experience_level" class="form-control">
                            <option>Choose Experience Level...</option>
                            <?php foreach($display_experienceLevel as $experience_level){ ?>
                            <option value="<?php echo $experience_level->experience_level ?>"><?php echo $experience_level->experience_level ?></option>
                            <?php } ?>                                  
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Language</label>
                        <select data-placeholder="Choose Language..." name="language" class="form-control">
                            <option>Choose Language...</option>
                            <option value="English">English</option>
                            <option value="Khmer">Khmer</option>
                            <option value="Japanese">Japanese</option>
                            <option value="French">French</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Job Priority</label>
                        <select data-placeholder="Choose Job Priority..." name="job_priority" class="form-control">
                            <option value="<?php echo $service_type->type ?>">{{$service_type->type}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Number of Hiring</label>
                        <div class="input-group">
                            <input type="number" name="number_of_hiring" placeholder="Please enter number of hiring..." class="form-control">
                            <div class="input-group-append">
                            <span class="input-group-text">pax</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Closing Date</label>
                        <input type="date" value="<?php echo $max_date ?>"name="closing_date" placeholder="closing date" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <!-- Contact Information -->
            <h5 class="font-weight-bold my-4">Contact Information</h5>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Email</label>
                        <input type="text" name="email" placeholder="Email" class="form-control">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Phone Number</label>
                        <input type="tel" name="phone_number" placeholder="+855 12 35 23 23" class="form-control">
                    </div>
                </div>
            </div>
            <!-- Job Description -->
            <h5 class="font-weight-bold my-4">Job Description</h5>
            <textarea class="form-control" id="description" name="description" placeholder="Please enter job descriptions..."></textarea>
            <!-- Job Requirement -->
            <h5 class="font-weight-bold my-4">Job Requirement</h5>
            <textarea class="form-control" id="requirement" name="requirement" placeholder="Please enter job requirement..."></textarea>
            <!-- Job Condition -->
            <h5 class="font-weight-bold my-4">Job Condition</h5>
            <textarea class="form-control" id="condition" name="condition" placeholder="Please enter job condition..."></textarea>
            <div class="mt-3 float-right">
                <button type="button" class="btn btn-outline-primary" href="/jobPost">Cancel</button>
                <button type="submit" class="btn btn-secondary" name="status" value="Draft" type="hidden">Save Draft</button>
                <button type="submit" class="btn btn-primary" name="status" value="Active" type="hidden">Public</button>
            </div>                  
        </form>
    </div>
</div>

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    //CKEditor
    CKEDITOR.replace( 'description' );
    CKEDITOR.replace( 'requirement' );
    CKEDITOR.replace( 'condition' );
</script>

@endsection
