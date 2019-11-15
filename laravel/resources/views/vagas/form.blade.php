<div class="form-group row">
  <label for="funcao" class="col-md-4 col-form-label text-md-right">Função</label>
  <div class="col-md-6">
    <input id="funcao" type="text" class="form-control @error('funcao') is-invalid @enderror" 
    name="funcao" value="{{ isset($vaga->funcao)?$vaga->funcao:old('funcao') }}" required>
      @error('funcao')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
</div>
<div class="form-group row">
    <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição</label>
    <div class="col-md-6">
        <textarea class="form-control @error('descricao') is-invalid @enderror" 
    id="descricao" rows="2" name="descricao">{{ isset($vaga->descricao)?$vaga->descricao:old('descricao') }}</textarea>
        @error('descricao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
  <label for="quantidade" class="col-md-4 col-form-label text-md-right">Quantidade</label>

  <div class="col-md-6">
    <input id="quantidade" type="number" class="form-control @error('quantidade') is-invalid @enderror" 
      name="quantidade" value="{{ isset($vaga->quantidade)?$vaga->quantidade:old('quantidade') }}" required>

      @error('quantidade')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-md-4 col-form-label text-md-right">Escolaridade</label>

  <div class="col-md-6">
    <select class="custom-select col-md-6 mr-1" name="escolaridade" id="escolaridade">
      <option disabled selected>Selecione sua escolaridade</option>
      @foreach ($conhecimentos as $conhecimento)
        @if (!(strpos($conhecimento->nome, "Ensino") === false))
          <option value="{{ $conhecimento->id }}">{{ $conhecimento->nome }}</option>
        @endif
      @endforeach 
    </select>
    <select class="custom-select col-md-5" name="escolaridade_nivel" id="{{ "escolaridade_nivel" }}">
      <option disabled selected>Selecione o Nível</option>
        <option value="Incompleto">Incompleto</option>
        <option value="Cursando">Cursando</option>
        <option value="Completo">Completo</option>
    </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-4 col-form-label text-md-right">Conhecimentos</label>

  <div class="col-md-6 row">
    @foreach ($conhecimentos as $conhecimento)
      @if (strpos($conhecimento->nome, "Ensino") === false)
        <div class="custom-control custom-checkbox col-md-5 pl-md-5">
          <input type="checkbox" class="custom-control-input" name="{{ "con".$conhecimento->nome }}"
            id="{{ "con".$conhecimento->nome }}" value="{{ $conhecimento->id }}">
          <label class="custom-control-label" for="{{ "con".$conhecimento->nome }}">{{ $conhecimento->nome }}</label>
        </div>
        <select class="custom-select col-md-7" name="{{ "con".$conhecimento->nome."_nivel" }}" 
          id="{{ "con".$conhecimento->nome."_nivel"  }}">
          <option disabled selected>Selecione o Nível</option>
            <option value="Básico">Básico</option>
            <option value="Intermediário">Intermediário</option>
            <option value="Avançado">Avançado</option>
        </select>
      @endif
    @endforeach 
  </div>
</div>


<div class="form-group row">
  <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

  <div class="col-md-6">
    <select id="status" class="custom-select @error('status') is-invalid @enderror" 
      name="status" required>
      <option disabled {{ !(isset($vaga->status) || old('status') != "")?"selected": "" }}>Selecione o Status da Vaga</option>
      <option value="Ativa" {{ ((old('status') == "Ativa") || (@$vaga->status == "Ativa"))?"selected":"" }} >Ativa</option>
      <option value="Desativada" {{ ((old('status') == "Desativada") || (@$vaga->status == "Desativada"))?"selected":"" }}>Desativada</option>
    </select>
    @error('status')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            Salvar
        </button>
    </div>
</div>