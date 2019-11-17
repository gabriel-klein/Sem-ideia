<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Descrição da Vaga</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <h2 class=" text-center">{{ $vaga->funcao }}</h3>
      <h4 class="h4">Descrição</h5>
      <p>{{ $vaga->descricao }}</p>
      <p>Quantidade de Vagas: {{ $vaga->quantidade }}</p>
      <h4 class="h4">Requisitos</h5>
      @foreach ($vaga->conhecimentos as $conhecimento)
          <p class="my-1">{{ $conhecimento->nome." - ".$conhecimento->pivot->nivel }}</p>
      @endforeach
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
  </div>
</div>
