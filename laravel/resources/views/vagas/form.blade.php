<div class="form-group row">
  <label for="funcao" class="col-md-4 col-form-label text-md-right">Função</label>
  <div class="col-md-6">
    <select id="funcao" class="custom-select @error('funcao') is-invalid @enderror" 
      name="funcao" required>
      <option  selected disabled >Selecione a função</option>
      <option value="Operador(a) de Caixa" {{ ((old('funcao') == "Operador(a) de Caixa") || (@$vaga->funcao == "Operador(a) de Caixa"))?"selected":"" }}>Operador(a) de Caixa</option>
      <option value="Vendedor" {{ ((old('funcao') == "Vendedor") || (@$vaga->funcao == "Vendedor"))?"selected":"" }}>Vendedor(a)</option>
      <option value="Coordenador(a)/Gerente de Loja" {{ ((old('funcao') == "Coordenador(a)/Gerente de Loja") || (@$vaga->funcao == "Coordenador(a)/Gerente de Loja"))?"selected":"" }}>Coordenador(a)/Gerente de Loja</option>
      <option value="Vigia/Prevenção de perdas" {{ ((old('funcao') == "Vigia/Prevenção_de_perdas") || (@$vaga->funcao == "Vigia/Prevenção de perdas"))?"selected":"" }}>Vigia/Prevenção de perdas</option>
      <option value="Estoquista" {{ ((old('funcao') == "Estoquista") || (@$vaga->funcao == "Estoquista"))?"selected":"" }}>Estoquista</option>
      <option value="Babá/Cuidador" {{ ((old('funcao') == "Babá/Cuidador") || (@$vaga->funcao == "Babá/Cuidador"))?"selected":"" }}>Babá/Cuidador</option>
      <option value="Estimulador" {{ ((old('funcao') == "Estimulador") || (@$vaga->funcao == "Estimulador"))?"selected":"" }}>Estimulador</option>
      <option value="Cozinheiro" {{ ((old('funcao') == "Cozinheiro") || (@$vaga->funcao == "Cozinheiro"))?"selected":"" }}>Cozinheiro</option>
      <option value="Garçom/Garçonete" {{ ((old('funcao') == "Garçom/Garçonete") || (@$vaga->funcao == "Garçom/Garçonete"))?"selected":"" }}>Garçom/Garçonete</option>
      <option value="Atendente de Telemarketing" {{ ((old('funcao') == "Atendente de Telemarketing") || (@$vaga->funcao == "Atendente de Telemarketing"))?"selected":"" }}>Atendente de Telemarketing</option>
      <option value="Frentista" {{ ((old('funcao') == "Frentista") || (@$vaga->funcao == "Frentista"))?"selected":"" }}>Frentista</option>
    </select>
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
  <label for="escolaridade" class="col-md-4 col-form-label text-md-right">Escolaridade</label>

  <div class="col-md-6">
    <select id="escolaridade" class="custom-select @error('escolaridade') is-invalid @enderror" 
      name="escolaridade" required>
      <option  selected disabled >Selecione sua Escolaridade</option>
      <option value="Superior_completo" {{ ((old('escolaridade') == "Superior_completo") || (@$conhecimentos->find(1)->nome == "escolaridade") && (@$conhecimentos->find(1)->pivot->nivel=="Superior_completo"))?"selected":"" }}>Superior Completo</option>
      <option value="Superior_incompleto" {{ ((old('escolaridade') == "Superior_incompleto") || (@$conhecimentos->find(1)->nome == "escolaridade") && (@$conhecimentos->find(1)->pivot->nivel=="Superior_incompleto"))?"selected":"" }}  >Superior Incompleto</option>
      <option value="Médio_completo" {{ ((old('escolaridade') == "Médio_completo") || (@$conhecimentos->find(1)->nome == "escolaridade") && (@$conhecimentos->find(1)->pivot->nivel=="Médio_completo"))?"selected":"" }} >Médio Completo</option>
      <option value="Médio_incompleto" {{ ((old('escolaridade') == "Médio_incompleto") || (@$conhecimentos->find(1)->nome == "escolaridade") && (@$conhecimentos->find(1)->pivot->nivel=="Médio_incompleto"))?"selected":"" }}  >Médio Incompleto</option>
      <option value="Fundamental_completo" {{ ((old('escolaridade') == "Fundamental_completo") || (@$conhecimentos->find(1)->nome == "escolaridade") && (@$conhecimentos->find(1)->pivot->nivel=="Fundamental_completo"))?"selected":"" }}>Fundamental Completo</option>
      <option value="Fundamental_incompleto" {{ ((old('escolaridade') == "Fundamental_incompleto") || (@$conhecimentos->find(1)->nome == "escolaridade") && (@$conhecimentos->find(1)->pivot->nivel=="Fundamental_incompleto"))?"selected":"" }}>Fundamental Incompleto</option>
    </select>
    @error('escolaridade')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
