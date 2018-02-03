@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-11 col-md-offset-1 pt-30">
      <div class="row">
        @foreach ($companies as $company)
        <div class="col-md-3">
          @include('inc.company-list')
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
