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
                            <li><h4><a href="/products/detail/{{ $item->product->id }}">{{ $item->product->name }}</a>
                            ${{ $item->product->price }}
                            x {{ $item->quantity }}
                            - Sub Total: ${{ $item->subtotal }}
                            @if($order->customer_ok == 1)
                                @if(isset($order->qualifyProducts()->first()->product_id) &&
                                $order->qualifyProducts()->first()->product_id == $item->product->id)
                                    (Ya calificaste)
                                @else
                                    <a class="btn btn-xs btn-success" href="/qualifications/product/{{ $order->id }}">Calificar Producto</a>
                                @endif
                            @endif
                            </h4></li>
                        @endforeach
                    </ul>
                    <h4>Total: {{ $order->total }}</h4>
                    <p>Vendedor: <a href="/users/profile/{{ $order->seller->id }}">{{ $order->seller->name }}</a></p>
                    <p>Contacto: {{ $order->seller->email }}</p>

                    @if($order->customer_ok == 0)
                        <p><a class="btn btn-xs btn-warning" href="/orders/customerOK/{{ $order->id }}">Confirmar Entrega</a></p>
                    @else
                        <p>Compra recibida.</p>

                        @if(isset($order->qualifySeller) && $order->qualifySeller->user_id == Auth::user()->id )
                            <p>Ya calificaste al vendedor</p>
                        @else
                        <p><a class="btn btn-xs btn-success" href="/qualifications/seller/{{ $order->id }}">Calificar Vendedor</a></p>
                        @endif
                    @endif


                <hr />
            @empty
                <h4>No has realizado compras.</h4>
            @endforelse

		</div>
	</div>
</div>
@endsection