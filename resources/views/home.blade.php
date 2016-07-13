@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Ultimos Productos publicados</h3>
                    @foreach($products as $product)
                        <div class="col-md-3    ">
                            <img src="/{{ $product->image }}" />
                            <h4><a href="/products/detail/{{ $product->id }}">{{ $product->name }}</a></h4>
                            <p>{{ $product->description }} </p>
                            <h4>${{ $product->price }} </h4>
                            <hr />
                        </div>
                    @endforeach
            <hr />
        </div>

        <div class="col-md-12">
            <h3>Productos de los Usuarios que sigues</h3>
                @forelse($usersFollowing as $userFollowing)
                    @foreach($userFollowing->products as $product)
                        @if($userFollowing->id != Auth::user()->id)
                            <div class="col-md-3    ">
                                <img src="/{{ $product->image }}" />
                                <h4><a href="/products/detail/{{ $product->id }}">{{ $product->name }}</a></h4>
                                <p>{{ $product->description }} </p>
                                <h4>${{ $product->price }} </h4>
                                <h5><a href="/users/profile/{{ $product->user_id }}">{{ $product->user->name }}</a></h5>
                                <hr />
                            </div>
                        @endif
                    @endforeach
                @empty
                    <h4>No sigues a ningún usuario</h4>
                @endforelse.
        </div>
        <hr />
    </div>
</div>
@endsection