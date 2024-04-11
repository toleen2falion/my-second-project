
@extends('doctor.layouts.head')
 
<body>
    <!-- top navigation bar -->
    @extends('doctor.layouts.top-navigation-bar')
    <!-- top navigation bar -->
    <!-- offcanvas -->
    @extends('doctor.layouts.offcanvas')
    <!-- offcanvas -->
    <main class="mt-5 pt-3"  lang="ar" dir="rtl">
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


    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            
        </div>
    @endif
    </div>
</div>
<div class="row " >   
<div class="card-header text-center">
                <span>المكونات الغذائية الممنوعة لمرضى {{$disease->name}}<i class="bi bi-table me-2 "></i></span>  
</div>
       
</div>
<br>
 <!-- row -->
 <div class="row">
 <div class="card-header pb-0 px-5">
        <a class="btn btn-outline-primary btn-sm mx-5 my-2 px-5"
            href="{{ url('/doctor/dashboard/ingredients') }}/{{$disease->id}}"
            role="button">
            أضافة المزيد </a>
        </div>
</div>
       <!-- /////// -->
       <div class="row">             
       <div class="table-responsive mx-5 my-3 px-5 ">
                  <table
                    style="width: 70%"
                    mx-5
                  >
                    <thead>
                      <tr>
                        <th  style="width:5%"></th>
                        <th></th>
                        <th></th>
                       
                        
                      </tr>
                    </thead>
                    <tbody>
                  
                     @php
                            $i = 1;
                    @endphp
                
                    @foreach($disease->ingredients as $ingredient)
                     
                   <tr>
                         <td>{{ $i++ }})</td>    
                         <td>{{$ingredient->name }}</td>
                             
                         <td>
                         <a class="modal-effect btn btn-outline-danger btn-sm" data-effect="effect-scale"
                                         
                                          data-id="{{$ingredient->id }}" 
                                          data-name="{{$ingredient->name }}"
                                          data-idd="{{$disease->id}}"  
                                          data-bs-toggle="modal"
                                          href="#Modal3" >&nbsp;
                                                حذف</a>
                                </td>      
                    </tr>
                      @endforeach
                  </tbody>
                <tfoot>
                  
                </tfoot>
              </table>
             
            </div>
</div>
       <!-- /////// -->
<!-- modal -->
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
                    
                        <form action="{{url('/doctor/dashboard/delete_diease_bloked_ingredient')}}" method="post"  autocomplete="off">
                      
                        
                        {{ csrf_field() }}  
                        <div class="mb-3">
                        <label class="form-label h5"> هل أنت متأكد من عملية الحذف؟ </label>
                              <input class="form-control " name="ingredient_id" id="id"
                                      type="hidden" value="" readonly>
                                
                              <input class="form-control " name="disease_id" id="idd"
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

<!-- endModal -->

                      
     



    </main>
                             

<script src="/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="/js/jquery-3.5.1.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
   
    <script src="/js/dataTables.bootstrap5.min.js"></script>

    <script src="/js/script.js"></script>


   <!-- Modal3 -->
<script>
    $('#Modal3').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var idd = button.data('idd')
       
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-title #name').val(name);
        modal.find('.modal-body #idd').val(idd);
      
       
    })
   
    

</script>
    
                                         
                                          


    </body>
</html>