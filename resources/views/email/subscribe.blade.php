<h1>{{$user->first_name}}, za vas imamo novo delovno mesto!</h1>

<h3>{{$job->title}}</h3>


<p>{{$job->description}}</p>
<ul>
  <li>
    Regija: {{$job->post->region->region}}
  </li>

  <li>
    Kategorija: {{$job->category->category}}
  </li>

  <li>
    Tip dela: {{$job->type->type}}
  </li>
</ul>
<p>Oglejte si oglas na: <a href="{{route('job.details', $job->id)}}">{{route('job.details', $job->id)}}</a></p>
