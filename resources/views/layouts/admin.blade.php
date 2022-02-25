  @section('title', 'AsBeez Admin Dashboard')
  @section('navbar_color', 'primary')
  @section('cardhdr_color', 'secondary')

  @include('partials.theme1.common.top.header2')

  <body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

  @include('partials.theme1.common.main.preloader')

  @include('partials.theme1.common.top.navbar')
  @include('partials.theme1.admin.main_sidebar')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      @include('partials.theme1.common.main.content_header')
      
        <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
            @yield('main_content')
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
      
    </div>
    <!-- /.content-wrapper -->

    @include('partials.theme1.common.bottom.footer2')
    @include('partials.theme1.common.side.right_sidebar')

  </div>
  <!-- ./wrapper -->

  @include('partials.theme1.common.bottom.scripts2')
  @include('partials.theme1.common.bottom.datatable')


</body>
</html>
