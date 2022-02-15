@section('title', 'AsBeez Admin Dashboard')
@include('partials.theme1.header2')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

 @include('partials.theme1.preloader')

 @include('partials.theme1.admin.navbar')
 @include('partials.theme1.admin.main_sidebar')
 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    @include('partials.theme1.content_header')
    
      <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          @yield('main_content')
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->

  @include('partials.theme1.footer2')
  @include('partials.theme1.right_sidebar')

</div>
<!-- ./wrapper -->

@include('partials.theme1.scripts2')
</body>
</html>
