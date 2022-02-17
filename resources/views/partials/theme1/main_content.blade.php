        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            
            @include('partials.theme1.dashboard.chart_tabs')
          
            @include('partials.theme1.dashboard.direct_chat')

            @include('partials.theme1.dashboard.todo_list')
            
        </section>
        <!-- /.Left col -->
        
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
            
            @include('partials.theme1.dashboard.map_card')
            
            @include('partials.theme1.dashboard.sales_graph')
            
            @include('partials.theme1.dashboard.calendar')

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
