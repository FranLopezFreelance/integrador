@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-3  hidden-xss">
    <h3 id="logo"><span class="light">Mis</span> Notificaciones</h3>
    <hr class="sidebar-divider">
      <div class="features-menu  js--affix-menu">

      </div>
    </div>
    <div class="col-xs-12  col-sm-9">
      <h3 id="headings"><span class="light">.</span> </h3>
      	<hr class="title__divider">

        <table class="table">
      		@forelse($notifications as $notification)
        		<tr
              @if($notification->status_id == 1)
                  class="notified"
              @else
                  class="notNotified"
              @endif
            >
              <td>
                <b>{{ $notification->userEvent->name }}</b>
                <a href="{{ $notification->url }}/{{ $notification->id }}">{{ $notification->event->name }}</a> -
                {{ $notification->created_at }}
              </td>
            </tr>
        	@empty
        		<h4>No tienes nuevas notificaciones</h4>
        	@endforelse
        </table>

        <br />

        {{ $notifications->links() }}

	<hr class="divider">

		</div>
	</div>
</div>


@endsection