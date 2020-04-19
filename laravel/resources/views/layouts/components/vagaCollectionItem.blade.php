<a href="{{ route('vagas.show', $vaga->id) }}" class="collection-item avatar black-text" data-remote="true">

	@if($vaga->status === 'Desativada')
		<i class="material-icons circle red darken-4">work_off</i>
	@else
		<i class="material-icons circle green lighten-2">work</i>
	@endif

	<span class="title">{{ $vaga->funcao }}</span>
	<p class="grey-text text-darken-1">
		{{ (strlen($vaga->descricao) > 90) ? substr($vaga->descricao,0, 87).'...' : $vaga->descricao }}
	</p>
	@typeUser('Cliente')
		@if(Arr::where($vaga->clientes->toArray(), function ($cliente, $key) {
			return $cliente['id'] === Auth::user()->userable->id;
		}))
			<div class="secondary-content"><i class="material-icons">turned_in</i></div>
		@endif
	@endtypeUser
	<div class="right-align">
		<i class="material-icons" style="vertical-align: middle">access_time</i>
		{{ $vaga->tempo }}
	</div>
</a>