@extends('users.myProfile')

@section('view-profile')
<div class="col-xs-12  col-sm-9">
  <h3 id="headings"><span class="light">Usuarios que me siguen</span></h3>

  <hr class="title__divider">

  <div class="panel-heading"> </div>
      <div class="row">

			@forelse($users as $user)
				@if($user->id != Auth::user()->id)
					<div class="col-md-3">
						<img width="100" class="img-circle"
							@if($user->avatar == 'images/users/default.png')

                            	src="/{{ $user->avatar }}" />

	                        @else
	                            src="{{ route('user.image', ['name' => $user->avatar]) }}" />

	                        @endif

						<h4><a href="/users/profile/{{ $user->id }}">{{ $user->name }}</a></h4>
						<p>Localidad: {{ $user->city->name }} </p>
						<hr />
					</div>
				@endif
			@empty

				<h4>Aún no te sigue ningún Usuario</h4>

				<hr />

				<h4><a href="/products/create">Publica más productos</a> para que tus usuarios te sigan.</h4>
			@endforelse

       </div>
  </div>
</div>
@endsection