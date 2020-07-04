@extends('layouts.admin')

@section('title', 'Setting')

@section('header', 'Setting')

@section('content')
<div class="container">
    <div class="profile card mb-5">
        <div class="container p-5">
            <form method="POST" action="{{url('/create/master')}}" enctype="multiple/form-data">
                {!! csrf_field() !!}
                <!-- Job Classification -->
                <input type="hidden" name="title">
                <h4 class="font-weight-bold">@lang('admin.jobclass')</h4>
                <input name="admin_id" value="{{$admin_id}}" type="hidden">
                <p>
                    <a href="javascript:void(0)" id="add-edu"><i class="fa fa-plus-circle"></i> @lang('admin.add') </a>
                    <span class="remove">|
                    <a href="javascript:void(0)" id="remove-edu"><i class="fa fa-minus-circle"></i> @lang('admin.remove')</a></span>
                </p>
                <div id="job-classification">
                    <div class="edu-element">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <input type="text" name="job_classification[]" placeholder="Please enter Job Classification..." class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Qualification -->
                <h4 class="font-weight-bold">@lang('admin.qualification')</h4>
                <input name="admin_id" value="{{$admin_id}}" type="hidden">
                <p>
                    <a href="javascript:void(0)" id="add-exp"><i class="fa fa-plus-circle"></i> @lang('admin.add') </a>
                    <span class="remove">|
                    <a href="javascript:void(0)" id="remove-exp"><i class="fa fa-minus-circle"></i> @lang('admin.remove')</a></span>
                </p>
                <div id="lang-exp">
                    <div class="exp-element">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <input type="text" name="qualification[]" placeholder="Please enter qualification..." class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Type -->
                <h4 class="font-weight-bold">@lang('admin.jobtype')</h4>
                <input name="admin_id" value="{{$admin_id}}" type="hidden">
                <p>
                    <a href="javascript:void(0)" id="add-ach"><i class="fa fa-plus-circle"></i> @lang('admin.add') </a>
                    <span class="remove">|
                    <a href="javascript:void(0)" id="remove-ach"><i class="fa fa-minus-circle"></i> @lang('admin.remove')</a></span>
                </p>
                <div id="lang-ach">
                    <div class="ach-element">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <input type="text" name="job_type[]" placeholder="Please enter job type..." class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Salary Range -->
                <h4 class="font-weight-bold">@lang('admin.salary')</h4>
                <input name="admin_id" value="{{$admin_id}}" type="hidden">
                <p>
                    <a href="javascript:void(0)" id="add-sr"><i class="fa fa-plus-circle"></i> @lang('admin.add') </a>
                    <span class="remove">|
                    <a href="javascript:void(0)" id="remove-sr"><i class="fa fa-minus-circle"></i> @lang('admin.remove')</a></span>
                </p>
                <div id="lang-sr">
                    <div class="sr-element">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <input type="text" name="salary_range[]" placeholder="Please enter salary ranges..." class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Experience Level -->
                <h4 class="font-weight-bold">@lang('admin.experience')</h4>
                <input name="admin_id" value="{{$admin_id}}" type="hidden">
                <p>
                    <a href="javascript:void(0)" id="add-el"><i class="fa fa-plus-circle"></i> @lang('admin.add') </a>
                    <span class="remove">|
                    <a href="javascript:void(0)" id="remove-el"><i class="fa fa-minus-circle"></i> @lang('admin.remove')</a></span>
                </p>
                <div id="lang-el">
                    <div class="el-element">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <input type="text" name="experience_level[]" placeholder="Please enter job type..." class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Industry -->
                <h4 class="font-weight-bold">@lang('admin.jobindustry')</h4>
                <input name="admin_id" value="{{$admin_id}}" type="hidden">
                <p>
                    <a href="javascript:void(0)" id="add-bi"><i class="fa fa-plus-circle"></i> @lang('admin.add') </a>
                    <span class="remove">|
                    <a href="javascript:void(0)" id="remove-bi"><i class="fa fa-minus-circle"></i> @lang('admin.remove')</a></span>
                </p>
                <div id="lang-bi">
                    <div class="bi-element">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <input type="text" name="business_industry[]" placeholder="Please enter job type..." class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="form-group  mt-5">
                    <div class="">
                        <button type="submit" class="btn btn-primary mr-2">@lang('admin.save')</button>
                        <a class="btn btn-outline-primary" href="/admin/setting">@lang('admin.cancle')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- script dynamic Job Classification -->
<script>
    $(function () 
        {
        $("#add-edu").on("click", function () {
            var clone = $(".edu-element").first().clone();
            clone.find("input").val("");
            clone.find("textarea").val("");
            clone.appendTo("#job-classification");
        });
        $("#remove-edu").click(function () {
            var group_edu = $(".edu-element").length;
            if (group_edu == 1) {
                alert("Minimum Job Classification is one");
                return false;
            }
            $(".edu-element").last().remove();
        });
    });
</script>

<!-- script dynamic qualification -->
<script>
    $(function () 
    {
        $("#add-exp").on("click", function () {
            var clone = $(".exp-element").first().clone();
            clone.find("input").val("");
            clone.find("textarea").val("");
            clone.appendTo("#lang-exp");
            });
            $("#remove-exp").click(function () {
            var group_edu = $(".exp-element").length;
            if (group_edu == 1) {
                alert("Minimum qualification is one");
                return false;
            }
            $(".exp-element").last().remove();
        });                      
    });
</script>
                    
<!-- script dynamic Job Type -->
<script>
    $(function () 
        {
        $("#add-ach").on("click", function () {
            var clone = $(".ach-element").first().clone();
            clone.find("input").val("");
            clone.find("textarea").val("");
            clone.appendTo("#lang-ach");
        });

        $("#remove-ach").click(function () {
            var group_edu = $(".ach-element").length;
            if (group_edu == 1) {
                alert("Minimum Job Types is one");
                return false;
            }
            $(".ach-element").last().remove();
        });
        });
</script>
                    
<!-- script dynamic Salary Range -->
<script>
    $(function () 
        {
        $("#add-sr").on("click", function () {
            var clone = $(".sr-element").first().clone();
            clone.find("input").val("");
            clone.find("textarea").val("");
            clone.appendTo("#lang-sr");
        });

        $("#remove-sr").click(function () {
            var group_edu = $(".sr-element").length;
            if (group_edu == 1) {
                alert("Minimum Salary Range is one");
                return false;
            }
            $(".sr-element").last().remove();
        });
        });
</script>
        
<!-- Script dynamic Experience Level -->
<script>
    $(function () 
        {
        $("#add-el").on("click", function () {
            var clone = $(".el-element").first().clone();
            clone.find("input").val("");
            clone.find("textarea").val("");
            clone.appendTo("#lang-el");
        });

        $("#remove-el").click(function () {
            var group_edu = $(".el-element").length;
            if (group_edu == 1) {
                alert("Minimum Experience Level is one");
                return false;
            }
            $(".el-element").last().remove();
        });
        });
</script>

<!-- script dynamic Business Industry -->
<script>
    $(function () 
        {
        $("#add-bi").on("click", function () {
            var clone = $(".bi-element").first().clone();
            clone.find("input").val("");
            clone.find("textarea").val("");
            clone.appendTo("#lang-bi");
        });

        $("#remove-bi").click(function () {
            var group_edu = $(".bi-element").length;
            if (group_edu == 1) {
                alert("Minimum Business Industry is one");
                return false;
            }
            $(".bi-element").last().remove();
        });
        });
</script>
@endsection

