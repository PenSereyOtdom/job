@extends('layouts.admin')

@section('title', 'Setting')

@section('header', 'Setting')

@section('content')
<div class="container">
    <div class="profile card mb-5">
        <div class="container p-5">
            <form action="{{action('Admin\MasterDataController@update', $edit_master->id)}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <!-- Job Classification -->
                <h4 class="font-weight-bold">Job Classification</h4>
                <input name="admin_id" value="{{$admin_id}}" type="hidden">
                <p>
                    <a href="javascript:void(0)" id="add-jc"><i class="fa fa-plus-circle"></i> Add </a>
                    <span class="remove">|
                    <a href="javascript:void(0)" id="remove-jc"><i class="fa fa-minus-circle"></i> Remove</a></span>
                </p>
                <div id="lang-jc">
                    @foreach ($edit_jc as $jc)
                    <div class="jc-element">
                        <input type="hidden" name="jc[]" value="{{$jc->id}}"></input>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label my-auto">Job Classification:</label>
                            <div class="col-sm-5">
                                <input type="text" name="job_classification[]" value="{{$jc->job_classification}}" placeholder="Please enter job classifications..." class="form-control">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Qualification -->
                <h4 class="font-weight-bold">Qualification</h4>
                <input name="admin_id" value="{{$admin_id}}" type="hidden">
                <p>
                    <a href="javascript:void(0)" id="add-q"><i class="fa fa-plus-circle"></i> Add </a>
                    <span class="remove">|
                    <a href="javascript:void(0)" id="remove-q"><i class="fa fa-minus-circle"></i> Remove</a></span>
                </p>
                <div id="lang-q">
                    @foreach ($edit_qu as $q)
                    <div class="q-element">
                        <input type="hidden" name="q[]" value="{{$q->id}}"></input>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label my-auto">Qualification:</label>
                            <div class="col-sm-5">
                                <input type="text" name="qualification[]" value="{{$q->qualification}}" placeholder="Please enter job qualifications..." class="form-control">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Job Type -->
                <h4 class="font-weight-bold">Job Type</h4>
                <input name="admin_id" value="{{$admin_id}}" type="hidden">
                <p>
                    <a href="javascript:void(0)" id="add-jt"><i class="fa fa-plus-circle"></i> Add </a>
                    <span class="remove">|
                    <a href="javascript:void(0)" id="remove-jt"><i class="fa fa-minus-circle"></i> Remove</a></span>
                </p>
                <div id="lang-jt">
                    @foreach ($edit_jt as $jt)
                    <div class="jt-element">
                        <input type="hidden" name="jt[]" value="{{$jt->id}}"></input>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label my-auto">Job Type:</label>
                            <div class="col-sm-5">
                                <input type="text" name="job_type[]" value="{{$jt->job_type}}" placeholder="Please enter job type..." class="form-control">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Salary Range -->
                <h4 class="font-weight-bold">Salary Range</h4>
                <input name="admin_id" value="{{$admin_id}}" type="hidden">
                <p>
                    <a href="javascript:void(0)" id="add-sr"><i class="fa fa-plus-circle"></i> Add </a>
                    <span class="remove">|
                    <a href="javascript:void(0)" id="remove-sr"><i class="fa fa-minus-circle"></i> Remove</a></span>
                </p>
                <div id="lang-sr">
                    @foreach ($edit_sr as $sr)
                    <div class="sr-element">
                        <input type="hidden" name="sr[]" value="{{$sr->id}}"></input>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label my-auto">Salary Range:</label>
                            <div class="col-sm-5">
                                <input type="text" name="salary_range[]" value="{{$sr->salary_range}}" placeholder="Please enter salary range..." class="form-control">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Experience Level -->
                <h4 class="font-weight-bold">Experience Level</h4>
                <input name="admin_id" value="{{$admin_id}}" type="hidden">
                <p>
                    <a href="javascript:void(0)" id="add-ex"><i class="fa fa-plus-circle"></i> Add </a>
                    <span class="remove">|
                    <a href="javascript:void(0)" id="remove-ex"><i class="fa fa-minus-circle"></i> Remove</a></span>
                </p>
                <div id="lang-ex">
                    @foreach ($edit_ex as $ex)
                    <div class="ex-element">
                        <input type="hidden" name="ex[]" value="{{$ex->id}}"></input>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label my-auto">Experience Level:</label>
                            <div class="col-sm-5">
                                <input type="text" name="experience_level[]" value="{{$ex->experience_level}}" placeholder="Please enter experience level..." class="form-control">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Job Industry -->
                <h4 class="font-weight-bold">Job Industry</h4>
                <input name="admin_id" value="{{$admin_id}}" type="hidden">
                <p>
                    <a href="javascript:void(0)" id="add-bi"><i class="fa fa-plus-circle"></i> Add </a>
                    <span class="remove">|
                    <a href="javascript:void(0)" id="remove-bi"><i class="fa fa-minus-circle"></i> Remove</a></span>
                </p>
                <div id="lang-bi">
                    @foreach ($edit_bi as $bi)
                    <div class="bi-element">
                        <input type="hidden" name="bi[]" value="{{$bi->id}}"></input>
                        <div class="form-group row">
                        <label class="col-sm-2 form-control-label my-auto">Job Industry:</label>
                            <div class="col-sm-5">
                                <input type="text" name="business_industry[]" value="{{$bi->business_industry}}" placeholder="Please enter business industries..." class="form-control">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Update Button -->
                <div class="form-group  mt-5">
                    <div class="">
                        <button type="submit" class="btn btn-primary mr-2">Update Changes</button>
                        <a class="btn btn-outline-primary" href="/admin/setting">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Job Classification -->
