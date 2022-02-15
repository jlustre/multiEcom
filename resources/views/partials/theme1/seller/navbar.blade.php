 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-success navbar-light">
    
    @include('partials.theme1.navbar_left_links')

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      @include('partials.theme1.navbar_search')

      @include('partials.theme1.messages')

      @include('partials.theme1.notifications')
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->