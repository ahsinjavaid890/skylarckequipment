<nav style="background-color: #32847c !important; box-shadow: 0 10px 10px -5px;" class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="{{ url('admin/home') }}">Dashboard</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <ul class="navbar-nav ml-auto ml-md-0">
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @if(!empty(DB::table('adminnotifications')->where('readstatus' , 1)->get()))
              <div class="badge badge-danger">{{ DB::table('adminnotifications')->where('readstatus' , 1)->count() }}</div>
              @endif
              <i class="fas fa-bell"></i>
            </a>
            <div style="width: 400px;height: 400px;overflow: auto;" class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              @foreach(DB::table('adminnotifications')->get() as $r)
                <div style="border-bottom: 1px solid #DDD">
                  <a style="text-decoration: none; color: black;" href="{{ $r->url }}">
                    <div  style="padding: 10px;@if($r->readstatus == 1) background-color: #DDD; @endif">
                        {{ $r->notification }}
                    </div>
                  </a>
                </div>
              @endforeach
            </div>
          </li>
        </ul>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </div>
      </li>
    </ul>
 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
  </nav>
  <div id="wrapper">