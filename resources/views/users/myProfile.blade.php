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
        <div class="col-md-12">
          <div class="container">
            <div class="row">
              <div class="col-sm-3">

              <h3 id="logo"><span class="light">Mi</span> Perfil</h3>

              <hr class="sidebar-divider">
               
                  <ul class="nav  nav-sidebar-menu">
                    <li class="active"><a class="sidebar-menu__links" href="#headings">Mi Perfil</a></li>
                    <li><a href="/orders/purchases">Mis Compras</a></li>
                    <li><a href="/orders/sales">Mis Ventas</a></li>
                    <li><a href="/products/myList">Mis Productos</a></li>
                  </ul>
               
              </div>
              <div class="col-xs-12  col-sm-9">
                <h3 id="headings"><span class="light">Datos</span></h3>

                <hr class="title__divider">

                <div class="panel-heading"> </div>
                  <div class="row">
                      <div class="col-md-5">
                        <div class="profile-sidebar">
                          <h2 style="text-align:center;">{{  $user->name  }} {{  $user->lastname  }}</h2>
                          <div class="profile-userpic">
                            <img id="user_img" class="img-circle" src="/{{  $user->avatar  }}" style="margin-left: 35%;width: 30%;" />
                          </div>
                            <h5>E-Mail: {{  $user->email  }}</h5>
                            <p><b>Barrio:</b> {{  $user->city->name  }}</p>
                            <p><b>Perfil:</b> {{  $user->type->name  }}</p>
                            <a class="btn btn-primary pull right" href="/users/update">Editar</a>

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
                      </div>
                    </div>
              </div>

            </div>
          </div>
        </div>
      </div>
  </div>
</div>

 
<!--             <div class="panel panel-default">

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
 -->@endsection
