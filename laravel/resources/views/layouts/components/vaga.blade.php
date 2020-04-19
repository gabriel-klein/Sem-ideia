<div class="col s12 m6">
  <div class="card sticky-action" id="{{$id}}">
    <div class="card-content grey lighten-4">
      <span class="card-title"><a class="modal-trigger animate" href="#modal{{$id}}" id="{{$id}}">{{ $title }}<i class="material-icons right">more_vert</i></a></span>
      <h6>Quantidade de vagas: {{ $quantidade }}</h6>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text"><i class="material-icons right">close</i></span>
    </div>
    <div class="card-action cartao_footer">
      <div class="right">
        19/08/2019
      </div>
      <div class="right">
      <i class="material-icons" style="margin-right: 5px">access_time</i>
      </div>
      {{$actions}}
    </div>
  </div>
</div>

<div id="modal{{$id}}" class="modal">
    <div class="modal-content">
      <h4>{{$title}}</h4>
      <p>{{$descricao}}</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close modal-action left" id="{{$id}}">Agree</a>
    </div>
  </div>