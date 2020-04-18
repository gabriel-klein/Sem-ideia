<div class="container">
	<div class="row">
		<div class="col s12 m8 offset-m2">
			<div class="collection with-header">
				<div class="collection-header"><h4>Novas Vagas</h4></div>
				@forelse ($vagas as $vaga)
					<a href="{{ route('vagas.show', $vaga->id) }}" class="collection-item avatar black-text" data-remote="true">
						<i class="material-icons circle blue">work</i>
						<span class="title">{{ $vaga->funcao }}</span>
						<p class="grey-text text-darken-1">
							{{ (strlen($vaga->descricao) > 90) ? substr($vaga->descricao,0, 87).'...' : $vaga->descricao }}
						</p>
						<div class="right-align">
							<i class="material-icons" style="vertical-align: middle">access_time</i>
							{{ $vaga->tempo }}
						</div>
					</a>
				@empty
					<div class="collection-item">
						Não há novas vagas
					</div>
				@endforelse
			</div>
		</div>
	</div>
</div>