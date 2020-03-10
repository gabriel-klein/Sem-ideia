@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                 <ul class="nav nav-tabs card-header-tabs">
                     <li class="nav-item">
                        <a class="nav-link pointer"  @click="typeUser = 'Cliente'" :class="typeUser == 'Cliente' ? 'active': 'active'">{{ __('Cliente') }}</a>
                    </li>
                </ul>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cliente.update', $cliente->id) }}">
                        @csrf
                        @method('PUT')
                       <div v-if="typeUser == ''">
                            <div class="texto">
                                Selecione uma opção de cadastro.
                            </div>
                        </div>

                        <div v-if="typeUser == 'Empresa' || typeUser == 'Cliente'">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{isset($user->name)?$user->name:old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{isset($user->email)?$user->email:old('email') }}" required autocomplete="email">
                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                            </div>
                        
                        
                        <div v-if="typeUser == 'Cliente'">
                            <div class="form-group row">
                                <label for="idade" class="col-md-4 col-form-label text-md-right">Idade</label>
                                
                                <div class="col-md-6">
                                    <input id="idade" type="text" class="form-control @error('idade') is-invalid @enderror" 
                                        name="idade" value="{{isset($cliente->idade)?$cliente->idade:old('idade') }}" required>
                                    
                                    @error('idade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cel" class="col-md-4 col-form-label text-md-right">Celular</label>
    
                                <div class="col-md-6">
                                    <input id="cel1" type="text" class="form-control telMask @error('cel1') is-invalid @enderror"
                                        name="cel1" value="{{ isset($cliente->cel1)?$cliente->cel1:old('cel1') }}" required>
                                    
                                    @error('cel1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cel2" class="col-md-4 col-form-label text-md-right">Celular 2</label>
    
                                <div class="col-md-6">
                                    <input id="cel2" type="text" class="form-control telMask @error('cel2') is-invalid @enderror" 
                                        name="cel2" value="{{ isset($cliente->cel2)?$cliente->cel2:old('cel2') }}">
                                    
                                    @error('cel2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

<div class="form-group row">
  <label for="bairro" class="col-md-4 col-form-label text-md-right">Bairro</label>
  <div class="col-md-6">
    <select id="bairro" class="custom-select @error('bairro') is-invalid @enderror" 
      name="bairro" required>
      <option  selected disabled >Selecione o seu bairro</option>

      <option value="Badu" {{ ((old('bairro') == "Badu") || (@$cliente->bairro == "Badu"))?"selected":"" }}>Badu</option>

      <option value="Baldeador" {{ ((old('bairro') == "Baldeador") || (@$cliente->bairro == "Baldeador"))?"selected":"" }}>Baldeador</option>

      <option value="Barreto" {{ ((old('bairro') == "Barreto") || (@$cliente->bairro == "Barreto"))?"selected":"" }}>Barreto</option>

      <option value="Boa Viagem" {{ ((old('bairro') == "Boa Viagem") || (@$cliente->bairro == "Boa Viagem"))?"selected":"" }}>Boa Viagem</option>

      <option value="Cachoeiras" {{ ((old('bairro') == "Cachoeiras") || (@$cliente->bairro == "Cachoeiras"))?"selected":"" }}>Cachoeiras</option>

      <option value="Cafubá" {{ ((old('bairro') == "Cafubá") || (@$cliente->bairro == "Cafubá"))?"selected":"" }}>Cafubá</option>

      <option value="Camboinhas" {{ ((old('bairro') == "Camboinhas") || (@$cliente->bairro == "Camboinhas"))?"selected":"" }}>Camboinhas</option>

      <option value="Cantagalo" {{ ((old('bairro') == "Cantagalo") || (@$cliente->bairro == "Cantagalo"))?"selected":"" }}>Cantagalo</option>

      <option value="Cantareira" {{ ((old('bairro') == "Cantareira") || (@$cliente->bairro == "Cantareira"))?"selected":"" }}>Cantareira</option>

      <option value="Caramujo" {{ ((old('bairro') == "Caramujo") || (@$cliente->bairro == "Caramujo"))?"selected":"" }}>Caramujo</option>

      <option value="Charitas" {{ ((old('bairro') == "Charitas") || (@$cliente->bairro == "Charitas"))?"selected":"" }}>Charitas</option>

      <option value="Cubango" {{ ((old('bairro') == "Cubango") || (@$cliente->bairro == "Cubango"))?"selected":"" }}>Cubango</option>

      <option value="Engenho do Mato" {{ ((old('bairro') == "Engenho do Mato") || (@$cliente->bairro == "Engenho do Mato"))?"selected":"" }}>Engenho do Mato</option>

      <option value="Engenhoca" {{ ((old('bairro') == "Engenhoca") || (@$cliente->bairro == "Engenhoca"))?"selected":"" }}>Engenhoca</option>

      <option value="Fátima" {{ ((old('bairro') == "Fátima") || (@$cliente->bairro == "Fátima"))?"selected":"" }}>Fátima</option>

      <option value="Fonseca" {{ ((old('bairro') == "Fonseca") || (@$cliente->bairro == "Fonseca"))?"selected":"" }}>Fonseca</option>

      <option value="Gragoatá" {{ ((old('bairro') == "Gragoatá") || (@$cliente->bairro == "Gragoatá"))?"selected":"" }}>Gragoatá</option>

      <option value="Icaraí" {{ ((old('bairro') == "Icaraí") || (@$cliente->bairro == "Icaraí"))?"selected":"" }}>Icaraí</option>

      <option value="Ilha da Conceição" {{ ((old('bairro') == "Ilha da Conceição") || (@$cliente->bairro == "Ilha da Conceição"))?"selected":"" }}>Ilha da Conceição</option>

      <option value="Ingá" {{ ((old('bairro') == "Ingá") || (@$cliente->bairro == "Ingá"))?"selected":"" }}>Ingá</option>

      <option value="Itacoatiara" {{ ((old('bairro') == "Itacoatiara") || (@$cliente->bairro == "Itacoatiara"))?"selected":"" }}>Itacoatiara</option>

      <option value="Itaipu" {{ ((old('bairro') == "Itaipu") || (@$cliente->bairro == "Itaipu"))?"selected":"" }}>Itaipu</option>

      <option value="Ititioca" {{ ((old('bairro') == "Ititioca") || (@$cliente->bairro == "Ititioca"))?"selected":"" }}>Ititioca</option>

      <option value="Jacaré" {{ ((old('bairro') == "Jacaré") || (@$cliente->bairro == "Jacaré"))?"selected":"" }}>Jacaré</option>

      <option value="Jardim Imbuí" {{ ((old('bairro') == "Jardim Imbuí") || (@$cliente->bairro == "Jardim Imbuí"))?"selected":"" }}>Jardim Imbuí</option>

      <option value="Jurujuba" {{ ((old('bairro') == "Jurujuba") || (@$cliente->bairro == "Jurujuba"))?"selected":"" }}>Jurujuba</option>

      <option value="Largo da Batalha" {{ ((old('bairro') == "Largo da Batalha") || (@$cliente->bairro == "Largo da Batalha"))?"selected":"" }}>Largo da Batalha</option>

      <option value="Maceió" {{ ((old('bairro') == "Maceió") || (@$cliente->bairro == "Maceió"))?"selected":"" }}>Maceió</option>

      <option value="Maravista" {{ ((old('bairro') == "Maravista") || (@$cliente->bairro == "Maravista"))?"selected":"" }}>Maravista</option>

      <option value="Maria Paula" {{ ((old('bairro') == "Maria Paula") || (@$cliente->bairro == "Maria Paula"))?"selected":"" }}>Maria Paula</option>

      <option value="Matapaca" {{ ((old('bairro') == "Matapaca") || (@$cliente->bairro == "Matapaca"))?"selected":"" }}>Matapaca</option>

      <option value="Morro do Estado" {{ ((old('bairro') == "Morro do Estado") || (@$cliente->bairro == "Morro do Estado"))?"selected":"" }}>Morro do Estado</option>

      <option value="Muriqui" {{ ((old('bairro') == "Muriqui") || (@$cliente->bairro == "Muriqui"))?"selected":"" }}>Muriqui</option>

      <option value="Pé Pequeno" {{ ((old('bairro') == "Pé Pequeno") || (@$cliente->bairro == "Pé Pequeno"))?"selected":"" }}>Pé Pequeno</option>

      <option value="Piratininga" {{ ((old('bairro') == "Piratininga") || (@$cliente->bairro == "Piratininga"))?"selected":"" }}>Piratininga</option>

      <option value="Ponta d'Areia" {{ ((old('bairro') == "Ponta d'Areia") || (@$cliente->bairro == "Ponta d'Areia"))?"selected":"" }}>Ponta d'Areia</option>

      <option value="Rio do Ouro" {{ ((old('bairro') == "Rio do Ouro") || (@$cliente->bairro == "Rio do Ouro"))?"selected":"" }}>Rio do Ouro</option>

      <option value="Santa Bárbara" {{ ((old('bairro') == "Santa Bárbara") || (@$cliente->bairro == "Santa Bárbara"))?"selected":"" }}>Santa Bárbara</option>

      <option value="Santa Rosa" {{ ((old('bairro') == "Santa Rosa") || (@$cliente->bairro == "Santa Rosa"))?"selected":"" }}>Santa Rosa</option>

      <option value="Santana" {{ ((old('bairro') == "Santana") || (@$cliente->bairro == "Santana"))?"selected":"" }}>Santana</option>

      <option value="Santo Antônio" {{ ((old('bairro') == "Santo Antônio") || (@$cliente->bairro == "Santo Antônio"))?"selected":"" }}>Santo Antônio</option>

      <option value="São Domingos" {{ ((old('bairro') == "São Domingos") || (@$cliente->bairro == "São Domingos"))?"selected":"" }}>São Domingos</option>

      <option value="São Francisco" {{ ((old('bairro') == "São Francisco") || (@$cliente->bairro == "São Francisco"))?"selected":"" }}>São Francisco</option>

      <option value="São Lourenço" {{ ((old('bairro') == "São Lourenço") || (@$cliente->bairro == "São Lourenço"))?"selected":"" }}>São Lourenço</option>

      <option value="Sapê" {{ ((old('bairro') == "Sapê") || (@$cliente->bairro == "Sapê"))?"selected":"" }}>Sapê</option>

      <option value="Serra Grande" {{ ((old('bairro') == "Serra Grande") || (@$cliente->bairro == "Serra Grande"))?"selected":"" }}>Serra Grande</option>

      <option value="Tenente Jardim" {{ ((old('bairro') == "Tenente Jardim") || (@$cliente->bairro == "Tenente Jardim"))?"selected":"" }}>Tenente Jardim</option>

      <option value="Várzea das Moças" {{ ((old('bairro') == "Várzea das Moças") || (@$cliente->bairro == "Várzea das Moças"))?"selected":"" }}>Várzea das Moças</option>

      <option value="Viçoso Jardim" {{ ((old('bairro') == "Viçoso Jardim") || (@$cliente->bairro == "Viçoso Jardim"))?"selected":"" }}>Viçoso Jardim</option>

      <option value="Vila Progresso" {{ ((old('bairro') == "Vila Progresso") || (@$cliente->bairro == "Vila Progresso"))?"selected":"" }}>Vila Progresso</option>

      <option value="Viradouro" {{ ((old('bairro') == "Viradouro") || (@$cliente->bairro == "Viradouro"))?"selected":"" }}>Viradouro</option>

      <option value="Vital Brazil" {{ ((old('bairro') == "Vital Brazil") || (@$cliente->bairro == "Vital Brazil"))?"selected":"" }}>Vital Brazil</option>
      
    </select>
      @error('bairro')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
</div>

                            <div class="form-group row">
                                <label for="h_disponivel" class="col-md-4 col-form-label text-md-right">Horário Disponível</label>
    
                                <div class="col-md-6">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="hManha" name="h_disponivel" value="Manhã"
                                            class="custom-control-input @error('h_disponivel') is-invalid @enderror" {{ ((old('h_disponivel') == "Manhã") || (@$cliente->h_disponivel == "Manhã"))? 'checked': '' }}>
                                        <label class="custom-control-label" for="hManha">Manhã</label>
                                    </div>
                                    
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="hTarde" name="h_disponivel" value="Tarde"
                                            class="custom-control-input @error('h_disponivel') is-invalid @enderror" {{ ((old('h_disponivel') == "Tarde") || (@$cliente->h_disponivel == "Tarde"))? 'checked': '' }}>
                                        <label class="custom-control-label" for="hTarde">Tarde</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="hIntegral" name="h_disponivel" value="Integral"
                                            class="custom-control-input @error('h_disponivel') is-invalid @enderror" {{ ((old('h_disponivel') == "Integral") || (@$cliente->h_disponivel == "Integral"))? 'checked': '' }}>
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
                                <label for="h_disponivel" class="col-md-4 col-form-label text-md-right">Deseja visualizar vagas de Aprendiz?</label>
    
                                <div class="col-md 6">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="aprendizSim" name="aprendiz" value="Sim"
                                            class="custom-control-input @error('aprendiz') is-invalid @enderror" {{ ((old('aprendiz') == "Sim") || (@$cliente->aprendiz == "Sim"))? 'checked': '' }}>
                                        <label class="custom-control-label" for="aprendizSim">Sim</label>
                                    </div>
                                    
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="aprendizNao" name="aprendiz" value="Não"
                                            class="custom-control-input @error('aprendiz') is-invalid @enderror" {{ ((old('aprendiz') == "Não") || (@$cliente->aprendiz == "Não"))? 'checked': '' }}>
                                        <label class="custom-control-label" for="aprendizNao">Não</label>
                                        
                                        @error('aprendiz')
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
                                            {{ __('Atualizar') }}
                                        </button>
                                    </div>
                                </div>
                        </div>
                        
                        <input type="radio" id="typeUserCliente" name="typeUser" 
                                    class="custom-control-input"  value="Cliente" v-model="typeUser"
                                    {{ ((old('typeUser') == 'Cliente') ||($user->userable_type == "Cliente"))? 'checked': '' }} v-show="false">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection