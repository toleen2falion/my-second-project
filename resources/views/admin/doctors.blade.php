
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
        
     
    @if (session()->has('delete_doctor'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete_doctor') }}</strong>
           
           
        </div>
    @endif

      @if (session()->has('Add_doctor'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add_doctor') }}</strong>
           
           
        </div>
    @endif


      <div class="row">   
      <div class="card-header pb-0">
        <br>
                   <!-- 'اضافة طبيب' -->
                        <a href="add_doctors" class="modal-effect btn btn-sm btn-primary mx-5 my-3" style="color:white"><i
                                class="fas fa-plus"></i>&nbsp; اضافة طبيب</a>
                                <br>
            </div> 
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-header">
                <span><i class="bi bi-table me-2"></i></span> Data Table
              </div>
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
                        <th>صورة الطبيب</th>
                        <th>اسم الطبيب</th>
                        <th>رقم الهاتف</th>
                        <th>البريد الالكتروني</th>
                        <?php
                        // <th>كلمة المرور</th>
                        ?>
                        
                        <th>تاريخ الإضافة</th>
                        <th>العمليات</th>
                      </tr>
                    </thead>
                    <tbody>
                          @php
                                $i = 0;
                                @endphp
                                @foreach ($doctors as $doctor)
                                    @php
                                    $i++
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        
                                        <td><img src="/image_doctor/{{ $doctor->image }}" width="100px"></td>
                                        <td><a
                                                href="{{ url('/admin/dashboard/DoctorAttachments')}}/{{ $doctor->id }}">{{ $doctor->name }}</a>
                                        </td>
                                      
                                        
                                        <td>{{ $doctor->phone }}</td>
                                       
                                        <td>{{ $doctor->email }}</td>
                                        <?php
                                        // <td>{{ $doctor->password }}</td>
                                        ?>
                          
                                        <td>{{ $doctor->created_at }}</td>
                                     
                                       
                                        

                                        
                                        
                                        <td>

                                                 <a class="btn btn-outline-success btn-sm"
                                                    href="{{ url('/admin/dashboard/edit_doctor') }}/{{ $doctor->id }}"
                                                        role="button"><i class="fas fa-eye"></i>&nbsp;
                                                             تعديل</a>
                                                <a class="btn btn-outline-danger btn-sm"
                                                       href="{{ url('/admin/dashboard/destroy_doctor') }}/{{ $doctor->id }}"
                                                          
                                                              role="button"><i
                                                                    class="fas fa-download"></i>&nbsp;
                                                                      حذف</a>

                                                    <?php
                                                    //  href=" {{ url('edit_invoice') }}/{{ $invoice->id }}">تعديل
                                                    //  الفاتورة</a>
                                                        // <a class="dropdown-item" href="#" data-invoice_id="{{ $invoice->id }}"
                                                        //     data-toggle="modal" data-target="#delete_invoice"><i
                                                        //         class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;حذف
                                                        //     الفاتورة</a>
                                                    ?>
                                                 
                                           

                                        </td>
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



    



    @extends('admin.layouts.footer-scripts')
 