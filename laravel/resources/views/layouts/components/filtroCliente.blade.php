<br>
<div class="filtro row" id="filtro">
  <div class="col m4 s8">
    <form method="POST" action="{{  route('cliente.busca') }}">
      @csrf

      <div class="input-field">
        <select multiple id="escolaridade" name="escolaridade[]">
          <option value="teste" disabled selected >Filtre a escolaridade</option>
            @foreach ($escolaridades as $escolaridade)
        			<option value="{{$escolaridade}}"
              {{(isset($request->escolaridade) ?
              (($request->escolaridade[array_search("$escolaridade",$request->escolaridade)] == "$escolaridade") ? "selected" : '') : '')}}>{{$escolaridade}}</option>
        		@endforeach
        </select>
      </div>

      <div class="input-field">
        <select multiple id="bairro" name="bairro[]">
          <option value="teste" disabled selected >Filtre o bairro</option>
            @foreach ($bairros as $bairro)
              <option value="{{$bairro}}"
              {{(isset($request->bairro) ?
              (($request->bairro[array_search("$bairro",$request->bairro)] == "$bairro") ? "selected" : '') : '')}}>{{$bairro}}</option>
            @endforeach
        </select>
      </div>

      <div class="input-field">
        <select multiple id="h_disponivel" name="h_disponivel[]">
          <option value="" disabled selected >Filtre o horário disponível</option>
            @foreach (['Manhã', 'Tarde', 'Integral'] as $item)
              <option value="{{$item}}"
              {{(isset($request->h_disponivel) ?
              (($request->h_disponivel[array_search("$item",$request->h_disponivel)] == "$item") ? "selected" : '') : '')}}>{{$item}}</option>
            @endforeach
        </select>
      </div>

      <input id="idade" name="idade" placeholder="Idade acima de"
          type="text"
          @if(isset($request->idade)) value="{{ $request->idade }}" @endif
      </input>

       <select id="conhecimento" name="conhecimento[]">
          <option value="teste" disabled selected > Filtre os conhecimentos</option>
            @foreach ($conhecimentos as $conhecimento)
              <option value="{{$conhecimento}}"
              {{(isset($request->conhecimento) ?
              (($request->conhecimento[array_search("$conhecimento",$request->conhecimento)] == "$conhecimento") ? "selected" : '') : '')}}>{{$conhecimento}}</option>
            @endforeach
        </select>

        <select id="nivel" name="nivel[]">
           <option value="" disabled selected >Filtre o nível do conhecimento</option>
            @foreach (['Básico', 'Médio', 'Avançado'] as $item)
              <option value="{{$item}}"
              {{(isset($request->nivel) ?
              (($request->nivel[array_search("$item",$request->nivel)] == "$item") ? "selected" : '') : '')}}>{{$item}}</option>
            @endforeach
        </select>


      <button type="submit" class="btn waves-effect blue">
          {{ __('Filtrar') }}
      </button>
    </form>
  </div>
</div>