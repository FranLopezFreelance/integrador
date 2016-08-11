@extends('layouts.master')

@section('content')
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">
            
            <li><a href="/">Home</a></li>
            
            <li class="active">Vendedores</li>
            
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>



<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-3"">
        	<div class="products-navigation  push-down-15">
        		<div class="products-navigation__title">
        			<h3><span class="light">Vendedores</span> Registrados</h3>
				</div>
			</div>

			@if(!Auth::user())
				<h4><a href="/login">Logueate</a> para poder Seguir usuarios y enterarte de todas sus novedades!</h4>
			@endif

	
			@forelse($users as $user)
				@if(!Auth::user() || $user->id != Auth::user()->id)
			<div class="col-md-3">
				<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img width="200" class="img-responsive" alt="" src="/{{ $user->avatar }}" />
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{ $user->name }} {{ $user->lastname }}
					</div>
					<div class="profile-usertitle-job">
						{{ $user->city->name }}
				@if(Auth::user())
					<p>Seguidores: <span class="followers_{{ $user->id }}">{{ $user->followers->count() }}</span></p>
					</div>
				</div>
				<div class="profile-userbuttons">
					<button type="button" class="unFollowButton @if(!$following->contains($user->id)) button-hidden @endif">
						<a class="btn btn-danger btn-sm" onclick="unfollow({{ $user->id }})">No seguir</a></button>

					<button type="button" class="followButton @if($following->contains($user->id))button-hidden @endif">
						<a class="btn btn-success btn-sm" onclick="follow({{ $user->id }})">Seguir</a></button>
				@endif
					<a class="btn btn-info btn-sm" href="/users/profile/{{ $user->id }}">Ver Perfil</a>
				</div>
			</div>
		</div>
				@endif

			@empty
				<h3>No hay Vendedores registrados.</h3>
			@endforelse
		</div>

			<hr />
			<div style="text-align: center">
			{{ $users->links() }}
			</div>
	</div>
</div>
</div>


<script>
    function follow( id) {
        $.get( "/users/follow/" + id );
    }
</script>
@endsection