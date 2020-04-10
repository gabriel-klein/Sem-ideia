@input([
    'name' => 'local',
    'icon' => 'place',
    'data' => @$experiencia->local,
    'label' => 'Local'
])

@textarea([
    'name' => 'descricao',
    'icon' => 'description',
    'data' => @$experiencia->descricao,
    'label' => 'Descrição',
    'dica' => 'Informe o cargo que desempenhou e as atividades exercidas.'
])

@input([
    'name' => 'data_inicio',
    'icon' => 'today',
    'data' => @$experiencia->data_inicio,
    'label' => 'Data Inicio',
    'class' => 'datepicker'
])

@input([
    'name' => 'data_fim',
    'icon' => 'today',
    'data' => @$experiencia->data_fim,
    'label' => 'Data Fim',
    'class' => 'datepicker'
])

@radio([
    'name' => 'comprovacao',
    'texto' => 'Existe alguma comprovação dessa experiência?',
    'labelSim' => 'comprovacaoSim',
    'data' => @$experiencia->comprovacao,
    'labelNao' => 'comprovacaoNao'
    ])