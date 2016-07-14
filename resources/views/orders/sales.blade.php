@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

        	@if (Session::get('msg'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('msg') }}
                </div>
            @endif

            @foreach($sales as $order)
				<li> {{ $order->id }} </li>
            @endforeach

		</div>
	</div>
</div>
@endsection