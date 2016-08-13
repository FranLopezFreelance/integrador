@extends('users.myProfile')

@section('view-profile')
<div class="col-xs-12  col-sm-9">
  <h3 id="headings"><span class="light">Usuarios que sigo</span></h3>

  <hr class="title__divider">

  <div class="panel-heading"> </div>
      <div class="row">

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
				<h4>Aún no sigues a ningún Usuario</h4>

				<hr />

				<h4>Busca algún usuario que seguir y te entererás cuando suba Nuevos Productos. <a href="/users/sellersList">Ver Usuarios</a></h4>
			@endforelse

       </div>
  </div>
</div>
@endsection