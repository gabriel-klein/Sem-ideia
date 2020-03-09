@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">    
            @foreach ($vagas as $vaga)
                @component('layouts.cards')
                    @slot('title')
                        {{$vaga->funcao}}
                    @endslot

                    @slot('descricao')
                        {{$vaga->descricao}}
                    @endslot

                    @slot('quantidade')
                        {{$vaga->quantidade}}
                    @endslot

                    @slot('emailContato')
                        {{$vaga->email_de_contato}}
                    @endslot

                    @section('requisitos')
                        <p>Requisitos</p>
                    @endsection

                    @section('actions')
                        @emp
                            <a class="btn waves-effect waves-light"  href="{{ route('vagas.edit', $vaga->id) }}">
                                <i class="material-icons right">edit</i>  Editar
                            </a>
                        @else
                            
                            @if (count($vaga->clientes()->where("cliente_id", Auth::user()->userable->id)->get()) != 1)
                                <form action="{{route('vagas.candidatar')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="vaga" value="{{ $vaga->id }}">
                                    <input type="hidden" name="cliente" value="{{ Auth::user()->userable->id }}">
                                    <button type="submit" class="btn btn-primary">Candidatar</button>
                                </form>
                            @else
                                <form action="{{route('vagas.cancelarCandidatura')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="vaga" value="{{ $vaga->id }}">
                                    <input type="hidden" name="cliente" value="{{ Auth::user()->userable->id }}">
                                    <button type="submit" class="btn btn-danger">Cancelar candidatura</button>
                                </form>
                            @endif
                        @endemp
                    @endsection
                @endcomponent
            @empty
                <p>Não há vagas cadastradas ainda</p>
            @endforelse
        </div>
        <div class="row justify-content-center">
                {{ $vagas->links() }}
        </div>
        @emp
            {{-- <a href="{{route('vagas.create')}}">Criar uma nova vaga</a> --}}

            <div class="fixed-action-btn">
                <a class="btn-floating btn-large blue pulse" href="{{route('vagas.create')}}">
                    <i class="large material-icons">add</i>
                </a>
            </div>
        
       @endemp
    </div>
@endsection