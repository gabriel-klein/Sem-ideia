<input type="text" class="hide" name="typeUser" value="Cliente">

@input([
    'name' => 'idade',
    'icon' => 'event',
    'data' => @$cliente->idade,
    'label' => 'Idade'
])

@input([
    'name' => 'cel1', 
    'icon' => 'phone', 
    'data' => @$cliente->cel1,
    'label' => 'Celular',
    'class' => 'telMask'
])

@input([
    'name' => 'cel2',
    'icon' => 'phone',
    'data' => @$cliente->cel2,
    'label' => 'Celular 2',
    'class' => 'telMask',
    'required' => false
])

@select([
    'name' => 'bairro',
    'icon' => 'place_outline',
    'label' => 'Bairro',
    'textOptionDefault' => 'Selecione o seu bairro'
])
    @slot('options')
        @foreach ($bairros as $item)
            @option([
                'name' => 'bairro',
                'value' => $item,
                'data' => @$cliente->bairro,
                'label' => $item
            ])
        @endforeach
    @endslot
@endselect

@select([
    'name' => 'h_disponivel',
    'icon' => 'access_time',
    'label' => 'Horário Disponível',
    'textOptionDefault' => 'Selecione seu horário dispinível'
])
    @slot('options')
        @foreach (['Manhã', 'Tarde', 'Integral'] as $item)
            @option([
                'name' => 'h_disponivel',
                'value' => $item,
                'data' => @$cliente->h_disponivel,
                'label' => $item
            ])
        @endforeach
    @endslot
@endselect

<div class="row">
    <div class="col 12">
        <p for="aprendiz">Deseja visualizar vagas de Aprendiz?</p>
        <p>
            <label for="aprendizSim">
                <input type="radio" id="aprendizSim" name="aprendiz" value="Sim"
                    class="@error('aprendiz') invalid @enderror" 
                    {{ old('aprendiz') == "Sim" ? 'checked' : (@$cliente->aprendiz == "Sim"? 'checked': '') }}>
                <span>Sim</span>
            </label> 
        </p>
        <p>
            <label for="aprendizNao">
                <input type="radio" id="aprendizNao" name="aprendiz" value="Não"
                    class="@error('aprendiz') invalid 
                    @enderror" {{ old('aprendiz') == "Não" ? 'checked' : (@$cliente->aprendiz == "Não"? 'checked': '') }}
                >
                <span>Não</span>
            </label>
        </p>
        @error('aprendiz')
            <span class="helper-text red-text ml-3" >
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

