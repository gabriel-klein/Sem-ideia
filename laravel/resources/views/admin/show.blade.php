<div class="modal-content">
	<h4>{{ $user->name }}</h4>
	<p>Email: {{ $user->email }} </p>
</div>
<div class="modal-footer z-depth-1">
	<form action="{{ route('admin.destroy', $user->id) }}" method="POST" class="right">
		@csrf
		@method('DELETE')
		<button type="submit" class="modal-close waves-effect waves-green btn-flat">
			Deletar
		</button>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(() => {
		$('#modal').modal();
		$('#modal').modal('open');
	});
</script>