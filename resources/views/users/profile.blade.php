@extends('layouts.master')

@section('content')
  <div class="container">
    <div class="row">
     <div class="col-xs-12">

       <div class="panel-heading"> </div>
         <div class="row">
           <div class="col-md-6">
            <div class="profile-sidebar">
             <h2 style="text-align:center;">{{  $user->name  }} {{  $user->lastname  }}</h2>

              <div class="row">
                <div class="col-md-4 col-md-offset-4">

                  <img class="img-circle user-image" width="150"
                              @if($user->avatar == 'images/users/default.png')

                                  src="/{{ $user->avatar }}" />

                              @else
                                  src="{{ route('user.image', ['name' => $user->avatar]) }}" />

                              @endif

                  </div>
              </div>

                <div class="profile-data">
                  <p class="p-profile"><b>E-Mail:</b> {{ $user->email }}</p>
                  <p class="p-profile"><b>Barrio:</b> {{ $user->city->name }}</p>
                  <p class="p-profile"><b>Perfil:</b> {{ $user->type->name }}</p>
                  <p class="p-profile"><b><a href="/products/list/user/{{ $user->id }}">Productos Publicados:</b></a> {{ $user->products()->count() }}</p>
                  <p class="p-profile"><b>Productos Vendidos:</b> {{ $user->sales()->count() }}</p>
                </div>

                <div class="profile-userbuttons">

                  @if(!Auth::guest())
                    <a class="btn unFollowButton btn-danger btn-sm
                      @if(!$user->following->contains($user->id))
                        button-hidden
                      @endif
                    " onclick="unfollow({{ $user->id }})">
                      No seguir
                    </a>
                    <a class="btn followButton btn-success btn-sm
                      @if($user->following->contains($user->id))
                        button-hidden
                      @endif"
                      onclick="follow({{ $user->id }})">
                        Seguir
                    </a>
                  @endif

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
                      <p class="quali"><b>{{ $qualification->quality->name }}</b></p>
                        <p class="comment-quali">{{ $qualification->comment }}</p>
                        <p class="data-quali">
                            <img class="img-circle" width="40"
                                @if($qualification->user->avatar == 'images/users/default.png')

                                    src="/{{ $qualification->user->avatar }}" />

                                @else
                                    src="{{ route('user.image', ['name' => $qualification->user->avatar]) }}" />

                                @endif
                          <a href="/users/profile/{{ $qualification->user->id }}">{{ $qualification->user->name }} {{ $qualification->user->lastname }}</a>
                         {{ date('F d, Y', strtotime($qualification->created_at)) }}</p>
                         <hr class="divider" />
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
                        <p class="quali"><b>{{ $qualification->quality->name }}</b></p>
                        <p class="comment-quali">{{ $qualification->comment }}</p>
                        <p class="data-quali">
                            <img class="img-circle" width="40"
                                @if($qualification->user->avatar == 'images/users/default.png')

                                    src="/{{ $qualification->user->avatar }}" />

                                @else
                                    src="{{ route('user.image', ['name' => $qualification->user->avatar]) }}" />

                                @endif
                          <a href="/users/profile/{{ $qualification->user->id }}">{{ $qualification->user->name }} {{ $qualification->user->lastname }}</a>
                         {{ date('F d, Y', strtotime($qualification->created_at)) }}</p>
                         <hr class="divider" />
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
    </div>
  </div>
@endsection
