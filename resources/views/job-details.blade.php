@extends('layouts.app')

@section('content')
<div class="container pt-30">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel {{$job->status == 0 ? 'panel-info' : 'panel-danger'}}">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-12">
                <h3 class="panel-header"> {{$job->title}}</h3>
              </div>
            </div>
          </div>
          <div class="panel-body row">
            <div class="col-xs-12">
              <p class="desc">Opis:{{$job->description}}</p>
            </div>
            <div class="col-xs-12">
              <p>Podjetje: <a href="{{route('company.profile', $job->company_id)}}">{{$job->company->name}}</a></p>
            </div>
            <div class="col-sm-6">
              <p>Pogoji: <strong class="terms">{{$job->terms}}</strong></p>
              <p>Kategorija: {{$job->category->category}}</p>
              <p>Tip dela: {{$job->type->type}}</p>
              <p>Pozicija: {{$job->position}}</p>
              <p>Naslov: {{$job->address}}, {{$job->post_id}} {{$job->post->city}}</p>
              <p>Regija: {{$job->post->region->region}}</p>
            </div>
            <div class="col-sm-6">
              <p>Urna postavka: {{$job->hourly_wage}} €</p>
              <p>Čas zaposlitve : {{ ($job->duration == "") ? "/": $job->duration}}</p>
              <p>Preizkusno obdobje : {{($job->trial == "0") ? "/": $job->trial}}</p>
              <p>Delovnik : {{$job->work_time}} ur</p>
              <p>Delovni vikendi: {{$job->weekends == 0 ? "Ne" : "Da"}}</p>
              <p>Delo od doma: {{$job->home == 0 ? "Ne" : "Da"}}</p>

            </div>
          </div>

                  <iframe
                    width="100%"
                    height="300px"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD1FTv2w-CRh-ykqfuYpG6zsDJasqwcFdY
                      &q={{$job->address}}, {{$job->post_id}} {{$job->post->city}}" allowfullscreen>
                  </iframe>
                  <form method="POST" action="{{route('apply', $job->id)}}">
                    {{ csrf_field() }}
                    @if($applied)
                      <input type="submit" class="btn btn-danger" value="Odjavi se od delovnega mesta">
                    @else
                      <input type="submit" class="btn btn-primary" value="Prijavi se na delovno mesto">
                    @endif
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
