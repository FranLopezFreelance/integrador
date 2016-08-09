@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<h1>Vendedores Registrados</h1>
			<hr />
			@forelse($users as $user)
				@if($user->id != Auth::user()->id)
					<div class="col-md-3">
						<img width="100" class="img-circle" src="/{{ $user->avatar }}" />
						<h4><a href="/users/profile/{{ $user->id }}">{{ $user->name }}</a></h4>
						<p>Localidad: {{ $user->city->name }} </p>
						<p>Seguidores: {{ $user->followers->count() }}</p>
							@if($following->contains($user->id))
								<h4><a class="btn btn-warning" href="/users/unfollow/{{ $user->id }}">Dejar de seguir</a></h4>
							@else
								<h4><a class="btn btn-primary" onclick="follow({{ $user->id }})">Seguir</a></h4>
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