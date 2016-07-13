@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/products/list/search') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('parameter') ? ' has-error' : '' }}">
                            <label for="parameter" class="col-md-4 control-label">Búsqueda rápida</label>

                            <div class="col-md-6">
                                <input id="parameter" type="text" class="form-control" name="parameter" value="{{ old('parameter') }}">

                                @if ($errors->has('parameter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('parameter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-search"></i> Buscar
                                </button>
                            </div>
                        </div>
                    </form>

			<h3>Resultados para "{{ $parameter }}"</h3>
			<hr />
			@forelse($products as $product)
				<div class="col-md-3	">
					<img src="/{{ $product->image }}" />
					<h4><a href="/products/detail/{{ $product->id }}">{{ $product->name }}</a></h4>
					<p>{{ $product->description }} </p>
					<h4>${{ $product->price }} </h4>
					<h4><a class="btn btn-primary" href="/products/update/{{ $product->id }}">Editar</a></h4>
					<hr />
				</div>
			@empty

				<h4>Sin resultados.</h4>

			@endforelse
		</div>
	</div>
</div>
@endsection