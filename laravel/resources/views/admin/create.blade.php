@extends('layouts.app')

@section('content')

    @component('layouts.form')
          
        @slot('id')
            adminCreate
        @endslot

        @slot('top') @endslot

        @slot('title')
            Criar
        @endslot

        @slot('content')
            <form method="POST" method="POST" action="{{ route('register') }}">
                @csrf

                @include('auth.form')
                
                <div class="row">
                    <button type="submit" class="col s12 btn waves-effect waves-light blue darken-1">
                        {{ __('Criar') }}
                    </button>
                </div>
                
            </form>
        @endslot
        
    @endcomponent
     
@endsection