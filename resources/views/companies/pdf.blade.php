<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <h3 class="h4">Personal Statement</h3>
    <table class="table table-bordered">
      <tr>
        <td><b>Full Name</b></td> 
        <td>
        {{$display_cv->full_name}} {{$display_cv->first_name}}
        </td>
      </tr>
      <tr>
        <td><b>Email</b></td>
        <td>
        {{$display_cv->email}}
        </td>
      </tr>
      <tr>
        <td><b>Contact</b></td>
        <td>
        +855{{$display_cv->phone_number}}
        </td>
      </tr>
      <tr>
        <td><b>Summary</b></td> 
        <td>
        {{$display_cv->summary}}
        </td>
      </tr>
    </table>

    @foreach ($display_education as $edu)
      <h3 class="h4">Education</h3>
      <table class="table table-bordered">
        <tr>
          <td><b>School Name</b></td> 
          <td>
          {{$edu->school_name}}
          </td>
        </tr>

        <tr>
          <td><b>Date</b></td>
          <td>
          {{$edu->edu_start_date}} ~ {{$edu->edu_end_date}}
          </td>
        </tr>

        <tr>
          <td><b>Major</b></td>
          <td>
          {{$edu->major}}
          </td>
        </tr>

        <tr>
          <td><b>Education Detail</b></td>
          <td>
          {{$edu->edu_detail}}
          </td>
        </tr>
      </table>
    @endforeach

    @foreach ($display_experience as $exp)
      <h3 class="h4">Experience</h3>
      <table class="table table-bordered">
        <tr>
          <td><b>Workplace Name</b></td> 
          <td>
            {{$exp->exp_workplace_name}}
          </td>
        </tr>

        <tr>
          <td><b>Experience Title</b></td>
          <td>
            {{$exp->exp_title}}
          </td>
        </tr>

        <tr>
          <td><b>Date</b></td>
          <td>
          {{$exp->exp_start_date}} ~ {{$exp->exp_end_date}}
          </td>
        </tr>
        
        <tr>
          <td><b>Experience Detail</b></td>
          <td>
          {{$exp->exp_detail}}
          </td>
        </tr>
      </table>
    @endforeach

    @foreach ($display_achievement as $ach)
      <h3 class="h4">Achievement</h3>
      <table class="table table-bordered">
        <tr>
          <td><b>Achievement Title</b></td> 
          <td>
          {{$ach->ach_title}}
          </td>
        </tr>
        <tr>
          <td><b>Date</b></td>
          <td>
          {{$ach->ach_date}}
          </td>
        </tr>
        <tr>
          <td><b>Achievement Detail</b></td>
          <td>
          {{$ach->ach_detail}}
          </td>
        </tr>
      </table>
    @endforeach

    <h3 class="h4">Language</h3>
    @foreach ($display_language as $lang)
      <table class="table table-bordered">
      <tr>
        <td><b>{{$lang->lang}}</b></td> 
        <td>
        {{$lang->level}}
        </td>
      </tr>
    @endforeach
    
    @foreach ($users as $user)
        <tr>
          <td><b>Full Name</b></td> 
          <td>
          {{$user->name}}
          </td>
        </tr>
    @endforeach
    
  </body>
</html>