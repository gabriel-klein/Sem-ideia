@input([
    'name' => 'local',
    'icon' => 'place_outline',
    'data' => @$experiencia->local,
    'label' => 'local'
])

@textarea([
    'name' => 'descricao',
    'icon' => 'description',
    'data' => @$experiencia->descricao,
    'label' => 'Descrição'
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