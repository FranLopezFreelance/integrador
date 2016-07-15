@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-3">
    		<h2>Filtros</h2>
    		<hr />
    		@if(isset($s))
					<h4>Sección: {{ $s->name }} <a href="/products/list" class="btn btn-xs btn-warning pull-right">Quitar</a></h4>
			@else
	    		<form class="form-inline" method="POST" action="/products/list/section/">
	    		{{ csrf_field() }}


	    			<div class="form-group">
		    			<select name="id" class="form-control">
		    				<option>Por Sección...</option>
		    				@foreach($sections as $section)
		    					<option value="{{ $section->id }}">{{ $section->name }}</option>
		    				@endforeach
		    			</select>
		    		</div>
	    			<button class="btn btn-primary" type="submit">Ir</button>
	    		</form>
	    	@endif

    		<hr />

    		@if(isset($b))
					<h4>Marca: {{ $b->name }} <a href="/products/list" class="btn  btn-xs btn-warning pull-right">Quitar</a></h4>
			@else
	    		<form class="form-inline" method="POST" action="/products/list/brand/">
	    		{{ csrf_field() }}
	    			<div class="form-group">
		    			<select name="id" class="form-control">
		    				<option>Por Marca ....</option>
		    				@foreach($brands as $brand)
		    					<option value="{{ $brand->id }}">{{ $brand->name }}</option>
		    				@endforeach
		    			</select>
		    		</div>
	    			<button class="btn btn-primary" type="submit">Ir</button>
	    		</form>
	    	@endif

    		<hr />

    		@if(isset($c))
				<h4>Barrio: {{ $c->name }} <a href="/products/list" class="btn btn-xs btn-warning pull-right">Quitar</a></h4>
			@else
	    		<form class="form-inline" method="POST" action="/products/list/city/">
	    		{{ csrf_field() }}
	    			<div class="form-group">
		    			<select name="id" class="form-control">
		    				<option>Por Barrio...</option>
		    				@foreach($cities as $city)
		    					<option value="{{ $city->id }}">{{ $city->name }}</option>
		    				@endforeach
		    			</select>
		    		</div>
	    			<button class="btn btn-primary" type="submit">Ir</button>
	    		</form>
	    	@endif
    		<hr />
    	</div>
        <div class="col-md-9">

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
			<h2>Productos</h2>
			<hr />
			@foreach($products as $product)
				@if(isset($c))
					@foreach($product as $subProduct)
						<div class="col-md-4">
							<img src="/{{ $subProduct->image }}" />
							<h4><a href="/products/detail/{{ $subProduct->id }}">{{ $subProduct->name }}</a></h4>
							<p>{{ $subProduct->description }} </p>
							<h4>${{ $subProduct->price }} </h4>
							<hr />
						</div>
					@endforeach
				@else
					<div class="col-md-4">
						<img src="/{{ $product->image }}" />
						<h4><a href="/products/detail/{{ $product->id }}">{{ $product->name }}</a></h4>
						<p>{{ $product->description }} </p>
						<h4>${{ $product->price }} </h4>
						<p>Ventas: {{ $product->sales()->count() }}</p>
						<hr />
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>
@endsection