@extends('layouts.modal')

@section('title', $cliente->user->name)

@section('content')
	<div class="row">
		<div class="col s12">
			<h6>Email</h6>
			<p>{{ $cliente->user->email }}</p>
			<h6>Telefone</h6>
			<p>{{ $cliente->telefone }}</p>
			<h6>Escolaridade</h6>
			<p>{{ $cliente->escolaridade }}</p>
			<h6>Descrição Pessoal</h6>
			<p id="desc">{{ $cliente->descricaoPessoal }}</p>
			<ul><h6>Conhecimentos</h6>
				@forelse ($cliente->conhecimentos->sortBy('nome') as $conhecimento)
				<li>{{ $conhecimento->nome }} - {{ $conhecimento->pivot->nivel }}</li>
				@empty
				<li href="" class="collection-item black-text">O usuário não cadastrou nenhum conhecimento</li>
				@endforelse
			</ul>
			<ul><h6>Experiências</h6>
				@forelse ($cliente->experiencias as $experiencia)
				@isset($vaga)
					<a href="{{route('experiencia.volta', [$cliente->id, $experiencia->id, $vaga->id]) }}" data-remote="true"><li class="exp">{{$experiencia->local}} - {{$experiencia->data_fim}}</li></a>
				@else
					<a href="{{route('experiencia.show', [$cliente->id, $experiencia->id]) }}" data-remote="true"><li class="exp">{{$experiencia->local}} - {{$experiencia->data_fim}}</li></a>
				@endisset
				@empty
				<li class="collection-item black-text"> O usuário não cadastrou nenhuma experiência</li>
				@endforelse
			</ul>
		</div>
	</div>
@endsection