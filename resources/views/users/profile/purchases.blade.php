@extends('users.myProfile')

@section('view-profile')
<div class="col-xs-12  col-sm-9">
  <h3 id="headings"><span class="light">Compras</span></h3>

  <hr class="title__divider">

  <div class="panel-heading"> </div>
      <div class="row">

      <div class="col-xs-12  push-down-30">

        @if (Session::get('msg'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('msg') }}
                </div>
        @endif


        <table class="shop-table  shop-cart">
          <thead>
            <tr class="cart_table_title">
              <th class="product-price">Nro. Orden</th>
              <th class="product-price">Vendedor</th>
              <th class="product-price">Total</th>
              <th class="product-price">Estado</th>
              <th class="product-price">Calificación</th>
            </tr>
          </thead>
          <tbody>
          @forelse($purchases as $order)
            <tr class="cart_table_item">
                <td class="product-price">1005{{ $order->id }}</td>
                <td class="product-price"><a title="Contacto: {{ $order->seller->email }}" href="/users/profile/{{ $order->seller->id }}">{{ $order->seller->name }} {{ $order->seller->lastname }}</a></td>
                <td class="product-price">${{ $order->total }}</td>
                @if($order->customer_ok == 0)
                <td class="product-price"><a class="btn btn-xs btn-warning" href="/orders/customerOK/{{ $order->id }}">Confirmar Entrega</a></td>
                @else
                <td class="product-price">Compra Recibida</td>
                @if(isset($order->qualifySeller) && $order->qualifySeller->user_id == Auth::user()->id )
                <td class="product-price">Ya calificaste al vendedor</td>
                @else
                <td class="product-price"><a class="btn btn-xs btn-success" href="/qualifications/seller/{{ $order->id }}">Calificar</a></td>
                @endif
                @endif
                </tr>

            @empty

            <h4>No has realizado compras. Hecha un vistazo a los <a href="/products/list">Productos Publicados</a></h4>

            @endforelse

        </tbody>
       </table>
      </div>

       </div>
  </div>
</div>
@endsection