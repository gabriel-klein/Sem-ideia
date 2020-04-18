<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper">
      <a class="brand-logo" href="{{ url('/') }}">
        <img src="{{ asset('storage/Logo_Banco3.png') }}" width="90px" height="80px">
      </a>
      <a data-target="mobile-demo" class="sidenav-trigger">
          <i class="material-icons">menu</i>
      </a>

      <!-- Right Side Of Navbar -->
      <ul class="right hide-on-med-and-down">
        <!-- Authentication Links -->
        @guest
          <li>
            <a href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
            <li>
              <a href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
        @else 
          <li class="dropdown-trigger" data-target="navbarDropdown">
            <a class="nav_words">
              {{ Auth::user()->name }} 
              <i class="material-icons right">arrow_drop_down</i>
            </a>
          </li>
        @endguest
      </ul>
      <ul class="right hide-on-med-and-down">
        @auth
          @typeUser("Empresa" || "Cliente")  
            <li>
                <a href="{{ route('vagas.index') }}">Vagas</a>
            </li>
            @typeUser("Empresa")
              <li>
                <a href="{{ route('cliente.index')}}">
                  Currículos
                </a>
              </li>
            @elsetypeUser("Cliente")
              <li>
                <a href="{{ route('cliente.curriculo.edit', Auth::user()->userable_id) }}">{{ __('Currículo') }}</a>
              </li>
            @endtypeUser
          @endtypeUser
        @endauth
      </ul>
    </div>
  </nav>
</div>

<ul class="sidenav" id="mobile-demo">
  @guest
    <li>
      <a href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    @if (Route::has('register'))
      <li>
        <a href="{{ route('register') }}">{{ __('Register') }}</a>
      </li>
    @endif
  @else
    @typeUser("Cliente" || "Empresa")
      <li>
        <a href="{{ route('vagas.index') }}">Vagas</a>
      </li>
      @typeUser("Cliente")
        <li>
          <a href="{{ route('cliente.curriculo.edit', Auth::user()->userable_id) }}">{{ __('Currículo') }}</a>
        </li>
        <li>
          <a href="{{ route('cliente.edit', Auth::user()->userable->id)}}">
            Meus Dados
          </a>
        </li>
      @elsetypeUser("Empresa")
        <li>
          <a href="{{ route('cliente.index')}}">
            Currículos
          </a>
        </li>
        <li>
          <a href="{{ route('empresa.edit', Auth::user()->userable->id)}}">
            Meus Dados
          </a>
        </li>
      @endtypeUser
    @else 
        <li>
          <a href="{{ route('admin.edit', Auth::user()->id)}}">
            Meus Dados
          </a>
        </li>
    @endtypeUser
    <li class="divider"></li>
    <li>
      <a href="{{ route('logout') }}"
      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
      <i class="material-icons">exit_to_app</i>
      {{ __('Logout') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>
  @endguest
</ul>

<ul class="dropdown-content" id="navbarDropdown">
  @auth
    @typeUser("Cliente")
      <li>
        <a href="{{ route('cliente.edit', Auth::user()->userable->id)}}">
          Meus Dados
        </a>
      </li>
    @elsetypeUser("Empresa")
      <li>
        <a href="{{ route('empresa.edit', Auth::user()->userable->id)}}">
          Meus Dados
        </a>
      </li>
    @else 
      <li>
        <a href="{{ route('admin.edit', Auth::user()->id)}}">
          Meus Dados
        </a>
      </li>
    @endtypeUser
    <li class="divider"></li>
    <li>
      <a href="{{ route('logout') }}"
      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
      {{ __('Logout') }}
      <i class="material-icons right">exit_to_app</i>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>
  @endauth
</ul>