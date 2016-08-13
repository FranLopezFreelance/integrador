@extends('users.myProfile')

@section('view-profile')
<div class="col-xs-12  col-sm-9">
  <h3 id="headings"><span class="light">Ventas</span></h3>

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
              <th class="product-price">Comprador</th>
              <th class="product-price">Total</th>
              <th class="product-price">Estado</th>
              <th class="product-price">Calificación</th>
            </tr>
          </thead>
          <tbody>
          @forelse($sales as $order)
            <tr class="cart_table_item">
                <td class="product-price"><a href="/orders/detail/{{ $order->id }} ">1005{{ $order->id }}</a></td>

                @foreach($order->items as $item)
				<td class="product-price"><b><a title="Contacto: {{ $order->customer->email }}" href="/users/profile/{{ $order->customer->id }}">{{ $order->customer->name }} {{ $order->customer->lastname }}</a></b></td>
                <td class="product-price">${{ $item->subtotal }}</td>

                @endforeach

                    @if($order->seller_ok == 0)
                    <td class="product-price"><a class="btn btn-warning" href="/orders/sellerOK/{{ $order->id }}">Confirmar Entrega</a></td>
                    <td></td>
                    @else
                    <td class="product-price">Compra Entregada</td>

                        @if(isset($order->qualifyCustomer) && $order->qualifyCustomer->user_id == Auth::user()->id )
                        <td class="product-price">Calificado</td>
                            @else
                            <td class="product-price"><a class="btn btn-xs btn-success" href="/qualifications/customer/{{ $order->id }}">Calificar</a></td>
                        @endif
                    @endif


            @empty

            @if(Auth::user()->type_id == 1)
              <h4>No tienes perfil de Vendedor. Cambialo haciendo
                <a href="/users/changeType">click aquí,</a></h4>
            @else

              @if(Auth::user()->products()->count() == 0)
                <h4>No has realizado Ventas ya que aún no tienes cargado ningún Producto. <a href="/products/create">Carga el Primero!</a></h4>
              @else
                <h4 style="color:red">No has realizado Ventas. Deberías ver qué estás haciendo mal...</h4>
              @endif
            @endif

            @endforelse

        </tbody>
       </table>
      </div>
    </div>
  </div>
</div>

       </div>
  </div>
</div>
@endsection