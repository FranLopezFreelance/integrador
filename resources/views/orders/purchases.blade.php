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

            @forelse($purchases as $order)
				<p> ID Pedido: {{ $order->id }} </p>
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
                    <h4>Total: {{ $order->total }}</h4>
                    <p>Vendedor: <a href="/users/profile/{{ $order->seller->id }}">{{ $order->seller->name }}</a></p>

                <hr />
            @empty
                <h4>No has realizado compras.</h4>
            @endforelse

		</div>
	</div>
</div>
@endsection