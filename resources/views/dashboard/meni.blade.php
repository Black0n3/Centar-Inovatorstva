<div class="list-group">
  <a href="{{ url('dashboard') }}" class="list-group-item {{ (Request::is('*dashboard') ? 'active' : '') }}">
    <i class='fa fa-dashboard'></i> Administracija
  </a>
  <a href="{{ url('dashboard/novosti') }}" class="list-group-item {{ (Request::is('dashboard/novosti*') ? 'active' : '') }}"><i class='fa fa-newspaper-o'></i> Novosti</a>
  <a href="{{ url('dashboard/projekti') }}" class="list-group-item {{ (Request::is('dashboard/projekti*') ? 'active' : '') }}"><i class='glyphicon glyphicon-hourglass'></i> Projekti</a>
  <a href="{{ url('dashboard/galerija') }}" class="list-group-item {{ (Request::is('dashboard/galerija*') ? 'active' : '') }}"><i class='glyphicon glyphicon-camera'></i> Galerija</a>
  <a href="{{ url('dashboard/clanovi') }}" class="list-group-item {{ (Request::is('dashboard/clanovi*') ? 'active' : '') }}">
        <i class='fa fa-users'></i> Članovi</a>
    <a href="{{ url('dashboard/clanarine') }}" class="list-group-item {{ (Request::is('dashboard/clanarine*') ? 'active' : '') }}">
        <i class='fa fa-money'></i> Članarine</a>
    <a href="{{ url('dashboard/pristupnica') }}" class="list-group-item {{ (Request::is('dashboard/pristupnica*') ? 'active' : '') }}">
        <i class='fa fa-sign-in'></i> Pristupnice <span class='broj_prijava badge'></span></a>
  <a href="{{ url('dashboard/stranice/1/edit') }}" class="list-group-item {{ (Request::is('dashboard/stranice*') ? 'active' : '') }}"><i class='fa fa-file-word-o'></i> O Nama</a>
</div>



