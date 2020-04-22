@extends('layouts.app')

@section('content')

    @component('layouts.form')
          
        @slot('id')
            clienteEdit
        @endslot

        @slot('title')
            Editar
        @endslot

        @slot('content')
            <form method="POST" action="{{ route('cliente.update', $cliente->id) }}">
                @csrf
                @method('PUT')

                @include('auth.form')
                @include('cliente.form')
                
                <div class="row">
                    <button type="submit" class="col s12 btn waves-effect ">
                        {{ __('Atualizar') }}
                    </button>
                </div>
                
            </form>
        @endslot
        
    @endcomponent
     
@endsection