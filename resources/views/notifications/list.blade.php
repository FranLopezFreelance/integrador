@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-3  hidden-xss">
    <h3 id="logo"><span class="light">Mis</span> Notificaciones</h3>
    <hr class="sidebar-divider">
      <div class="features-menu  js--affix-menu">
        <ul class="nav  nav-sidebar-menu">
          <li class="active"><a class="sidebar-menu__links" href="#headings">Principal</a></li>
          <li><a href="#compras">Compras</a></li>
          <li><a href="#ventas">Ventas</a></li>
          <li><a href="#seguidores">Seguidores</a></li>
          <li><a href="#seguidos">Seguidos</a></li>
        </ul>
      </div>
    </div>
    <div class="col-xs-12  col-sm-9">
      <h3 id="headings"><span class="light">.</span> </h3>
      	<hr class="title__divider">
      		@forelse($notifications as $notification)
        		{{ $notification }}
        	@empty
        		<h4>No tienes nuevas notificaciones</h4>
        	@endforelse

    <hr class="divider">

	<hr class="divider">

		</div>
	</div>
</div>
        	
        
@endsection