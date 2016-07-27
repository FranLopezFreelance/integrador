<div class="container">
    <div class="row">

    	<div class="col-lg-12">
                <h1 class="page-header">Productos
                    <small><i>Todos los productos</i></small>
                </h1>
        </div>
        <div class="col-md-3">
        	<div class="well">
                <h4>Busqueda rápida</h4>
               		<form class="form-horizontal" role="form" method="POST" action="{{ url('/products/list/search') }}">
				{{ csrf_field() }}

	            <div class="form-group{{ $errors->has('parameter') ? ' has-error' : '' }}">
	                <div class="col-md-12">
	                    <input id="parameter" type="text" class="form-control" name="parameter" value="{{ old('parameter') }}">

	                    @if ($errors->has('parameter'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('parameter') }}</strong>
	                        </span>
	                    @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-md-12">
	                    <button type="submit" class="btn btn-primary btn-lg btn-block">
	                        <i class="fa fa-btn fa-search"></i> Buscar
	                    </button>
	                </div>
	            </div>
	        	</form>
                    
                    
            </div>

    	<hr/>

    	<ol class="breadcrumb">
            <li class="active">Filtre su búsqueda...</li>
		</ol>
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
			@foreach($products as $product)
				@if(isset($c))
					@foreach($product as $subProduct)
	                <div class="thumbnail">
	                    <img src="/{{ $subProduct->image }}">
	                    <div class="caption">
	                        <h4 class="pull-right">${{ $subProduct->price }}</h4>
	                        <h4><a href="/products/detail/{{ $subProduct->id }}">{{ $subProduct->name }}</a>
	                        </h4>
	                        <p>{{ $subProduct->description }}</p>
	                    </div>
	                    <div class="ratings">
	                    	<p style="color:green;">Ventas: {{ $subProduct->sales()->count() }}</p>
	                        <p class="pull-right">{{ $subProduct->qualifications()->count() }} calificaciones</p>
	                        <p>
	                            <span class="glyphicon glyphicon-star"></span>
	                            <span class="glyphicon glyphicon-star"></span>
	                            <span class="glyphicon glyphicon-star"></span>
	                            <span class="glyphicon glyphicon-star"></span>
	                            <span class="glyphicon glyphicon-star"></span>
	                        </p>
	                    </div>
	            	</div>
            	
					@endforeach
				@else
				<div class="col-md-4">
	                <div class="thumbnail">
	                    <img src="/{{ $product->image }}">
	                    <div class="caption">
	                        <h4 class="pull-right">${{ $product->price }}</h4>
	                        <h4><a href="/products/detail/{{ $product->id }}">{{ $product->name }}</a>
	                        </h4>
	                        <p>{{ $product->description }}</p>
	                    </div>
	                    <div class="ratings">
	                    	<p style="color:green;">Ventas: {{ $product->sales()->count() }}</p>
	                        <p class="pull-right">{{ $product->qualifications()->count() }} calificaciones</p>
	                        <p>
	                            <span class="glyphicon glyphicon-star"></span>
	                            <span class="glyphicon glyphicon-star"></span>
	                            <span class="glyphicon glyphicon-star"></span>
	                            <span class="glyphicon glyphicon-star"></span>
	                            <span class="glyphicon glyphicon-star"></span>
	                        </p>
	                    </div>
	            	</div>
            	</div>
				@endif
			@endforeach
				<div class="row">
					<div class="col-md-12">
						{!! $products->render() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>