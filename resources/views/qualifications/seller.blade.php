@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Calificar Vendedor [Orden N°: {{ $order->id }}]</div>

				<div class="col-md-12">

	                <h4>¿Qué te pereció el Vendedor?</h4>

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

	                <hr />

					<div class="form-group">

                            <button type="submit" class="btn btn-success">
                                Calificar
                            </button>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection