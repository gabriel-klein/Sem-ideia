@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                 <ul class="nav nav-tabs card-header-tabs">
                     <li class="nav-item">
                        <a class="nav-link"  @click="typeUser = 'Empresa'" :class="typeUser == 'Empresa' ? 'active': 'active'">{{ __('Empresa') }}</a>
                    </li>
                </ul>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('empresa.update', $empresa->id) }}">
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
                        
                        <div v-if="typeUser == 'Empresa'">
                            <div class="form-group row">
                                <label for="cnpj" class="col-md-4 col-form-label text-md-right">CNPJ</label>
    
                                <div class="col-md-6">
                                    <input id="cnpj" type="text" class="form-control cnpjMask @error('cnpj') is-invalid @enderror" name="cnpj" value="{{ isset($empresa->cnpj)?$empresa->cnpj:old('cnpj') }}" required>
                                
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
                                    <input id="razaoSocial" type="text" class="form-control @error('razao_social') is-invalid @enderror" name="razao_social" value="{{ isset($empresa->razao_social)?$empresa->razao_social:old('razao_social') }}" required>
                                    
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
                                        {{ __('Salvar') }}
                                        </button>
                                    </div>
                                </div>
                        </div>
                        
                         <input type="radio" id="typeUserEmpresa" name="typeUser" 
                                    class="custom-control-input" value="Empresa" v-model="typeUser"
                                    {{ ((old('typeUser') == 'Empresa') ||($user->userable_type == "Empresa"))? 'checked': '' }} v-show="false">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection