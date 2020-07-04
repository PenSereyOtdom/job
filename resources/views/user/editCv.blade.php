@extends('layouts.user')

@section('title', 'Cv')

@section('content')
@include('layouts.navbar')
<!-- Forms Section-->
  <div class="container">
    <!-- Profile Nav -->
    @include('layouts.profileNav')   
    <div class="card my-5">
      <div class="container p-5">
        <form action="{{url('/update/cv', $edit_cv->id)}}" method="post" enctype="multipart/form-data">
          {!! csrf_field() !!}

          <!-- Personal Statement -->
          <h4 class="font-weight-bold">Personal Statement</h4><hr>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">First Name <span class="text-danger text-bold">*</span></label>
              <div class="col-sm-9">
                <input type="text" name="full_name" value="{{$edit_cv->full_name}}" placeholder="Please enter your firstname..."
                  class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Email <span class="text-danger text-bold">*</span></label>
              <div class="col-sm-9">
                <input type="email" name="email" value="{{$edit_cv->email}}" placeholder="Please enter your email address..." class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Contact <span class="text-danger text-bold">*</span></label>
              <div class="col-sm-9">
                <div class="input-group">
                  <div class="input-group-append">
                    <span class="input-group-text">+855</span>
                  </div>
                  <input type="tel" name="phone_number" value="{{$edit_cv->phone_number}}" placeholder="Please enter your contact..." class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label" for="exampleFormControlTextarea1">Summary <span class="text-danger text-bold">*</span></label>
              <div class="col-sm-9">
                <textarea class="form-control" name="summary" id="exampleFormControlTextarea1" rows="3" placeholder="Please enter your summary...">{{$edit_cv->summary}}</textarea>
              </div>
            </div>
            
              <!-- Education -->
              <h4 class="font-weight-bold">Education</h4><br>
              <input name="user_id" value="{{$user_id}}" type="hidden">
              <p>
                <a href="javascript:void(0)" id="add-edu"><i class="fa fa-plus-circle"></i> Add </a>
                <span class="remove">|
                  <a href="javascript:void(0)" id="remove-edu"><i class="fa fa-minus-circle"></i> Remove</a></span>
              </p>
              <div id="lang-edu">
              @foreach ($edit_edu as $edu)
                <div class="edu-element">
                    <input type="hidden" name="edu_id[]" value="{{$edu->id}}"></input>
                  <hr>

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">School Name</label>
                    <div class="col-sm-9">
                      <input type="text" name="school_name[]" value="{{$edu->school_name}}"
                        placeholder="Please enter your school name..." class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Major</label>
                    <div class="col-sm-9">
                      <input type="text" name="major[]" value="{{$edu->major}}" placeholder="Please enter your major..."
                        class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Start Date</label>
                    <div class="col-sm-9">
                      <input type="date" name="edu_start_date[]" value="{{$edu->edu_start_date}}"
                        placeholder="Please enter your start date..." class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">End Date</label>
                    <div class="col-sm-9">
                      <input type="date" name="edu_end_date[]" value="{{$edu->edu_end_date}}"
                        placeholder="Please enter your end date..." class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="exampleFormControlTextarea1">Education
                      Detail</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="edu_detail[]" id="exampleFormControlTextarea1"
                        rows="3" placeholder="Please enter your education detail...">{{$edu->edu_detail}}</textarea>
                    </div>
                  </div>
                </div>
              @endforeach
              </div>

              <!-- Experience -->
              <h4 class="font-weight-bold">Experience</h4><br>
              <input name="user_id" value="{{$user_id}}" type="hidden">
              <p>
                <a href="javascript:void(0)" id="add-exp"><i class="fa fa-plus-circle"></i> Add </a>
                <span class="remove">|
                  <a href="javascript:void(0)" id="remove-exp"><i class="fa fa-minus-circle"></i> Remove</a></span>
              </p>
              <div id="lang-exp">
              @foreach ($edit_exp as $exp)
                <div class="exp-element">
                  <input type="hidden" name="exp_id[]" value="{{$exp->id}}"></input>
                  <hr>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Workplace Name</label>
                    <div class="col-sm-9">
                      <input type="text" name="exp_workplace_name[]" value="{{$exp->exp_workplace_name}}"
                        placeholder="Please enter your workplace name..." class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Experience Title</label>
                    <div class="col-sm-9">
                      <input type="text" name="exp_title[]" value="{{$exp->exp_title}}"
                        placeholder="Please enter your experience..." class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Start Date</label>
                    <div class="col-sm-9">
                      <input class="form-control" name="exp_start_date[]" value="{{$exp->exp_start_date}}"
                        type="date" placeholder="Please enter your start date...">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">End Date</label>
                    <div class="col-sm-9">
                      <input class="form-control" name="exp_end_date[]" value="{{$exp->exp_end_date}}"
                        type="date" placeholder="Please enter your end date...">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="exampleFormControlTextarea1">Experience
                      Detail</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="exp_detail[]" id="exampleFormControlTextarea1"
                        rows="3" placeholder="Please enter your experience detail...">{{$exp->exp_detail}}</textarea>
                    </div>
                  </div>
                </div>
              @endforeach
              </div>
              
              <!-- Achievement -->
              <h4 class="font-weight-bold">Achievement</h4><br>
              <p>
                <a href="javascript:void(0)" id="add-ach"><i class="fa fa-plus-circle"></i> Add </a>
                <span class="remove">|
                  <a href="javascript:void(0)" id="remove-ach"><i class="fa fa-minus-circle"></i> Remove</a></span>
              </p>
              
              <div id="lang-ach">
                @foreach ($edit_ach as $ach)
                <div class="ach-element">
                    <input type="hidden" name="ach_id[]" value="{{$ach->id}}"></input>
                  <hr>

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Achievement Title</label>
                    <div class="col-sm-9">
                      <input type="text" name="ach_title[]" value="{{$ach->ach_title}}"
                        placeholder="Please enter your title..." class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Date</label>
                    <div class="col-sm-9">
                      <input type="date" name="ach_date[]" value="{{$ach->ach_date}}"
                        placeholder="Please enter your achievement date..." class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="exampleFormControlTextarea1">Achievement
                      Detail</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="ach_detail[]" id="exampleFormControlTextarea1"
                        rows="3" placeholder="Please enter your achievement detail...">{{$ach->ach_detail}}</textarea>
                    </div>
                  </div><br>
                </div>
                @endforeach
              </div>

            <!-- Language -->
            <h4 class="font-weight-bold">Language</h4><br>
            <input name="user_id" value="{{$user_id}}" type="hidden">
            <p>
              <a href="javascript:void(0)" id="add-lang"><i class="fa fa-plus-circle"></i> Add </a>
              <span class="remove">|
                <a href="javascript:void(0)" id="remove-lang"><i class="fa fa-minus-circle"></i> Remove</a></span>
            </p>
            
            <div id="lang-language">
              @foreach ($edit_lang as $lang)
              <div id="form_data">
                <div class="lang-element">
                  <hr>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Language</label>
                    <div class="col-sm-9">
                      <input type="text" name="lang[]" value="{{$lang->lang}}" placeholder="Please enter your language..."
                        class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Level</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="level[]">
                        <option>Choose your level</option>
                        <option value="Beginner" {{ ($lang->level == "Beginner")? "selected" : "" }}>Beginner</option>
                        <option value="Intermidate" {{ ($lang->level == "Intermidate")? "selected" : "" }}>Intermidate</option>
                        <option value="Advance" {{ ($lang->level == "Advance")? "selected" : "" }}>Advance</option>
                        <option value="Native" {{ ($lang->level == "Native")? "selected" : "" }}>Native</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
              
          <div class="form-group row mt-5">
            <div class="col-sm-4 offset-sm-3">
              <button type="submit" class="btn btn-primary">Save Changes</button>
              <a class="btn btn-outline-primary" href="/cv" style="margin-right: 15px;">Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- Education -->
