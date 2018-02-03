@extends('layouts.app')

@section('content')
<div class="container pt-30">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <div class="col-md-8 col-md-offset-2">
          <div class="alert alert-success">
            <p>lektronski naslov <strong class="underline">{{$email}}</strong> je bil uspešno potrjen.</p>
          </div>

          <a href="{{route('home')}}" class="btn col-md-3 col-md-offset-4">
            Domov
          </a>
        </div>
      </div>
    </div>
</div>
@endsection
