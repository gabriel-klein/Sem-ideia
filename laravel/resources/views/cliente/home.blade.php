<div class="container">
	<div class="row">
		<div class="col s12 m10 offset-m1 l8 offset-l2">
			<div class="collection with-header">
				<div class="collection-header"><h4>Novas Vagas</h4></div>
				@forelse ($vagas as $vaga)
					@include('layouts.components.vagaCollectionItem', ['vaga' => $vaga])
				@empty
					<div class="collection-item">
						Não há novas vagas
					</div>
				@endforelse
			</div>
		</div>
	</div>
	<div class="row justify-content center">
			{{ $vagas->onEachSide(2)->links() }}
	</div>
</div>
