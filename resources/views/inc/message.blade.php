<div class="panel panel-default">
  <div class="panel-heading">{{$msg->title}}</div>
  <div class="panel-body">{{$msg->message}}</div>

  <div class="panel-footer">

    @if(Auth::guard('web')->check())
      @if($msg->sender == 'user')
        Za: {{$msg->company->name}}
      @else
        Od: {{$msg->company->name}}
        <button class="btn btn-primary btn-reply" data-toggle="collapse" data-target="#message-{{$msg->id}}">Odpiši</button>
        <div id="message" class="collapse"></div>
      @endif

    @else
      @if($msg->sender == 'company')
        Za: {{$msg->user->first_name . ' ' . $msg->user->last_name}}
      @else
        Od: {{$msg->user->first_name . ' ' . $msg->user->last_name}}
        <button class="btn btn-primary btn-reply" data-toggle="collapse" data-target="#message-{{$msg->id}}">Odpiši</button>

      @endif
    @endif

  </div>
</div>

<div id="message-{{$msg->id}}" class="collapse">
  <form method="post" action="{{ Auth::guard('web')->check() ? route('new.message.to.company') : route('new.message.to.user')}}">
    {{ csrf_field() }}

    @if(Auth::guard('web')->check())
      <input type="hidden" id="company_id" class="form-control" name="company_id" value="{{$msg->company_id}}"/>
    @else
      <input type="hidden" id="user_id" class="form-control" name="user_id" value="{{$msg->user_id}}"/>
    @endif
    <div class="form-group">
        <input type="text" id="title" class="form-control" name="title" placeholder="Naslov" value="re:{{$msg->title}}" required/>
    </div>

    <div class="form-group">
        <textarea id="message" class="form-control" name="message" placeholder="Sporočilo" required></textarea>
    </div>

    <div class="form-group">
          <input type="submit" class="btn btn-primary form-control" value="Pošlji">
    </div>

  </form>
</div>
