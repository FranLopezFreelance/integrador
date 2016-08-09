@extends('layouts.master')

@section('content')

<div class="woocommerce  push-down-30">
  <div class="container">
    <div class="row">
      <div class="col-xs-12  push-down-30">
        <h3>Orden de Compra</h3>
        <hr>
        <table class="shop-table  shop-cart">
          <thead>
            <tr class="cart_table_title">
              <th class="product-remove">Eliminar</th>
              <th class="product-thumbnail"></th>
              <th class="product-name">Producto</th>
              <th class="product-price">Vendedor</th>
              <th class="product-price">Precio</th>
              <th class="product-quantity">Cantidad</th>
              <th class="product-subtotal">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr class="cart_table_item">
              <td class="product-remove"><span class="glyphicon  glyphicon-remove"></span></td>
              <td class="product-thumbnail"><img src="/{{ $product->image }}"/ width="50" height="50"></td>
              <td class="product-name"><a href="/products/detail/{{ $product->id }}">{{ $product->name }}</a></td>
              <td class="product-price">{{ $product->user->name }} {{ $product->user->lastname }}</td>
              <td class="product-price">${{ $product->price }}</td>
              <td class="product-quantity">
                <div class="quantity  js--quantity">
                  <input type="button" value="-" class="quantity__button  js--minus-one  js--clickable">
                  <input type="text" name="quantity" value="1" class="quantity__input">
                  <input type="button" value="+" class="quantity__button  js--plus-one  js--clickable"> <span>Disponibles {{ $product->quantity }}</span>
                </div>
              </td>
              <td class="product-subtotal">${{ $product->price }}</td>
            </tr>

            <tr class="cart_table_action">
              <td colspan="8" class="actions">
                <div class="col-xs-6">
                  <div class="coupon">
                    <input name="coupon_code" class="input-text">
                    <a href="#" class="btn  btn-warning">Cupón de Promoción</a>
                  </div>
                </div>
                <div class="col-xs-6">
                  <a href="#" class="btn  btn-primary  pull-right">Confirmar Compra</a>
                  <a href="#" class="btn  btn-warning  pull-right">Actualizar Carrito</a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    <div class="col-xs-12 col-sm-6">
      </div>
      <div class="col-xs-12 col-sm-6" class="text-right">
      <!-- Your order - table -->
        <h3  class="pull-right"><span class="light">Cart</span> Totals</h3>
        <table class="shop_table  push-down-30">
          <tfoot>
            <tr class="cart-subtotal">
              <th>Cart Subtotal</th>
              <td><span class="amount">${{ $product->price }}</span></td>
            </tr>
            <tr class="shipping">
              <th>Shipping</th>
              <td>Free Shipping</td>
            </tr>
            <tr class="total">
              <th><strong>Order Total</strong></th>
              <td>
                <strong><span class="amount">${{ $product->price }}</span></strong>
              </td>
            </tr>
          </tfoot>
        </table>
        </div>
    </div>
</div>
</div>

@endsection