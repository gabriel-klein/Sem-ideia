<div class="col-md-4">
  <div class="card sticky-action vaga">
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4 vagaActivator">{{ $title }}<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4 vagaDeactivator">{{ $title }}<i class="material-icons right">close</i></span>  
      <hr>
      <h4>Descrição</h4>
      <p>{{ $descricao }}</p>
      <p>Quantidade de Vagas: {{ $quantidade }} </p>
      <h4>Email para contato</h4>
      <p>{{ $emailContato }}</p>
      <hr>
      <h4>Requisitos</h4>
      {{ $requisitos }}
    </div>
    <div class="card-action">
      {{ $actions }}
    </div>
  </div>
</div>
