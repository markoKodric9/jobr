@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        @if(sizeof($applies) > 0)
        <h3 style="text-align:center">Prijavljenja dela.</h3>
          @foreach($applies as $apply)
            @include('inc.user-applies')
          @endforeach
        @else
          <h3>Niste se še prijavili na nobeno delo!</h3>
        @endif
      </div>
    </div>
</div>
@endsection
