<div class="row">
	<div class="col s12">
	  	<ul id="tabs-swipe-demo" class="tabs">
		    <li class="tab col s3"><a href="#test-swipe-1">Parte 1</a></li>
		    <li class="tab col s3"><a href="#test-swipe-2">Parte 2</a></li>
		    <li class="tab col s3"><a href="#test-swipe-3">Parte 3</a></li>
		    <li class="tab col s3"><a href="#test-swipe-4">Parte 4</a></li>
	    </ul>
	    <div id="test-swipe-1" class="col s12">

	  		<table class="centered responsive-table">
				<thead>
					<tr>
						<th>Conhecimento</th>
						<th>Básico</th>
						<th>Intermediário</th>
						<th>Avançado</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($conhecimentos as $conhecimento)
					@if ($conhecimento->id > 1)
						@break
					@endif
				<tr>
					<td>{{$conhecimento->nome}}</td>
					{{-- <td>	
						<label>
							<input type="radio" name="{{"Conhecimento_".$conhecimento->id}}" value="">
							<span></span>
						</label>
					</td> --}}
					<td>	
						<label>
							<input type="radio" class="with-gap" name="{{"Conhecimento_".$conhecimento->id}}" value="Básico">
							<span></span>
						</label>
					</td>
					<td>
						<label>
							<input type="radio" class="with-gap" name="{{"Conhecimento_".$conhecimento->id}}" value="Intermediário">
							<span></span>
						</label>
					</td>
					<td>
						<label>
							<input type="radio" class="with-gap" name="{{"Conhecimento_".$conhecimento->id}}" value="Avançado">
							<span></span>
						</label>
					</td>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>

		<div id="test-swipe-2" class="col s12">

	  		<table class="centered responsive-table">
				<thead>
					<tr>
						<th>Conhecimento</th>
						<th>Básico</th>
						<th>Intermediário</th>
						<th>Avançado</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($conhecimentos as $conhecimento)
					@if ($conhecimento->id < 2)
						@continue
					@endif
					@if ($conhecimento->id > 2)
						@break
					@endif
				<tr>
					<td>{{$conhecimento->nome}}</td>
					{{-- <td>	
						<label>
							<input type="radio" name="{{"Conhecimento_".$conhecimento->id}}" value="">
							<span></span>
						</label>
					</td> --}}
					<td>	
						<label>
							<input type="radio" class="with-gap" name="{{"Conhecimento_".$conhecimento->id}}" value="Básico">
							<span></span>
						</label>
					</td>
					<td>
						<label>
							<input type="radio" class="with-gap" name="{{"Conhecimento_".$conhecimento->id}}" value="Intermediário">
							<span></span>
						</label>
					</td>
					<td>
						<label>
							<input type="radio" class="with-gap" name="{{"Conhecimento_".$conhecimento->id}}" value="Avançado">
							<span></span>
						</label>
					</td>
				</tr>
				</tbody>
				@endforeach
			</table>
		</div>

		<div id="test-swipe-3" class="col s12">

	  		<table class="centered responsive-table">
				<thead>
					<tr>
						<th>Conhecimento</th>
						<th>Básico</th>
						<th>Intermediário</th>
						<th>Avançado</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($conhecimentos as $conhecimento)
					@if ($conhecimento->id < 3)
						@continue
					@endif
					@if ($conhecimento->id > 3)
						@break
					@endif
				<tr>
					<td>{{$conhecimento->nome}}</td>
					{{-- <td>	
						<label>
							<input type="radio" name="{{"Conhecimento_".$conhecimento->id}}" value="">
							<span></span>
						</label>
					</td> --}}
					<td>	
						<label>
							<input type="radio" class="with-gap" name="{{"Conhecimento_".$conhecimento->id}}" value="Básico">
							<span></span>
						</label>
					</td>
					<td>
						<label>
							<input type="radio" class="with-gap" name="{{"Conhecimento_".$conhecimento->id}}" value="Intermediário">
							<span></span>
						</label>
					</td>
					<td>
						<label>
							<input type="radio" class="with-gap" name="{{"Conhecimento_".$conhecimento->id}}" value="Avançado">
							<span></span>
						</label>
					</td>
				</tr>
				</tbody>
				@endforeach
			</table>
		</div>

		<div id="test-swipe-4" class="col s12">

	  		<table class="centered responsive-table">
				<thead>
					<tr>
						<th>Conhecimento</th>
						<th>Básico</th>
						<th>Intermediário</th>
						<th>Avançado</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($conhecimentos as $conhecimento)
					@if ($conhecimento->id < 4)
						@continue
					@endif
					@if ($conhecimento->id > 4)
						@break
					@endif
				<tr>
					<td>{{$conhecimento->nome}}</td>
					{{-- <td>	
						<label>
							<input type="radio" name="{{"Conhecimento_".$conhecimento->id}}" value="">
							<span></span>
						</label>
					</td> --}}
					<td>	
						<label>
							<input type="radio" class="with-gap" name="{{"Conhecimento_".$conhecimento->id}}" value="Básico">
							<span></span>
						</label>
					</td>
					<td>
						<label>
							<input type="radio" class="with-gap" name="{{"Conhecimento_".$conhecimento->id}}" value="Intermediário">
							<span></span>
						</label>
					</td>
					<td>
						<label>
							<input type="radio" class="with-gap" name="{{"Conhecimento_".$conhecimento->id}}" value="Avançado">
							<span></span>
						</label>
					</td>
				</tr>
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
</div>
