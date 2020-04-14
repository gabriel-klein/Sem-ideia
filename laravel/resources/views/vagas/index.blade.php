@extends('layouts.app')

@section('content')
    <div class="container">  
        @forelse ($vagas as $vaga)
            <div class="row">
                @component('layouts.components.vaga')
                    @slot('id')
                        {{$vaga->id}}
                    @endslot
                    @slot('title')
                        {{$vaga->funcao}}
                    @endslot

                    @slot('empresa')
                        @if(Auth::user()->userable_type == "Cliente")
                            {{ $vaga->empresa->razao_social }}
                        @endif
                    @endslot

                    @slot('descricao')
                        {{$vaga->descricao}}
                    @endslot

                    @slot('quantidade')
                        {{$vaga->quantidade}}
                    @endslot

                    @slot('emailDeContato')
                        {{$vaga->emailDeContato}}
                    @endslot

                    @slot('requisitos')
                        <p>Requisitos</p>
                    @endslot

                    @slot('actions')
                        @emp
                            <form action="{{ route('vagas.destroy',$vaga->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <a class="botao" href="{{ route('vagas.edit', $vaga->id) }}">Editar</a>

                            <button type="submit" class="botao">
                              {{ __('Excluir') }}
                            </button>
                            </form>
                          @else
                            @if (count($vaga->clientes()->where("cliente_id", Auth::user()->userable->id)->get()) != 1)
                                  <form action="{{route('vagas.candidatar')}}" method="post">
                                      @csrf
                                      <input type="hidden" name="vaga" value="{{ $vaga->id }}">
                                      <input type="hidden" name="cliente" value="{{ Auth::user()->userable->id }}">
                                      <button type="submit" class="botao">Candidatar</button>
                                  </form>
                              @else
                                  <form action="{{route('vagas.cancelarCandidatura')}}" method="post">
                                      @csrf
                                      <input type="hidden" name="vaga" value="{{ $vaga->id }}">
                                      <input type="hidden" name="cliente" value="{{ Auth::user()->userable->id }}">
                                      <button type="submit" class="botao">Cancelar candidatura</button>
                                  </form>
                            @endif
                        @endemp
                    @endslot
                @endcomponent
            </div>
        @empty
            <p>Não há vagas cadastradas ainda</p>
        @endforelse

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