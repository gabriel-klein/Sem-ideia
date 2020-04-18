@extends('layouts.app')

@section('content')

    @component('layouts.form')
          
        @slot('id')
            adminEdit
        @endslot

        @slot('top') @endslot

        @slot('title')
            Editar
        @endslot

        @slot('content')
            <form method="POST" action="{{ route('admin.update', Auth::user()->id) }}">
                @csrf
                @method('PUT')

                @include('auth.form')

                <div class="row">
                    <button type="submit" class="col s12 btn waves-effect ">
                        {{ __('Atualizar') }}
                    </button>
                </div>
                
            </form>
        @endslot
        
    @endcomponent
     
@endsection