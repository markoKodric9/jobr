@extends('layouts.app')

@section('content')
<header class="video-header container">
  <div class="video-wrapper">
    <video src="{{ asset('images/video.mp4') }}" autoplay loop></video>
  </div>

  <div class="header-content">
    <span class="scrollpast"></span>
		<div class="user-greet row">
      <div class="col-md-10">
	        <span class="greeting">Razpisana delovna mesta</span>
          @if (Auth::user())
            <span class="region"><b>{{Auth::user()->first_name}}</b>, za vas je prikazanih {{count($jobs)}} prostih delovnih mest</span>
          @else
            <span class="region">Za vas je prikazanih <b>{{count($jobs)}}</b> prostih delovnih mest</span>
          @endif

	     </div>
     </div>

      <form id="search" action="{{ route('getJobs') }}" method="get" class="search-form" role="search">
    	<div class="col-xs-12 col-md-10">
    	  <input type="text" name="q" class="form-control" id="search-text" placeholder="Iskanje po ključnih besedah, delodajalcih, kategorijah dela, ...">
    	</div>
    	<div id="search-button-wrap" class="col-xs-12 col-md-2">
    		<button type="button" onclick="applyFilter()" class="btn btn-success"> <i class="fa fa-fw fa-search"></i> Iskanje</button>
    	</div>
      </form>
</div>
<div class="header-overlay"></div>
</header>

<div class="container jobs-container">
  <div class="row jobs-row">
    <div class="col-md-4 jobs-col">
      <div class="panel panel-default jobs-panel">
        <div class="panel-body">
	         <nav id="column_left">
             <form id="filters" action="{{route('getJobs')}}">
        		  <ul class="nav nav-list">

                <li>
        		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu1">
        					  <span class="nav-header-primary">Regija<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>
        		    	</a>
        			    <ul class="nav nav-list" id="submenu1" class="submenu">
                    @foreach(App\Region::all() as $region)
                    <li>
                      <label class="checkbox-inline">
                        <input type="checkbox" value="{{$region->id}}" name="regions[{{$region->id}}]" onchange="applyFilter()">
                        {{$region->region}}
                      </label>
                    </li>
                    @endforeach
        			    </ul>
		             </li>

			           <li>
          		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu2">
          					  <span class="nav-header-primary">Kategorija dela<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>
          		    	</a>
                    <ul class="nav nav-list collapse" id="submenu2" class="submenu">
                      @foreach(App\Category::all() as $category)
                      <li>
                        <label class="checkbox-inline">
                          <input type="checkbox" value="{{$category->id}}" name="categories[{{$category->id}}]" onchange="applyFilter()">
                          {{$category->category}}
                        </label>
                      </li>
                      @endforeach
                   </ul>
          			  </li>

          			  <li>
          		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu3">
          					  <span class="nav-header-primary">Stopnja izobrazbe<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>

          		    	</a>
          			    <ul class="nav nav-list collapse" id="submenu3" class="submenu">
                      @foreach(App\Degree::all() as $degree)
                      <li>
                        <label class="checkbox-inline">
                          <input type="checkbox" value="{{$degree->id}}" name="degrees[{{$degree->id}}]" onchange="applyFilter()">
                          {{$degree->name}}
                        </label>
                      </li>
                      @endforeach
          			    </ul>
          			  </li>

          			  <li>
          		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu4">
          					  <span class="nav-header-primary">Vrsta zaposlitve<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>

          		    	</a>
                    <ul class="nav nav-list collapse" id="submenu4" class="submenu">
                      @foreach(App\JobType::all() as $type)
                      <li>
                        <label class="checkbox-inline">
                          <input type="checkbox" value="{{$type->id}}" name="types[{{$type->id}}]" onchange="applyFilter()">
                          {{$type->type}}
                        </label>
                      </li>
                      @endforeach
          			    </ul>
          			  </li>

                  <li>
          		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu6">
          					  <span class="nav-header-primary">Delo od doma<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>

          		    	</a>
                    <ul class="nav nav-list collapse" id="submenu6" class="submenu">


                      <li>
                        <label class="checkbox-inline">
                          <input type="checkbox" value="0" name="home[0]" onchange="applyFilter()">
                          Ne
                        </label>
                      </li>

                      <li>
                        <label class="checkbox-inline">
                          <input type="checkbox" value="1" name="home[1]" onchange="applyFilter()">
                          Da
                        </label>
                      </li>

                    </ul>
          			  </li>
              </form>
              <br>

  		  	  <li><button type="button" onclick="clearFilters()" class="btn btn-info">Počisti vse kriterije</button></li>
		        </ul>
	      </nav>
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <div id="job-list">
      @include('inc.job-list')
    </div>
    
    <ul class="pagination">
    		  <li><a>Stran:</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
        </ul>
  </div>
  </div>
</div>
@endsection
