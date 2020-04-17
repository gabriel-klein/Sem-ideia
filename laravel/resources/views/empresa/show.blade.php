<div class="modal-content">
	<h4>{{ $empresa->user->name }}</h4>
	<p>
		Razão Social: {{ $empresa->razao_social }} <br>
		CNPJ: {{ $empresa->cnpj }}
	</p>
</div>
<div class="modal-footer z-depth-1">
	<form action="{{ route('empresa.autorizar', $empresa->id) }}" method="POST" class="right">
		@csrf
		<button type="submit" class="modal-close waves-effect waves-green btn-flat">
			Aprovar
		</button>
	</form>
	<form action="{{ route('empresa.destroy', $empresa->id) }}" method="POST">
		@csrf
		@method('DELETE')
		<button type="submit" class="modal-close waves-effect waves-green btn-flat right">
			Negar
		</button>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(() => {
		$('#modal').modal();
		$('#modal').modal('open');
	});
</script>