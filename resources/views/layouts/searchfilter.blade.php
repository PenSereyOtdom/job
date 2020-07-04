<form class="search-form" action="{{action('User\JobsController@jobs')}}" method="post">
 @csrf
<section class="search-section py-5">
    <div class="container px-5">
    <h5 class="text-white font-weight-bold">@lang('home.looking')</h5>
        <div class="row">
            <div class="col-lg-10 col-sm-12 mb-3">
                <div class="input-group">
                    <div class="location-filter w-100 mb-3">
                        <select class="form-control" name="location">
                            <option value="">@lang('home.choose')</option>
                            <option value="Banteay Meanchey">@lang('home.bmc')</option>
                            <option value="Battambang">@lang('home.btb')</option>
                            <option value="Kampong Cham">@lang('home.kpc')</option>
                            <option value="Kampong Chhnang">@lang('home.kpch')</option>
                            <option value="Kampong Speu">@lang('home.kps')</option>
                            <option value="Kampong Thom">@lang('home.kpt')</option>
                            <option value="Kampot">@lang('home.kp')</option>
                            <option value="Kandal">@lang('home.kd')</option>
                            <option value="Kep">@lang('home.k')</option>
                            <option value="Koh Kong">@lang('home.kk')</option>
                            <option value="Kratie">@lang('home.kt')</option>
                            <option value="Mondulkiri">@lang('home.mkr')</option>
                            <option value="Oddar Meanchey">@lang('home.odmc')</option>
                            <option value="Pailin">@lang('home.pl')</option>
                            <option value="Phnom Penh">@lang('home.pp')</option>
                            <option value="Preah Vihear">@lang('home.pvh')</option>
                            <option value="Prey Veng">@lang('home.pv')</option>
                            <option value="Pursat">@lang('home.ps')</option>
                            <option value="Ratanakiri">@lang('home.rtkr')</option>
                            <option value="Siem Reap">@lang('home.sr')</option>
                            <option value="Sihanoukville">@lang('home.shnv')</option>
                            <option value="Stung Treng">@lang('home.st')</option>
                            <option value="Svay Rieng">@lang('home.svr')</option>
                            <option value="Takeo">@lang('home.tk')</option>
                            <option value="Tbong Khmum">@lang('home.tbk')</option>
                        </select>
                    </div>        
                    <input type="text" class="form-control w-100" name="search" placeholder="Search keyword ...">
                </div>
            </div>
            <div class="col-lg-2 col-sm-12">
                <button type="submit" class="btn btn-primary w-100">Search</button>
                <div class="my-2 text-right" id="collapse-filter">
                    <a class="text-white" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="true" aria-controls="collapseFilter"><span id="option">Hide Option</span> <i class="fa fa-angle-up" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
</section>

