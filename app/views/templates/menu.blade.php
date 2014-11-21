<div class="bs-example bs-navbar-top-example">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- We use the fluid option here to avoid overriding the fixed width of a normal container within the narrow content columns. -->
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('publicacoes/lista') }}">PubGen</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ url('publicacoes/lista') }}">Lista de Publicações</a></li>
    </ul>
    @if(Auth::check())
    <ul class="nav navbar-nav">
        <li><a href="{{ url('publicacoes') }}">Minhas Publicações</a></li>
    </ul>
    @endif
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
      <ul class="nav navbar-nav navbar-right">
        @if(!Auth::check())
            <li>
                <a href="{{ url('sign/in') }}">Entrar</a>
            </li>
        @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Bem vindo {{ Auth::user()->nome }}<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('sign/out') }}">Sair</a></li>
            </ul>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
</div>

