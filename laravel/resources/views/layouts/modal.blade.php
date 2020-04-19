<div class="row" id="modalRow">
	<div class="col s12 m8 offset-m2 l6 offset-l3">
		<div class="card">
			<div class="card-content">
				<span class="card-title center-align">@yield('title')</span>
				@yield('content')
			</div>
			<div class="card-action">
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