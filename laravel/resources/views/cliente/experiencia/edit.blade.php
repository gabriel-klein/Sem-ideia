@extends('layouts.app')

@section('content')

    @component('layouts.form')
              
        @slot('id')
            
        @endslot

        @slot('top') @endslot

        @slot('title')
            Editar
        @endslot

        @slot('content')
            <form method="POST" action="{{ route('experiencia.update', [$cliente->id, $experiencia->id]) }}">
                @csrf
                @method('PUT')

                @include('cliente.experiencia.form')

                <div class="row">
                    <button type="submit" class="col s12 btn waves-effect ">
                        {{ __('Atualizar') }}
                    </button>
                </div>

            </form>
        @endslot
    @endcomponent
@endsection