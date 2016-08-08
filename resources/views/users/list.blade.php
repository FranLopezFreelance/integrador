@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<h1>Usuarios Vendedores Registrados</h1>
			<hr />
			@forelse($users as $user)
				<div class="col-md-3	">
					<img with="100" src="/{{ $user->avatar }}" />
					<h4><a href="/users/profile/{{ $user->id }}">{{ $user->name }}</a></h4>
					<p>Localidad: {{ $user->city->name }} </p>
					<h4><a class="btn btn-primary" onclick="follow({{ $user->id }})">Seguir</a></h4>
					<hr />
				</div>
			@empty
				<h3>Aún no sigues a ningún Usario</h3>
			@endforelse

			<hr />

			{{ !! $users->render() !! }}
		</div>
	</div>
</div>

<script>
    function follow( id) {
        $.get( "/users/follow/" + id );
    }
</script>
@endsection