<div class="col-md-12">
@if($apply->status == 0)
<div class="panel panel-info">
  <div class="panel-heading">
    <div class="row">
    <div class="col-xs-10">
      <a class="apply-name overflow-text" href="{{route('job.details', $apply->job_id)}}"> {{$apply->job->title}}</a>
    </div>

    <div class="col-xs-2">
      <div style="float:right" class="btn"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
    </div>
  </div>
  </div>
</div>

@elseif($apply->status == 1)
<div class="panel panel-success">
  <div class="panel-heading">
    <div class="row">
    <div class="col-xs-10">
      <a class="apply-name overflow-text" href="{{route('job.details', $apply->job_id)}}"> {{$apply->job->title}}</a>
    </div>
    <div class="col-xs-2">
      <div style="float:right" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></div>
    </div>
  </div>
  </div>
</div>
@else
<div class="panel panel-danger">
  <div class="panel-heading ">
    <div class="row">
    <div class="col-xs-10">
      <a class="apply-name overflow-text" href="{{route('job.details', $apply->job_id)}}"> {{$apply->job->title}}</a>
    </div>

    <div class="col-xs-2">
      <div style="float:right" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></div>
    </div>
  </div>
  </div>
</div>
@endif
</div>
