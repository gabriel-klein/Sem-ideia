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
                'data' => @$cliente->funcao,
                'label' => $funcao
            ])
        @endforeach
    @endslot
@endselect

@textarea([
    'name' => 'descricao',
    'icon' => 'description',
    'data' => @$vaga->descricao,
    'label' => 'Descrição'
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
                'data' => @$conhecimentos->find(1)->pivot->nivel,
                'label' => $escolaridade
            ])
        @endforeach
    @endslot
@endselect

<div class="row center">
  <div class="col 12 offset-s2">
  <p for="excel">Excel</p>
  <p>
    <label for="excel_Básico">
      <input type="radio" id="excel_Básico" name="excel" value="Básico"
        class="with-gap @error('excel') invalid @enderror" 
        {{ ((old('excel') == "Básico")||(@$conhecimentos->find(2)->nome == "excel") && (@$conhecimentos->find(2)->pivot->nivel=="Básico"))? 'checked': '' }}>
        <span>Básico</span>
    </label>

    <label for="excel_Intermediário">
      <input type="radio" id="excel_Intermediário" name="excel" value="Intermediário"
        class="with-gap @error('excel') invalid @enderror" 
        {{ ((old('excel') == "Básico")||(@$conhecimentos->find(2)->nome == "excel") && (@$conhecimentos->find(2)->pivot->nivel=="Intermediário"))? 'checked': '' }}>
        <span>Intermediário</span>
    </label>

    <label for="excel_Avançado">
      <input type="radio" id="excel_Avançado" name="excel" value="Avançado"
        class="with-gap @error('excel') invalid @enderror" 
        {{ ((old('excel') == "Básico")||(@$conhecimentos->find(2)->nome == "excel") && (@$conhecimentos->find(2)->pivot->nivel=="Avançado"))? 'checked': '' }}>
        <span>Avançado</span>
    </label>
  </p>

  @error('excel')
            <span class="helper-text red-text ml-3" >
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row center">
  <div class="col 12 offset-s2">
  <p for="word">Word</p>
  <p>
    <label for="word_Básico">
      <input type="radio" id="word_Básico" name="word" value="Básico"
        class="with-gap @error('word') invalid @enderror" 
        {{ ((old('word') == "Básico")||(@$conhecimentos->find(3)->nome == "word") && (@$conhecimentos->find(3)->pivot->nivel=="Básico"))? 'checked': '' }}>
        <span>Básico</span>
    </label>

    <label for="word_Intermediário">
      <input type="radio" id="word_Intermediário" name="word" value="Intermediário"
        class="with-gap @error('word') invalid @enderror" 
        {{ ((old('word') == "Básico")||(@$conhecimentos->find(3)->nome == "word") && (@$conhecimentos->find(3)->pivot->nivel=="Intermediário"))? 'checked': '' }}>
        <span>Intermediário</span>
    </label>

    <label for="word_Avançado">
      <input type="radio" id="word_Avançado" name="word" value="Avançado"
        class="with-gap @error('word') invalid @enderror" 
        {{ ((old('word') == "Básico")||(@$conhecimentos->find(3)->nome == "word") && (@$conhecimentos->find(3)->pivot->nivel=="Avançado"))? 'checked': '' }}>
        <span>Avançado</span>
    </label>
  </p>

  @error('word')
            <span class="helper-text red-text ml-3" >
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row center">
  <div class="col 12 offset-s2">
  <p for="ingles">Inglês</p>
  <p>
    <label for="ingles_Básico">
      <input type="radio" id="ingles_Básico" name="ingles" value="Básico"
        class="with-gap @error('ingles') invalid @enderror" 
        {{ ((old('ingles') == "Básico")||(@$conhecimentos->find(4)->nome == "ingles") && (@$conhecimentos->find(4)->pivot->nivel=="Básico"))? 'checked': '' }}>
        <span>Básico</span>
    </label>

    <label for="ingles_Intermediário">
      <input type="radio" id="ingles_Intermediário" name="ingles" value="Intermediário"
        class="with-gap @error('ingles') invalid @enderror" 
        {{ ((old('ingles') == "Básico")||(@$conhecimentos->find(4)->nome == "ingles") && (@$conhecimentos->find(4)->pivot->nivel=="Intermediário"))? 'checked': '' }}>
        <span>Intermediário</span>
    </label>

    <label for="ingles_Avançado">
      <input type="radio" id="ingles_Avançado" name="ingles" value="Avançado"
        class="with-gap @error('ingles') invalid @enderror" 
        {{ ((old('ingles') == "Básico")||(@$conhecimentos->find(4)->nome == "ingles") && (@$conhecimentos->find(4)->pivot->nivel=="Avançado"))? 'checked': '' }}>
        <span>Avançado</span>
    </label>
  </p>

  @error('ingles')
            <span class="helper-text red-text ml-3" >
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

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
    'label' => 'E-Mail De Contato A Vaga',
    'type'  => 'email'
])