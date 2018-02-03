@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2 pt-30">
        <div class="row">
          <div class="col-xs-10">
            <h1>{{$user->first_name . ' ' . $user->last_name}}</h1>
          </div>
          <div class="col-xs-2">
            @if (Auth::guard('web')->check())
              <a href="{{route('edit.profile')}}"><button style="float:right" class="btn btn-primary">Uredi</button></a>
            @elseif(Auth::guard('company')->check())
            <!-- Trigger the modal with a button -->
            <button style="float:right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Pošlji sporočilo</button>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-xs-offset-3 col-md-4 col-md-offset-0">
            @if($user->pic != "")
              <img src="{{asset('uploads/pics/'. $user->pic)}}">
            @else
                <img src="{{asset('images/user-placeholder.png')}}">
            @endif
          </div>

          <div class="col-xs-12 col-md-8">
            <p>{{$user->about}}</p>
          </div>

          <div class="col-xs-12 pt-30" style="margin-bottom: 400px;">
            <embed src="{{asset('uploads/cvs/'.$user->cv)}}" width="100%" height="600" zoom="90" type='application/pdf'>
          </div>
        </div>


        <!-- message -->
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
                <p>Uporabniku {{$user->first_name . ' ' . $user->last_name}} napišite novo sporočilo</p>
                <form method="post" action="{{route('new.message.to.user')}}">
                  {{ csrf_field() }}

                  <input type="hidden" id="user_id" class="form-control" name="user_id" value="{{$user->id}}"/>

                  <div class="form-group">
                      <input type="text" id="title" class="form-control" name="title" placeholder="Naslov" required/>
                  </div>

                  <div class="form-group">
                      <textarea id="message" class="form-control" name="message" placeholder="Sporočilo" required></textarea>
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
    </div>
</div>
@endsection
