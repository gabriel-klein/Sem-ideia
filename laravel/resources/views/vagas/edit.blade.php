@extends('layouts.app')

@section('content')

    @component('layouts.form')
              
        @slot('id')
            
        @endslot

        @slot('top') @endslot

        @slot('title')
            Editar Vaga
        @endslot

        @slot('content')
            <form method="POST" action="{{  route('vagas.update', $vaga->id) }}">
                @csrf
                @method('PUT')
                @include('vagas.form')

                <div class="row">
                    <button type="submit" class="col s12 btn waves-effect ">
                        {{ __('Atualizar') }}
                    </button>
                </div>

            </form>
        @endslot
    @endcomponent
@endsection