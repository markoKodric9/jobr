<div class="panel panel-default">
  <div class="panel-heading"><h3><a href="{{route('company.profile', $company->id)}}">{{$company->name}}</a><h3></div>
  <div class="panel-body">
      <p>{{$company->desc}}</p>
      <p>{{$company->expertise_area}}</p>
      <p>{{$company->spletna}}</p>
  </div>
</div>
