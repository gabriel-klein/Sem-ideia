@extends('layouts.app')

@section('content')
    
    @component('layouts.form')
        
        @slot('id') 
            curriculoForm
        @endslot
   
        @slot('title')
            Currículo
        @endslot
        
        @slot('content')
            <form method="POST" action="{{ route('cliente.conhecimento') }}"> 
                @csrf
                @include('cliente.curriculoForm')
                
                <div class="row">
                    <button type="submit" class="col s12 btn waves-effect waves-light blue darken-1">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        @endslot

    @endcomponent
    
@endsection
