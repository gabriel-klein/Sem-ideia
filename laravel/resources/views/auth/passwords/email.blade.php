@extends('layouts.app')

@section('content')

    @component('layouts.form')
        
        @slot('title') Redefinir Senha @endslot

        @slot('col') col s12 m6 offset-m3  @endslot

        @slot('content')
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                @input([
                    'type' => 'email',
                    'name' => 'email',
                    'icon' => 'mail_outline',
                    'label' => 'Email'
                ])

                <div class="row">
                    <button type="submit" class="col s12 btn waves-effect">
                        Enviar
                    </button>
                </div>
            </form>
        @endslot
    @endcomponent
@endsection
