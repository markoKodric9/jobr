@extends('layouts.app')

@section('content')
<div class="container pt-30">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-info">
          <p>Prosim potrdite vaš elektronski račun. </p>
          <p>Aktivacijska koda je bila poslana na <strong class="underline">{{$email}}</strong></p>
        </div>

        <a href="{{route('verify.send')}}" class="btn col-md-3 col-md-offset-2">
          Ponovno pošlji
        </a>

        <a href="{{route('change.email')}}" class="btn col-md-3 col-md-offset-2">
          Spremeni elektronski naslov
        </a>
    </div>
</div>
@endsection
