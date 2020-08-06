@extends('layouts.app')

@section('content')
    @component('layouts.form')
        @slot('col')
            col s12 m8 offset-m2 l6 offset-l3
        @endslot

        @slot('title')
            Login
        @endslot

        @slot('content')
            <form method="POST" action="{{ route('login') }}">
                @csrf

                @input([
                    'type' => 'email', 
                    'name' => 'email', 
                    'icon' => 'mail_outline', 
                    'value' => old('email'),
                    'label' => 'Email'
                ])

                @input([
                    'type' => 'password', 
                    'name' => 'password', 
                    'icon' => 'lock_outline', 
                    'label' => 'Senha'
                ])

                <div class="row">
                    <button type="submit" class="col s12 btn waves-effect ">
                        {{ __('Login') }}
                    </button>
                </div>

                <div class="row">
                    <div class="col s12">
                        @if (Route::has('password.request'))
                            <a class="left pass" href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        @endslot
    @endcomponent

@endsection
