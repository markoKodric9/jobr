@extends('layouts.app')

@section('content')
<div class="container pt-30">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <div class="col-md-8 col-md-offset-2">
          <div class="alert alert-danger">
            <p>Aktivacijska koda za <strong class="underline">{{$email}}</strong> je potekla.</p>
          </div>

          <a href="{{route('verify.send')}}" class="btn col-md-3 col-md-offset-4">
            Ponovno pošlji
          </a>
        </div>

      </div>
    </div>
</div>
@endsection
