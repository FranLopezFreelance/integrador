@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                  <div class="panel-heading"><h4>Busqueda rápida de productos</h4></div>
                <div class="panel-body">
                    <form class="form-inline" role="form" method="POST" action="{{ url('/products/list/search') }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('parameter') ? ' has-error' : '' }}">
                            <label for="parameter" class="col-md-12 control-label"></label>

                            <div class="form-group">
                                <input id="parameter" type="text" class="form-control input-lg" name="parameter" value="{{ old('parameter') }}">

                                @if ($errors->has('parameter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('parameter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fa fa-btn fa-search"></i> Buscar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            <div class="col-md-12">
            <!-- Features Section -->
            @if (Auth::guest())
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Compra y Vende en Open Nature Market</h2>
                </div>
                <div class="col-md-6">
                    <p>Sitio Web especializado en  la comercialización de productos naturales:</p>
                    <ul>
                        <li><strong>Envios a Domicilio</strong>
                        </li>
                        <li>Pagos Online</li>
                        <li>Sin comisiones</li>
                        <li>Productos orgánicos y naturales</li>
                        <li>Chatea con todos los usuarios!</li>
                        <li>Publicas, vendes, cobrás, y listo!</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive" src="/images/front/compraVende.jpg" alt="">
                </div>
            </div>
        <!-- /.row -->
                <hr>
                <!-- Call to Action Section -->
            <div class="well">
                <div class="row">
                    <div class="col-md-8">
                        <p>¡Formá parte de nuestra comunidad! Podés comprar y vender utilizando todos los medios de pagos disponibles. Sin comisiones, sin cargos extras. Unite!</p>
                    </div>
                    <div class="col-md-4">
                        <a role="button"  class="btn btn-lg btn-default btn-block" href="{{ url('/register') }}" data-toggle="modal">Registrate</a>
                    </div>
                </div>
            </div>
            @endif
            
            </div>
        </div>
    </div>
</div>
@endsection
