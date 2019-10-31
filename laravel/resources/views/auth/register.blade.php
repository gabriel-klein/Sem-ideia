@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
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
                    
                        <div v-if="typeUser == 'Empresa'">
                            <div class="form-group row">
                                <label for="cnpj" class="col-md-4 col-form-label text-md-right">CNPJ</label>
    
                                <div class="col-md-6">
                                    <input id="cnpj" type="text" class="form-control" name="cnpj" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="razaoSocial" class="col-md-4 col-form-label text-md-right">Razão Social</label>
    
                                <div class="col-md-6">
                                    <input id="razaoSocial" type="text" class="form-control" name="razaoSocial" required>
                                </div>
                            </div>
                        </div>
                        
                        <div v-else-if="typeUser == 'Cliente'">
                            <div class="form-group row">
                                <label for="age" class="col-md-4 col-form-label text-md-right">Idade</label>
                                
                                <div class="col-md-6">
                                    <input id="age" type="text" class="form-control" name="age" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cel" class="col-md-4 col-form-label text-md-right">Celular</label>
    
                                <div class="col-md-6">
                                    <input id="cel" type="text" class="form-control" name="cel" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cel2" class="col-md-4 col-form-label text-md-right">Celular 2</label>
    
                                <div class="col-md-6">
                                    <input id="cel2" type="text" class="form-control" name="cel2">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Tipo de Usuário</label>

                            <div class="col-md 6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="typeUserCliente" name="type" class="custom-control-input" value="Cliente" v-model="typeUser">
                                    <label class="custom-control-label" for="typeUserCliente">Cliente</label>
                                </div>
                                
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="typeUserEmpresa" name="type" class="custom-control-input" value="Empresa" v-model="typeUser">
                                    <label class="custom-control-label" for="typeUserEmpresa">Empresa</label>
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
