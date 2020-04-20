@extends('layouts.modal')

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
	<ul class="collapsible" style="margin-top: 2em">
		<li>
			<div class="collapsible-header"><i class="material-icons">account_box</i>Candidatos</div>
			<div class="collapsible-body">
				<div class="collection">
					@forelse ($vaga->clientes as $cliente)
						@include('layouts.components.cliente', ['cliente' => $cliente])
					@empty
						<div class="collection-item">Não há pessoas interessadas a vaga</div>
					@endforelse
				</div>
			</div>
		</li>
	</ul>
	@endtypeUser
@endsection

@section('actions')
	@typeUser('Empresa')
	<form action="{{ route('vagas.destroy', $vaga->id) }}" method="POST">
    @csrf
    @method('DELETE')

    <a class="btn waves-green white-text"  href="{{ route('vagas.edit', $vaga->id) }}">
			Editar</a>
	<button type="submit" class="btn waves-effect red">
        {{ __('Excluir') }}
    </button>
    </form> 
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
<script>
	$(document).ready(function(){
		$('.collapsible').collapsible({
			onOpenEnd:  () => {
				$('.collapsible-body').css("padding", "0px");
			},
			inDuration: 0,
			outDuration: 150
		});
	});
</script>