@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

        	@if (Session::get('msg'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('msg') }}
                </div>
            @endif

            @forelse($sales as $order)
				<h4> ID Pedido: {{ $order->id }} </h4>
                    Productos:
                    <ul>
                        @foreach($order->items as $item)
                            <li>{{ $item->product->name }}
                            ${{ $item->product->price }}
                            x {{ $item->quantity }}
                            - Sub Total: ${{ $item->subtotal }}
                            </li>
                        @endforeach
                    </ul>

                    <p>Comprador: <a href="/users/profile/{{ $order->customer->id }}">{{ $order->customer->name }}</a></p>

                <hr />
            @empty
                <h4>No has realizado ventas.</h4>
            @endforelse

		</div>
	</div>
</div>
@endsection