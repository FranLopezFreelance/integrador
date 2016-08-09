@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<h1>Vendedores Registrados</h1>

			@if(!Auth::user())
				<h4><a href="/login">Logueate</a> para poder Seguir usuarios y enterarte de todas sus novedades!</h4>
			@endif

			<hr />
			@forelse($users as $user)
				@if(!Auth::user() || $user->id != Auth::user()->id)
					<div class="col-md-3">
						<img width="100" class="img-circle" src="/{{ $user->avatar }}" />
						<h4><a href="/users/profile/{{ $user->id }}">{{ $user->name }}</a></h4>
						<p>Localidad: {{ $user->city->name }} </p>

							@if(Auth::user())
							<p>Seguidores: <span class="followers_{{ $user->id }}">{{ $user->followers->count() }}</span></p>
								<h4 class="unFollowButton
									@if(!$following->contains($user->id))
										button-hidden
									@endif
								"><a class="btn btn-warning" onclick="unfollow({{ $user->id }})">Dejar de seguir</a></h4>

								<h4 class="followButton
									@if($following->contains($user->id))
										button-hidden"
									@endif
									"><a class="btn btn-primary" onclick="follow({{ $user->id }})">Seguir</a></h4>
							@endif

						<hr />
					</div>
				@endif

			@empty
				<h3>No hay Vendedores registrados.</h3>
			@endforelse
		</div>

			<hr />

			{{ $users->links() }}
	</div>
</div>

<script>
    function follow( id) {
        $.get( "/users/follow/" + id );
    }
</script>
@endsection