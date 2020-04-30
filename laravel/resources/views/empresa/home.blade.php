<div class="container">
	<div class="row">
		<div class="col s12 m10 offset-m1 l8 offset-l2">
			<div class="collection with-header">
				<div class="collection-header"><h4>Novos Currículos</h4></div>
				@forelse ($clientes as $cliente)
					@include('layouts.components.cliente', ['cliente' => $cliente])
				@empty
					<div class="collection-item">
						Não há novos currículos
					</div>
				@endforelse
			</div>
		</div>
	</div>
	<div class="row justify-content center">
			{{ $clientes->onEachSide(2)->links() }}
	</div>
</div>
