@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        	@forelse($notifications as $notification)
        		{{ dd($notification) }}
        	@empty
        		<h4>No tienes nuevas notificaciones</h4>
        	@endforelse
        </div>
    </div>
</div>
@endsection