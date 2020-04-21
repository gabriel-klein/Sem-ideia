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
                    @slot('actions')
                        <form action="{{ route('experiencia.destroy', [$cliente->id, $experiencia->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <a class="botao" href="{{ route('experiencia.edit', [$cliente->id, $experiencia->id]) }}">Editar</a>

                            <button type="submit" class="botao">
                              {{ __('Excluir') }}
                            </button>
                        </form>
                    @endslot
                @endcomponent
            @empty
                <p>Não há experiencias cadastradas ainda</p>
            @endforelse
        </div>
        <div class="row justify-content center">
                {{ $experiencias->links() }}
        </div>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large blue pulse" href="{{route('experiencia.create', $cliente->id)}}">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </div>
@endsection