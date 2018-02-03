@extends('layouts.app')

@section('content')
<div class="container pt-30">
    <h1>Vaše naročnine</h1>
    <form action="{{route('update.subs')}}" method="POST">
      {{ csrf_field() }}
      <div class="row">


        <div class="col-xs-12 col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Kategorije</div>
            <div class="panel-body">
              @foreach(App\Category::all() as $category)
                @include('inc.user-subs-category')
              @endforeach
            </div>
          </div>
        </div>


        <div class="col-xs-12 col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Regije</div>
            <div class="panel-body">
              @foreach(App\Region::all() as $region)
                @include('inc.user-subs-region')
              @endforeach
            </div>
          </div>
        </div>




    <div class="col-xs-12 col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">Vrste</div>
        <div class="panel-body">
          @foreach(App\JobType::all() as $type)
            @include('inc.user-subs-type')
          @endforeach
        </div>
      </div>
    </div>
  </div>
    <div class="col-xs-8 col-xs-offset-4 col-md-2 col-md-offset-5">
        <button type="submit" class="btn btn-primary">
            Shrani
        </button>
    </div>

</form>
</div>
@endsection
