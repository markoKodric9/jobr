@extends('layouts.app')

@section('content')
<header class="video-header container">
  <div class="video-wrapper">
    <video src="{{ asset('images/video.mp4') }}" autoplay loop></video>
  </div>

  <div class="header-content">
    <span class="scrollpast"></span>
		<div class="user-greet row">
      <div class="col-md-12" style="text-align: center;">
	        <span class="greeting">Pozdravljeni na portalu za iskanje zaposlitve!</span>
          <span class="region">Najdite svojo novo zaposlitev med <b>{{count($jobs)}}</b> prostimi delovnimi mesti</span>
          @if (!Auth::user())
          <br><br><br>
          <span class="region">Da vas bodo delodajalci lažje opazili se &nbsp; <a href="{{route('register.user')}}"><button type="button" class="btn btn-success"> Registrirajte zdaj</button></a></span><br>
          <span class="region">Če pa ste že naš uporabnik pa se preprosto &nbsp; <a href="{{route('login.user')}}"><button type="button" class="btn btn-info"> Prijavite tu</button></a></span>
          @endif
	     </div>
     </div>
</div>
<div class="header-overlay"></div>
</header>

<div class="jobs">

<div class="container jobs-container">

    <h1 style="text-align: center; margin:30px 0;">Najnovejši oglasi</h1>
    @foreach($jobs->chunk(3) as $chunk)
    <div class="row">
      @foreach ($chunk as $job)
      <div class="col-md-4" >
        @include('inc.job')
      </div>
        @endforeach
      </div>
    @endforeach

  </div>
</div>
</div>



<div class="more-jobs">
  <div class="over">
  <span style="font-size: 20px; font-weight: bold; z-index: 2; display:block">Brskajte med vsemi objavlenimi oglasi</span><br>
  <a href="{{route('home')}}"><button type="button" class="btn btn-info"> Pojdi <i class="fa fa-fw fa-angle-double-right"></i></button></a>
  </div>
  <div class="morejobs-overlay"></div>
</div>


<div class="companies">
<div class="container jobs-container companies-container">
  <div class="row jobs-row jobs-companies row-eq-height">
      <h1 style="text-align: center">Najnovejša  podjetja</h1>

      @foreach($companies->chunk(4) as $chunk)
        <div class="row">
          @foreach ($chunk as $company)
          <div class="col-md-3">
            @include('inc.company-list')
          </div>
          @endforeach
        </div>
        @endforeach
    </div>
  </div>
</div>
@endsection
