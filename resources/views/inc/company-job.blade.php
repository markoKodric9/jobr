<a class="block-link" href="{{route('company.job', $job->id)}}">
<div class="panel {{$job->status == "0" ? "panel-default" : "panel-danger danger-background"}}">
  <div class="panel-heading">
    <h3>{{$job->title}}</h3>
    <p>{{$job->description}}</p>

      <div >
        <p><i class="fa fa-fw fa-user-o"></i> {{sizeof($job->applies)}}</p>
      </div>
  </div>
</div>
</a>
