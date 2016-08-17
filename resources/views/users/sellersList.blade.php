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

        <div class="col-xs-9  col-sm-3">


      <aside class="sidebar  sidebar--shop">
      <h3 class="sidebar__title"><span class="light">Vendedores</span> Registrados</h3>
          <hr class="shop__divider">
            <div class="shop-filter">
              <h5 class="sidebar__subtitle open">Filtrar por Barrio</h5>
                <div id="categorias" style="display:none;">
                  <ul class="nav  nav--filter">
            @foreach($users as $user)
                      <li><a data-target=".{{ $user->city_id }}" class="js--filter-selectable" href="#">{{ $user->city->name }}</a></li>
            @endforeach
                      </ul>
                </div>

              	<hr class="divider">

             </div>
      </aside>

    </div>

        <div class="col-md-9 col-sm-9"">

			@if(Auth::guest())
				<h4><a href="/login">Logueate</a> para poder Seguir usuarios y enterarte de todas sus novedades!</h4>
			@endif

		<div class="row  js--isotope-container">
			@forelse($users as $user)
				@if(!Auth::user() || $user->id != Auth::user()->id)
					<div class="col-md-4 js--isotope-target {{ $user->city->id }}">
					  <div class="products__single">
						<div class="profile-sidebar">
						<!-- SIDEBAR USERPIC -->
						<div class="profile-userpic">
							@if($user->avatar == 'images/users/default.png')

		                        <img class="img-responsive" width="120" src="/{{ $user->avatar }}" />

		                     @else

		                        <img class="img-responsive" width="120"
		                          src="{{ route('user.image', ['name' => $user->avatar]) }}"
		                        />

		                     @endif
						</div>
						<!-- END SIDEBAR USERPIC -->

						<!-- SIDEBAR USER TITLE -->
						<div class="profile-usertitle">
							<div class="profile-usertitle-name">
								{{ $user->name }} {{ $user->lastname }}
							</div>
							<div class="profile-usertitle-job">
								{{ $user->city->name }}
						@if(!Auth::guest())
							<p>Seguidores: <span class="followers_{{ $user->id }}">{{ $user->followers->count() }}</span></p>
							</div>
						</div>
						<div class="profile-userbuttons">
								<a class="btn unFollowButton btn-danger btn-sm
									@if(!$following->contains($user->id))
										button-hidden
									@endif
								" onclick="unfollow({{ $user->id }})">
									No seguir
								</a>
								<a class="btn followButton btn-success btn-sm
									@if($following->contains($user->id))
										button-hidden
									@endif"
									onclick="follow({{ $user->id }})">
										Seguir
								</a>
						@endif
							<a class="btn btn-info btn-sm" href="/users/profile/{{ $user->id }}">Ver Perfil</a>
						</div>
					</div>
				  </div>
				</div>
				@endif

			@empty
				<h3>No hay Vendedores registrados.</h3>
			@endforelse
			<div class="clearfix  hidden-xs"></div>
        </div>
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