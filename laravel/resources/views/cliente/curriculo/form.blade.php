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


@table([
	'opcional' => 'Lista de conhecimentos (opcional)',
	'data' => $clienteConhecimentos
])

