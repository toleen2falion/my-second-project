
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
        
      <div class="row">   
      <div class="card-header pb-0">
        <br>

       


    
   


  <!-- row -->
  <div class="row">

<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-body">
        <!-- {{ url('invoices/update') }} -->
          

        <div class="card-body " >
               <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                   <h5 class="card-title">اضافة مرفقات</h5>
                       <form method="post" action="{{ url('/admin/dashboard/ChefAddAttachments') }}"
                           enctype="multipart/form-data" class="my-0 py-0">
                              {{ csrf_field() }}
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="customFile"
                                      name="file_name" required>
                                       <input type="hidden" id="customFile" name="chef_id"
                                         value="{{ $chefs->id }}">
                                          <input type="hidden" id="customFile" name="chef_name"
                                             value="{{ $chefs->name }}">
                                          <label class="custom-file-label" for="customFile">حدد
                                          المرفق</label>
                                </div><br>
                              <button type="submit" class="btn btn-primary btn-sm "
                                      name="uploadedFile">تاكيد</button>
                        </form>
                                          
        </div>
        
    </div>
    
</div>

</div>


</div>

ii
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@if (session()->has('Add_Chef_Attachments'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add_Chef_Attachments') }}</strong>
            
        </div>
    @endif

    @if (session()->has('exists'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('exists') }}</strong>
            
        </div>
    @endif
    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            
        </div>
    @endif
  <!-- row opened -->
 
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
                         <tr class="text-dark">
                          <th scope="col">م</th>
                            <th scope="col">اسم الملف</th>
                                                       
                             <th scope="col">تاريخ الاضافة</th>
                              <th scope="col">العمليات</th>
                      </tr>
                       </thead>
                       <tbody>
                            <?php $i = 0; ?>
                               @foreach ($attachments as $attachment)
                                <?php $i++; ?>
                               <tr>
                                   <td>{{ $i }}</td>
                                     <td>{{ $attachment->file_name }}</td>
                                      <td>{{ $attachment->created_at }}</td>
                                        <td colspan="2">

                                        <a class="btn btn-outline-success btn-sm"
                                           href="{{ url('/admin/dashboard/View_file') }}/{{ $chefs->id }}/{{ $chefs->name }}/{{ $attachment->file_name }}"
                                            role="button"><i class="fas fa-eye"></i>&nbsp;
                                             عرض</a>

                                        <a class="btn btn-outline-info btn-sm"
                                             href="{{ url('/admin/dashboard/download') }}/{{ $chefs->id }}/{{ $chefs->name }}/{{ $attachment->file_name }}"
                                             role="button"><i
                                              class="fas fa-download"></i>&nbsp;
                                                تحميل</a>

                                        
                                        
                                                <a class="btn btn-outline-danger btn-sm"
                                             href="{{ url('/admin/dashboard/delete_file') }}/{{ $attachment->id }}/{{ $chefs->id }}/{{ $chefs->name }}/{{ $attachment->file_name }}"
                                             role="button"><i
                                              class="fas fa-download"></i>&nbsp;
                                                حذف</a>

                                        

                                                                
           
                                                                   
                                                                

                                          </td>
                                </tr>
                              @endforeach
                               </tbody>
                              </tbody>
                                    </table>

                                        </div>
                                    </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /div -->
</div>

</div>
<!-- /row -->

        </div>       
    </div>   
</div>     
    @extends('admin.layouts.footer-scripts')
