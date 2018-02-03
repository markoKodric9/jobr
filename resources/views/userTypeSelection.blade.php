@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
  <div class="col-sm-12 col-md-6 user-left">
      <a href="{{route($action.'.user')}}"><button type="button" name="button">Iskalec zaposlitve</button></a>
    </div>
    <div class="col-sm-12 col-md-6 company-right">
      <a href="{{route($action.'.company')}}"><button type="button" name="button">Podjetje</button></a>
    </div>
  </div>
</div>
@endsection