<script>
  $(function () 
        {
          $("#add-edu").on("click", function () {
              var group_edu = $(".edu-element").length;
              if (group_edu >= 5) {
                  alert("Only 5 Form of education allowed");
                  return false;
              }
              var clone = $(".edu-element").first().clone();
              clone.find("input").val("");
              clone.find("textarea").val("");
              clone.appendTo("#lang-edu");
          });
          $("#remove-edu").click(function () {
              var group_edu = $(".edu-element").length;
              if (group_edu == 1) {
                  alert("Minimum language is one");
                  return false;
              }
              $(".edu-element").last().remove();
          });
      });
</script>

<!-- Experience -->
<script>
  $(function () 
      {
        $("#add-exp").on("click", function () {
            var group_exp = $(".exp-element").length;
            if (group_exp >= 5) {
                alert("Only 5 Form of experience allowed");
                return false;
            }
            var clone = $(".exp-element").first().clone();
            clone.find("input").val("");
            clone.find("textarea").val("");
            clone.appendTo("#lang-exp");
            });
            $("#remove-exp").click(function () {
              var group_edu = $(".exp-element").length;
              if (group_edu == 1) {
                  alert("Minimum language is one");
                  return false;
              }
              $(".exp-element").last().remove();
          });                      
      });
</script>

<!-- Achievement -->
<script>
  $(function () 
      {
        $("#add-ach").on("click", function () {
            var group_ach = $(".ach-element").length;
            if (group_ach >= 5) {
                alert("Only 5 Form of achievement allowed");
                return false;
            }
            var clone = $(".ach-element").first().clone();
            clone.find("input").val("");
            clone.find("textarea").val("");
            clone.appendTo("#lang-ach");
        });

        $("#remove-ach").click(function () {
            var group_edu = $(".ach-element").length;
            if (group_edu == 1) {
                alert("Minimum language is one");
                return false;
            }
            $(".ach-element").last().remove();
        });
      });
</script>

<!-- Language -->
<script>
  $(function () 
      {
        $("#add-lang").on("click", function () {
            var group_lang = $(".lang-element").length;
            if (group_lang >= 5) {
                alert("Only 5 Form of lang allowed");
                return false;
            }
            var clone = $(".lang-element").first().clone();
            clone.find("input").val("");
            clone.find("select").val("");
            clone.appendTo("#lang-language");
        });

        $("#remove-lang").click(function () {
            var group_lang = $(".lang-element").length;
            if (group_lang == 1) {
                alert("Minimum language is one");
                return false;
            }
            $(".lang-element").last().remove();
        });
      });
</script>
@endsection