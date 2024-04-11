
@extends('chef.layouts.head')
  <body>
    <!-- top navigation bar -->
    @extends('chef.layouts.top-navigation-bar')
    <!-- top navigation bar -->
    <!-- offcanvas -->
    @extends('chef.layouts.offcanvas')
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
      <nav class="navbar navbar-expand-sm  navbar-dark" style="width: 70%">
    <div class="container bg-primary">
    <a class="btn btn-outline-dark" href="{{ url('/chef/dashboard/dish_cart') }}/{{ $dish->id }}">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge bg-danger">{{ count((array) session('dish_cart')) }}</span>
    </a>
  </div>
</nav>
    
        <div class="row">
          <div class="col-md-12 mb-3 ">
            <div class="card"  style="width: 70%">
              <div class="card-header  text-center">
                <span><i class="bi bi-table me-2"></i></span> إضافة المكونات المطلوبة
              </div>
                 @if(session('success'))
                    <div class="alert alert-success">
                    {{ session('success') }}
                    </div> 
                @endif
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="example"
                    class="table table-striped data-table"
                    style="width: 100%"
                  >
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>رقم الطبق </th>
                        <th>اسم المكون</th>
                      
                        
                        <th></th>
                        
                      </tr>
                    </thead>
                    <tbody>
                          @php
                                $i = 0;
                                @endphp
                        @foreach ($ingredients as $ingredient)
                             @php
                                $i++
                                @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>
                                              {{ $dish->id }}
                                        </td>
                                       
                                        <td>
                                              {{ $ingredient->name }}
                                        </td>
                                      
                                        
                                     
                                       
                                        <td class="btn-holder"><a href="{{ url('/chef/dashboard/add_ingredient_to_dish') }}/{{ $ingredient->id }}" class="btn btn-outline-danger">إضافة </a> </td>
                                     
                        
                                       
                                       
                                    </tr>
                                @endforeach
                      
                      
                      
                       
                     
                    </tbody>
                    <tfoot>
                      
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>




    </main>



    



    @extends('chef.layouts.footer-scripts')
    </body>
</html>