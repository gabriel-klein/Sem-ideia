@extends('layouts.app')

@section('content')

    @component('layouts.form')
              
        @slot('id')
            
        @endslot

        @slot('top') @endslot

        @slot('title')
            Criar Nova Experiência
        @endslot

        @slot('content')
            <form method="POST" action="{{ route('experiencia.store') }}">
                @csrf
                @include('cliente.experiencia.form')

                <div class="row">
                    <button type="submit" class="col s12 btn waves-effect waves-light blue darken-1">
                        {{ __('Cadastrar') }}
                    </button>
                </div>

            </form>
        @endslot
    @endcomponent
@endsection