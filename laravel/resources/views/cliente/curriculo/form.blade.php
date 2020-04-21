@select([
	'name' => 'escolaridade',
	'icon' => 'school',
	'label' => 'Escolaridade',
	'textOptionDefault' => 'Selecione sua Escolaridade'
])
	@slot('options')
		@foreach ($escolaridades as $escolaridade)
			@option([
				'name' => 'escolaridade',
				'value' => $escolaridade,
				'data' => @$cliente->escolaridade,
				'label' => $escolaridade
			])
		@endforeach
	@endslot
@endselect

@textarea([
	'name' => 'descricaoPessoal',
	'icon' => 'description',
	'data' => @$cliente->descricaoPessoal,
	'label' => 'Descrição Pessoal',
	'dica' => 'Resumo de suas qualificações, habilidades e competências.'
])

<div class="row">
	<div class="col s12">
		<h6>Conhecimentos</h6>
		<table class="centered">
			<thead>
				<tr>
					<th>Conhecimento</th>
					<th>Nenhum</th>
					<th>Básico</th>
					<th>Intermediário</th>
					<th>Avançado</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($conhecimentos as $conhecimento)
					<tr>
						<td>{{$conhecimento->nome}}</td>
						<td>
							<label>
								<input type="radio" name="{{"Conhecimento_".$conhecimento->id}}" value="">
								<span></span>
							</label>
						</td>
						<td>
							<label>
								<input type="radio" name="{{"Conhecimento_".$conhecimento->id}}" value="Básico"
									@if(Arr::has($clienteConhecimentos, $conhecimento->id) || old("Conhecimento_".$conhecimento->id) )
										@if(Arr::get($clienteConhecimentos, $conhecimento->id) === "Básico" || old("Conhecimento_".$conhecimento->id) === "Básico")
											checked
										@endif
									@endif
								>
								<span></span>
							</label>
						</td>
						<td>
							<label>
								<input type="radio" name="{{"Conhecimento_".$conhecimento->id}}" value="Intermediário"
									@if(Arr::has($clienteConhecimentos, $conhecimento->id) || old("Conhecimento_".$conhecimento->id))
										@if(Arr::get($clienteConhecimentos, $conhecimento->id) === "Intermediário" || old("Conhecimento_".$conhecimento->id) === "Intermediário" )
											checked
										@endif
									@endif
								>
								<span></span>
							</label>
						</td>
						<td>
							<label>
								<input type="radio" name="{{"Conhecimento_".$conhecimento->id}}" value="Avançado"
									@if(Arr::has($clienteConhecimentos, $conhecimento->id) || old("Conhecimento_".$conhecimento->id))
										@if(Arr::get($clienteConhecimentos, $conhecimento->id) === "Avançado" || old("Conhecimento_".$conhecimento->id) === "Avançado")
											checked
										@endif
									@endif
								>
								<span></span>
							</label>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>