
@extends('admin.layouts.head')
  <body>
    <!-- top navigation bar -->
    @extends('admin.layouts.top-navigation-bar')
    <!-- top navigation bar -->
    <!-- offcanvas -->
    @extends('admin.layouts.offcanvas')
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        
     
      <div class="card-header pb-0">
                   <!-- 'اضافة 'ingredients -->
                        <a href="add_ingredients" class="modal-effect btn btn-sm btn-primary" style="color:white"><i
                                class="fas fa-plus"></i>&nbsp; اضافة مكون</a>
                 
                   

                </div>


      <div class="row">   
      <div class="card-header pb-0">
        <br>
                  
        @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            
        </div>
    @endif

@if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            
        </div>
    @endif
            </div> 
        </div>
        <div class="row">
          <div class="col-md-12 ">
            <div class="card">
              <div class="card-header">
                <span><i class="bi bi-table me-2"></i></span> Data Table
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="example"
                    class="table table-striped data-table"
                    style="width:100%"
                    lang="ar" dir="rtl"
                  >

                  <thead>
                                <tr>
                                    <th>#</th>
                                    
                                    <th> المكون</th>
                                    <th> حجم الحصة</th>
                                    <th>القيم الغذائية:</th>
                                    <?php

                                    // <th> السعرات الحرارية </th>
                                    // <th> (g)إجمالي الدهون </th>
                                    // <th> (mg)الكولسترول</th>
                                    // <th> (mg)صوديوم</th>
                                    // <th> (%DV) Aفيتامين </th>
                                    // <th> (%DV) Cفيتامين </th>
                                    // <th>(g)بروتين</th>
                                    // <th> (g)السكريات</th>
                                    ?>
                                    <th> </th>
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
                                    <tr class="py-4 my-2">
                                        <td >{{ $i }}</td>
                                        
                                       
                                
                                        <td >{{ $ingredient->name}}</td>
                                        <td >{{ $ingredient->servingSize}}</td>
                                        <td >
                                        <ul>
                                          <li>السعرات الحرارية: {{ $ingredient->calories}}.</li>
                                          <li>إجمالي الدهون: {{ $ingredient->totalFat}} (g).</li>
                                          <li>الكولسترول: {{ $ingredient->cholesterol}} (mg).</li>
                                          <li>صوديوم: {{ $ingredient->sodium}} (mg).</li>
                                          <li>Aفيتامين: {{ $ingredient->vitaminA}} (%DV).</li>
                                          <li>Cفيتامين: {{ $ingredient->vitaminC}} (%DV).</li>
                                          <li>بروتين: {{ $ingredient->protein}} (g).</li>
                                          <li>السكريات: {{ $ingredient->sugars}} (g).</li>
                                        </ul>
                                      
                                        </td>
                                        <?php
                                        // <td ></td>
                                        // <td ></td>
                                        // <td class="p-0"></td>
                                        // <td class="p-0"></td>
                                        // <td class="p-0"></td>
                                        // <td class="p-0"></td>
                                        // <td class="p-0"></td>
                                     
                                       ?>
                                        

                                        
                                        <td >
                                           
                                        <a class="btn btn-outline-success btn-sm"
                                                    href="{{ url('/admin/dashboard/edit_ingredient') }}/{{ $ingredient->id }}"
                                                        role="button"><i class="fas fa-eye"></i>&nbsp;
                                                             تعديل</a>
                                                <a class="btn btn-outline-danger btn-sm"
                                                       href="{{ url('/admin/dashboard/destroy_ingredient') }}/{{ $ingredient->id }}"
                                                          
                                                              role="button"><i
                                                                    class="fas fa-download"></i>&nbsp;
                                                                      حذف</a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




    </main>



    



    @extends('admin.layouts.footer-scripts')
 