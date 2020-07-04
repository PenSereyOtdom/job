@extends('layouts.companies')

@section('title', 'Job Management')

@section('header', 'Job Management')

@section('content')
<div class="container">
    <div class="card px-5 py-3">
        <h3 class="font-weight-bold mb-5">@lang('company.editjobpost')</h3>
        <form class="form-horizontal" method="POST" action="{{action('Companies\JobPostController@update', $edit_jobPost->id)}}" enctype="multiple/form-data">
            {!! csrf_field() !!}
            <h5 class="font-weight-bold mb-4">@lang('company.jobsummary')</h5>
            <div class="form-group">
                <label class="form-control-label">@lang('company.jobtitle')</label>
                <input type="text" name="job_title" value="{{$edit_jobPost->job_title}}" class="form-control">    
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">@lang('company.jobclass')</label>
                        <select data-placeholder="Choose Job Classification..." name="job_classification" class="form-control">
                            <?php foreach($edit_jc as $job_classification){ ?>
                                <option value="<?php echo $job_classification->job_classification ?>"><?php echo $job_classification->job_classification ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">@lang('company.jobindustry')</label>
                        <select data-placeholder="Choose Job Industry..." name="job_industry" class="form-control">
                            <?php foreach($edit_bi as $business_industry){ ?>
                                <option value="<?php echo $business_industry->business_industry ?>"><?php echo $business_industry->business_industry ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">@lang('company.jobtype')</label>
                        <select data-placeholder="Choose Job Types..." name="job_type" class="form-control">
                            <?php foreach($edit_jt as $job_type){ ?>
                                <option value="<?php echo $job_type->job_type ?>"><?php echo $job_type->job_type ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">@lang('company.location')</label>
                        <select data-placeholder="Choose a Location..." name="location" class="form-control">
                            <option value="{{$edit_jobPost->location}}">{{$edit_jobPost->location}}</option>
                            <option value="Banteay Meanchey">@lang('company.bmc')</option>
                            <option value="Battambang">@lang('company.btb')</option>
                            <option value="Kampong Cham">@lang('company.kpc')</option>
                            <option value="Kampong Chhnang">@lang('company.kpch')</option>
                            <option value="Kampong Speu">@lang('company.kps')</option>
                            <option value="Kampong Thom">@lang('company.kpt')</option>
                            <option value="Kampot">@lang('company.kp')</option>
                            <option value="Kandal">@lang('company.kd')</option>
                            <option value="Kep">@lang('company.k')</option>
                            <option value="Koh Kong">@lang('company.kk')</option>
                            <option value="Kratie">@lang('company.kt')</option>
                            <option value="Mondulkiri">@lang('company.mkr')</option>
                            <option value="Oddar Meanchey">@lang('company.odmc')</option>
                            <option value="Pailin">@lang('company.pl')</option>
                            <option value="Phnom Penh">@lang('company.pp')</option>
                            <option value="Preah Vihear">@lang('company.pvh')</option>
                            <option value="Prey Veng">@lang('company.pv')</option>
                            <option value="Pursat">@lang('company.ps')</option>
                            <option value="Ratanakiri">@lang('company.rtkr')</option>
                            <option value="Siem Reap">@lang('company.sr')</option>
                            <option value="Sihanoukville">@lang('company.shnv')</option>
                            <option value="Stung Treng">@lang('company.st')</option>
                            <option value="Svay Rieng">@lang('company.svr')</option>
                            <option value="Takeo">@lang('company.tk')</option>
                            <option value="Tbong Khmum">@lang('company.tbk')</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">@lang('company.salary')</label>
                        <select data-placeholder="Choose Salary..." name="salary" class="form-control">
                            <?php foreach($edit_sr as $salary_range){ ?>
                                <option value="<?php echo $salary_range->salary_range ?>"><?php echo $salary_range->salary_range ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">@lang('company.qualification')</label>
                        <select data-placeholder="Choose Qualification..." name="qualification" class="form-control">
                            <?php foreach($edit_qu as $qualification){ ?>
                                <option value="<?php echo $qualification->qualification ?>"><?php echo $qualification->qualification ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">@lang('company.experience')</label>
                        <select data-placeholder="Choose Experience Level..." name="experience_level" class="form-control">
                            <?php foreach($edit_ex as $experience_level){ ?>
                                <option value="<?php echo $experience_level->experience_level ?>"><?php echo $experience_level->experience_level ?></option>
                            <?php } ?>                                
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">@lang('company.language')</label>
                        <select data-placeholder="Choose Language..." name="language" class="form-control">
                            <option value="{{$edit_jobPost->language}}">{{$edit_jobPost->language}}</option>
                            <option value="English">@lang('company.english')</option>
                            <option value="Khmer">@lang('company.khmer')</option>
                            <option value="Japanese">@lang('company.japan')</option>
                            <option value="French">@lang('company.french')</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">@lang('company.jobpriority')</label>
                        <select data-placeholder="Choose Job Priority..." name="job_priority" class="form-control">
                            <option value="{{$edit_jobPost->job_priority}}">{{$edit_jobPost->job_priority}}</option>
                            <option value="Normal Job">@lang('company.normaljob')</option>
                            <option value="Hot Job">@lang('company.hotjob')</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">@lang('company.number')</label>
                        <div class="input-group">
                            <input type="number" name="number_of_hiring" class="form-control" value="{{$edit_jobPost->number_of_hiring}}">
                            <div class="input-group-append">
                            <span class="input-group-text">@lang('company.pax')</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">@lang('company.closing')</label>
                        <input type="date" name="closing_date" value="{{$edit_jobPost->closing_date}}" class="form-control">
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <h5 class="font-weight-bold my-4">@lang('company.contactinfo')</h5>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">@lang('company.email')</label>
                        <input type="text" name="email" value="{{$edit_jobPost->email}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">@lang('company.phone')</label>
                        <input type="tel" name="phone_number" value="{{$edit_jobPost->phone_number}}" class="form-control">
                    </div>
                </div>
            </div>

            <!-- Job Description -->
            
            <div class="form-group row">
                <div class="col-sm-12">
                    <h5 class="font-weight-bold my-4">@lang('company.jobdescription')</h5>
                    <textarea class="form-control" id="description" name="description" placeholder="Please enter job details...">{{$edit_jobPost->description}}</textarea>
                </div>
            </div>

            <!-- Job Requirement -->
            <div class="form-group row">
                <div class="col-sm-12">
                    <h5 class="font-weight-bold my-4">@lang('company.jonrequirement')</h5>
                    <textarea class="form-control" id="requirement" name="requirement" placeholder="Please enter job details...">{{$edit_jobPost->requirement}}</textarea>
                </div>
            </div>

            <!-- Job Condition -->
            <div class="form-group row">
                <div class="col-sm-12">
                    <h5 class="font-weight-bold my-4">@lang('company.jobcondition')</h5>
                    <textarea class="form-control" id="condition" name="condition" placeholder="Please enter job details...">{{$edit_jobPost->condition}}</textarea>
                </div>
            </div>

            <div class="my-4 float-right">
                <button type="button" class="btn btn-outline-primary" href="/jobPost">@lang('company.cancel')</button>
                <button type="submit" class="btn btn-secondary" name="status" value="Draft" type="hidden">@lang('company.save')</button>
                <button type="submit" class="btn btn-primary" name="status" value="Active" type="hidden">@lang('company.savepublic')</button>
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
