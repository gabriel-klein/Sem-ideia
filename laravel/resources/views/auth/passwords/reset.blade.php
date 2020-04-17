@extends('layouts.app')

@section('content')

    @component('layouts.form')
        
        @slot('col') col s12 m6 offset-m3 @endslot

        @slot('title') Alterar Senha @endslot

        @slot('content')

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                
                <input type="hidden" name="token" value="{{ $token }}">

                @input([
                    'type' => 'email',
                    'name' => 'email',
                    'icon' => 'mail_outline',
                    'label' => 'Email',
                    'data' => $email
                ])

                @input([
                    'type' => 'password',
                    'name' => 'password',
                    'icon' => 'lock_outline',
                    'label' => 'Senha'
                ])
                
                @input([
                    'type' => 'password',
                    'name' => 'password_confirmation',
                    'icon' => 'lock_outline',
                    'label' => 'Confirme sua Senha'
                ])

                <div class="row">
                    <button type="submit" class="col s12 btn waves-effect waves-light blue darken-1">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        @endslot
    @endcomponent
@endsection