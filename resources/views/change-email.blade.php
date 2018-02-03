@extends('layouts.app')

@section('content')
<div class="container pt-30">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h2>Spremenite elektronski naslov</h2>
        <p>Vaš trenutni naslov je <strong class="underline">{{$email}}</strong>.</P>

        <form class="form-horizontal" method="POST" action="{{route('change.email')}}">
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="title" class="col-md-4 control-label">Novi elektronski naslov:</label>

              <div class="col-md-6">
                  <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('email_confirmation') ? ' has-error' : '' }}">
              <label for="title" class="col-md-4 control-label">Potrdi elektronski naslov:</label>

              <div class="col-md-6">
                  <input id="email_confirmation" type="text" class="form-control" name="email_confirmation" value="{{ old('email_confirmation') }}" required>

                  @if ($errors->has('email_confirmation'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email_confirmation') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="title" class="col-md-4 control-label">Geslo</label>

              <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required>

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                      Spremeni
                  </button>
              </div>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection
