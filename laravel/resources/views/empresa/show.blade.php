@extends('layouts.modal')

@section('title', $empresa->user->name)

@section('content')
	<h6>Razão Social</h6>
	<p>{{ $empresa->razao_social }}</p>
	<h6>CNPJ</h6>
	<p>{{ $empresa->cnpj }}</p>
	<h6>Email</h6>
	<p>{{ $empresa->user->email }}</p>
@endsection

@section('actions')
	<form action="{{ route('empresa.autorizar', $empresa->id) }}" method="POST" class="left" style="margin-right: 0.5em">
		@csrf
		<button type="submit" class="btn">
			Aprovar
		</button>
	</form>

	<form action="{{ route('empresa.destroy', $empresa->id) }}" method="POST">
		@csrf
		@method('DELETE')
		<button type="submit" class="btn">
			Negar
		</button>
	</form>

@endsection
