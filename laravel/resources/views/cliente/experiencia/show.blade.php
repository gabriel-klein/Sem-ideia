@extends('layouts.modal')

@section('title', $experiencia->local)

@section('content')
	<div class="row">
		<div class="col s12">
		<h6>Descrição: </h6>
		<p id="desc">{{$experiencia->descricao}}</p>
    	<h6> Data Início: </h6>
    	<p>{{$experiencia->data_inicio}}</p>
    	<h6> Data Fim: </h6>
    	<p>{{$experiencia->data_fim}}</p>
    	<h7> Possui documento que comprove essa experiência? </h7>
    	<p>{{$experiencia->comprovacao}}</p>
		</div>
	</div>
@endsection