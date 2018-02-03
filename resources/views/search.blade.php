@extends('layouts.app')

@section('content')
<header class="video-header container">
        <div class="video-wrapper">
            <video src="{{ asset('images/video.mp4') }}" autoplay loop></video>
        </div>
        <div class="header-content">
		<div class="user-greet row">
		<div class="col-md-10">
			<span class="greeting">
			Pozdravljeni na portalu za iskanje zaposlitve!

			</span>
			@if (Auth::user())
				<span class="region"><b>{{Auth::user()->first_name}}</b>, za vas je prikazanih 332 prostih delovnih mest iz vseh regij.</span>
			@else
				<span class="region">Za vas je prikazanih <b>332</b> prostih delovnih mest iz vseh regij.</span>
			@endif

		</div>
  </div>
  <form action="{{ route('iskanje') }}" method="get" class="search-form" role="search">
	<div class="col-md-10">
	  <input type="text" name="q" class="form-control" id="search" placeholder="Iskanje po ključnih besedah, delodajalcih, kategorijah dela, ...">
	</div>
	<div class="col-md-2">
		<button type="submit" class="btn btn-success"> <i class="fa fa-fw fa-search"></i> Iskanje</button>
	</div>
  </form>
        </div>
        <div class="header-overlay"></div>
    </header>

<div id="scroll-past" class="popular-categories">
	<div class="container">
		<div class="row">
			<div class="col-md-2"><a href="#"><i class="fa fa-fw fa-envelope-o fa-2x"></i><br>Administracija</a></div>
			<div class="col-md-2"><a href="#"><i class="fa fa-fw fa-code fa-2x"></i><br>Programiranje</a></div>
			<div class="col-md-2"><a href="#"><i class="fa fa-fw fa-industry fa-2x"></i><br>Proizvodnja</a></div>
			<div class="col-md-2"><a href="#"><i class="fa fa-fw fa-h-square fa-2x"></i><br>Zdravstvo</a></div>
			<div class="col-md-2"><a href="#"><i class="fa fa-fw fa-cutlery fa-2x"></i><br>Gostinstvo</a></div>
			<div class="col-md-2"><a href="#"><i class="fa fa-fw fa-bar-chart fa-2x"></i><br>Računovodstvo</a></div>
		</div>
	</div>
</div>

