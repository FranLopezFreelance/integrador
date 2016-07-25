@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

        	@if (Session::get('msg'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('msg') }}
                </div>
            @endif

			<h1 class="text-center">{{ $product->name }}</h1>
			<hr />
		</div>
		<div class="col-md-6">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-md-6">
				
				<h4>{{ $product->description }} </h4>
				<hr />
				<h3 style="color:red">${{ $product->price }} </h3>
				<p>Sección: {{ $product->section->name }} </p>
				<p>Marca: {{ $product->brand->name }} </p>
				<p>Disponibles: {{ $product->quantity }} </p>
				<p>Ventas: {{ $product->sales()->count() }} </p>
				<p>Vendedor:
				@if(!Auth::guest())
					@if($product->user->id == Auth::user()->id)
						Tú</p>
					@else
						<a href="/users/profile/{{ $product->user_id }}">{{ $product->user->name }} {{ $product->user->lastname }}</a> </p>
					@endif
					@if($product->user->id == Auth::user()->id)
						<p><a class="btn btn-primary" href="/products/update/{{ $product->id }}">Editar</a></p>
					@else
						<p><a class="btn btn-success" href="/products/buy/{{ $product->id }}">Comprar</a></p>
					@endif
				@else
					<a href="/users/profile/{{ $product->user_id }}">{{ $product->user->name }}</a> </p>
					<p><a class="btn btn-success" href="/products/buy/{{ $product->id }}">Comprar</a></p>
				@endif
		</div>

				<hr />
			<div class="col-md-12">		
				<h3>Calificaciones:</h3>

				<hr />
				<ul>

				@forelse($product->qualifications as $qualification)
					<div class="row">
						<div class="col-md-1">
							<img width="60" class="img-circle" src="/{{ $qualification->user->avatar }}" />
						</div>
						<div class="col-md-11">
							<h4>{{ $qualification->comment }}</h4>
							<p>Por <b><a href="/users/profile/{{ $qualification->user->id }}">{{ $qualification->user->name }}</a></b> - {{ $qualification->created_at }}</p>
						</div>
					</div>
					<hr />
				@empty
					<h4>Este producto aún no tiene calificaciones.</h4>
					
                        <a class="btn btn-warning">Deja un comentario</a>
                    
				
				@endforelse
				</ul>
			</div>
			<div class="col-md-12">		
				<h3>Descripción Detallada:</h3>
				<hr />
				<ul>
					<div class="well">
					</div>
				</ul>
			</div>
			<div class="col-md-12">		
				<h3>Preguntas:</h3>
				<hr />
				<ul>
					<div class="well">
					</div>
				</ul>
			</div>
	</div>
</div>

@endsection