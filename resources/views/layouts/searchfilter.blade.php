
@if(Route::current()->getName() == "hotjobs")
    <form class="search-form"  method="get">
@else
    <form class="search-form"  method="get">
@endif
<section class="search-section py-5">
    <div class="container px-5">
    <h5 class="text-white font-weight-bold">I'm looking for...</h5>
        <div class="row">
            <div class="col-lg-10 col-sm-12 mb-3">
                <div class="input-group">
                    <div class="location-filter w-100 mb-3">
                        <select class="form-control" name="location">
                            <option value="">Choose a Location...</option>
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
                <button type="button" class="btn text-left p-3 w-100 btn-secondary" data-toggle="collapse" data-target=".multi-collapse1" aria-expanded="false" aria-controls="job-classification1 job-classification2">Job Classifications <i class="fa fa-angle-down float-right" aria-hidden="true"></i></button>
            </span>
            <div class="collapse multi-collapse1 tablet" id="job-classification1" data-parent="#filter">
                <div class="card card-body">
                    <div class="row">
                    <?php foreach($job_classifications as $job_classification){ ?>
                        <div class="col-12">
                            <div class="form-check">
                                <input name="job_classification[]" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">{{$job_classification->job_classification}}</label>
                            </div>
                       </div>
                    <?php } ?>
                    </div>      
                </div>
            </div>
            <span class="d-block">
                <button type="button" class="btn text-left p-3 w-100 btn-secondary" data-toggle="collapse" data-target=".multi-collapse2" aria-expanded="false" aria-controls="job-industries1 job-industries2">Job Industries <i class="fa fa-angle-down float-right" aria-hidden="true"></i></button>
            </span>
            <div class="collapse multi-collapse2 tablet" id="job-industries1" data-parent="#filter">
                <div class="card card-body">
                    <div class="row">
                    <?php foreach($business_industries as $business_industrie){ ?>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">{{$business_industrie->business_industry}}</label>
                            </div>
                       </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <span class="d-block">
                <button type="button" class="btn text-left p-3 w-100 btn-secondary" data-toggle="collapse" data-target=".multi-collapse3" aria-expanded="false" aria-controls="job-type1 job-type2">Job Types <i class="fa fa-angle-down float-right" aria-hidden="true"></i></button>
            </span>
            <div class="collapse multi-collapse3 tablet" id="job-type1" data-parent="#filter">
                <div class="card card-body">
                    <div class="row">
                    <?php foreach($job_types as $job_type){ ?>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">{{$job_type->job_type}}</label>
                            </div>
                       </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <span class="d-block">
                <button type="button" class="btn text-left p-3 w-100 btn-secondary" data-toggle="collapse" data-target=".multi-collapse4" aria-expanded="false" aria-controls="experience-level1 experience-level2">Experience Level <i class="fa fa-angle-down float-right" aria-hidden="true"></i></button>
            </span>
            <div class="collapse multi-collapse4 tablet" id="experience-level1" data-parent="#filter">
                <div class="card card-body">
                    <div class="row">
                    <?php foreach($experience_levels as $experience_level){ ?>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">{{$experience_level->experience_level}}</label>
                            </div>
                       </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <span class="d-block">
                <button type="button" class="btn text-left p-3 w-100 btn-secondary" data-toggle="collapse" data-target=".multi-collapse5" aria-expanded="false" aria-controls="salary-range1 salary-range2">Salary Range <i class="fa fa-angle-down float-right" aria-hidden="true"></i></button>
            </span>
            <div class="collapse multi-collapse5 tablet" id="salary-range1" data-parent="#filter">
                <div class="card card-body">
                    <div class="row">
                    <?php foreach($salary_ranges as $salary_range){ ?>
                    
                        <div class="col-12">
                            <div class="form-check">
                                <input name="salary[]" class="form-check-input" value=<?php echo $salary_range->salary_range ?> type="checkbox" value="" >
                                <label class="form-check-label">{{$salary_range->salary_range}}</label>
                            </div>
                       </div>
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
                               
                        <div class="col-4">
                            <div class="form-check">
                                 <input name="job_classification[]" class="form-check-input" type="checkbox" value=<?php echo $job_classification->job_classification  ?> id="{{$job_classification->id }}">
                                <label class="form-check-label" for="defaultCheck1">{{$job_classification->job_classification}}</label>
                            </div>
                       </div>
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
                        <div class="col-4">
                            <div class="form-check">
                                <input name="job_industry[]" class="form-check-input" type="checkbox"  value=<?php echo $business_industrie->business_industry  ?> id="{{$business_industrie->id }}">
                                <label class="form-check-label" for="defaultCheck1">{{$business_industrie->business_industry}}</label>
                            </div>
                       </div>
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
                        <div class="col-4">
                            <div class="form-check">
                                <input name="job_type[]" class="form-check-input" type="checkbox" value=<?php echo $job_type->job_type  ?> id="{{$job_type->id }}">
                                <label class="form-check-label" for="defaultCheck1">{{$job_type->job_type}}</label>
                            </div>
                       </div>
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
                        <div class="col-4">
                            <div class="form-check">
                                <input name="experience_level[]" class="form-check-input" type="checkbox" value=<?php echo $experience_level->experience_level  ?> id="{{$experience_level->id}}">
                                <label class="form-check-label" for="defaultCheck1">{{$experience_level->experience_level}}</label>
                            </div>
                       </div>
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
                        <div class="col-4">
                            <div class="form-check">
                                <input name="salary[]" class="form-check-input" type="checkbox" value=<?php echo $salary_range->salary_range  ?> id="{{$salary_range->id}}">
                                <label class="form-check-label" for="defaultCheck1">{{$salary_range->salary_range}}</label>
                            </div>
                       </div>
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