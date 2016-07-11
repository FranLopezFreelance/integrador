@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Perfil de Usuario [{{ $user->type->name }}] </div>

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <img id="user_img" class="img-circle" width="100" src="/{{  $user->avatar  }}" />

                        <p><b>Nombre:</b> {{  $user->name  }}</p>
                        <p><b>Apellido:</b> {{  $user->lastname  }}</p>
                        <p><b>E-Mail:</b> {{  $user->email  }}</p>
                        <p><b>Barrio:</b> {{  $user->city->name  }}</p>
                        <p><b>Perfil:</b> {{  $user->type->name  }}</p>

                        <p><a href="/users/update/{{ $user->id }}">Editar</a></p>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