<script>
    $(function () {
        $("#add-jc").on("click", function () {
            var clone = $(".jc-element").first().clone();
            clone.find("input").val("");
            clone.find("textarea").val("");
            clone.appendTo("#lang-jc");
        });
        $("#remove-jc").click(function () {
            var group_edu = $(".jc-element").length;
            if (group_edu == 1) {
                alert("Minimum language is one");
                return false;
            }
            $(".jc-element").last().remove();
        });
    });
</script>

<!-- Qualification -->
<script>
    $(function () {
        $("#add-q").on("click", function () {
            var clone = $(".q-element").first().clone();
            clone.find("input").val("");
            clone.find("textarea").val("");
            clone.appendTo("#lang-q");
        });
        $("#remove-q").click(function () {
            var group_edu = $(".q-element").length;
            if (group_edu == 1) {
                alert("Minimum language is one");
                return false;
            }
            $(".q-element").last().remove();
        });
    });
</script>

<!-- Job Type -->
<script>
    $(function () {
        $("#add-jt").on("click", function () {
            var clone = $(".jt-element").first().clone();
            clone.find("input").val("");
            clone.find("textarea").val("");
            clone.appendTo("#lang-jt");
        });
        $("#remove-jt").click(function () {
            var group_edu = $(".jt-element").length;
            if (group_edu == 1) {
                alert("Minimum language is one");
                return false;
            }
            $(".jt-element").last().remove();
        });
    });
</script>

<!-- Salary Range -->
<script>
    $(function () {
        $("#add-sr").on("click", function () {
            var clone = $(".sr-element").first().clone();
            clone.find("input").val("");
            clone.find("textarea").val("");
            clone.appendTo("#lang-sr");
        });
        $("#remove-sr").click(function () {
            var group_edu = $(".sr-element").length;
            if (group_edu == 1) {
                alert("Minimum language is one");
                return false;
            }
            $(".sr-element").last().remove();
        });
    });
</script>

<!-- Experience Level -->
<script>
    $(function () {
        $("#add-ex").on("click", function () {
            var clone = $(".ex-element").first().clone();
            clone.find("input").val("");
            clone.find("textarea").val("");
            clone.appendTo("#lang-ex");
        });
        $("#remove-ex").click(function () {
            var group_edu = $(".ex-element").length;
            if (group_edu == 1) {
                alert("Minimum language is one");
                return false;
            }
            $(".ex-element").last().remove();
        });
    });
</script>

<!-- Job Industry -->
<script>
    $(function () {
        $("#add-bi").on("click", function () {
            var clone = $(".bi-element").first().clone();
            clone.find("input").val("");
            clone.find("textarea").val("");
            clone.appendTo("#lang-bi");
        });
        $("#remove-bi").click(function () {
            var group_edu = $(".bi-element").length;
            if (group_edu == 1) {
                alert("Minimum language is one");
                return false;
            }
            $(".bi-element").last().remove();
        });
    });
</script>

@endsection