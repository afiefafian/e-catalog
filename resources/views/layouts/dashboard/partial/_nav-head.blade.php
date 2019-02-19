<!-- nav-header -->
<div class="header py-4">
  <div class="container">
    <div class="d-flex">
      <a class="header-brand" href="{{ url('home') }}">
        E-Catalog
        {{-- <img src="./template/tabler-ui/demo/brand/tabler.svg" class="header-brand-img" alt="tabler logo"> --}}
      </a>
      <div class="d-flex order-lg-2 ml-auto">
        <div class="dropdown">
          <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
            <span class="avatar" style="background-image: url(./demo/faces/female/25.jpg)"></span>
            <span class="ml-2 d-none d-lg-block">
              <span class="text-default">{{ Auth::user()->name }}</span>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a class="dropdown-item" href="{{ url('user') }}">
              <i class="dropdown-icon fe fe-user"></i> Profile
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}" 
              onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();">
              <i class="dropdown-icon fe fe-log-out"></i> Sign out
            </a>
          </div>
        </div>
      </div>
      <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
        <span class="header-toggler-icon"></span>
      </a>
    </div>
  </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>