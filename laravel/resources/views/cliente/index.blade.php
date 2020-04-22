@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12 m10 offset-m1 l8 offset-l2">
				<div class="collection">
					@forelse ($clientes as $cliente)
						@include('layouts.components.cliente', ['cliente' => $cliente])
					@empty
						<div class="collection-item">Não há pessoas cadastradas</div>
					@endforelse
				</div>
			</div>
		</div>
	</div>
@endsection