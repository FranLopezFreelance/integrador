@extends('users.myProfile')

@section('view-profile')
<div class="col-xs-12  col-sm-9">
  <h3 id="headings"><span class="light">Notificaciones</span></h3>

  <hr class="title__divider">

  <div class="panel-heading"> </div>
      <div class="row">

    <div class="col-xs-12  col-sm-12">

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
</div>
@endsection