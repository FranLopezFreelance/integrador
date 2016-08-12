@extends('users.myProfile')

@section('view-profile')
<div class="col-xs-12  col-sm-9">
  <h3 id="headings"><span class="light">Datos</span></h3>

  <hr class="title__divider">

    <div class="panel-heading"> </div>
      <div class="row">
        <div class="col-md-6">
          <div class="profile-sidebar">
            <h2 style="text-align:center;">{{  $user->name  }} {{  $user->lastname  }}</h2>

              <div class="row">
                <div class="col-md-4 col-md-offset-4">

                  <img class="img-circle user-image" width="150" src="/{{ $user->avatar }}" />

                  </div>
              </div>

                <div class="profile-data">
                  <p class="p-profile"><b>E-Mail:</b> {{  $user->email  }}</p>
                  <p class="p-profile"><b>Barrio:</b> {{  $user->city->name  }}</p>
                  <p class="p-profile"><b>Perfil:</b> {{  $user->type->name  }}</p>
                  <a class="btn btn-primary pull right" href="/users/update">Editar</a>
                </div>

                <hr class="divider" />
            </div>
          </div>
          <div class="col-md-6">

            <div class="row">
              <div class="col-xs-12">
                <!-- Nav tabs -->
                <h4>Calificaciones
                  <img src="/images/icons/califications.jpg" width="60" />
                </h4>
                <ul class="nav  nav-tabs">
                  <li class="active">
                    <a href="#seller" data-toggle="tab">
                      Como Vendedor ({{ $user->qualifySeller()->count() }})
                    </a>
                  </li>
                  <li>
                    <a href="#customer" data-toggle="tab">
                      Como Comprador ({{ $user->qualifyCustomer()->count() }})
                    </a>
                  </li>
                </ul>


                <div class="tab-content">

                <div class="tab-pane  fade  in  active" id="seller">
                  <div class="row">
                    <div class="col-md-12">
                    @forelse($user->qualifySeller as $qualification)
                    @empty
                      <h5>Aún no fue calificado como Vendedor</h5>
                    @endif
                    </div>
                  </div>
                </div>
                <div class="tab-pane  fade" id="customer">
                  <div class="row">
                    <div class="col-md-12">
                      @forelse($user->qualifyCustomer as $qualification)
                      @empty
                        <h5>Aún no fue calificado como Comprador</h5>
                      @endif
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