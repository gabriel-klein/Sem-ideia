@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Conhecimentos') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cliente.conhecimento') }}"> 
                        @csrf

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
                                <label for="descricaoPessoal" class="col-md-4 col-form-label text-md-right">Descrição Pessoal</label>
                                <div class="col-md-6">
                                    <textarea class="form-control @error('descricaoPessoal') is-invalid @enderror" 
                                id="descricaoPessoal" rows="2" name="descricaoPessoal">{{ isset($user->descricaoPessoal)?$user->descricaoPessoal:old('descricaoPessoal') }}</textarea>
                                    @error('descricaoPessoal')
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
