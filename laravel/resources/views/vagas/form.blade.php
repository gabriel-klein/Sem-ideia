<div class="row">
  <div class="input-field col s12">
    <i class="material-icons prefix">work</i>
    <select id="funcao" class="@error('funcao') invalid @enderror" 
    name="funcao" >
    <option  selected disabled >Selecione a função</option>
    @foreach ($funcoes as $funcao)
      <option value="{{$funcao}}" {{ old('funcao') == $funcao ? "selected": (@$vaga->funcao == $funcao ? "selected" : "") }}>{{$funcao}}</option>
    @endforeach
    </select>
  <label for="funcao">Função</label>
    
      @error('funcao')
          <span class="helper-text red-text">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
</div>

<div class="row">
  <div class="input-field col s12">
    <i class="material-icons prefix">description</i>
    <textarea class="materialize-textarea @error('descricao') invalid @enderror" 
    id="descricao" rows="2" name="descricao">{{ isset($vaga->descricao)?$vaga->descricao:old('descricao') }}</textarea>
    <label for="descricao">Descrição</label>
        
        @error('descricao')
            <span class="helper-text red-text">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
  </div>
</div>

<div class="row">
  <div class="input-field col s12">
    <i class="material-icons prefix">format_list_numbered</i>
    <input id="quantidade" type="number" class="@error('quantidade') invalid @enderror" 
    name="quantidade" value="{{ isset($vaga->quantidade)?$vaga->quantidade:old('quantidade') }}" >
  <label for="quantidade">Quantidade</label>

      @error('quantidade')
          <span class="helper-text red-text">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
</div>

<div class="row">
  <div class="input-field col s12">
    <i class="material-icons prefix">school</i>
    <select id="escolaridade" class="@error('escolaridade') invalid @enderror" 
      name="escolaridade" >
      <option  selected disabled >Selecione sua Escolaridade</option>
      @foreach ($escolaridades as $escolaridade)
        <option value="{{$escolaridade}}" {{ ((old('escolaridade') == $escolaridade) || (@$conhecimentos->find(1)->nome == "escolaridade") && (@$conhecimentos->find(1)->pivot->nivel=="$escolaridade"))?"selected":""  }}>{{$escolaridade}}</option>
      @endforeach
    </select>
  <label for="escolaridade">Escolaridade</label>

      @error('escolaridade')
          <span class="helper-text red-text">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
</div>

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

<div class="row">
  <div class="input-field col s12">
    <i class="material-icons prefix">notifications_active</i>
    <select id="status" class="@error('status') is-invalid @enderror" 
    name="status" >
      <option disabled {{ !(isset($vaga->status) || old('status') != "")?"selected": "" }}>Selecione o Status da Vaga</option>
      <option value="Ativa" {{ ((old('status') == "Ativa") || (@$vaga->status == "Ativa"))?"selected":"" }} >Ativa</option>
      <option value="Desativada" {{ ((old('status') == "Desativada") || (@$vaga->status == "Desativada"))?"selected":"" }}>Desativada</option>
    </select>
  <label for="status">Status</label>

    @error('status')
        <span class="helper-text red-text">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
</div>

<div class="row">
  <div class="input-field col s12">
    <i class="material-icons prefix">mail_outline</i>
    <input id="emailDeContato" type="email" class="form-control @error('emailDeContato') is-invalid @enderror" name="emailDeContato" value="{{ isset($vaga->emailDeContato)?$vaga->emailDeContato:old('emailDeContato') }}"  autocomplete="emailDeContato">
  <label for="emailDeContato">E-Mail De Contato A Vaga</label>
                     
      @error('emailDeContato')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>
</div>