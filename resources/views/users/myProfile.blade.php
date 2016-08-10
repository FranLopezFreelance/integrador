@extends('layouts.master')

@section('content')
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">
            
            <li><a href="/">Home</a></li>
            
            <li class="active">Mi Perfil</li>
            
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
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

                        <p><a class="btn btn-primary" href="/users/update">Editar</a></p>

                        <hr />

                        <div class="row">
                            <h5>Calificaciones</h5>
                            <hr />
                            <div class="col-md-6">
                                <h4><a href="">como Vendedor:
                                {{ $user->qualifySeller()->count() }}</a></h4>
                            </div>
                            <div class="col-md-6">
                                <h4><a href="">como Comprador:
                                {{ $user->qualifyCustomer()->count() }}</a></h4>
                            </div>
                        </div>

                        <hr />

                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>

<br>
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12 lead">User profile<hr></div>
          </div>
          <div class="row">
            <div class="col-md-4 text-center">
              <img class="img-circle avatar avatar-original" style="-webkit-user-select:none; 
              display:block; margin:auto;" src="http://robohash.org/sitsequiquia.png?size=120x120">
            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-12">
                  <h1 class="only-bottom-margin">User Name</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <span class="text-muted">Email:</span> email@test.com<br>
                  <span class="text-muted">Birth date:</span> 01.01.2001<br>
                  <span class="text-muted">Gender:</span> male<br><br>
                  <small class="text-muted">Created: 01.01.2015</small>
                </div>
                <div class="col-md-6">
                  <div class="activity-mini">
                    <i class="glyphicon glyphicon-comment text-muted"></i> 500
                  </div>
                  <div class="activity-mini">
                    <i class="glyphicon glyphicon-thumbs-up text-muted"></i> 1500
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <hr><button class="btn btn-default pull-right"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
