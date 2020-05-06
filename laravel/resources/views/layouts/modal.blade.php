<div class="row" id="modalRow">
	<div class="col s12 m8 offset-m2 l6 offset-l3">
		<div class="card">
			<div class="card-content  grey lighten-4">
				@hasSection('actions')
				@else
					@isset($teste1)
						<a href="{{ route('vagas.show', $vaga->id) }}" data-remote="true"><i class="material-icons left">arrow_back</i></a>
					@endisset

					@isset($teste)
						@isset($vaga)
							<a href="{{ route('cliente.volta', [$cliente->id,$vaga->id]) }}" data-remote="true"><i class="material-icons left">arrow_back</i></a>
						@else
							<a href="{{ route('cliente.show', $cliente->id) }}" data-remote="true"><i class="material-icons left">arrow_back</i></a>	
						@endisset
					@endisset
				@endif
				<span class="card-title center-align">@yield('title')</span>
				@yield('content')
			</div>
			<div class="card-action cartao_footer">
				@yield('actions')
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(window).click(function(event) {
		if (event.target.id == 'modalRow' || event.target.id == 'modal') {
			$('#modal').remove();
		}
	});
</script>