<input type="text" class="hide" name="typeUser" value="Cliente">
<div class="row">
    <div class="input-field col s12">
        <i class="material-icons prefix">event</i>
        <input id="idade" type="text" class="@error('idade') invalid @enderror" 
            name="idade" 
            value="{{ old('idade') != "" ? old('idade') : @$cliente->idade }}" >
        <label for="idade">Idade</label>
        
        @error('idade')
            <span class="helper-text red-text">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        <i class="material-icons prefix">phone</i>
        <input id="cel" type="text" class="telMask @error('cel1') invalid @enderror"
        name="cel1" value="{{ old('cel1') != "" ? old('cel1') : @$cliente->cel1  }}" >
        <label for="cel">Celular</label>
        
        @error('cel1')
            <span class="helper-text red-text">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        <i class="material-icons prefix">phone</i>
        <input id="cel2" type="text" class="telMask @error('cel2') invalid @enderror" 
        name="cel2" value="{{ old('cel2') != "" ? old('cel2') : @$cliente->cel2 }}">
        <label for="cel2">Celular 2</label>
        
        @error('cel2')
            <span class="helper-text red-text" >
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        <i class="material-icons prefix">place_outline</i>
        <select id="bairro" class="@error('bairro') invalid @enderror" 
            name="bairro" >
            <option disabled selected>Selecione o seu bairro</option>
            @foreach ($bairros as $bairro)
                <option value="{{$bairro}}" {{ old('bairro') == $bairro ? "selected": (@$cliente->bairro == $bairro ? "selected" : "") }}>{{$bairro}}</option>
            @endforeach
        </select>
        <label for="bairro">Bairro</label>

        @error('bairro')
            <span class="helper-text red-text" >
                <strong>{{ $message }}</strong>
            </span>
        @enderror
  </div>
</div>

<div class="row">
    <div class="input-field col s12">
        <i class="material-icons prefix">access_time</i>
        <select id="h_disponivel" class="@error('h_disponivel') invalid @enderror" 
        name="h_disponivel" >
            <option disabled selected>Selecione seu horário dispinível</option>
            <option value="Manhã" {{ old('h_disponivel') == "Manhã" ? "selected" : (@$cliente->h_disponivel == "Manhã"? 'selected': '') }}>Manhã</option>
            <option value="Tarde" {{ old('h_disponivel') == "Tarde" ? "selected" : (@$cliente->h_disponivel == "Tarde"? 'selected': '') }}>Tarde</option>
            <option value="Integral" {{ old('h_disponivel') == "Integral" ? "selected" : (@$cliente->h_disponivel == "Integral"? 'selected': '') }} >Integral</option>
        </select>
        <label for="h_disponivel">Horário Disponível</label>
        
        @error('h_disponivel')
            <span class="helper-text red-text ml-3" >
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

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

