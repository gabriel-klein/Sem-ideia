<div class="col s12 m12">
  <div class="card blue-grey sticky-action" id="{{$id}}">
    <div class="card-content white-text">
      <span class="card-title activator changeCardSize" id="{{$id}}">{{ $title }}<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal blue-grey white-text">
      <span class="card-title changeCardSize" id="{{$id}}"><i class="material-icons right">close</i>{{ $title }}</span>
      <h6>Descrição</h6>
      <p>{{ $descricao }}</p>
      <h6>Quantidade</h6>
      <p>{{ $quantidade }} </p>
      <h6>Email de Contato</h6>
      <p>{{ $emailDeContato }}</p>
    </div>
    <div class="card-action">
        <form action="{{ route('vagas.destroy',$id) }}" method="POST">
        @csrf
        @method('DELETE')

        <a class="waves-effect waves-light btn green" href="{{ route('vagas.edit', $id) }}">Editar</a>

        <button type="submit" class="waves-effect waves-light btn red">
          {{ __('Excluir') }}
        </button>
      </form>
    </div>
  </div>
</div>
      
