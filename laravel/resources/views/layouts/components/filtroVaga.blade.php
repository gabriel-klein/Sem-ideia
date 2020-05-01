<div class="filtro" id="filtro">
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

      <select id="quantidade" name="quantidade">
        <option value="0" selected > Filtre o número de vagas</option>
          @for ($i = 1; $i <= 10; $i++)
      			<option value="{{$i}}"
            {{(isset($request->quantidade) ?
            (($request->quantidade == "$i") ? "selected" : '') : '')}}>Acima de {{$i}}</option>
      		@endfor
      </select>

      <button type="submit" class="btn waves-effect blue">
          {{ __('Filtrar') }}
      </button>

  </form>
</div>