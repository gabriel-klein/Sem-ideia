@extends('layouts.app')

@section('content')
		<div class="row">
			<div class="col s6 m3">  
				@filtroCliente
			</div>
			<div class="col s12 m10 offset-m1 l6">
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
	<div class="row justify-content center">
			{{ $clientes->onEachSide(2)->links() }}
	</div>
	<div class="fixed-action-btn">
		<a class="btn-floating btn-large blue pulse showFilter" id="lista">
				<i class="large material-icons">filter_list</i>
		</a>
	</div>
@endsection