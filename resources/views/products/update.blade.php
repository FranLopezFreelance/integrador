@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-heading"><h3>Editar <a href="/products/detail/{{ $product->id }}">Producto</a></h3></div>

                <hr class="divider" />
                <div class="panel-heading"><h4>Editar Imágenes del Producto</h4></div>

                <div class="panel-body">

                    @if (Session::get('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('msg') }}
                        </div>
                    @endif

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">

                                <h4>Elije el orden para tus imágenes</h4>

                                <div id="sortable">

                                    <input type="hidden" name="productId" id="productId" value="{{ $product->id }}">

                                    <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">

                                    @foreach($images as $image)
                                        @if($image->active == 1)
                                            <span id="{{ $image->id }}" class="ui-state-default imageProduct">

                                                @if($image->path == 'images/products/default.jpg')
                                                    <img class="image-drag-drop" src="/{{ $image->path }}" width="150" >
                                                @else
                                                    <img class="image-drag-drop"
                                                    src="{{ route('product.image', ['name' => $image->path]) }}"
                                                    width="150" >

                                                    <a class="btn btn-danger btn-xs delete-product" href="/products/imageDelete/{{ $image->id }}"><i class="glyphicon glyphicon-trash"></i></a>
                                                @endif

                                            </span>


                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <a class="btn btn-success saveOrder" id="{{ $product->id }}">Guardar Orden</a>

                        </div>

                        <div class="dropzoneDIV">
                            <h4>Arrrastra aquí las imágenes que quieras agregar al Producto (Máximo 4)</h4>
                            <form action="/products/uploadImages/{{ $product->id }}" class="dropzone" method="POST">


                            {{ csrf_field() }}

                            </form>
                        </div>

                        <a href="/products/update/{{ $product->id }}" class="btn btn-success saveImages">Guardar Imágenes</a>


                    <hr class="divider" />

                    <div class="panel-heading"><h4>Editar Datos del Producto</h4></div>

                    <form class="form-horizontal" role="form" method="POST" action="/products/update/{{ $product->id }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

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
                            <label for="section_id" class="col-md-4 control-label">Sección</label>

                            <div class="col-md-6">
                                <select class="form-control" id="section_id" name="section_id">
                                    <option value="0">Seleccionar... </option>

                                    @foreach($sections as $section)
                                        <option  value="{{ $section->id }}"

                                            @if($section->id == old('section_id') OR $section->id == $product->section_id)
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

                        <div class="form-group{{ $errors->has('section') ? ' has-error' : '' }}">
                            <label for="brand_id" class="col-md-4 control-label">Marca</label>

                            <div class="col-md-6">
                                <select class="form-control" id="brand_id" name="brand_id">
                                    <option value="0">Seleccionar... </option>

                                    @foreach($brands as $brand)
                                        <option  value="{{ $brand->id }}"

                                            @if($brand->id == old('brand_id') OR $brand->id == $product->brand_id)
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
