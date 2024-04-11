
@extends('chef.layouts.head')
  <body>
    <!-- top navigation bar -->
    @extends('chef.layouts.top-navigation-bar')
    <!-- top navigation bar -->
    <!-- offcanvas -->
    @extends('chef.layouts.offcanvas')
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
    
      <div class="container-fluid" >
      <div class="row" lang="ar" dir="rtl" >  
     
    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
           
           
        </div>
    @endif

      @if (session()->has('Add_dish'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add_dish') }}</strong>
           
           
        </div>
    @endif
    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
           
           
        </div>
    @endif
    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
           
           
        </div>
    @endif

    </div>

      <div class="row">   
      <div class="card-header pb-0">
        <br>
                   <!-- 'اضافة طاهي' -->
                        <a href="add_dish" class="modal-effect btn btn-sm btn-primary mx-5 my-3" style="color:white"><i
                                class="fas fa-plus"></i>&nbsp; اضافة طبق</a>
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
                        <th>صورة الطبق</th>
                        <th>اسم الطبق</th>
                        <?php
                        // <th>نوعه </th>
                        // <th> نمطه</th>
                        // <th> بلده</th>
                        // <th>كلفته </th>
                        // <th>وقت تحضيره </th>
                        // <th> عدد حصصه</th>
                        // <th>توصيف عنه </th>
                        
                        // // <th>كلمة المرور</th>
                        ?>
                        
                        <th>تاريخ الإضافة</th>
                        <th>حالة الطبق</th>
                        <th></th>
                        
                      </tr>
                    </thead>
                    <tbody>
                          @php
                                $i = 0;
                                @endphp
                        @foreach ($dishs as $dish)
                             @php
                                $i++
                                @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        
                                        <td><img src="/image_Dish/{{ $dish->image }}" width="100px"></td>
                                        <td><a
                                              href="{{url('/chef/dashboard/DishDetails')}}/{{$dish->id}}" >{{ $dish->name }}</a>
                                        </td>
                                      
                                        <?php
                                      //   <td>{{ $dish->type }}</td>
                                       
                                      //   <td>{{ $dish->pattern }}</td>
                                        
                                      //   <td>{{ $dish->country }}</td>
                                      //   <td>{{ $dish->cost }}</td>
                                       
                                      //  <td>{{ $dish->cookTime }}</td>
                                       
                                      //  <td>{{ $dish->numberIndividual }}</td>
                                      //  <td>{{ $dish->description }}</td>
                                        
                                        ?>
                                        
                                        <td>{{ $dish->created_at }}</td>

                                       
                                          
                                        <?php if($dish->state==0){?>
                                        <td>
                                        <a class="btn btn-outline-success btn-sm"
                                        href="{{ url('/chef/dashboard/edit_dish_state') }}/{{$dish->id}}" 
                                        role="button" > نشر </a>
                                      </td>
                                        <?php } 
                                        else {?>
                                         <td>
                                         <a class="btn btn-outline-danger btn-sm m-1"
                                         href="{{ url('/chef/dashboard/edit_dish_state') }}/{{$dish->id}}"
                                         role="button" > إلغاء النشر  </a> </td>
                                        <?php } ?>

                                         
                                       
                                        

                                        
                                        
                                        <td>
                                       <?php
                                        //  <a class="btn btn-outline-success btn-sm m-1"
                                        //             href="{{ url('/chef/dashboard/steps') }}/{{ $dish->id }}"
                                        //                 role="button">
                                        //                      طريقة التحضير</a>
                                                         
                                        // <a class="btn btn-outline-danger btn-sm"
                                        //        href="{{ url('/chef/dashboard/ingredients') }}/{{ $dish->id }}"
                                                          
                                        //               role="button">
                                        //                       تحديد المكونات</a>
                                        /////  href="{{ url('/chef/dashboard/destroy_dish') }}/{{$dish->id}}"
                                        ?>
                                       <a class="btn btn-outline-success btn-sm"
                                         href="{{ url('/chef/dashboard/edit_dish') }}/{{$dish->id}}"
                                          role="button"><i class="fas fa-eye"></i>&nbsp;
                                           تعديل</a>           
                                                    
                                        <a class="modal-effect btn btn-outline-danger btn-sm" data-effect="effect-scale"
                                        
                                          data-id="{{$dish->id}}" 
                                          data-name="{{$dish->name }}" 
                                          data-bs-toggle="modal"
                                          href="#Modal" >&nbsp;
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
            </div>
          </div>
        </div>
      </div>


<!-- ////Modal -->
<div class="modal" id="Modal" lang="ar" dir="rtl">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        <h4 class="modal-title " >
                        <label> <input class=" bg-warning border-0 text-white " name="" id="name"
                                        type="text" value="" readonly></label>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/chef/dashboard/destroy_dish') }}" method="post"  autocomplete="off">
                      
                         {{ csrf_field() }}    
                        <div class="mb-3">
                        <label class="form-label h5">هل أنت متأكد من عملية الحذف؟</label>
                              <input class="form-control " name="dish_id" id="id"
                                      type="text" value="" readonly>
                                
                            </div>
                            <div class="mb-3">

                             
                                
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
<!-- ///////Modal -->

    </main>


    <script src="/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="/js/jquery-3.5.1.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
   
    <script src="/js/dataTables.bootstrap5.min.js"></script>

    <script src="/js/script.js"></script>

    

 
<!-- /////model -->
<script>
    $('#Modal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        // alert(name);
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-title #name').val(name);
       
    })

</script>
    </body>
</html>