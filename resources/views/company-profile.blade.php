@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-4">
        <h2>{{$company->name}}</h2>

        <p>Področje delovanja: {{$company->expertise_area}}</p>
        <p>Opis podjetja: {{$company->opis}}</p>
        <p>Davčna številka: {{$company->davcna}}</p>
        <p>Naslov: {{$company->address}}</p>
        <p>Spletna stran: <a target="_blank" href="//{{$company->spletna}}">{{$company->spletna}}</a></p>
        <p>Elektronski naslov: {{$company->email}}</p>
        <p>Telefonska številka: {{$company->phone}}</p>

        @if (Auth::guard('company')->check())
          <a href="{{route('edit.profile')}}"><button class="btn btn-primary">Uredi</button></a>
        @elseif(Auth::guard('web')->check())
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Pošlji sporočilo</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Novo sporočilo</h4>
              </div>
              <div class="modal-body">
                <p>Podjetju {{$company->name}} napišite novo sporočilo</p>
                <form method="post" action="{{route('new.message.to.company')}}">
                  {{ csrf_field() }}

                  <input type="hidden" id="company_id" class="form-control" name="company_id" value="{{$company->id}}"/>

                  <div class="form-group">
                      <input type="text" id="title" class="form-control" name="title" placeholder="Naslov" required/>
                  </div>

                  <div class="form-group">
                        <textarea id="message" class="form-control" name="message" placeholder="Sporočilo"></textarea>
                  </div>

                  <div class="form-group">
                        <input type="submit" class="btn btn-primary form-control" value="Pošlji">
                  </div>

                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zapri</button>
              </div>
            </div>

          </div>
        </div>
        @endif
      </div>
      <div class="col-md-8">
      <h3>Razpisane službe</h3>
        @if (count($jobs) > 0)
          @foreach ($jobs as $job)
            @include('inc.job')
          @endforeach
        @else
            Ni razpisanih služb
        @endif
      </div>
    </div>
</div>

@endsection
