@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
    <form id="msform" method="POST" action="{{ route('register.user') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Osebni podatki</li>
            <li>O vas</li>
            <li>Nastavitve računa</li>
        </ul>

        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">Osebni podatki</h2>
            <input type="text" name="first_name" placeholder="* Ime" value="{{ old('first_name') }}" required/>
            @if ($errors->has('first_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
            @endif
            <input type="text" name="last_name" placeholder="* Priimek" value="{{ old('last_name') }}" required/>
            @if ($errors->has('last_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif
            <input type="text" name="phone" placeholder="Telefonska številka" value="{{ old('phone') }}" />
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
            <input type="text" name="birthday" placeholder="Datum rojstva" value="{{ old('birthday') }}" onfocus="(this.type='date')" onblur="(this.type='text')"/>
            @if ($errors->has('birthday'))
                <span class="help-block">
                    <strong>{{ $errors->first('birthday') }}</strong>
                </span>
            @endif

            <input type="radio" name="gender" value="moški" id="r1" checked> <label for="r1"> Moški</label>&nbsp&nbsp
            <input type="radio" name="gender" value="ženski" id="r2"> <label for="r2"> Ženski</label><br>
            <input type="button" name="next" class="next action-button" value="Naprej"/>
        </fieldset>

        <fieldset>
            <h2 class="fs-title">O vas</h2>

            <div class="row" style="padding:10px 0">
              <div class="col-xs-6 col-xs-offset-3">
              <img class="preview-img" id="pic" src="{{asset('images/user-placeholder.png')}}">
            </div>
          </div>

            <button  type="button" class="btn btn-info" onclick="changeUserPic(event)">Spremeni sliko</button>
            <input id="pic-input" name="pic" type="file" class="hidden" onchange="updatePicPreview(this)">

            <textarea style="margin: 10px 0"name="about" placeholder="* O vas" value="{{ old('description') }}" required></textarea>

            <input id="cv" name="cv" type="file" required/>
            @if ($errors->has('cv'))
                <span class="help-block">
                    <strong>{{ $errors->first('cv') }}</strong>
                </span>
            @endif
            <input type="button" name="previous" class="previous action-button-previous" value="Nazaj"/>
            <input type="button" name="next" class="next action-button" value="Naprej"/>
        </fieldset>

        <fieldset>
            <h2 class="fs-title">Nastavitve računa</h2>
            <input type="text" name="email" placeholder="* Email" value="{{ old('email') }}" required/>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <input type="password" name="password" placeholder="* Geslo" value="{{ old('password') }}" required/>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <input type="password" name="password_confirmation" placeholder="* Potrdite geslo" value="{{ old('password_confirmation') }}" required/>
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
