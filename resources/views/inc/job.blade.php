<div class="panel panel-default">
  <div class="panel-heading"><h3>{{$job->title}}<h3></div>
  <div class="panel-body">
    <p>{{$job->description}}</p>
    <p><i class="fa fa-fw fa-building-o"></i><a href="{{route('company.profile', $job->company['id'])}}"> {{$job->company['name']}}</a></p>
    <p><i class="fa fa-fw fa-map-marker"></i> {{$job->address}}</p>
    <?php $c = new Carbon\Carbon($job->created_at); $date = $c->format('d.m.Y'); ?>
    <p><i class="fa fa-fw fa-clock-o"></i> {{$date}}</p>
    <a href="{{route('job.details', $job->id)}}"><button type="button" class="btn btn-info">Več informacij <i class="fa fa-fw fa-angle-double-right"></i></button></a>
  </div>
</div>
