@select([
    'name' => 'funcao',
    'icon' => 'work',
    'label' => 'Função',
    'textOptionDefault' => 'Selecione a função'
])
    @slot('options')
        @foreach ($funcoes as $funcao)
            @option([
                'name' => 'funcao',
                'value' => $funcao,
                'data' => @$vaga->funcao,
                'label' => $funcao
            ])
        @endforeach
    @endslot
@endselect

@textarea([
    'name' => 'descricao',
    'icon' => 'description',
    'data' => @$vaga->descricao,
    'label' => 'Descrição',
    'dica' => 'Informe quais serão as obrigações do contratado, suas responsabilidades e caso exija alguma experiência na área. '
])

@input([
    'name' => 'quantidade',
    'icon' => 'format_list_numbered',
    'data' => @$vaga->quantidade,
    'label' => 'Quantidade',
    'type'  => 'number'
])

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
                'data' => @$vaga->escolaridade,
                'label' => $escolaridade
            ])
        @endforeach
    @endslot
@endselect

@table([
    'opcional' => 'Conhecimentos desejáveis para a vaga (opcional)',
    'data' => $vagaConhecimentos    
])

@select([
    'name' => 'status',
    'icon' => 'notifications_active',
    'label' => 'Status',
    'textOptionDefault' => 'Selecione o Status da Vaga'
])
    @slot('options')
      @option([
          'name' => 'status',
          'value' => 'Ativa',
          'data' => @$vaga->status,
          'label' => 'Ativa'
        ])
        @option([
          'name' => 'status',
          'value' => 'Desativada',
          'data' => @$vaga->status,
          'label' => 'Desativada'
        ])
      @endslot
@endselect

@input([
    'name' => 'emailDeContato',
    'icon' => 'mail_outline',
    'data' => @$vaga->emailDeContato,
    'label' => 'E-Mail de contato a vaga (opcional)',
    'type'  => 'email'
])