@extends('layouts.components.modal')

@section('title', $vaga->funcao)

@section('content')
	<h6>Descrição</h6>
	<p>{{ $vaga->descricao }}</p>
	<p>Quantidade de Vagas: {{ $vaga->quantidade }}</p>

	@if (count($vaga->conhecimentos))
		<h6>Requisitos</h6>
		@foreach ($vaga->conhecimentos as $conhecimento)
			<p class="my-1">{{ $conhecimento->nome." - ".$conhecimento->pivot->nivel }}</p>
		@endforeach	
	@endif

	@if($vaga->email_de_contato != '' && $vaga->email_de_contato !== null)
		<h6 class="h5 mt-2">E-mail de contato</h6>
		<p>{{ $vaga->email_de_contato }}</p>
	@endif

	@typeUser('Empresa') 
		<h5>Candidatos</h5>
		@forelse ($vaga->clientes as $cliente)
			<p><a href="{{ route('cliente.show', $cliente->id) }}"  data-remote="true">{{$cliente->user->name}}</a></p>
		@empty
			<p>Não há pessoas interessadas a vaga</p>
		@endforelse
	@endtypeUser

@endsection

@section('actions')
	@typeUser('Empresa') 
		<a class="btn waves-green"  href="{{ route('vagas.edit', $vaga->id) }}">
			Editar
		</a>
	@elsetypeUser('Cliente') 
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
	@endtypeUser
@endsection