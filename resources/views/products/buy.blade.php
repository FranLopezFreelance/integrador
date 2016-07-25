@extends('layouts.master')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Nueva Compra</div>

                <div class="panel-body">

					<form class="form" method="POST" action="/orders/create/{{ $product->id }}">

					{{ csrf_field() }}

						<div class="row">
							<div class="col-md-5">
			                	<h2>{{ $product->name }}</h2>
			                	<p>{{ $product->description }}</p>
			                	<p>Vendedor: {{ $product->user->name }} ({{ $product->user->city->name }})</p>
			                	<h4>Precio Unitario: ${{ $product->price }}</h4>
			                </div>

			                <div class="col-md-7">
								<img width="180" src="/{{ $product->image }}" />
							</div>
						</div>

						<hr />

						<div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="col-md-2 control-label">Cantidad</label>

                            <div class="col-md-2">
                                <input id="quantity" type="number" class="form-control" name="quantity" value="{{ old('quantity') }}">
                                <p class="help-block">{{ $product->quantity }} disp.</p>

                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					<div class="form-group">
                        <div class="col-md-12">
							<h3>Total: ${{ $product->price }} </h3>
						</div>
					</div>

					<div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-item"></i> Confirmar Compra
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