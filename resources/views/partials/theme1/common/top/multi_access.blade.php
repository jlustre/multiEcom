@if (Auth::guard('admin')->check())
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-users mr-2"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Accounts Access</span>
          <div class="dropdown-divider"></div>
            <a href="{{ route('admin.home')}}" class="nav-link">
                <i class="fas fa-sign-in-alt mr-2"></i> Admin
            </a>
            <a href="{{ route('admin.logout') }}"  class="nav-link" 
              onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
              <i class="fas fa-sign-out-alt mr-2"></i> Admin Logout</a>
            <form action="{{ route('admin.logout') }}" method="post" class="d-none" id="admin-logout-form">
                @csrf
            </form>         
          <div class="dropdown-divider"></div>

          @if (Auth::guard('seller')->check())
            <a href="{{ route('seller.home')}}" class="nav-link">
              <i class="fas fa-sign-in-alt mr-2"></i> Seller
            </a>
            <a href="{{ route('seller.logout') }}"  class="nav-link" 
              onclick="event.preventDefault(); document.getElementById('seller-logout-form').submit();">
              <i class="fas fa-sign-out-alt mr-2"></i> Seller Logout</a>
            <form action="{{ route('seller.logout') }}" method="post" class="d-none" id="seller-logout-form">
                @csrf
            </form>
          @else
            <a href="{{ route('seller.login')}}" class="nav-link">
              <i class="fas fa-sign-in-alt mr-2"></i> Seller Login
            </a>
          @endif
          <div class="dropdown-divider"></div>

          @if (Auth::guard('web')->check())
            <a href="{{ route('user.home')}}" class="nav-link">
              <i class="fas fa-sign-in-alt mr-2"></i> User
            </a>
            <a href="{{ route('user.logout') }}"  class="nav-link" 
              onclick="event.preventDefault(); document.getElementById('user-logout-form').submit();">
              <i class="fas fa-sign-out-alt mr-2"></i> User Logout</a>
            <form action="{{ route('user.logout') }}" method="post" class="d-none" id="user-logout-form">
                @csrf
            </form>
          @else
            <a href="{{ route('user.login')}}" class="nav-link">
              <i class="fas fa-sign-in-alt mr-2"></i> User Login
            </a>
          @endif
          <div class="dropdown-divider"></div>

      </div>
    </li>
@endif