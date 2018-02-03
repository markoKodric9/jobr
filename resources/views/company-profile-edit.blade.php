@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 pt-30">
      <h1 style="margin-bottom:0">{{$company->name}}</h1>

      <form action="{{route('update.company.profile')}}" method="POST">
        {{ csrf_field() }}
            <input type="email" name="email" placeholder="* Email" value="{{$company->email}}"/>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        <input type="text" name="name" placeholder="* Naziv podjetja" value="{{$company->name}}"/>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        <input type="text" name="address" placeholder="* Naslov podjetja" value="{{$company->address}}"/>
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
        <input type="text" name="davcna" placeholder="* Davčna številka" value="{{$company->davcna}}" />
        @if ($errors->has('davcna'))
            <span class="help-block">
                <strong>{{ $errors->first('davcna') }}</strong>
            </span>
        @endif
        <input type="text" name="phone" placeholder="* Telefon" value="{{$company->phone}}" />
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
        <input type="text" name="website" placeholder="Spletna stran" value="{{$company->spletna}}" />
        @if ($errors->has('website'))
            <span class="help-block">
                <strong>{{ $errors->first('website') }}</strong>
            </span>
        @endif
        <input type="text" name="expertise_area" placeholder="* S čim se podjetje ukvarja" value="{{$company->expertise_area}}"/>
            @if ($errors->has('expertise_area'))
                <span class="help-block">
                    <strong>{{ $errors->first('expertise_area') }}</strong>
                </span>
            @endif
            <textarea name="desc" id="desc" placeholder="Kratek opis podjetja..." value="{{$company->opis}}" rows="5"></textarea>
            @if ($errors->has('desc'))
                <span class="help-block">
                    <strong>{{ $errors->first('desc') }}</strong>
                </span>
            @endif     
            <button style="margin-top:10px" type="submit" name="submit" class="btn btn-primary">Potrdi</button>

      </form>
    </div>
  </div>
</div>
@endsection
