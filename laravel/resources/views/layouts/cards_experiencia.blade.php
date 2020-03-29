<div class="col-md-4">
  <div class="card sticky-action experiencia">
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4 experienciaActivator">{{ $title }}<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4 experienciaDeactivator">{{ $title }}<i class="material-icons right">close</i></span>  
      <hr>
      <h4>Descrição</h4>
      <p>{{ $descricao }}</p>
      <h4>Data De Inicio</h4>
      <p>{{ $data_inicio }} </p>
      <h4>Data De Término</h4>
      <p>{{ $data_fim }}</p>
      <hr>
      <h4>Comprovação</h4>
      {{ $comprovacao }}
    </div>
    
  </div>
</div>
