@extends('layouts.app')

@section('content')
<div class="container pt-30">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading"><h3>Uredi delo</h3></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Naslov</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{$errors->has('title') ? old('title'): $job->title}}" placeholder="*"required>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Kategorija dela</label>

                            <div class="col-md-6">

                              <select id="category" type="text" class="form-control" name="category" required>
                                @foreach(App\Category::all() as $category)
                                  <option value="{{$category->id}}"
                                    {{ (null !== old("category")) ? (old("category") == $category->id ? "selected":"") : ($job->category_id == $category->id) ? "selected" : ""}}
                                    >{{$category->category}}</option>
                                @endforeach
                              </select>


                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Opis</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" placeholder="*"required>{{$errors->has('description') ? old('description'): $job->description}}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            <label for="position" class="col-md-4 control-label">Delovno mesto / pozicija</label>

                            <div class="col-md-6">

                                  <input id="position" type="text" class="form-control" name="position" value="{{$errors->has('position') ? old('position'): $job->position}}" placeholder="*"required>

                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hourly_wage') ? ' has-error' : '' }}">
                            <label for="hourly_wage" class="col-md-4 control-label">Urna postavka</label>

                            <div class="col-md-6">

                                  <input id="hourly_wage" min="0" type="number" step="0.1" class="form-control"  name="hourly_wage" value="{{$errors->has('hourly_wage') ? old('hourly_wage'): $job->hourly_wage}}" placeholder="*" required>

                                @if ($errors->has('hourly_wage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hourly_wage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('job_type') ? ' has-error' : '' }}">
                            <label for="job_type" class="col-md-4 control-label">Vrsta dela</label>

                            <div class="col-md-6">

                              <select id="job_type" type="text" class="form-control" name="job_type" value="{{old('job_type')}}" required>
                                @foreach(App\JobType::all() as $type)
                                  <option value="{{$type->id}}"
                                    {{ (null !== old("job_type")) ? (old("job_type") == $type->id ? "selected":"") : ($job->job_type_id == $type->id) ? "selected" : ""}}>
                                    {{$type->type}}</option>
                                @endforeach
                              </select>

                                @if ($errors->has('job_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="duration" class="col-md-4 control-label">Čas zaposlitve [v mescih]</label>

                            <div class="col-md-6">

                                <input id="duration" min="0" type="number" step="0.5" class="form-control" name="duration" value="{{$errors->has('duration') ? old('duration'): $job->duration}}">
                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('trial') ? ' has-error' : '' }}">
                            <label for="trial" class="col-md-4 control-label">Preizkusno obdobje [v tedhih]</label>

                            <div class="col-md-6">

                                  <input id="trial" min="0" type="number" class="form-control" name="trial" value="{{$errors->has('triak') ? old('trial'): $job->trial}}">

                                @if ($errors->has('trial'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('trial') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--terms and requirements-->
                        <div class="form-group{{ $errors->has('degree') ? ' has-error' : '' }}">
                            <label for="degree" class="col-md-4 control-label">Izobrazba</label>

                            <div class="col-md-6">

                              <select id="degree" type="text" class="form-control" name="degree" required>
                                @foreach(App\Degree::all() as $degree)
                                  <option value="{{$degree->id}}"
                                    {{ (null !== old("degree")) ? (old("degree") == $degree->id ? "selected":"") : ($job->degree_id == $degree->id) ? "selected" : ""}}>
                                  {{$degree->name}}</option>
                                @endforeach
                              </select>




                                @if ($errors->has('degree'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('degree') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('terms') ? ' has-error' : '' }}">
                            <label for="terms" class="col-md-4 control-label">Pogoji</label>

                            <div class="col-md-6">

                              <textarea id="terms" type="text" class="form-control" name="terms">{{$errors->has('terms') ? old('terms'): $job->terms}}</textarea>

                                @if ($errors->has('terms'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('terms') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- location -->
                        <div class="form-group{{ $errors->has('post') ? ' has-error' : '' }}">
                            <label for="post" class="col-md-4 control-label">Pošta</label>

                            <div class="col-md-6">

                              <input id="post" minlength="4" maxlength="4" type="text" class="form-control" name="post" value="{{$errors->has('post') ? old('post'): $job->post_id}}" placeholder="*" required>

                                @if ($errors->has('post'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Naslov</label>

                            <div class="col-md-6">

                              <input id="address" type="text" class="form-control" name="address" value="{{$errors->has('address') ? old('address'): $job->address}}" placeholder="*" required>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('work_time') ? ' has-error' : '' }}">
                            <label for="work_time" class="col-md-4 control-label">Delovni čas [v urah]</label>

                            <div class="col-md-6">

                              <input id="work_time" min="0" max="24" type="number" class="form-control" name="work_time" value="{{$errors->has('work_time') ? old('work_time'): $job->work_time}}" >

                                @if ($errors->has('work_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('work_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('weekends') ? ' has-error' : '' }}">
                            <label for="weekends" class="col-md-4 control-label">Delovni vikendi</label>

                            <div class="col-md-6" style="padding-top:7px">
                              <div class="row">
                                <div class="col-xs-6 col-xs-offset-2">
                                  <input id="r1" type="radio" name="weekends" value="1"
                                  {{ old("weekends") !== null ? (old("weekends") == "1" ? "checked":"") : $job->weekends == "1" ? "checked" : ""}}>
                                  <label for="r1"> Da</label>
                                </div>
                                <input id="r2" type="radio" name="weekends" value="0"
                                {{ old("weekends") !== null ? (old("weekends") == "0" ? "checked":"") : $job->weekends == "0" ? "checked" : ""}}>

                                <label for="r2"> Ne</label>
                              </div>

                                @if ($errors->has('weekends'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('weekends') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('home') ? ' has-error' : '' }}">
                            <label for="home" class="col-md-4 control-label">Delo od doma</label>

                            <div class="col-md-6" style="padding-top:7px">

                              <div class="row">
                                <div class="col-xs-6 col-xs-offset-2">
                                  <input id="r3" type="radio" name="home" value="1"
                                    {{ old("home") !== null ? (old("home") == "1" ? "checked":"") : $job->home == "1" ? "checked" : ""}}>
                                  <label for="r3"> Da</label>
                                </div>
                              <input id="r4" type="radio" name="home" value="0"
                                {{ old("home") !== null ? (old("home") == "0" ? "checked":"") : $job->home == "0" ? "checked" : ""}}>
                              <label for="r4" > Ne</label>
                            </div>

                                @if ($errors->has('home'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('home') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Shrani
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
