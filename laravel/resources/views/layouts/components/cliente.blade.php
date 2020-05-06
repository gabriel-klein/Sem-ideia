@if($rota == 'cliente.volta')
	<a href="{{ route($rota, [$cliente->id,$vaga->id]) }}" class="collection-item avatar black-text"  data-remote="true">
@else
	<a href="{{ route($rota, $cliente->id) }}" class="collection-item avatar black-text"  data-remote="true">
@endif	

	<i class="material-icons circle blue">account_box</i>
	<span class="title">{{ $cliente->user->name }}</span>
	<p>Email: {{ $cliente->user->email }} <br>
		Telefone: {{ $cliente->telefone }}
	</p>
</a>