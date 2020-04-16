<div class="modal-content">
	<h4>{{ $empresa->user->name }}</h4>
	<p>
		Razão Social: {{ $empresa->razao_social }} <br>
		CNPJ: {{ $empresa->cnpj }}
	</p>
</div>
<div class="modal-footer z-depth-1">
	<a class="modal-close waves-effect waves-green btn-flat">Negar</a>
	<form action="{{ route('empresa.autorizar', $empresa->id) }}" method="POST" class="right">
		@csrf
		<button type="submit" class="modal-close waves-effect waves-green btn-flat">
			Aprovar
		</button>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(() => {
		$('#modal').modal();
		$('#modal').modal('open');
	});
</script>