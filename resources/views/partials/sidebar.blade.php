<!-- resources/views/partials/sidebar.blade.php -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile border-bottom">
      <a href="#" class="nav-link flex-column">
        <div class="nav-profile-image">
          <!-- Usamos la función asset() para la ruta de las imágenes -->
          <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile">
        </div>
        <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
          <span class="fw-semibold mb-1 mt-2 text-center">{{ Auth::user()->name }}</span>
          <!-- <span class="text-secondary icon-sm text-center">$3499.00</span> -->
        </div>
      </a>
    </li>
    <li class="nav-item pt-3">
      <a class="nav-link d-block" href="{{ url('/index') }}">
        <img class="sidebar-brand-logo" src="{{ asset('assets/images/logo1.svg') }}" alt="">
        <img class="sidebar-brand-logomini" src="{{ asset('assets/images/logo-mini1.svg') }}" alt="">
        <div class="small fw-light pt-1">Menú</div>
      </a>
      <form class="d-flex align-items-center" action="#">
        <div class="input-group">
          <div class="input-group-prepend">
            <i class="input-group-text border-0 mdi mdi-magnify"></i>
          </div>
          <input type="text" class="form-control border-0" placeholder="Search">
        </div>
      </form>
    </li>
    <li class="pt-2 pb-1">
      <span class="nav-item-head">Enlaces Rápidos</span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/index') }}">
        <i class="mdi mdi-compass-outline menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/form') }}">
        <i class="mdi mdi-pencil-box menu-icon"></i>
        <span class="menu-title">Registro</span>
      </a>
    </li>
    <!-- <li class="pt-2 pb-1">
      <span class="nav-item-head">UI Elements</span>
    </li> -->
    <!-- <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        <span class="menu-title">UI Elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ url('pages/ui-features/buttons.html') }}">Buttons</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('pages/ui-features/dropdowns.html') }}">Dropdowns</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('pages/ui-features/typography.html') }}">Typography</a></li>
        </ul>
      </div>
    </li> -->
    <!-- Agregar más elementos según sea necesario -->
  </ul>
</nav>

