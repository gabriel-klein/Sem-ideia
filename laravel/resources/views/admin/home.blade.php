<div class="">
  <div class="row">
    <div class="col s10 offset-s1 m5 offset-m1">
      <div class="collection with-header">
        <div class="collection-header"><h4>Aprovações Pendentes</h4></div>
        @forelse ($empresas as $empresa)
          <a href="{{ route('empresa.show', $empresa->id) }}" class="collection-item black-text" data-remote="true">
            {{ $empresa->user->name }}
            <i class="material-icons secondary-content">chevron_right</i>
          </a>
        @empty
          <div class="collection-item">
            Não há empresas para autorizar
          </div>
        @endforelse
      </div>
    </div>
    <div class="col s10 offset-s1 m5">
      <div class="collection with-header">
        <div class="collection-header"><h4>Administradores</h4></div>
        @foreach ($admins as $admin)
          <a href="{{ route('admin.show', $admin->id) }}" class="collection-item black-text" data-remote="true">
            {{ $admin->name === Auth::user()->name ? 'Você' : $admin->name }}
            <i class="material-icons secondary-content">chevron_right</i>
          </a>

          @if ($loop->last)
            <a href="{{ route('admin.create') }}" class="collection-item black-text">
              Criar novo admin
              <i class="material-icons secondary-content">add</i>
            </a>
          @endif

        @endforeach
      </div>
    </div>
  </div>
</div>