<section id="collapseFilter" class="collapse show" >
    <div id="filter" class="filter" data-parent="#collapse-filter">
        <!-- For Mobile Screen -->
        <div class="d-flex justify-content-center">
            <span class="d-block">
                <button type="button"  class="btn text-left p-3 w-100 btn-secondary" data-toggle="collapse" data-target=".multi-collapse1" aria-expanded="false" aria-controls="job-classification1 job-classification2">@lang('home.jobclass') <i class="fa fa-angle-down float-right" aria-hidden="true"></i></button>
            </span>
            <div class="collapse multi-collapse1 tablet" id="job-classification1" data-parent="#filter">
                <div class="card card-body">
                    <div class="form-check">
                        <?php foreach($job_classifications as $job_classification){ ?>
                            <input name="job_classification" class="form-check-input" type="checkbox" value=<?php echo $job_classification->job_classification ?> id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">{{$job_classification->job_classification}}</label>
                        <?php } ?> 
                    </div>
                </div>
            </div>
            <span class="d-block">
                <button type="button"  class="btn text-left p-3 w-100 btn-secondary" data-toggle="collapse" data-target=".multi-collapse2" aria-expanded="false" aria-controls="job-industries1 job-industries2">@lang('home.jobindus') <i class="fa fa-angle-down float-right" aria-hidden="true"></i></button>
            </span>
            <div class="collapse multi-collapse2 tablet" id="job-industries1" data-parent="#filter">
                <div class="card card-body">
                    <div class="form-check">
                        <?php foreach($business_industries as $business_industrie){ ?>
                            <input name="job_industry" class="form-check-input" value=<?php echo $business_industrie->business_industry ?> type="checkbox" value="" >
                            <label class="form-check-label">{{$business_industrie->business_industry}}</label>
                        <?php } ?> 
                    </div>
                </div>
            </div>
            <span class="d-block">
                <button type="button" class="btn text-left p-3 w-100 btn-secondary" data-toggle="collapse" data-target=".multi-collapse3" aria-expanded="false" aria-controls="job-type1 job-type2">@lang('home.jobtypes') <i class="fa fa-angle-down float-right" aria-hidden="true"></i></button>
            </span>
            <div class="collapse multi-collapse3 tablet" id="job-type1" data-parent="#filter">
                <div class="card card-body">
                    <div class="form-check">
                        <?php foreach($job_types as $job_type){ ?>
                            <input name="job_type" class="form-check-input" value=<?php echo $job_type->job_type ?> type="checkbox" value="" >
                            <label class="form-check-label">{{$job_type->job_type}}</label>
                        <?php } ?> 
                    </div>
                </div>
            </div>
            <span class="d-block">
                <button type="button" class="btn text-left p-3 w-100 btn-secondary" data-toggle="collapse" data-target=".multi-collapse4" aria-expanded="false" aria-controls="experience-level1 experience-level2">@lang('home.experlevel') <i class="fa fa-angle-down float-right" aria-hidden="true"></i></button>
            </span>
            <div class="collapse multi-collapse4 tablet" id="experience-level1" data-parent="#filter">
                <div class="card card-body">
                    <div class="form-check">
                    <?php foreach($experience_levels as $experience_level){ ?>
                        <input name="experience_level"  class="form-check-input" value=<?php echo $experience_level->experience_level ?> type="checkbox">
                        <label class="form-check-label">{{$experience_level->experience_level}}</label>
                    <?php } ?> 
                    </div>
                </div>
            </div>
            <span class="d-block">
                <button type="button" class="btn text-left p-3 w-100 btn-secondary" data-toggle="collapse" data-target=".multi-collapse5" aria-expanded="false" aria-controls="salary-range1 salary-range2">@lang('home.salary') <i class="fa fa-angle-down float-right" aria-hidden="true"></i></button>
            </span>
            <div class="collapse multi-collapse5 tablet" id="salary-range1" data-parent="#filter">
                <div class="card card-body">
                    <div class="form-check">
                    <?php foreach($salary_ranges as $salary_range){ ?>
                        <input name="salary" class="form-check-input" value=<?php echo $salary_range->salary_range ?> type="checkbox" value="" >
                        <label class="form-check-label">{{$salary_range->salary_range}}</label>
                    <?php } ?> 
                    </div>
                </div>
            </div>
        </div>
        <!-- For Desktop Screen -->
        <div class="collapse multi-collapse1 desktop" id="job-classification2" data-parent="#filter">
            <div class="card card-body">
                <div class="container px-5">
                    <div class="row">
                    <?php foreach($job_classifications as $job_classification){ ?>
                            <input name="job_classification" class="form-check-input" type="checkbox" value=<?php echo $job_classification->job_classification ?> id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">{{$job_classification->job_classification}}</label>
                    <?php } ?> 
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse multi-collapse2 desktop" id="job-industries2" data-parent="#filter">
            <div class="card card-body">
                <div class="container px-5">
                    <div class="row">
                    <?php foreach($business_industries as $business_industrie){ ?>
                            <input name="job_industry" class="form-check-input" value=<?php echo $business_industrie->business_industry ?> type="checkbox" value="" >
                            <label class="form-check-label">{{$business_industrie->business_industry}}</label>
                    <?php } ?> 
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse multi-collapse3 desktop" id="job-type2" data-parent="#filter">
            <div class="card card-body">
                <div class="container px-5">
                    <div class="row">
                    <?php foreach($job_types as $job_type){ ?>
                            <input name="job_type" class="form-check-input" value=<?php echo $job_type->job_type ?> type="checkbox" value="" >
                            <label class="form-check-label">{{$job_type->job_type}}</label>
                        <?php } ?> 
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse multi-collapse4 desktop" id="experience-level2" data-parent="#filter">
            <div class="card card-body">
                <div class="container px-5">
                    <div class="row">
                    <?php foreach($experience_levels as $experience_level){ ?>
                        <input name="experience_level" class="form-check-input" value=<?php echo $experience_level->experience_level ?> type="checkbox" value="" >
                        <label class="form-check-label">{{$experience_level->experience_level}}</label>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse multi-collapse5 desktop" id="salary-range2" data-parent="#filter">
            <div class="card card-body">
                <div class="container px-5">
                    <div class="row">
                    <?php foreach($salary_ranges as $salary_range){ ?>
                        <input name="salary" class="form-check-input" value=<?php echo $salary_range->salary_range ?> type="checkbox" value="" >
                        <label class="form-check-label">{{$salary_range->salary_range}}</label>
                    <?php } ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form> 

<script type="text/javascript">
$(".search-section").click( function() {
    $(".fa-angle-up").toggleClass("angle");
    var x = document.getElementById("option");
    if (x.innerHTML === "Show Option") {
        x.innerHTML = "Hide Option";
    } else {
        x.innerHTML = "Show Option";
    }
});
</script>