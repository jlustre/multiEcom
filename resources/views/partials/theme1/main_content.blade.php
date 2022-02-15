        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            
            @include('partials.theme1.chart_tabs')
          
            @include('partials.theme1.direct_chat')

            @include('partials.theme1.todo_list')
            
        </section>
        <!-- /.Left col -->
        
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
            
            @include('partials.theme1.map_card')
            
            @include('partials.theme1.map_card')
            
            @include('partials.theme1.calendar')

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
