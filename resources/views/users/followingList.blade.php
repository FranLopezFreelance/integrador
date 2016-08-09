@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<h1>Usuarios a los que sigues</h1>
			<hr />
			@forelse($users as $user)
				@if($user->id != Auth::user()->id)
					<div class="col-md-3">
						<img width="100" class="img-circle" src="/{{ $user->avatar }}" />
						<h4><a href="/users/profile/{{ $user->id }}">{{ $user->name }}</a></h4>
						<p>Localidad: {{ $user->city->name }} </p>
						<h4><a class="btn btn-warning" href="/users/unfollow/{{ $user->id }}">Dejar de seguir</a></h4>
						<hr />
					</div>
				@endif
			@empty
				<h3>Aún no sigues a ningún Usuario</h3>

				<hr />

				<h4>Busca algún usuario que seguir y te entererás cuando suba nuevos productos. <a href="/users/sellersList">Ver Usuarios</a></h4>
			@endforelse
		</div>
	</div>
</div>
@endsection