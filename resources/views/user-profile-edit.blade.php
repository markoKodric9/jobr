@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 pt-30">
      <h1 style="margin-bottom:0">{{$user->first_name . ' ' . $user->last_name}}</h1>

      <form action="{{route('update.user.profile')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row" style="padding:10px 0">
          <div class="col-xs-4 col-xs-offset-4">
          <img id="pic" src="{{asset('uploads/pics/'.$user->pic)}}">
        </div>
      </div>


        <button class="btn btn-info" onclick="changeUserPic(event)">Spremeni sliko</button>
        <input id="pic-input" name="pic" type="file" class="hidden" onchange="updatePicPreview(this)">

        <textarea style="margin: 10px 0; width:100%; height:150px" name="about" width="100%" required>{{$user->about}}</textarea>
        <h4>CV</h4>
        <input id="cv" name="cv" type="file" value="{{$user->cv}}" placeholder='Življenepis'/>

        <button style="margin-top:10px" type="submit" name="submit" class="btn btn-primary">Potrdi</button>
      </form>
    </div>
  </div>
</div>
@endsection
