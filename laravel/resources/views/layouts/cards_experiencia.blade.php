<div class="col s12 m6">
  <div class="card sticky-action cartao" id="{{$id}}">
    <div class="card-content white-text">
      <span class="card-title activator changeCardSize" id="{{$id}}">{{ $title }}<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal blue-grey white-text">
      <span class="card-title changeCardSize" id="{{$id}}"><i class="material-icons right">close</i>{{ $title }}</span>
      <h6>Descrição</h6>
      <p>{{ $descricao }}</p>
      <h6>Data De Inicio</h6>
      <p>{{ $data_inicio }} </p>
      <h6>Data De Término</h6>
      <p>{{ $data_fim }}</p>
      <h6>Comprovação</h6>
      <p>{{ $comprovacao }}</p>
    </div>
    <div class="card-action">
       {{$actions}}
    </div>
  </div>
</div>
      
