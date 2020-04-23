<div class="row">
	<div class="col s12">
	  	<ul id="tabs-swipe-demo" class="tabs">
		    <li class="tab col s3"><a href="#test-swipe-1">Parte 1</a></li>
		    <li class="tab col s3"><a href="#test-swipe-2">Parte 2</a></li>
		    <li class="tab col s3"><a href="#test-swipe-3">Parte 3</a></li>
		    <li class="tab col s3"><a href="#test-swipe-4">Parte 4</a></li>
	    </ul>
	</div>

    @foreach ($conhecimentos as $conhecimento)
    	@php
    		$conhecimentoData = isset($data[$conhecimento->id])?$data[$conhecimento->id]:null;
    	@endphp

	    @if ($loop->first)
		    <div id="test-swipe-1" class="col s12">
		@endif

		@if ($loop->index == 4)
			<div id="test-swipe-2" class="col s12">
		@endif

		@if ($loop->index == 8)
		<div id="test-swipe-3" class="col s12">
		@endif

		@if ($loop->index == 12)
		<div id="test-swipe-4" class="col s12">
			
		@endif

		@if($loop->first || $loop->index == 4 || $loop->index == 8 || $loop->index == 12)

		
		<table class="centered highlight responsive-table">
				<thead>
					<tr>
						<th>Conhecimento</th>
						<th>Básico</th>
						<th>Intermediário</th>
						<th>Avançado</th>
					</tr>
				</thead>

				<tbody>
		@endif

			<tr>
				<td>{{$conhecimento->nome}}</td>
				<td>	
					<label>
						<input type="radio" class="with-gap" name="{{"Conhecimento_".$conhecimento->id}}" value="Básico"
						{{ old($conhecimentoData) == "Básico" ? 'checked' : ($conhecimentoData == "Básico"? 'checked': '') }}>
						<span></span>
					</label>
				</td>
				<td>
					<label>
						<input type="radio" class="with-gap" name="{{"Conhecimento_".$conhecimento->id}}" value="Intermediário"
						{{ old($conhecimentoData) == "Intermediário" ? 'checked' : ($conhecimentoData == "Intermediário"? 'checked': '') }}>
						<span></span>
					</label>
				</td>
				<td>
					<label>
						<input type="radio" class="with-gap" name="{{"Conhecimento_".$conhecimento->id}}" value="Avançado"
						{{ old($conhecimentoData) == "Avançado" ? 'checked' : ($conhecimentoData == "Avançado"? 'checked': '') }}>
						<span></span>
					</label>
				</td>
			</tr>
		@if($loop->index == 3 || $loop->index == 7 ||$loop->index == 11 ||$loop->last)
			</tbody>
			</table>
			</div>
		@endif
	@endforeach

	@if (count($conhecimentos) < 4 )
		<div id="test-swipe-2" class="col s12"></div>
		<div id="test-swipe-3" class="col s12"></div>
		<div id="test-swipe-4" class="col s12"></div>

	@elseif (count($conhecimentos) < 8 )
		<div id="test-swipe-3" class="col s12"></div>
		<div id="test-swipe-4" class="col s12"></div>

	@elseif (count($conhecimentos) <13 )
		<div id="test-swipe-4" class="col s12"></div>

	@endif		
</div>