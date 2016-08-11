@extends('layouts.master')

@section('content')
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">

            <li><a href="/">Home</a></li>
            <li><a href="/users/myProfile">Mi Perfil</a></li>
            <li><a href="/products/myList">Mis Productos</a></li>
            <li class="active">Nuevo Producto</li>

          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="products-navigation  push-down-15">
                <div class="products-navigation__title">
                    <h3><span class="light">Nuevo</span> Producto</h3>
                </div>
            </div>


            <div class="panel panel-default">

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/products/create') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Descripción</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Breve...">

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('section_id') ? ' has-error' : '' }}">
                            <label for="section_id" class="col-md-4 control-label">Sección</label>

                            <div class="col-md-6">
                                <select class="form-control" id="section_id" name="section_id">
                                    <option value="0">Seleccionar... </option>

                                    @foreach($sections as $section)
                                        <option  value="{{ $section->id }}"

                                            @if($section->id == old('section_id'))
                                                selected
                                            @endif
                                        >
                                            {{ $section->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('section_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('section_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
                            <label for="brand_id" class="col-md-4 control-label">Marca</label>

                            <div class="col-md-6">
                                <select class="form-control" id="brand_id" name="brand_id">
                                    <option value="0">Seleccionar... </option>

                                    @foreach($brands as $brand)
                                        <option  value="{{ $brand->id }}"

                                            @if($brand->id == old('brand_id'))
                                                selected
                                            @endif
                                        >
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('brand_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('brand_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="col-md-4 control-label">Cantidad</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control" name="quantity" value="{{ old('quantity') }}">

                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Precio</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}">

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="image" value="images/products/default.jpg">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-item"></i> Guardar
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
