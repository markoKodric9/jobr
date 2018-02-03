@extends('layouts.app')

@section('content')
<div class="container pt-30">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading"><h3>Nadzorna plošča - {{ Auth::guard('company')->user()->name}}</h3></div>

                <div class="panel-body">
                    <h3>Dodaj novo delo</h3>

                    <a href="{{route('job.new')}}">
                      <button type="button" class="btn btn-primary">Dodaj</button>
                    </a>

                    <h3>Vaše ponudbe</h3>
                    @if(sizeof($jobs)>0)
                      @foreach($jobs as $job)
                        @include('inc.company-job')
                      @endforeach
                    @else
                      <p>Nimate še nobene ponudbe</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
