<input type="text" class="hide" name="typeUser" value="Cliente">

@input([
    'name' => 'idade',
    'icon' => 'event',
    'data' => @$cliente->idade,
    'label' => 'Idade'
])

@input([
    'name' => 'cel1', 
    'icon' => 'phone', 
    'data' => @$cliente->cel1,
    'label' => 'Celular',
    'class' => 'telMask'
])

@input([
    'name' => 'cel2',
    'icon' => 'phone',
    'data' => @$cliente->cel2,
    'label' => 'Celular 2',
    'class' => 'telMask',
    'required' => false
])

@select([
    'name' => 'bairro',
    'icon' => 'place_outline',
    'label' => 'Bairro',
    'textOptionDefault' => 'Selecione o seu bairro'
])
    @slot('options')
        @foreach ($bairros as $item)
            @option([
                'name' => 'bairro',
                'value' => $item,
                'data' => @$cliente->bairro,
                'label' => $item
            ])
        @endforeach
    @endslot
@endselect

@select([
    'name' => 'h_disponivel',
    'icon' => 'access_time',
    'label' => 'Horário Disponível',
    'textOptionDefault' => 'Selecione seu horário disponível'
])
    @slot('options')
        @foreach (['Manhã', 'Tarde', 'Integral'] as $item)
            @option([
                'name' => 'h_disponivel',
                'value' => $item,
                'data' => @$cliente->h_disponivel,
                'label' => $item
            ])
        @endforeach
    @endslot
@endselect

@radio([
    'name' => 'aprendiz',
    'texto' => 'Deseja visualizar vagas de Aprendiz?',
    'labelSim' => 'aprendizSim',
    'data' => @$cliente->aprendiz,
    'labelNao' => 'aprendizNao'
    ])