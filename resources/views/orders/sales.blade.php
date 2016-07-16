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
                    <p>Comprador: <a href="/users/profile/{{ $order->customer->id }}">{{ $order->customer->name }}</a></p>
                    <p>Contacto: {{ $order->customer->email }}</p>

                    @if($order->seller_ok == 0)
                        <p><a class="btn btn-xs btn-warning" href="/orders/sellerOK/{{ $order->id }}">Confirmar Entrega</a></p>
                    @else
                        <p>Compra Entregada.</p>
                        @if(isset($order->qualifyCustomer) && $order->qualifyCustomer->user_id == Auth::user()->id )
                            <p>Ya calificaste al comprador</p>
                        @else
                            <p><a class="btn btn-xs btn-success" href="/qualifications/customer/{{ $order->id }}">Calificar Comprador</a></p>
                        @endif
                    @endif

                <hr />
            @empty
                <h4>No has realizado ventas.</h4>
            @endforelse

		</div>
	</div>
</div>
@endsection