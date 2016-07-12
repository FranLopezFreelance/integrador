@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Editar Producto [{{ $product->id }}]</div>

                <div class="panel-body">

                    @if (Session::get('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('msg') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="/products/update/{{ $product->id }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <img src="/{{ $product->image }}" />
                            </div>
                        </div>

                        <hr />

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ (old('name')) ? old('name') : $product->name }}">

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
                                <input id="description" type="text" class="form-control" name="description" value="{{ (old('description')) ? old('description') : $product->description }}">

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('section') ? ' has-error' : '' }}">
                            <label for="section" class="col-md-4 control-label">Sección</label>

                            <div class="col-md-6">
                                <select class="form-control" id="section" name="section">
                                    <option value="0">Seleccionar... </option>

                                    @foreach($sections as $section)
                                        <option  value="{{ $section->id }}"

                                            @if($section->id == old('section') OR $section->id == $product->section_id)
                                                selected
                                            @endif
                                        >
                                            {{ $section->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('section'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('section') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('section') ? ' has-error' : '' }}">
                            <label for="brand" class="col-md-4 control-label">Marca</label>

                            <div class="col-md-6">
                                <select class="form-control" id="brand" name="brand">
                                    <option value="0">Seleccionar... </option>

                                    @foreach($brands as $brand)
                                        <option  value="{{ $brand->id }}"

                                            @if($brand->id == old('brand') OR $brand->id == $product->brand_id)
                                                selected
                                            @endif
                                        >
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('brand'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="col-md-4 control-label">Cantidad</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control" name="quantity" value="{{ (old('quantity')) ? old($quantity) : $product->quantity }}">

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
                                <input id="price" type="number" class="form-control" name="price" value="{{ (old('price')) ? old($price) : $product->price }}">

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
