@if($apply->status == 0)
<div class="panel apply-panel">
  <div class="panel-heading row">
    <div class="col-xs-8 col-md-10">
      <a class="apply-name" href="{{route('user.profile.company', $apply->user_id)}}"> {{$apply->user->first_name . ' ' . $apply->user->last_name}}</a>
    </div>
    <div class="col-xs-1 col-md-1">
      <a {{$job->status == "1" ? "disabled" : ""}} href="{{route('apply.yes', ['job_id' => $apply->job_id, 'user_id' =>$apply->user_id])}}">
        <button type="button" class="btn btn-success {{$job->status == "1" ? "disabled" : ""}}"><i class="fa fa-check" aria-hidden="true"></i></button>
      </a>
    </div>
    <div class="col-xs-1 col-xs-offset-1 col-md-1 col-md-offset-0">
      <a {{$job->status == "1" ? "disabled" : ""}} href="{{route('apply.no', ['job_id' => $apply->job_id, 'user_id' =>$apply->user_id])}}">
        <button type="button" class="btn btn-danger {{$job->status == "1" ? "disabled" : ""}}"><i class="fa fa-times" aria-hidden="true"></i></button>
      </a>
    </div>
  </div>
</div>
@endif

@if($apply->status == 1)
<div class="panel apply-panel">
  <div class="panel-heading row">
    <div class="col-xs-10 col-md-11">
      <a class="apply-name apply-success" href="{{route('user.profile.company', $apply->user_id)}}"> {{$apply->user->first_name . ' ' . $apply->user->last_name}}</a>
    </div>
    <div class="col-xs-1 col-md-1">
      <a class="{{$job->status == "1" ? "disabled" : ""}}" href="{{route('apply.no', ['job_id' => $apply->job_id, 'user_id' =>$apply->user_id])}}">
        <button type="button" class="btn btn-danger {{$job->status == "1" ? "disabled" : ""}}"><i class="fa fa-times" aria-hidden="true"></i></button>
      </a>
    </div>
  </div>
</div>
@endif

@if($apply->status == 2)
<div class="panel apply-panel">
  <div class="panel-heading row">
    <div class="col-xs-10 col-md-11">
      <a class="apply-name apply-danger" href="{{route('user.profile.company', $apply->user_id)}}"> {{$apply->user->first_name . ' ' . $apply->user->last_name}}</a>
    </div>
    <div class="col-xs-1 col-md-1" >
      <a class="{{$job->status == "1" ? "disabled" : ""}}" href="{{route('apply.yes', ['job_id' => $apply->job_id, 'user_id' =>$apply->user_id])}}">
        <button type="button" class="btn btn-success {{$job->status == "1" ? "disabled" : ""}}"><i class="fa fa-check" aria-hidden="true"></i></button>
      </a>
    </div>
  </div>
</div>
@endif