</div>


                            <div class="form-group row">
                              <label for="excel" class="col-md-4 col-form-label text-md-right">Excel</label>
                              <div class="col-md-6">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" required id="excel_Básico" name="excel" value="Básico"
                                            class="custom-control-input @error('excel') is-invalid @enderror" {{ ((old('excel') == "Básico")||(@$conhecimentos->find(2)->nome == "excel") && (@$conhecimentos->find(2)->pivot->nivel=="Básico"))? 'checked': '' }}>
                                        <label class="custom-control-label" for="excel_Básico">Básico</label>
                                    </div>
                                    
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="excel_Intermediário" name="excel" value="Intermediário"
                                            class="custom-control-input @error('excel') is-invalid @enderror" {{ ((old('excel') == "Intermediário")||(@$conhecimentos->find(2)->nome == "excel") && (@$conhecimentos->find(2)->pivot->nivel=="Intermediário"))? 'checked': '' }}>
                                        <label class="custom-control-label" for="excel_Intermediário">Intermediário</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="excel_Avançado" name="excel" value="Avançado"
                                            class="custom-control-input @error('excel') is-invalid @enderror" {{ ((old('excel') == "Avançado")||(@$conhecimentos->find(2)->nome == "excel") && (@$conhecimentos->find(2)->pivot->nivel=="Avançado"))? 'checked': '' }}>
                                        <label class="custom-control-label" for="excel_Avançado">Avançado</label>
                                        
                                        @error('excel')
                                            <span class="invalid-feedback ml-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                      <div class="form-group row">
                        <label for="excel" class="col-md-4 col-form-label text-md-right">Word</label>
                            <div class="col-md-6">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" required id="word_Básico" name="word" value="Básico"
                                            class="custom-control-input @error('word') is-invalid @enderror" {{ ((old('word') == "Básico")||(@$conhecimentos->find(3)->nome == "word") && (@$conhecimentos->find(3)->pivot->nivel=="Básico"))? 'checked': '' }}>
                                        <label class="custom-control-label" for="word_Básico">Básico</label>
                                    </div>
                                    
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="word_Intermediário" name="word" value="Intermediário"
                                            class="custom-control-input @error('word') is-invalid @enderror" {{ ((old('word') == "Intermediário")||(@$conhecimentos->find(3)->nome == "word") && (@$conhecimentos->find(3)->pivot->nivel=="Intermediário"))? 'checked': '' }}>
                                        <label class="custom-control-label" for="word_Intermediário">Intermediário</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="word_Avançado" name="word" value="Avançado"
                                            class="custom-control-input @error('word') is-invalid @enderror" {{ ((old('word') == "Avançado")||(@$conhecimentos->find(3)->nome == "word") && (@$conhecimentos->find(3)->pivot->nivel=="Avançado"))? 'checked': '' }}>
                                        <label class="custom-control-label" for="word_Avançado">Avançado</label>
                                        
                                        @error('word')
                                            <span class="invalid-feedback ml-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                              <label for="excel" class="col-md-4 col-form-label text-md-right">Inglês</label>
    
                                <div class="col-md-6">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" required id="ingles_Básico" name="ingles" value="Básico"
                                            class="custom-control-input @error('ingles') is-invalid @enderror" {{ ((old('ingles') == "Básico")||(@$conhecimentos->find(4)->nome == "ingles") && (@$conhecimentos->find(4)->pivot->nivel=="Básico"))? 'checked': '' }}>
                                        <label class="custom-control-label" for="ingles_Básico">Básico</label>
                                    </div>
                                    
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="ingles_Intermediário" name="ingles" value="Intermediário"
                                            class="custom-control-input @error('ingles') is-invalid @enderror" {{ ((old('ingles') == "Intermediário")||(@$conhecimentos->find(4)->nome == "ingles") && (@$conhecimentos->find(4)->pivot->nivel=="Intermediário"))? 'checked': '' }}>
                                        <label class="custom-control-label" for="ingles_Intermediário">Intermediário</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="ingles_Avançado" name="ingles" value="Avançado"
                                            class="custom-control-input @error('ingles') is-invalid @enderror" {{ ((old('ingles') == "Avançado")||(@$conhecimentos->find(4)->nome == "ingles") && (@$conhecimentos->find(4)->pivot->nivel=="Avançado"))? 'checked': '' }}>
                                        <label class="custom-control-label" for="ingles_Avançado">Avançado</label>
                                        
                                        @error('ingles')
                                            <span class="invalid-feedback ml-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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

 <div class="form-group row">
  <label for="email_de_contato" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail De Contato A Vaga') }}</label>
    <div class="col-md-6">
      <input id="email_de_contato" type="email" class="form-control @error('email_de_contato') is-invalid @enderror" name="email_de_contato" value="{{ isset($vaga->email_de_contato)?$vaga->email_de_contato:old('email_de_contato') }}"  autocomplete="email_de_contato">
                                
        @error('email_de_contato')
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