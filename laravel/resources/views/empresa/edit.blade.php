@extends('layouts.app')

@section('content')

    @component('layouts.form')
          
        @slot('id')
            empresaEdit
        @endslot

        @slot('title')
            Editar
        @endslot

        @slot('content')
            <form method="POST" action="{{ route('empresa.update', $empresa->id) }}">
                @csrf
                @method('PUT')

                @include('auth.form')
                @include('empresa.form')

                <div class="row">
                    <button type="submit" class="col s12 btn waves-effect waves-light blue darken-1">
                        {{ __('Atualizar') }}
                    </button>
                </div>
            </form>
        @endslot
        
    @endcomponent
     
 
@endsection