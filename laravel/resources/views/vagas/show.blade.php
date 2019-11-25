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
  <p>E-mail de contato: {{ $vaga->email_de_contato }}</p>
  
@endsection