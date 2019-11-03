<div class="form-group row">
    <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição</label>

    <div class="col-md-6">
        <textarea class="form-control @error('email') is-invalid @enderror" 
          id="descricao" rows="2" name="descricao"></textarea>
        @error('descricao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
  <label for="quantidade" class="col-md-4 col-form-label text-md-right">Quantidade</label>

  <div class="col-md-6">
    <input id="quantidade" type="number" class="form-control @error('quantidade') is-invalid @enderror" 
      name="email" value="{{ old('quantidade') }}" required>

      @error('quantidade')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
</div>






<div class="form-group row">
  <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

  <div class="col-md-6">
    <select id="status" class="form-control @error('quantidade') is-invalid @enderror" 
      name="status" required>
      <option value="" disabled selected>Selecione o Status da Vaga</option>
      <option value="Ativa">Ativa</option>
      <option value="Desativada">Desativada</option>
    </select>
    @error('status')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            Salvar
        </button>
    </div>
</div>