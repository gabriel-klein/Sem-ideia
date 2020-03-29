<div class="form-group row">
    <label for="local" class="col-md-4 col-form-label text-md-right">Nome do local</label>
    <div class="col-md-6">
        <input type="text" class=" form-control @error('local') is-invalid @enderror" 
    id="local" name="local"></input>
        @error('local')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição</label>
    <div class="col-md-6">
        <textarea class="form-control @error('descricao') is-invalid @enderror" 
    id="descricao" rows="2" name="descricao"></textarea>
        @error('descricao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="data_inicio" class="col-md-4 col-form-label text-md-right">Data de Inicio</label>
    <div class="col-md-6">
        <input type="text" class=" datepicker form-control @error('data_inicio') is-invalid @enderror" 
    id="data_inicio" rows="2" name="data_inicio"></input>
        @error('data_inicio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="data_fim" class="col-md-4 col-form-label text-md-right">Data de Término</label>
    <div class="col-md-6">
        <input type="text" class=" datepicker form-control @error('data_fim') is-invalid @enderror" 
    id="data_fim" rows="2" name="data_fim"></input>
        @error('data_fim')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="comprovacao" class="col-md-4 col-form-label text-md-right">Existe alguma comprovação dessa experiência?</label>

    <div class="col-md 6">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="comprovacaoSim" name="comprovacao" value="Sim"
                class="custom-control-input @error('comprovacao') is-invalid @enderror" {{ old('comprovacao') == "Sim"? 'checked': '' }}>
            <label class="custom-control-label" for="comprovacaoSim">Sim</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="comprovacaoNao" name="comprovacao" value="Não"
                class="custom-control-input @error('comprovacao') is-invalid @enderror" {{ old('comprovacao') == "Não"? 'checked': '' }}>
            <label class="custom-control-label" for="comprovacaoNao">Não</label>
            
            @error('comprovacao')
                <span class="invalid-feedback ml-3" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
        </button>
    </div>
</div>