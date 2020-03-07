@extends('layouts.modal')

@section('titulo', 'Descrição da Vaga')

@section('conteudo')
  <h2 class=" text-center">{{ $vaga->funcao }}</h3>
  <h4 class="h4">Descrição</h5>
  <p>{{ $vaga->descricao }}</p>
  <p>Quantidade de Vagas: {{ $vaga->quantidade }}</p>
  <h4 class="h4">Requisitos</h5>
  @foreach ($vaga->conhecimentos as $conhecimento)
      <p class="my-1">{{ $conhecimento->nome." - ".$conhecimento->pivot->nivel }}</p>
  @endforeach
  <h5 class="h5 mt-2">E-mail de contato</h5>
  <p>{{ $vaga->email_de_contato }}</p>
@endsection

@section('footer')
    @emp 
        <a class="btn btn-success"  href="{{ route('vagas.edit', $vaga->id) }}">
            Editar
        </a>
    @else
        @if (!$vaga->clientes()->find(Auth::user()->userable->id)) 
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