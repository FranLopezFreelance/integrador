@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<h1>Vendedores Registrados</h1>
			<hr />
			@forelse($users as $user)
				@if($user->id != Auth::user()->id)
					<div class="col-md-2	">
						<img width="100" class="img-circle" src="/{{ $user->avatar }}" />
						<h4><a href="/users/profile/{{ $user->id }}">{{ $user->name }}</a></h4>
						<p>Localidad: {{ $user->city->name }} </p>
							@if($following->contains($user->id))
								<h4>Siguiendo</h4>
							@else
								<h4><a class="btn btn-primary" href="/users/follow/{{ $user->id }}">Seguir</a></h4>
							@endif
						<hr />
					</div>
				@endif
			@empty
				<h3>Aún no sigues a ningún Usario</h3>
			@endforelse
		</div>
	</div>
</div>
@endsection