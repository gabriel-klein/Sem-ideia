<div class="navbar-fixed" id="navbar">
  <nav>
    <div class="nav-wrapper">
      <div class="brand-logo">
        <a href="{{ url('/home') }}">
          <img src="{{ asset('storage/logo branca.png') }}" class="logo">
        </a> 
      </div>
      <a data-target="mobile-demo" class="sidenav-trigger">
          <i class="material-icons" style="cursor: pointer;">menu</i>
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
              <a href="{{ route('register') }}">{{ __('Registro') }}</a>
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
            @Vagas  
              <li>
                  <a href="{{ route('vagas.index') }}">Vagas<span class="new badge">1</span></a>
              </li>
            @else
              <li>
                  <a href="{{ route('vagas.index') }}">Vagas</a>
              </li>
            @endVagas  
            @typeUser("Empresa")
              <li>
                <a href="{{ route('cliente.index')}}">
                  Currículos
                </a>
              </li>
            @elsetypeUser("Cliente")
              @Educacao
                <li class="dropdown-trigger" data-target="navbarDropdown2">
                  <a><span class="new badge">1</span>
                    {{ 'Currículo' }}
                    <i class="material-icons right">arrow_drop_down</i> 
                  </a>
                </li>
              @else
                <li class="dropdown-trigger" data-target="navbarDropdown2">
                  <a>
                    {{ 'Currículo' }}
                    <i class="material-icons right">arrow_drop_down</i> 
                  </a>
                </li>
              @endEducacao    
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
      <a href="{{ route('login') }}">
        <i class="material-icons">get_app</i>
        {{ __('Login') }}
      </a>
    </li>
    @if (Route::has('register'))
      <li>
        <a href="{{ route('register') }}">
          <i class="material-icons">folder_shared</i>
          {{ __('Registro') }}
        </a>
      </li>
    @endif
    <li class="divider"></li>
  @else
    @typeUser("Cliente" || "Empresa")
       @Vagas  
          <li>
              <a href="{{ route('vagas.index') }}">Vagas<span class="new badge">1</span></a>
          </li>
        @else
          <li>
              <a href="{{ route('vagas.index') }}">
                <i class="material-icons">work</i>
                Vagas
              </a>
          </li>
        @endVagas
      @typeUser("Cliente")
        @Educacao
          <li>
            <a href="{{ route('cliente.curriculo.edit', Auth::user()->userable_id) }}">
              <i class="material-icons">school</i>
              {{ __('Educação') }}
              <span class="new badge dark">1</span>
            </a>
          </li>
        @else
          <li>
            <a href="{{ route('cliente.curriculo.edit', Auth::user()->userable_id) }}">
              <i class="material-icons">school</i>
              {{ __('Educação') }}
            </a>
          </li>
        @endEducacao
          <li>
            <a href="{{ route('experiencia.index', Auth::user()->userable_id) }}">
              <i class="material-icons">business_center</i>
              {{ __('Experiências') }}
            </a>
          </li>
        <li>
          <a href="{{ route('cliente.edit', Auth::user()->userable->id)}}">
            <i class="material-icons">assignment_ind</i>
            Meus Dados
          </a>
        </li>
      @elsetypeUser("Empresa")
        <li>
          <a href="{{ route('cliente.index')}}">
            <i class="material-icons">assignment</i>
            Currículos
          </a>
        </li>
        <li>
          <a href="{{ route('empresa.edit', Auth::user()->userable->id)}}">
            <i class="material-icons">assignment_ind</i>
            Meus Dados
          </a>
        </li>
      @endtypeUser
    @else 
        <li>
          <a href="{{ route('admin.edit', Auth::user()->id)}}">
            <i class="material-icons">assignment_ind</i>
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
<ul class="dropdown-content" id="navbarDropdown2">
  @auth
    @typeUser("Cliente")
      @Educacao
        <li>
          <a href="{{ route('cliente.curriculo.edit', Auth::user()->userable_id) }}">{{ __('Educação') }}<span class="new badge dark">1</span></a>
        </li>
      @else
        <li>
          <a href="{{ route('cliente.curriculo.edit', Auth::user()->userable_id) }}">{{ __('Educação') }}</a>
        </li>
      @endEducacao
     <li class="divider"></li>
        <li>
          <a href="{{ route('experiencia.index', Auth::user()->userable_id) }}">{{ __('Experiências') }}</a>
        </li>
    @endtypeUser
  @endauth
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
      <div class="logout hide" id="logout"></div>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>
  @endauth
</ul>