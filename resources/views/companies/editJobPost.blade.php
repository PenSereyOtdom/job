@extends('layouts.companies')

@section('title', 'Job Management')

@section('header', 'Job Management')

@section('content')
<div class="container">
    <div class="card px-5 py-3">
        <h3 class="font-weight-bold mb-5">Edit Job Post</h3>
        <form class="form-horizontal" method="POST" action="{{action('Companies\JobPostController@update', $edit_jobPost->id)}}" enctype="multiple/form-data">
            {!! csrf_field() !!}
            <h5 class="font-weight-bold mb-4">Job Summary</h5>
            <div class="form-group">
                <label class="form-control-label">Job Title</label>
                <input type="text" name="job_title" value="{{$edit_jobPost->job_title}}" class="form-control">    
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Job Classification</label>
                        <select data-placeholder="Choose Job Classification..." name="job_classification" class="form-control">
                            <?php foreach($edit_jc as $job_classification){ ?>
                                <option value="<?php echo $job_classification->job_classification ?>"><?php echo $job_classification->job_classification ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Job Industry</label>
                        <select data-placeholder="Choose Job Industry..." name="job_industry" class="form-control">
                            <?php foreach($edit_bi as $business_industry){ ?>
                                <option value="<?php echo $business_industry->business_industry ?>"><?php echo $business_industry->business_industry ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Job Type</label>
                        <select data-placeholder="Choose Job Types..." name="job_type" class="form-control">
                            <?php foreach($edit_jt as $job_type){ ?>
                                <option value="<?php echo $job_type->job_type ?>"><?php echo $job_type->job_type ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Location</label>
                        <select data-placeholder="Choose a Location..." name="location" class="form-control">
                            <option value="{{$edit_jobPost->location}}">{{$edit_jobPost->location}}</option>
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
                            <?php foreach($edit_sr as $salary_range){ ?>
                                <option value="<?php echo $salary_range->salary_range ?>"><?php echo $salary_range->salary_range ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Qualification</label>
                        <select data-placeholder="Choose Qualification..." name="qualification" class="form-control">
                            <?php foreach($edit_qu as $qualification){ ?>
                                <option value="<?php echo $qualification->qualification ?>"><?php echo $qualification->qualification ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Experience Level</label>
                        <select data-placeholder="Choose Experience Level..." name="experience_level" class="form-control">
                            <?php foreach($edit_ex as $experience_level){ ?>
                                <option value="<?php echo $experience_level->experience_level ?>"><?php echo $experience_level->experience_level ?></option>
                            <?php } ?>                                
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Language</label>
                        <select data-placeholder="Choose Language..." name="language" class="form-control">
                            <option value="{{$edit_jobPost->language}}">{{$edit_jobPost->language}}</option>
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
                            <option value="{{$edit_jobPost->job_priority}}">{{$edit_jobPost->job_priority}}</option>
                            <option value="Normal Job">Normal Job</option>
                            <option value="Hot Job">Hot Job</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Number of Hiring</label>
                        <div class="input-group">
                            <input type="number" name="number_of_hiring" class="form-control" value="{{$edit_jobPost->number_of_hiring}}">
                            <div class="input-group-append">
                            <span class="input-group-text">pax</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Closing Date</label>
                        <input type="date" name="closing_date" value="{{$edit_jobPost->closing_date}}" class="form-control">
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <h5 class="font-weight-bold my-4">Contact Information</h5>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Email</label>
                        <input type="text" name="email" value="{{$edit_jobPost->email}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Phone Number</label>
                        <input type="tel" name="phone_number" value="{{$edit_jobPost->phone_number}}" class="form-control">
                    </div>
                </div>
            </div>

            <!-- Job Description -->
            
            <div class="form-group row">
                <div class="col-sm-12">
                    <h5 class="font-weight-bold my-4">Job Description</h5>
                    <textarea class="form-control" id="description" name="description" placeholder="Please enter job details...">{{$edit_jobPost->description}}</textarea>
                </div>
            </div>

            <!-- Job Requirement -->
            <div class="form-group row">
                <div class="col-sm-12">
                    <h5 class="font-weight-bold my-4">Job Requirement</h5>
                    <textarea class="form-control" id="requirement" name="requirement" placeholder="Please enter job details...">{{$edit_jobPost->requirement}}</textarea>
                </div>
            </div>

            <!-- Job Condition -->
            <div class="form-group row">
                <div class="col-sm-12">
                    <h5 class="font-weight-bold my-4">Job Condition</h5>
                    <textarea class="form-control" id="condition" name="condition" placeholder="Please enter job details...">{{$edit_jobPost->condition}}</textarea>
                </div>
            </div>

            <div class="my-4 float-right">
                <button type="button" class="btn btn-outline-primary" href="/jobPost">Cancel</button>
                <button type="submit" class="btn btn-secondary" name="status" value="Draft" type="hidden">Save Draft</button>
                <button type="submit" class="btn btn-primary" name="status" value="Active" type="hidden">Save Public</button>
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
