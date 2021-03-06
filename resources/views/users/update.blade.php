@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Editar datos de Usuario <b>{{ $user->type->name }}</b> </div>

                <div class="panel-body">

                    @if (Session::get('msg'))
                        <div class="alert alert-success fade" role="alert">
                           <b> {{ Session::get('msg') }}</b>
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="/users/update/{{ $user->id }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <img class="img-circle" width="100" src="/{{ $user->avatar }}" />

                                <div class="image-change">

                                  <form action="/users/imageChange/" enctype="multipart/form-data" method="POST">
                                                    {{ csrf_field() }}
                                    <input type="file" name="image-profile" />

                                    <button class="btn btn-success submit" type="submit">Guardar Nueva Imágen</button>

                                  </form>
                                </div>

                            </div>
                        </div>

                        <hr />

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ (old('name')) ? old('name') : $user->name  }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Apellido</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ (old('lastname')) ? old('lastname') : $user->lastname  }}">

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ (old('email')) ? old('email') : $user->email  }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
                            <label for="city_id" class="col-md-4 control-label">Localidad</label>

                            <div class="col-md-6">
                                <select class="form-control" id="city_id" name="city_id">
                                    <option value="0">Seleccionar... </option>

                                    @foreach($cities as $city)
                                        <option  value="{{ $city->id }}"

                                            @if($city->id == old('city_id') || $city->id == $user->city_id)
                                                selected
                                            @endif
                                        >
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('city_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
                            <label for="type_id" class="col-md-4 control-label">Tipo Usuario</label>

                            <div class="col-md-6">
                                <select class="form-control" id="type_id" name="type_id">
                                    <option value="0">Seleccionar... </option>

                                    @foreach($types as $type)
                                        <option  value="{{ $type->id }}"

                                            @if($type->id == old('type_id') || $type->id == $user->type_id)
                                                selected
                                            @endif
                                        >
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('type_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="avatar" value="images/users/default.png">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
