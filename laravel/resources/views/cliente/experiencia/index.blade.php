@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">    
            @forelse ($experiencias as $experiencia)
                @component('layouts.cards_experiencia', ['cliente' => $cliente])
                    @slot('id')
                        {{$experiencia->id}}
                    @endslot
                    @slot('title')
                        {{$experiencia->local}}
                    @endslot
                    @slot('descricao')
                        {{$experiencia->descricao}}
                    @endslot

                    @slot('data_inicio')
                        {{$experiencia->data_inicio}}
                    @endslot

                    @slot('data_fim')
                        {{$experiencia->data_fim}}
                    @endslot

                    @slot('comprovacao')
                        {{$experiencia->comprovacao}}
                    @endslot
                @endcomponent
            @empty
                <p>Não há experiencias cadastradas ainda</p>
            @endforelse
        </div>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large blue pulse" href="{{route('experiencias.create', $cliente->id)}}">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </div>
@endsection