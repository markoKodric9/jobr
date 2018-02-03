@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2 pt-30">

        <nav class="navbar navbar-default navbar-custom">
          <div class="container-fluid">
            <ul class="nav navbar-nav navbar-msg">

              <li class="{{ Request::is('sporocila') ? 'active' : '' }}">
                <a href="{{route('messages')}}">Vsa sporočila</a>
              </li>
              <li class="{{ Request::is('sporocila/poslana') ? 'active' : '' }}">
                <a href="{{route('messages.filter', 'poslana')}}">Poslana<br>sporočila</a>
              </li>
              <li class="{{ Request::is('sporocila/prejeta') ? 'active' : '' }}">
                <a href="{{route('messages.filter', 'prejeta')}}">Prejeta sporočila</a>
              </li>
            </ul>
          </div>
        </nav>

        @if(sizeof($messages) > 0)
          @foreach($messages as $msg)
            @include('inc.message')
          @endforeach
        @else
          Ni sporočil.
        @endif

      </div>
    </div>
</div>
@endsection
