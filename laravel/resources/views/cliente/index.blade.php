@extends('layouts.app')

@section('content')
		<div class="">  
			@filtroCliente
		</div>
		<div class="row colecao">
			<div class="col s12 m10 offset-m1 l6 offset-l3">
				<div class="collection">
					@forelse ($clientes as $cliente)
						@include('layouts.components.cliente', ['rota' => 'cliente.show'])
					@empty
						<div class="collection-item">Não há pessoas cadastradas</div>
					@endforelse
				</div>
			</div>
		</div>

	<div class="row justify-content center colecao">
			{{ $clientes->onEachSide(2)->links() }}
	</div>
	
	<div class="fixed-action-btn">
		<a class="btn-floating btn-large blue pulse showFilter" id="lista">
				<i class="large material-icons">filter_list</i>
		</a>
	</div>
@endsection