@select([
    'name' => 'escolaridade',
    'icon' => 'school',
    'label' => 'Escolaridade',
    'textOptionDefault' => 'Selecione sua Escolaridade'
])
    @slot('options')
        @foreach ($escolaridades as $escolaridade)
            @option([
                'name' => 'escolaridade',
                'value' => $escolaridade,
                'data' => @$conhecimentos->find(1)->pivot->nivel,
                'label' => $escolaridade
            ])
        @endforeach
    @endslot
@endselect

@textarea([
    'name' => 'descricaoPessoal',
    'icon' => 'description',
    'data' => @$cliente->descricaoPessoal,
    'label' => 'Descrição Pessoal'
])

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
