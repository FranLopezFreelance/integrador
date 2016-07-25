@extends('layouts.master')

@section('titulo')
Home
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Ultimos Productos publicados</h3>
            <hr />
                    @foreach($products as $product)
                        <div class="col-md-3">
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
                    @endforeach

        </div>

        <div class="col-md-12">
            <h3>Productos de los Usuarios que sigues</h3>
            <hr />
                @forelse($usersFollowing as $userFollowing)
                    @foreach($userFollowing->products as $product)
                        @if($userFollowing->id != Auth::user()->id)
                            <div class="col-md-3    ">
                                <img src="/{{ $product->image }}" />
                                <h4><a href="/products/detail/{{ $product->id }}">{{ $product->name }}</a></h4>
                                <p>{{ $product->description }} </p>
                                <h4>${{ $product->price }} </h4>
                                <h5><a href="/users/profile/{{ $product->user_id }}">{{ $product->user->name }}</a></h5>
                                <p>Ventas: {{ $product->sales()->count() }} | Calificaciones: {{ $product->qualifications()->count() }}</p>
                                <hr />
                            </div>
                        @endif
                    @endforeach
                @empty
                    <h4>No sigues a ningún usuario</h4>
                @endforelse.
        </div>
    </div>
</div>
@endsection

