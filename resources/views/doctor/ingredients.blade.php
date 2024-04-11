
@extends('doctor.layouts.head')
  <body>
    <!-- top navigation bar -->
    @extends('doctor.layouts.top-navigation-bar')
    <!-- top navigation bar -->
    <!-- offcanvas -->
    @extends('doctor.layouts.offcanvas')
    <!-- offcanvas -->
    <?php 
    // {{ url('/doctor/dashboard/dish_cart') }}/{{ $dish->id }}
    ?>
    <main class="mt-5 pt-3">
      <div class="container-fluid">
      <nav class="navbar navbar-expand-sm  navbar-dark" style="width: 70%">
    <div class="container bg-muted"  lang="ar" dir="rtl">
    <a class="btn btn-outline-success fw-bold" href=" {{ url('/doctor/dashboard/disease_cart') }}/{{ $disease->id }}">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> المكونات المضافة <span class="badge bg-warning">{{ count((array) session('disease_cart')) }}</span>
    </a>
  </div>
</nav>
    
        <div class="row">
          <div class="col-md-12 mb-3 ">
            <div class="card"  style="width: 70%">
              <div class="card-header  text-center fw-bold">
                <span><i class=""></i></span> تحديد المكونات الغذائية الممنوعة لمرضى  {{$disease->name}}  
              </div>
                 @if(session('success'))
                    <div class="alert alert-success"  lang="ar" dir="rtl">
                    {{ session('success') }}
                    </div> 
                @endif
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="example"
                    class="table table-striped data-table"
                    style="width: 100%"
                    lang="ar" dir="rtl"
                  >
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>رقم المرض </th>
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
                                              {{ $disease->id }}
                                        </td>
                                       
                                        <td>
                                              {{ $ingredient->name }}
                                        </td>
                                      
                                        
                                     
                                       
                                        <td class="btn-holder"><a href="{{ url('/doctor/dashboard/add_ingredient') }}/{{ $ingredient->id }}" class="btn btn-outline-danger">+</a> </td>
                                     
                        
                                       
                                       
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



    



    @extends('doctor.layouts.footer-scripts')
    </body>
</html>