<div class="panel panel-default">
  <div class="panel-heading"><h3>{{$company->name}}<h3></div>
  <div class="panel-body">
    <p>{{$company->email}}</p>


    <a href="{{route('company.profile', $company->id)}}"><button type="button" class="btn btn-info">Več informacij <i class="fa fa-fw fa-angle-double-right"></i></button></a>
  </div>
</div>
