@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Calificar Producto [Orden N°: {{ $order->id }}]</div>

                <div class="col-md-12">

	                <h4>¿Qué te pereció el Producto?</h4>

	                <form method="post" action="/qualifications/product/{{ $order->id }}">

						{{ csrf_field() }}

	                	@foreach($qualities as $quality)
	                		<div class="radio">
							  <label>
							    <input type="radio" name="quality_id" id="quality_id" value="{{ $quality->id }}">
							    {{ $quality->name }}
							  </label>
							</div>
	                	@endforeach

	                	<hr />

	                <h4>Deja un comentario</h4>

	                <textarea class="form-control" name="comment" rows="3"></textarea>

	                <input type="hidden" name="product_id" value="" />

	                <hr />

					<div class="form-group">

                            <button type="submit" class="btn btn-success">
                                Calificar
                            </button>
                    </div>

                    </form>

				</div>
            </div>
        </div>
    </div>
</div>
@endsection