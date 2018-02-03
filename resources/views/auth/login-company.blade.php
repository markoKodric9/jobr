@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
    <form id="msform" class="login-form" method="POST" action="{{ route('login.company') }}">
        {{ csrf_field() }}
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">Prijava v sistem</h2>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" required/>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" name="password" placeholder="Geslo" value="{{ old('password') }}" required/>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <button type="submit" name="submit" class="submit action-button">Potrdi</button>
            <a class="btn btn-link" href="{{ route('password.request') }}">Pozabljeno geslo?</a>
        </fieldset>
    </form>
</div>
</div>
</div>
@endsection
