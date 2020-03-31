<input type="text" class="hide" name="typeUser" value="Empresa">

<div class="row">
    <div class="input-field col s12">
        <i class="material-icons prefix">assignment</i>
        <input id="cnpj" type="text" class="cnpjMask @error('cnpj') invalid @enderror" name="cnpj" 
            value="{{ old('cnpj') != "" ? old('cnpj') : @$empresa->cnpj}}">
        <label for="cnpj">CNPJ</label>
    
        @error('cnpj')
            <span class="helper-text red-text">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        <i class="material-icons prefix">assignment</i>
        <input id="razaoSocial" type="text" class="@error('razao_social') invalid @enderror" name="razao_social" 
            value="{{ old('razao_social') != "" ? old('razao_social') : @$empresa->razao_social }}">
        <label for="razaoSocial">Razão Social</label>
        
        @error('razao_social')
            <span class="helper-text red-text">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>