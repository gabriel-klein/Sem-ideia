<br>
<div class="filtro row" id="filtro">
  <div class="col m4 s8">
    <form method="POST" action="{{  route('vagas.busca') }}">
      @csrf
      
        <select multiple id="funcao" name="funcao[]">
          <option value="teste" disabled selected > Filtre a função</option>
          	@foreach ($funcoes as $funcao)
        			<option value="{{$funcao}}"
              {{(isset($request->funcao) ?
              (($request->funcao[array_search("$funcao",$request->funcao)] == "$funcao") ? "selected" : '') : '')}}>{{$funcao}}</option>
        		@endforeach
        </select>

        <select multiple id="escolaridade" name="escolaridade[]">
          <option value="teste" disabled selected > Filtre a escolaridade</option>
            @foreach ($escolaridades as $escolaridade)
        			<option value="{{$escolaridade}}"
              {{(isset($request->escolaridade) ?
              (($request->escolaridade[array_search("$escolaridade",$request->escolaridade)] == "$escolaridade") ? "selected" : '') : '')}}>{{$escolaridade}}</option>
        		@endforeach
        </select>

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