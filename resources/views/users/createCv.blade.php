@extends('layouts.users')

@section('title', 'Cv')

@section('content')
@include('layouts.navbar')
  <div class="container">  
  <!-- Profile Nav -->
  @include('layouts.profileNav')    
    <div class="card mb-5">
      <div class="container p-5">
        <form method="POST" action="{{url('/create/cv')}}" enctype="multiple/form-data">
          {!! csrf_field() !!}
          <h4 class="font-weight-bold">Personal Statement</h4>
          <hr>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Full Name <span class="text-danger text-bold">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="full_name" placeholder="Please enter your fulltname..."
                class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Email <span class="text-danger text-bold">*</span></label>
            <div class="col-sm-9">
              <input type="email" name="email" placeholder="Please enter your email address..." class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Contact <span class="text-danger text-bold">*</span></label>
            <div class="col-sm-9">
              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text">+855</span>
                </div>
                <input type="tel" name="phone_number" placeholder="Please enter your contact..." class="form-control">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label" for="exampleFormControlTextarea1">Summary <span class="text-danger text-bold">*</span></label>
            <div class="col-sm-9">
              <textarea class="form-control" name="summary" id="exampleFormControlTextarea1"
                rows="3" placeholder="Please enter your Summary..."></textarea>
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
            <div class="edu-element">
              <hr>

              <div class="form-group row">
                <label class="col-sm-3 form-control-label">School Name <span class="text-danger text-bold">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="school_name[]" placeholder="Please enter your school name..."
                    class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Major <span class="text-danger text-bold">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="major[]" placeholder="Please enter your major..." class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Start Date <span class="text-danger text-bold">*</span></label>
                <div class="col-sm-9">
                    <input type="date" name="edu_start_date[]" placeholder="start date" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 form-control-label">End Date <span class="text-danger text-bold">*</span></label>
                <div class="col-sm-9">
                    <input type="date" name="edu_end_date[]" placeholder="end date" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 form-control-label" for="exampleFormControlTextarea1">Education Detail <span class="text-danger text-bold">*</span></label>
                <div class="col-sm-9">
                  <textarea class="form-control" name="edu_detail[]" id="exampleFormControlTextarea1"
                    rows="3" placeholder="Please enter your education detail..."></textarea>
                </div>
              </div>

            </div>
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
            <div class="exp-element">
              <hr>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Workplace Name <span class="text-danger text-bold">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="exp_workplace_name[]" placeholder="Please enter your workplace name..."
                    class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Experience Title <span class="text-danger text-bold">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="exp_title[]" placeholder="Please enter your experience..."
                    class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Start Date <span class="text-danger text-bold">*</span></label>
                <div class="col-sm-9">
                  <input type="date" name="exp_start_date[]" placeholder="start date" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 form-control-label">End Date <span class="text-danger text-bold">*</span></label>
                <div class="col-sm-9">
                  <input type="date" name="exp_end_date[]" placeholder="end date" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 form-control-label" for="exampleFormControlTextarea1">Education Detail <span class="text-danger text-bold">*</span></label>
                <div class="col-sm-9">
                  <textarea class="form-control" name="exp_detail[]" id="exampleFormControlTextarea1"
                    rows="3" placeholder="Please enter your experience detail..."></textarea>
                </div>
              </div>

            </div>
          </div>

          <!-- Achievement -->
          <h4 class="font-weight-bold">Achievement</h4><br>
          <input name="user_id" value="{{$user_id}}" type="hidden">
          <p>
            <a href="javascript:void(0)" id="add-ach"><i class="fa fa-plus-circle"></i> Add </a>
            <span class="remove">|
              <a href="javascript:void(0)" id="remove-ach"><i class="fa fa-minus-circle"></i> Remove</a></span>
          </p>
          <div id="lang-ach">
            <div class="ach-element">
              <hr>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Achievement Title <span class="text-danger text-bold">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="ach_title[]" placeholder="Please enter your title..."
                    class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Date <span class="text-danger text-bold">*</span></label>
                <div class="col-sm-9">
                  <input type="date" name="ach_date[]" placeholder="Please enter your achievement date..."
                    class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label" for="exampleFormControlTextarea1">Achievement Detail <span class="text-danger text-bold">*</span></label>
                <div class="col-sm-9">
                  <textarea class="form-control" name="ach_detail[]" id="exampleFormControlTextarea1"
                    rows="3" placeholder="Please enter your achievement detail..."></textarea>
                </div>
              </div><br>
            </div>
          </div>

          <!-- Language -->
          <h4 class="font-weight-bold">Language</h4><br>
          <input name="user_id" value="{{$user_id}}" type="hidden">
          <p>
            <a href="javascript:void(0)" id="add"><i class="fa fa-plus-circle"></i> Add </a>
            <span class="remove">|
              <a href="javascript:void(0)" id="remove"><i class="fa fa-minus-circle"></i> Remove</a></span>
          </p>

          <div id="form_data">
            <div class="radio">
              <hr>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Language <span class="text-danger text-bold">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="lang[]" placeholder="Please enter your language..."
                    class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Level <span class="text-danger text-bold">*</span></label>
                <div class="col-sm-9">
                  <select class="form-control" name="level[]">
                    <option>Choose your level</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermidate">Intermidate</option>
                    <option value="Advance">Advance</option>
                    <option value="Native">Native</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

            <div class="form-group row mt-5">
              <div class="col-sm-4 offset-sm-3">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a class="btn btn-outline-primary" href="/cv">Cancel</a>
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
  var count_radio = 0;
      $('#add').click(function() {
        count_radio++

      let clone =  $( ".radio" ).clone(true);
        clone.removeClass('radio')
        clone.addClass('radio'+count_radio)
        clone.appendTo("#form_data")                
      }); 
      $('#remove').click(function(){
        $('.radio'+count_radio).remove();
        count_radio--
      });
</script>
@endsection