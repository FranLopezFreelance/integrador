@extends('layouts.master')

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

                        <hr />

                        <div class="row">
                            <h3>Calificaciones</h3>
                            <div class="col-md-6">
                                <h4><a href="">Calificaciones como Vendedor:
                                {{ $user->qualifySeller()->count() }}</a></h4>
                            </div>
                            <div class="col-md-6">
                                <h4><a href="">Calificaciones como Comprador:
                                {{ $user->qualifyCustomer()->count() }}</a></h4>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
