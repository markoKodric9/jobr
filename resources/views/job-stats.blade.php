@extends('layouts.app')

@section('content')
<div class="container pt-30">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel {{$job->status == 0 ? 'panel-info' : 'panel-danger'}}">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-10 col-md-10">
                  <h3 class="panel-header"> {{$job->title}}</h3>
                </div>
                <div class="col-xs-2 col-md-2" >
                    <a style="float:right" href="{{route('job.edit', $job->id)}}"><button class="btn btn-primary" >Uredi</button></a>
                </div>
              </div>
            </div>
            <div class="panel-body row">
              <div class="col-xs-12">
                <p>Opis:{{$job->description}}</p>
              </div>

              <div class="col-sm-6">
                <p>Kategorija: {{$job->category->category}}</p>
                <p>Tip dela: {{$job->type->type}}</p>
                <p>Pozicija: {{$job->position}}</p>
                <p>Pošta: {{$job->post_id}}</p>
                <p>Naslov: {{$job->address}}</p>
                <p>Pogoji: {{$job->terms}}</p>
              </div>
              <div class="col-sm-6">
                <p>Urna postavka: {{$job->hourly_wage}}</p>
                <p>Čas zaposlitve : {{$job->duration}}</p>
                <p>Preizkusno obdobje : {{$job->trial}}</p>
                <p>Delovni čas : {{$job->work_time}}</p>
                <p>Delovni vikendi: {{$job->weekends == 0 ? "Ne" : "Da"}}</p>
                <p>Delo od doma: {{$job->home == 0 ? "Ne" : "Da"}}</p>
              </div>
            </div>
            <div class="panel-footer">
              <div class="row">
                <div class="col-xs-2 col-md-3">
                  @if($job->status==0)
                    <a href="{{route('deactivate.job', $job->id)}}"><button class="btn btn-warning">Skrij ponudbo</button></a>
                  @else
                    <a href="{{route('activate.job', $job->id)}}"><button class="btn btn-success">Prikaži ponudbo</button></a>
                  @endif
                </div>
                <div class="col-xs-2 col-xs-offset-8 col-md-3 col-md-offset-6">
                  <a style="float:right" href="{{route('delete.job', $job->id)}}"><button class="btn btn-danger">Zbriši ponudbo</button></a>
                </div>
              </div>
            </div>
          </div>

          <div class="panel panel-info">
            <div class="panel-heading"><h3 class="panel-header">Prijavljeni uporabniki</h3></div>
            <div class="panel-body">
            @if(sizeof($applies) > 0)
              @foreach($applies as $apply)
                @include('inc.job-user-applies')
              @endforeach
            @else
              <p style="margin-left:10px">Na oglas se še ni nihče prijavil.</p>
            @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
