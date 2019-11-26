@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                    @guest
                        <li class="nav-item">
                          <a class="nav-link pointer" @click="typeUser = 'Cliente'" :class="typeUser == 'Cliente' ? 'active': ''">Cliente</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link pointer"  @click="typeUser = 'Empresa'" :class="typeUser == 'Empresa' ? 'active': ''" >Empresa</a>
                        </li>
                    @endguest
                    @auth
                    @emp
                        <li class="nav-item">
                          <a class="nav-link pointer" @click="typeUser = 'Empresa'" :class="typeUser == 'Empresa' ? 'active': ''" >Empresa</a>
                        </li>
                    @else
                        <li class="nav-item">
                          <a class="nav-link pointer"  @click="typeUser = 'Cliente'" :class="typeUser == 'Empresa' ? 'active': 'active'">{{ __('Cliente') }}</a>
                        </li>
                    @endemp
                    @endauth
                    </ul>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div v-if="typeUser == ''">
                            <div class="texto">
                                Selecione uma opção de cadastro.
                            </div>
                        </div>

                        <div v-if="typeUser == 'Empresa' || typeUser == 'Cliente'">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            </div>
                        
                        <div v-if="typeUser == 'Empresa'">
                            <div class="form-group row">
                                <label for="cnpj" class="col-md-4 col-form-label text-md-right">CNPJ</label>
    
                                <div class="col-md-6">
                                    <input id="cnpj" type="text" class="form-control cnpjMask @error('cnpj') is-invalid @enderror" name="cnpj" value="{{ old('cnpj') }}" required>
                                
                                    @error('cnpj')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="razaoSocial" class="col-md-4 col-form-label text-md-right">Razão Social</label>
    
                                <div class="col-md-6">
                                    <input id="razaoSocial" type="text" class="form-control @error('razao_social') is-invalid @enderror" name="razao_social" value="{{ old('razao_social') }}" required>
                                    
                                    @error('razao_social')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                        </div>
                        
                        <div v-else-if="typeUser == 'Cliente'">
                            <div class="form-group row">
                                <label for="idade" class="col-md-4 col-form-label text-md-right">Idade</label>
                                
                                <div class="col-md-6">
                                    <input id="idade" type="text" class="form-control @error('idade') is-invalid @enderror" 
                                        name="idade" value="{{ old('idade') }}" required>
                                    
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
                                    <input id="cel" type="text" class="form-control telMask @error('cel1') is-invalid @enderror"
                                        name="cel1" value="{{ old('cel1') }}" required>
                                    
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
                                        name="cel2" value="{{ old('cel2') }}">
                                    
                                    @error('cel2')
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
                                <label for="h_disponivel" class="col-md-4 col-form-label text-md-right">Deseja visualizar vagas de Aprendiz?</label>
    
                                <div class="col-md 6">
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
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                        </div>
                         <input type="radio" id="typeUserEmpresa" name="typeUser" 
                                    class="custom-control-input" value="Empresa" v-model="typeUser"
                                    {{ old('typeUser') == 'Empresa'? 'checked': '' }} v-show="false">
                        
                        <input type="radio" id="typeUserCliente" name="typeUser" 
                                    class="custom-control-input"  value="Cliente" v-model="typeUser"
                                    {{ old('typeUser') == 'Cliente'? 'checked': '' }} v-show="false">


                        @auth
                            @emp
                                @else
                                    <input type="radio" id="typeUserCliente" name="typeUser" 
                                    class="custom-control-input"  value="Cliente" v-model="typeUser"
                                    {{ ((old('typeUser') == 'Cliente') ||(@$users->find($cliente->id)->userable_type == "Cliente"))? 'checked': '' }} v-show="false">
                            @endemp
                        @endauth


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
