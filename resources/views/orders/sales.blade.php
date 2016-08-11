@extends('layouts.master')

@section('content')

<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">
            
            <li><a href="/">Home</a></li>

            <li><a href="/users/myProfile">Mi perfil</a></li>
            
            <li class="active">Mis Ventas</li>
            
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="woocommerce  push-down-30">
  <div class="container">
    <div class="row">
      <div class="col-xs-12  push-down-30">
        <div class="products-navigation  push-down-15">
                <div class="products-navigation__title">
                    <h3><span class="light">Mis</span> Ventas</h3>
                </div>
            </div>
        @if (Session::get('msg'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('msg') }}
                </div>
        @endif
        

        <table class="shop-table  shop-cart">
          <thead>
            <tr class="cart_table_title">
              <th class="product-price">Nro Orden</th>
              <th class="product-name">Producto</th>
              <th class="product-price">Cantidad</th>
              <th class="product-price">Precio</th>
              <th class="product-price">Total</th>
              <th class="product-price">Comprador</th>
              <th class="product-price">Contacto</th>
              <th class="product-price">Estado</th>
              <th class="product-price">Calificacion Comprador</th>
            </tr>
          </thead>
          <tbody>
          @forelse($sales as $order)
            <tr class="cart_table_item">
                <td class="product-price">{{ $order->id }}</td>

                @foreach($order->items as $item)

                <td class="product-name"><a href="/products/detail/{{ $item->product->id }}">{{ $item->product->name }}</a></td>
                <td class="product-price">{{ $item->quantity }}</td>
                <td class="product-price">${{ $item->product->price }}</td>
                <td class="product-price">${{ $item->subtotal }}</td>
                @endforeach
                <td class="product-price"><a href="/users/profile/{{ $order->customer->id }}">{{ $order->customer->name }}</a></td>
                <td class="product-price">{{ $order->customer->email }}</a></td>

                    @if($order->seller_ok == 0)
                    <td class="product-price"><a class="btn btn-warning" href="/orders/sellerOK/{{ $order->id }}">Confirmar Entrega</a></td>
                    @else
                    <td class="product-price">Compra Entregada</td>

                        @if(isset($order->qualifyCustomer) && $order->qualifyCustomer->user_id == Auth::user()->id )
                        <td class="product-price">Ya calificaste al comprador</td>
                            @else
                            <td class="product-price"><a class="btn btn-xs btn-success" href="/qualifications/customer/{{ $order->id }}">Calificar Comprador</a></td>
                        @endif
                    @endif
                

            @empty
            <h4 style="color:red">No has realizado Ventas.</h4>
            
            @endforelse
         
        </tbody>
       </table>
      </div>
    </div>
  </div>
</div>

<!-- <div class="container">
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
</div> -->
@endsection