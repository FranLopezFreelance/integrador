@extends('layouts.master')

@section('content')
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">

            <li><a href="/">Home</a></li>

            <li class="active">Mi Perfil</li>

          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="container">
            <div class="row">
              <div class="col-sm-3">

              <h3 id="logo"><span class="light">Mi</span> Perfil ({{ Auth::user()->type->name }})</h3>

              <hr class="sidebar-divider">

                  <ul class="nav  nav-sidebar-menu">
                    <li><a href="/users/myProfile">Datos</a></li>
                    @if(Auth::user()->type_id == 2)
                      <li><a href="/products/myList">Mis Productos</a></li>
                    @endif
                    <li><a href="/orders/purchases">Mis Compras</a></li>
                    @if(Auth::user()->type_id == 2)
                      <li><a href="/orders/sales">Mis Ventas</a></li>
                      <li><a href="/users/followersList">Usuarios que me siguen</a></li>
                    @endif
                    <li><a href="/users/followingList">Usuarios que sigo</a></li>
                    <li><a href="/notifications/list">Mis Notificaciones</a></li>
                  </ul>

              </div>

              @yield('view-profile')

              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

@endsection
