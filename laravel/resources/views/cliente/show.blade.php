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
			<ul><h6>Conhecimentos</h6>
				@forelse ($cliente->conhecimentos->sortBy('nome') as $conhecimento)
				<li>{{ $conhecimento->nome }} - {{ $conhecimento->pivot->nivel }}</li>
				@empty
				<li href="" class="collection-item black-text">O usuário não cadastrou nenhum conhecimento</li>
				@endforelse
			</ul>
		</div>
	</div>
@endsection