<div class="container jobs-container">
    <div class="row jobs-row">
      <div class="col-md-4 jobs-col">
        <div class="panel panel-default jobs-panel">
          <div class="panel-body">
		  <nav id="column_left">
		<ul class="nav nav-list">
			<li><h3 class="jobs-h3">Prosta dela</h3></li>
		  	<li>
		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu1">
					  <span class="nav-header-primary">Regija<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>
					  <span class="criteria">Ni izbranih kriterijev</span>
		    	</a>

			    <ul class="nav nav-list collapse" id="submenu1" class="submenu">
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Osrednjeslovenska <span class="job-count pull-right">[164]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Podravska <span class="job-count pull-right">[33]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Koroška <span class="job-count pull-right">[22]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Pomurska <span class="job-count pull-right">[13]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Savinjska <span class="job-count pull-right">[5]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Zasavska <span class="job-count pull-right">[64]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Gorenjska <span class="job-count pull-right">[8]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Goriška <span class="job-count pull-right">[4]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Obalna <span class="job-count pull-right">[1]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Primorsko-notranjska <span class="job-count pull-right">[2]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Dolenjska <span class="job-count pull-right">[4]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Tujina <span class="job-count pull-right">[56]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Spodnjeposavska <span class="job-count pull-right">[15]</span>
							</label>
						</li>
			    </ul>
			  </li>

			  <li>
		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu2">
					  <span class="nav-header-primary">Vrsta dela<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>
					  <span class="criteria">Ni izbranih kriterijev</span>
		    	</a>

			    <ul class="nav nav-list collapse" id="submenu2" class="submenu">
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Administracija <span class="job-count pull-right">[164]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Bančništvo, finance <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Elektrotehnika, elektronika, telekomunikacije <span class="job-count pull-right">[33]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Farmacija, kemija <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Gradbeništvo, arhitektura, geodezija <span class="job-count pull-right">[22]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Gostinstvo, turizem, potovanje <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Javni sektor, nevladne organizacije <span class="job-count pull-right">[13]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Izobraževanje, prevajanje, kultura, šport <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Kmetijstvo, ribištvo, gozdarstvo <span class="job-count pull-right">[5]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Kadrovanje, HR <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Kreativa, design <span class="job-count pull-right">[64]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Komerciala, prodaja <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Marketing, PR <span class="job-count pull-right">[8]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Matematika, fizika in naravoslovje <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Mediji <span class="job-count pull-right">[4]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Nepremičnine <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Osebne storitve in varovanje <span class="job-count pull-right">[1]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Pravo in družboslovje <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Prehrambena industrija, živilstvo, veterina <span class="job-count pull-right">[2]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Proizvodnja <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Računalništvo, programiranje <span class="job-count pull-right">[4]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Računovodstvo, revizija <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Socialne storitve <span class="job-count pull-right">[56]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Strojništvo, metalurgija, rudarstvo <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Tehnične storitve <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Transport, nabava, logistika <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Trgovina <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Upravljanje, svetovanje, vodenje <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Zavarovalništvo <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Zdravstvo, nega <span class="job-count pull-right">[15]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Znanost, tehnologija <span class="job-count pull-right">[15]</span>
							</label>
						</li>
			    </ul>
			  </li>

			  <li>
		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu3">
					  <span class="nav-header-primary">Stopnja izobrazbe<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>
					  <span class="criteria">Ni izbranih kriterijev</span>
		    	</a>

			    <ul class="nav nav-list collapse" id="submenu3" class="submenu">
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">I. - 7 razredov osnovne šole ali manj <span class="job-count pull-right">[164]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">II. - dokončana osnovna šola <span class="job-count pull-right">[33]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">III. - dokončana poklicna šola <span class="job-count pull-right">[22]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">IV. - dokončana srednja strokovna šola <span class="job-count pull-right">[13]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">V. - dokončana gimnazija in ostale štiriletne šole <span class="job-count pull-right">[5]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">VI./1 - višješolski strokovni programi <span class="job-count pull-right">[64]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">VI./2 - visokošolski strokovni programi / 1. bolonjska stopnja <span class="job-count pull-right">[8]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">VII. - univerzitetni programi / 2. bolonjska stopnja <span class="job-count pull-right">[4]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">VIII./1 - magisteriji znanosti <span class="job-count pull-right">[1]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">VIII./2 - doktorati znanosti / 3. bolonjska stopnja <span class="job-count pull-right">[2]</span>
							</label>
						</li>
			    </ul>
			  </li>

			  <li>
		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu4">
					  <span class="nav-header-primary">Vrsta zaposlitve<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>
					  <span class="criteria">Ni izbranih kriterijev</span>
		    	</a>

			    <ul class="nav nav-list collapse" id="submenu4" class="submenu">
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Redno, nedoločen delovni čas <span class="job-count pull-right">[164]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Redno, določen delovni čas <span class="job-count pull-right">[33]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Preko S.P. <span class="job-count pull-right">[22]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Projektno delo <span class="job-count pull-right">[13]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Pogodbeno delo <span class="job-count pull-right">[5]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Študentsko delo <span class="job-count pull-right">[64]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Prostovoljno <span class="job-count pull-right">[8]</span>
							</label>
						</li>
			    </ul>
			  </li>

			  <li>
		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu5">
					  <span class="nav-header-primary">Vrsta zaposlitve<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>
					  <span class="criteria">Ni izbranih kriterijev</span>
		    	</a>

			    <ul class="nav nav-list collapse" id="submenu5" class="submenu">
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Polni delovni čas <span class="job-count pull-right">[164]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Delni delovni čas <span class="job-count pull-right">[33]</span>
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Projektno delo <span class="job-count pull-right">[22]</span>
							</label>
						</li>
			    </ul>
			  </li>
			<br>
		  	<li><button class="btn btn-info">Počisti vse kriterije</button></li>
		</ul>

		</nav>
          </div>
        </div>
      </div>

      <div class="col-md-8">
		  <div class="row">
			  <div class="col-md-6">
          <ul class="pagination">
      		  <li><a>Stran:</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
          </ul>
        </div>
			  <div class="col-md-6">
				  <div class="row">
					  <div class="col-md-3" style="line-height: 32px;">
						  Razvrsti:
					  </div>
					  <div class="col-md-9">
						  <select name="" id="" class="form-control">
							  <option value="1">A-Z</option>
							  <option value="1">A-Z</option>
							  <option value="1">A-Z</option>
						  </select>
					  </div>
				  </div>

		  </div>
      </div>
      @if(isset($details))
            @foreach($details as $job)
              @include('inc.job')
            @endforeach
            @endif
          </div>
      </div>
@endsection
