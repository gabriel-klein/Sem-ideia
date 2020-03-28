@extends('layouts.app')

@section('content')
        
    @component('layouts.forms.card')
        
        @slot('id')
            registerFormPage
        @endslot
    
        @slot('top')
            <div class="row" style="margin-bottom: 0px">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab">
                            <a href="#none" class="hide {{ old('typeUser') != "Empresa" && old('typeUser') != "Cliente" ? "active" : "" }}"></a>
                        </li>
                        <li class="tab col s6">
                            <a href="#Cliente" class="{{old('typeUser') == "Cliente" ? "active" : "" }}">Cliente</a>
                        </li>
                        <li class="tab col s6">
                            <a href="#Empresa" class="{{old('typeUser') == "Empresa" ? "active" : "" }}">Empresa</a>
                        </li>
                    </ul>
                </div>
            </div>
        @endslot

        @slot('title')
            Registrar
        @endslot

        @slot('content')
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div id="none" class="center-align" v-if="typeUser == ''" >
                    <p> Selecione uma opção de cadastro. </p>
                </div>

                <div v-if="typeUser == 'Empresa' || typeUser == 'Cliente'">
                    @include('layouts.forms.user')
                </div>
                
                <div id="Empresa" v-if="typeUser == 'Empresa'">
                    @include('layouts.forms.empresa')
                </div>
                
                <div id="Cliente" v-if="typeUser == 'Cliente'">
                    @include('layouts.forms.cliente')
                </div>
                <div class="row" v-if="typeUser == 'Empresa' || typeUser == 'Cliente'">
                    <button type="submit" class="col s12 btn waves-effect waves-light blue darken-1">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        @endslot
    @endcomponent
@endsection