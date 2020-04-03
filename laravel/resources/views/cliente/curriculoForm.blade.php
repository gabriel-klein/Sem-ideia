<div class="row">
	<div class="input-field col s12">
		<i class="material-icons prefix">school</i>
		<select id="escolaridade" class="custom-select @error('escolaridade') invalid @enderror" 
			name="escolaridade" required>
			<option  selected disabled >Selecione sua Escolaridade</option>
			<option value="Superior_completo" {{ ((old('escolaridade') == "Superior_completo") || (@$conhecimentos->find(1)->nome == "escolaridade") && (@$conhecimentos->find(1)->pivot->nivel=="Superior_completo"))?"selected":"" }}>Superior Completo</option>
			<option value="Superior_incompleto" {{ ((old('escolaridade') == "Superior_incompleto") || (@$conhecimentos->find(1)->nome == "escolaridade") && (@$conhecimentos->find(1)->pivot->nivel=="Superior_incompleto"))?"selected":"" }}  >Superior Incompleto</option>
			<option value="Médio_completo" {{ ((old('escolaridade') == "Médio_completo") || (@$conhecimentos->find(1)->nome == "escolaridade") && (@$conhecimentos->find(1)->pivot->nivel=="Médio_completo"))?"selected":"" }} >Médio Completo</option>
			<option value="Médio_incompleto" {{ ((old('escolaridade') == "Médio_incompleto") || (@$conhecimentos->find(1)->nome == "escolaridade") && (@$conhecimentos->find(1)->pivot->nivel=="Médio_incompleto"))?"selected":"" }}  >Médio Incompleto</option>
			<option value="Fundamental_completo" {{ ((old('escolaridade') == "Fundamental_completo") || (@$conhecimentos->find(1)->nome == "escolaridade") && (@$conhecimentos->find(1)->pivot->nivel=="Fundamental_completo"))?"selected":"" }}>Fundamental Completo</option>
			<option value="Fundamental_incompleto" {{ ((old('escolaridade') == "Fundamental_incompleto") || (@$conhecimentos->find(1)->nome == "escolaridade") && (@$conhecimentos->find(1)->pivot->nivel=="Fundamental_incompleto"))?"selected":"" }}>Fundamental Incompleto</option>
		</select>	
		<label for="escolaridade">Escolaridade</label>
		@error('escolaridade')
			<span class="helper-text red-text">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
  </div>
</div>


<div class="row">
	<div class="input-field col s12">
		<i class="material-icons prefix">description</i>
		<textarea class="materialize-textarea @error('descricaoPessoal') invalid @enderror" 
			id="descricaoPessoal" name="descricaoPessoal"></textarea>
		<label for="descricaoPessoal">Descrição Pessoal</label>

		@error('descricaoPessoal')
			<span class="helper-text red-text">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
</div>

<div class="row">
	<div class="col s12">
		<p>Conhecimentos</p>
		<table class="centered">
			<thead>
				<tr>
					<th>Conhecimento</th>
					{{-- <th>Nenhum</th> --}}
					<th>Básico</th>
					<th>Intermediário</th>
					<th>Avançado</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($conhecimentos as $conhecimento)
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
								<input type="radio" name="{{"Conhecimento_".$conhecimento->id}}" value="Básico">
								<span></span>
							</label>
						</td>
						<td>
							<label>
								<input type="radio" name="{{"Conhecimento_".$conhecimento->id}}" value="Intermediário">
								<span></span>
							</label>
						</td>
						<td>
							<label>
								<input type="radio" name="{{"Conhecimento_".$conhecimento->id}}" value="Avançado">
								<span></span>
							</label>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
