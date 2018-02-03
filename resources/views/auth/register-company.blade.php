@extends('layouts.app')

@section('content')
<div class="container">

<div class="row">
<div class="col-md-6 col-md-offset-3">
    <form id="msform" method="POST" action="{{ route('register.company') }}">
        {{ csrf_field() }}
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Podatki o podjetju</li>
            <li>Izobrazba in izkušnje</li>
            <li>Nastavitve računa</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">Podatki o podjetju</h2>
            <h3 class="fs-subtitle">Prosimo izpolnite zahtevane podatke</h3>
            <input type="text" name="name" placeholder="* Naziv podjetja" value="{{ old('name') }}" required/>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

            <input type="text" name="address" placeholder="* Naslov" value="{{ old('address') }}" class="input-70" required />
            <input type="text" name="post" placeholder="* Poštna številka" value="{{ old('post') }}" class="input-30" required/>
            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
            @if ($errors->has('post'))
                <span class="help-block">
                    <strong>{{ $errors->first('post') }}</strong>
                </span>
            @endif
            <input type="text" name="davcna" placeholder="* Davčna številka" value="{{ old('davcna') }}" required/>
            @if ($errors->has('davcna'))
                <span class="help-block">
                    <strong>{{ $errors->first('davcna') }}</strong>
                </span>
            @endif
            <input type="text" name="phone" placeholder="* Telefon" value="{{ old('phone') }}" required/>
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
            <input type="text" name="website" placeholder="Spletna stran" value="{{ old('website') }}" />
            @if ($errors->has('website'))
                <span class="help-block">
                    <strong>{{ $errors->first('website') }}</strong>
                </span>
            @endif
            <input type="button" name="next" class="next action-button" value="Naprej"/>
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Dodatni podatki</h2>
            <h3 class="fs-subtitle">Prosimo izpolnite zahtevane podatke</h3>
            <input type="text" name="expertise_area" placeholder="* S čim se podjetje ukvarja" value="{{ old('expertise_area') }}" required/>
            @if ($errors->has('expertise_area'))
                <span class="help-block">
                    <strong>{{ $errors->first('expertise_area') }}</strong>
                </span>
            @endif
            <textarea name="desc" id="desc" placeholder="Kratek opis podjetja..." rows="5">{{ old('desc') }}</textarea>
            @if ($errors->has('desc'))
                <span class="help-block">
                    <strong>{{ $errors->first('desc') }}</strong>
                </span>
            @endif
            <input type="button" name="previous" class="previous action-button-previous" value="Nazaj"/>
            <input type="button" name="next" class="next action-button" value="Naprej"/>
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Nastavitve računa</h2>
            <h3 class="fs-subtitle">Izpolnite podatke s katerimi se boste prijavili</h3>
            <input type="text" name="email" placeholder="* Email" value="{{ old('email') }}" required/>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <input type="password" name="password" placeholder="* Geslo" required/>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <input type="password" name="password_confirmation" placeholder="* Potrdite geslo" required/>
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
            <input type="button" name="previous" class="previous action-button-previous" value="Nazaj"/>
            <button type="submit" name="submit" class="submit action-button">Potrdi</button>
        </fieldset>
    </form>
</div>
</div>
</div>
@endsection
