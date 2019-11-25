@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-4 px-4 offset-1">
          <h3 class="h3 text-center">Dados de Login</h3>
          <div class="form-group row">
            <label for="email" class="col-md-5 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-7">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                 name="email" value="{{ $cliente->user->email }}" required autocomplete="email">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-md-5 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-7">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                 name="password" value="{{ $cliente->user->password }}" required>
            </div>

            @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-5">
              <button class="btn btn-primary">Alterar Senha</button>
            </div>
          </div>
        </div>
        <div class="col-md-6  offset-1">
          <h3 class="h3 text-center">Meus Dados</h3>
            <div class="form-group row">
                <label for="idade" class="col-md-5 col-form-label text-md-right">Idade</label>
                
                <div class="col-md-5">
                    <input id="idade" type="text" class="form-control @error('idade') is-invalid @enderror" 
                        name="idade" value="{{ $cliente->idade }}" required>
                    
                    @error('idade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="cel" class="col-md-5 col-form-label text-md-right">Celular</label>

                <div class="col-md-5">
                    <input id="cel" type="text" class="form-control telMask @error('cel1') is-invalid @enderror"
                        name="cel1" value="{{ $cliente->cel1 }}" required>
                    
                    @error('cel1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="cel2" class="col-md-5 col-form-label text-md-right">Celular 2</label>

                <div class="col-md-5">
                    <input id="cel2" type="text" class="form-control telMask @error('cel2') is-invalid @enderror" 
                        name="cel2" value="{{ $cliente->cel2 }}">
                    
                    @error('cel2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="h_disponivel" class="col-md-5 col-form-label text-md-right">Horário Disponível</label>

                <div class="col-md-5">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="hManha" name="h_disponivel" value="Manhã"
                            class="custom-control-input @error('h_disponivel') is-invalid @enderror" {{ old('h_disponivel') == "Manhã"? 'checked': '' }}>
                        <label class="custom-control-label" for="hManha">Manhã</label>
                    </div>
                    
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="hTarde" name="h_disponivel" value="Tarde"
                            class="custom-control-input @error('h_disponivel') is-invalid @enderror" {{ old('h_disponivel') == "Tarde"? 'checked': '' }}>
                        <label class="custom-control-label" for="hTarde">Tarde</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="hIntegral" name="h_disponivel" value="Integral"
                            class="custom-control-input @error('h_disponivel') is-invalid @enderror" {{ old('h_disponivel') == "Integral"? 'checked': '' }}>
                        <label class="custom-control-label" for="hIntegral">Integral</label>
                        
                        @error('h_disponivel')
                            <span class="invalid-feedback ml-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="h_disponivel" class="col-md-5 col-form-label text-md-right">Deseja visualizar vagas de Aprendiz?</label>

                <div class="col-md-5">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="aprendizSim" name="aprendiz" value="Sim"
                            class="custom-control-input @error('aprendiz') is-invalid @enderror" {{ old('aprendiz') == "Sim"? 'checked': '' }}>
                        <label class="custom-control-label" for="aprendizSim">Sim</label>
                    </div>
                    
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="aprendizNao" name="aprendiz" value="Não"
                            class="custom-control-input @error('aprendiz') is-invalid @enderror" {{ old('aprendiz') == "Não"? 'checked': '' }}>
                        <label class="custom-control-label" for="aprendizNao">Não</label>
                        
                        @error('aprendiz')
                            <span class="invalid-feedback ml-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 offset-3">
          <h3 class="h3 text-center">Meus Conhecimentos</h3>
          
        </div>
      </div>
    </div>
@endsection