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
            
            <li class="active">Mis Compras</li>
            
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
                    <h3><span class="light">Mis</span> Compras</h3>
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
              <th class="product-price">Precio</th>
              <th class="product-price">Cantidad</th>
              <th class="product-price">Sub-Total</th>
              <th class="product-price">Calificacion Producto</th>
              <th class="product-price">Total</th>
              <th class="product-price">Vendedor</th>
              <th class="product-price">Contacto</th>
              <th class="product-price">Estado</th>
              <th class="product-price">Calificacion Vendedor</th>              
            </tr>
          </thead>
          <tbody>
          @forelse($purchases as $order)
            <tr class="cart_table_item">
                <td class="product-price">{{ $order->id }}</td>

                @foreach($order->items as $item)

                <td class="product-name"><a href="/products/detail/{{ $item->product->id }}">{{ $item->product->name }}</a></td>
                <td class="product-price">${{ $item->product->price }}</td>
                <td class="product-price">{{ $item->quantity }}</td>
                <td class="product-price">${{ $item->subtotal }}</td>
                    @if($order->customer_ok == 1)
                        @if(isset($order->qualifyProducts()->first()->product_id) &&
                        $order->qualifyProducts()->first()->product_id == $item->product->id)
                <td class="product-price">Ya calificaste</td>
                        @else
                <td class="product-price"><a class="btn btn-success" href="/qualifications/product/{{ $order->id }}">Calificar Producto</a></td>
                        @endif
                    @endif
                @endforeach
                <td class="product-price">${{ $order->total }}</td>
                <td class="product-price"><a href="/users/profile/{{ $order->seller->id }}">{{ $order->seller->name }}</a></td>
                <td class="product-price">{{ $order->seller->email }}</td>
                @if($order->customer_ok == 0)
                <td class="product-price"><a class="btn btn-xs btn-warning" href="/orders/customerOK/{{ $order->id }}">Confirmar Entrega</a></td>
                @else
                <td class="product-price">Compra Recibida</td>
                @if(isset($order->qualifySeller) && $order->qualifySeller->user_id == Auth::user()->id )
                <td class="product-price">Ya calificaste al vendedor</td> 
                @else
                <td class="product-price"><a class="btn btn-xs btn-success" href="/qualifications/seller/{{ $order->id }}">Calificar Vendedor</a></td>
                @endif
                @endif
                </tr>
                

            @empty
            <h4>No has realizado compras.</h4>
            
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
</div> -->
@endsection