
@extends('doctor.layouts.head')
 
<body>
    <!-- top navigation bar -->
    @extends('doctor.layouts.top-navigation-bar')
    <!-- top navigation bar -->
    <!-- offcanvas -->
    @extends('doctor.layouts.offcanvas')
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
    <div class="container-fluid">
        
        <div class="row">   
        <div class="card-header pb-0">
          <br>
   
    
     
  @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            
        </div>
    @endif

    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            
        </div>
    @endif

    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            
        </div>
    @endif
    </div>
</div>
<div class="row"   lang="ar" dir="rtl">   
        <div class="card-header pb-0">
        <a class="modal-effect btn btn-outline-primary btn-sm m-1 mx-5 px-3 my-2 " data-effect="effect-scale"
                    data-bs-toggle="modal"
                    href="#Modal" >&nbsp;
                    إضافة مرض</a>
        </div>
</div>
<br>
 <!-- row -->
 <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-header text-center">
                <span>الأمراض <i class="bi bi-table me-2 "></i></span>  
              </div>
              <div class="card-body">
                <div class="table-responsive">

                  <table
                    id="example"
                    class="table table-striped data-table"
                    style="width: 100%"
                    lang="ar" dir="rtl"
                  >
                    <thead >
                      <tr>
                        <th></th>
                        <th> </th>
                        
                        
                        <?php
                        // <th>كلمة المرور</th>
                        ?>
                        
                        
                      </tr>
                    </thead>
                    <tbody >
                          @php
                                $i = 0;
                                @endphp
                                @foreach ($diseases as $disease)
                                    @php
                                    $i++
                                    @endphp
                                    <tr>
                                        <td>{{ $i }})</td>
                                        
                                        
                                        <td><h4>{{ $disease->name }} :</h4>
                                       <ul>
                                        <li>

                                             {{ $disease->description }}
                                        </li>
                                        <br>
                                        <li>

                                       <b> تمت إضافته بواسطة: </b> {{ $disease->created_by }}.
                                        </li>
                                        <br>
                                        <li>

                                       <b>تاريخ الإضافة: </b> {{ $disease->created_at }}.
                                        </li>
                                        
                                        </ul>
                                      
                                        <a class="modal-effect btn btn-outline-success btn-sm mx-2 px-3 my-2" data-effect="effect-scale"
                                          data-id="{{$disease->id}}" 
                                          data-name="{{$disease->name}}" 
                                          data-description="{{$disease->description}}" 
                                          data-bs-toggle="modal"
                                          href="#Modal2" 
                                         >&nbsp;
                                                        تعديل</a>

                                       <a class="modal-effect btn btn-outline-danger btn-sm mx-2 px-3 my-2" data-effect="effect-scale"
                                          data-id="{{$disease->id}}" 
                                          data-name="{{$disease->name}}"  
                                          data-bs-toggle="modal"
                                          href="#Modal3" 
                                         >&nbsp;
                                                        حذف</a>

                                        <a class="btn btn-outline-primary btn-sm mx-2 px-3 my-2"
                                            href="{{ url('/doctor/dashboard/diease_bloked_ingredient') }}/{{$disease->id}}"
                                            role="button">
                                                    الأغذية الممنوعة </a>

                                                    <?php
                                                    //  danger 
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


<!-- row closed -->


</div>

<!-- modal -->
<!-- ////model -->
<div class="modal" id="Modal" lang="ar" dir="rtl">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        <h4 class="modal-title " >
                        <label>  </label>
                       </h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/doctor/dashboard/add_diseases')}}" method="get"  autocomplete="off">
                      
                         {{ csrf_field() }}    
                        <div class="mb-3">
                        <label class="form-label h5"> المرض: </label>
                              <input class="form-control " name="disease_name" 
                                      type="text" value="" required>
                                
                            </div>
                            <div class="mb-3">
                            <label for="w3review"  class="form-label h5">توصيف عن المرض:</label>
                            <textarea id="w3review" name="disease_description" rows="4" cols="50" >
                            
                            </textarea>
                                
                            </div>
                            
                       
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">إلغاء</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<!-- ///////model2 -->

<!-- endModal -->

<!-- ////modal2 -->
<div class="modal" id="Modal2" lang="ar" dir="rtl">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        <h4 class="modal-title " >
                        <label>  تعديل</label>
                       </h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/doctor/dashboard/update_diseases')}}" method="post"  autocomplete="off">
                      
                        {{ method_field('patch') }}
                        {{ csrf_field() }}  
                        <div class="mb-3">
                     
                              <input class="form-control " name="disease_id" id="id"
                                      type="hidden" value="" readonly>
                                
                            </div>  
                        <div class="mb-3">
                        <label class="form-label h5"> المرض: </label>
                              <input class="form-control " name="disease_name" id="name"
                                      type="text" value="" required>
                                
                            </div>
                            <div class="mb-3">
                            <label for="w3review"  class="form-label h5"> اكتب توصيفاً جديداً :</label>
                            <textarea id="w3review" name="disease_description" id="description"   rows="4" cols="50" >
                              
                            </textarea>
                                
                            </div>
                            
                       
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">إلغاء</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<!-- /////// -->

<!-- endModal2 -->


<!-- ////modal3 -->
<div class="modal" id="Modal3" lang="ar" dir="rtl">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        <h4 class="modal-title " >
                        <label> <input class=" bg-warning border-0 text-white  " name="" id="name"
                                      type="text" value="" readonly></h4></label>
                       </h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/doctor/dashboard/delete_diseases')}}" method="post"  autocomplete="off">
                      
                        
                        {{ csrf_field() }}  
                        <div class="mb-3">
                        <label class="form-label h5"> هل أنت متأكد من عملية الحذف؟ </label>
                              <input class="form-control " name="disease_id" id="id"
                                      type="hidden" value="" readonly>
                                
                            </div>  
                            
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">نعم</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">إلغاء</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<!-- /////// -->

<!-- endModal3 -->

    </main>
                             

<script src="/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="/js/jquery-3.5.1.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
   
    <script src="/js/dataTables.bootstrap5.min.js"></script>

    <script src="/js/script.js"></script>


    <!-- /////modal2 -->
    
                                         
                                          
<script>
    $('#Modal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var description = button.data('description')
       
       
        
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
        // modal.find('.modal-body #description').val(description);
       
       
    })
   
    

</script>
<!-- Modal3 -->
<script>
    $('#Modal3').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
       
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-title #name').val(name);
      
       
    })
   
    

</script>
    </body>
</html>