<div class="row">
    <div class="input-field col s12">
        <i class="material-icons prefix">place_outline</i>
        <input type="text" class=" @error('local') invalid @enderror" id="local"
        name="local" value="{{ old('local') != "" ? old('local') : @$experiencia->local }}">
        </input>
        <label for="local">Nome do local</label>
        
        @error('local')
            <span class="helper-text red-text">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        <i class="material-icons prefix">description</i>
        <textarea class="materialize-textarea @error('descricao') invalid @enderror" 
        id="descricao" rows="2" name="descricao" >{{ null!==(@$experiencia->descricao)? @$experiencia->descricao : old('descricao')}}</textarea>
        <label for="descricao">Descrição</label>
        
        @error('descricao')
            <span class="helper-text red-text">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        <i class="material-icons prefix">today</i>
        <input type="text" class=" datepicker  @error('data_inicio') invalid @enderror" 
        id="data_inicio" name="data_inicio" value="{{ old('data_inicio') != "" ? old('data_inicio') : @$experiencia->data_inicio }}"></input>
        <label for="data_inicio">Data de Início</label>

        @error('data_inicio')
            <span class="helper-text red-text">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        <i class="material-icons prefix">today</i>
        <input type="text" class=" datepicker  @error('data_fim') invalid @enderror" 
        id="data_fim" name="data_fim" value="{{ old('data_fim') != "" ? old('data_fim') : @$experiencia->data_fim }}"></input>
        <label for="data_fim">Data de Término</label>
        
        @error('data_fim')
            <span class="helper-text red-text">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col 12">
        <p for="comprovacao">Existe alguma comprovação dessa experiência?</p>
        <p>
            <label for="comprovacaoSim">
                <input type="radio" id="comprovacaoSim" name="comprovacao" value="Sim"
                    class="@error('comprovacao') invalid @enderror" 
                    {{ old('comprovacao') == "Sim" ? 'checked' : (@$experiencia->comprovacao == "Sim"? 'checked': '') }}>
                <span>Sim</span>
            </label> 
        </p>
        <p>
            <label for="comprovacaoNao">
                <input type="radio" id="comprovacaoNao" name="comprovacao" value="Não"
                    class="@error('comprovacao') invalid 
                    @enderror" {{ old('comprovacao') == "Não" ? 'checked' : (@$experiencia->comprovacao == "Não"? 'checked': '') }}
                >
                <span>Não</span>
            </label>
        </p>
        @error('comprovacao')
            <span class="helper-text red-text">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>