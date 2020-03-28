@extends('layouts.app')

@section('content')

    @component('layouts.forms.card')
          
        @slot('id')
            empresaEdit
        @endslot

        @slot('top') @endslot

        @slot('title')
            Editar
        @endslot

        @slot('content')
            <form method="POST" action="{{ route('empresa.update', $empresa->id) }}">
                @csrf
                @method('PUT')

                @include('layouts.forms.user')
                @include('layouts.forms.empresa')

                <div class="row">
                    <button type="submit" class="col s12 btn waves-effect waves-light blue darken-1">
                        {{ __('Atualizar') }}
                    </button>
                </div>
            </form>
        @endslot
        
    @endcomponent
     
 
@endsection