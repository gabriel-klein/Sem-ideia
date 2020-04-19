@extends('layouts.modal')

@section('title', 'Detalhes')

@section('content')
	<h6>Nome</h6>
	<p>{{ $user->name }}</p>
	<p>Email: {{ $user->email }} </p>
@endsection

@section('actions')
	<form action="{{ route('admin.destroy', $user->id) }}" method="POST">
		@csrf
		@method('DELETE')
		<button type="submit" class="waves-effect waves-green btn">
			Deletar
		</button>
	</form>
@endsection