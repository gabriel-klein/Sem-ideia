<div class="">
  <div class="row">
    <div class="col s10 offset-s1 m8 offset-m2 l5 offset-l1">
      <div class="collection with-header">
        <div class="collection-header"><h4>Aprovações Pendentes</h4></div>
        @forelse ($empresas as $empresa)
          <div href="{{ route('empresa.show', $empresa->id) }}" class="collection-item avatar black-text" data-remote="true">
            <i class="material-icons circle blue">work</i>
            <span class="title">{{ $empresa->user->name }}</span>
            <p>Razão Social: {{ $empresa->razao_social }} <br>
              CNPJ: {{ $empresa->cnpj }}
            </p>
            <div class="secondary-content">
              <form action="{{ route('empresa.autorizar', $empresa->id) }}" method="POST" class="left">
                @csrf
                <i class="material-icons" onclick="$(this).parent().submit()" style="cursor: pointer;">verified_user</i>
              </form>
              <form action="{{ route('empresa.destroy', $empresa->id) }}" method="POST" class="right">
                @csrf
                @method('DELETE')
                <i class="material-icons red-text text-darken-4" onclick="$(this).parent().submit()" style="cursor: pointer;">delete</i>
              </form>
            </div>
          </div>
        @empty
          <div class="collection-item">
            Não há empresas para autorizar
          </div>
        @endforelse
      </div>
    </div>
    <div class="col s10 offset-s1 m8 offset-m2 l5">
      <div class="collection with-header">
        <div class="collection-header"><h4>Administradores</h4></div>
        @foreach ($admins as $admin)
          <div href="{{ route('admin.show', $admin->id) }}" class="collection-item avatar black-text">
            <i class="material-icons circle blue">account_box</i>
            <span class="title">{{ $admin->email === Auth::user()->email ? 'Você' : $admin->name }}</span>
            <p>Email: {{ $admin->email }}</p>
            @if (count($admins) > 1)
              <div class="secondary-content">
                <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" class="rigth">
                  @csrf
                  @method('DELETE')
                    <i class="material-icons red-text text-darken-4" 
                      onclick="$(this).parent().submit()" style="cursor: pointer;">
                      delete
                    </i>
                </form>
              </div>
            @endif
          </div>

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