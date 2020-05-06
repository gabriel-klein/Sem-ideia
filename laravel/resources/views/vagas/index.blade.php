@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col s12 m10 offset-m1 l6 offset-l3">
			<div class="collection">
				@forelse ($vagas as $vaga)
					@include('layouts.components.vagaCollectionItem', ['vaga' => $vaga])
				@empty
				<div class="collection-item">
					Não há vagas
				</div>
				@endforelse
			</div>
		</div>
	</div>
	<div class="">  
		@filtroVaga
	</div>


	<div class="row justify-content center">
			{{ $vagas->onEachSide(2)->links() }}
	</div>

	@typeUser('Empresa')
	<div class="fixed-action-btn horizontal click-to-toggle">
		<a class="btn-floating btn-large blue"  id="lista">
		  <i class="material-icons">menu</i>
		</a>
		<ul>
		  <li><a class="btn-floating blue darken-2 showFilter"><i class="material-icons">filter_list</i></a></li>
		  <li><a class="btn-floating blue darken-1" href="{{route('vagas.create')}}"><i class=" large material-icons">add</i></a></li>
		</ul>
	</div>
	@endtypeUser
	@typeUser('Cliente')
	<div class="fixed-action-btn">
		<a class="btn-floating btn-large blue pulse showFilter" id="lista">
				<i class="large material-icons">filter_list</i>
		</a>
	</div>
	@endtypeUser
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
@endsection