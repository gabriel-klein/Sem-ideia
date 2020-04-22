<a href="{{ route('cliente.show', $cliente->id) }}" class="collection-item avatar black-text"  data-remote="true">
	<i class="material-icons circle blue">account_box</i>
	<span class="title">{{ $cliente->user->name }}</span>
	<p>Email: {{ $cliente->user->email }} <br>
		Telefone: {{ $cliente->telefone }}
	</p>
</a>