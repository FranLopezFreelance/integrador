@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<h1>Usuarios que te siguen</h1>
			<hr />
			@forelse($users as $user)
				@if($user->id != Auth::user()->id)
					<div class="col-md-3">
						<img width="100" class="img-circle" src="/{{ $user->avatar }}" />
						<h4><a href="/users/profile/{{ $user->id }}">{{ $user->name }}</a></h4>
						<p>Localidad: {{ $user->city->name }} </p>
						<hr />
					</div>
				@endif
			@empty
				<h3>Aún no te sigue ningún Usuario</h3>
			@endforelse
		</div>
	</div>
</div>
@endsection