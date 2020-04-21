@extends('layouts.app')

@section('content')
	<div class="container">  
		<div class="row">
			<div class="col s12 m10 offset-m1 l8 offset-l2">
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
		<div class="row justify-content center">
				{{ $vagas->links() }}
		</div>
		@typeUser('Empresa')
			<div class="fixed-action-btn">
					<a class="btn-floating btn-large blue pulse" href="{{route('vagas.create')}}">
							<i class="large material-icons">add</i>
					</a>
			</div>
		@endtypeUser
	</div>
@endsection