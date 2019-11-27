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

@emp 
    @section('footer')
    <a class="btn btn-success"  href="{{ route('vagas.edit', $vaga->id) }}">
        Editar
    </a>
    @endsection
@endemp