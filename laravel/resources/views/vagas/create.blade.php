@extends('layouts.app')

@section('content')

    @component('layouts.forms.card')
              
        @slot('id')
            
        @endslot

        @slot('top') @endslot

        @slot('title')
            Criar Vaga
        @endslot

        @slot('content')
            <form method="POST" action="{{  route('vagas.store') }}">
                @csrf
                @include('vagas.form')

                <div class="row">
                    <button type="submit" class="col s12 btn waves-effect waves-light blue darken-1">
                        {{ __('Cadastrar') }}
                    </button>
                </div>

            </form>
        @endslot
    @endcomponent
@endsection