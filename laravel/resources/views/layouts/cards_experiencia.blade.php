<div class="col s12 m6">
  <div class="card sticky-action" id="{{$id}}">
    <div class="card-content grey lighten-4">
      <span class="card-title"><a class="modal-trigger animate" href="#modal{{$id}}" id="{{$id}}">{{ $title }}<i class="material-icons right">more_vert</i></a></span>
    </div>
    <div class="card-action cartao_footer">
       {{$actions}}
    </div>
  </div>
</div>


<div id="modal{{$id}}" class="modal modal-fixed-footer card">
  <div class="modal-content grey lighten-3">
    <h4><a class="modal-action modal-close" href="#!">{{ $title }}<i class="material-icons right">close</i></a></h4><hr>
    <h6>Descrição: </h6>{{$descricao}}
    <h6> Data Início: </h6>{{$data_inicio}}
    <h6> Data Fim: </h6>{{$data_fim}}
    <h6> Comprovação: </h6>{{$comprovacao}}
  </div>
  <div class="modal-footer cartao_footer">
      {{$actions}}
  </div>
</div>
