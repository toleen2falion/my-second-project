
@extends('chef.layouts.head')
  <body >
    <!-- top navigation bar -->
    @extends('chef.layouts.top-navigation-bar')
    <!-- top navigation bar -->
    <!-- offcanvas -->
    @extends('chef.layouts.offcanvas')
    <!-- offcanvas -->
   
    <main class="mt-5 pt-1" lang="ar" dir="rtl">
    <div class="row">
          <div class="col-md-12 mb-3 my-2">
            <div class="card">
            @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            
        </div>
    @endif
        </div>
        <div class="card">
            @if (session()->has('delete'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>{{ session()->get('success') }}</strong>
           
           
        </div>
    @endif
        </div>
    </div>
</div>

      <div class="container-fluid">
    <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
            <div class="container">
        <div class="tab_box">
            <button class="tab_btn p-4 active">معلومات الطبق</button>
            <button class="tab_btn  p-4">المكونات</button>
            <button class="tab_btn  p-4">القيم الغذائية</button>
            <button class="tab_btn  p-4">طريقة التحضير</button>
            <button class="tab_btn  p-4">الملاحظات</button>
            <button class="tab_btn  p-4">التعليقات</button>
            <div class="line"></div>
        </div>

        <div class="content_box ">
            <div class="content">
                <h3 class="mx-5 px-3">{{ $dish->name }}</h3>
                <ul class="mx-5 px-3">
                  <li>النوع: {{ $dish->type }}</li>
                  <li>النمط: {{ $dish->pattern }}</li>
                  <li>البلد: {{ $dish->country }}</li>   
                  <li>الكلفة: {{ $dish->cost }}</li>
                  <li>وقت التحضير: {{ $dish->cookTime }}</li>
                  <li>عدد الحصص: {{ $dish->numberIndividual }}</li>
                  <li>توصيف عن الطبق: {{ $dish->description }}</li>
                </ul>      
                <a class="modal-effect btn btn-outline-success btn-sm mx-5 px-3 my-2" data-effect="effect-scale"
                           data-dtype="{{$dish->type}}" 
                           data-dpattern="{{$dish->pattern}}" 
                           data-dcountry="{{$dish->country}}" 
                           data-dcost="{{$dish->cost}}" 
                           data-bs-toggle="modal"
                           href="#Model5" >&nbsp;
                                        تعديل</a>
                
            </div>

            <div class="content">
            <h3 class="mx-5 px-3">{{ $dish->name }}</h3>
            <a class="btn btn-outline-primary btn-sm mx-5 px-3 my-2 "
                 href="{{ url('/chef/dashboard/ingredients') }}/{{ $dish->id }}"
                         role="button">
                         إضافة مكونات</a>
             
              <div class="table-responsive">
                  <table
                    style="width: 70%"
                  >
                    <thead>
                      <tr>
                        <th  style="width:10%"></th>
                        <th></th>
                        <th></th>
                       
                        
                      </tr>
                    </thead>
                    <tbody>
                   
                    @php
                          $i = 0;
                          @endphp
                  @foreach($dish->Dish_ingredients as $in)
                   @foreach($dish->ingredients as $ingredient)
                   
                     
                   <tr>
                                  
                                 
                                
                         @if($ingredient->id == $in->ingredient_id )  
                         @php
                              $i++
                              @endphp 
                         <td>{{ $i }}</td>    
                         <td>{{$ingredient->name }}</td>
                               <td>{{$in->type}}</td>
                               <td>{{$in->quantity}} {{$in->measruingUnit}}</td>
                               
                               <td>
                               <a class="modal-effect btn btn-outline-success btn-sm" data-effect="effect-scale"
                                                data-quant="{{$in->quantity}}" 
                                                data-meas="{{$in->measruingUnit}}"
                                                data-type="{{$in->type}}" 
                                                data-id="{{$in->dish_id}}" 
                                                data-iid="{{$in->ingredient_id}}"
                                                data-name="{{$ingredient->name }}" 
                                                data-bs-toggle="modal"
                                                href="#myModal" >&nbsp;
                                        تعديل</a>
                                </td>
                               
                                
                                <td>
                               <a class="modal-effect btn btn-outline-danger btn-sm" data-effect="effect-scale"
                                          data-quant="{{$in->quantity}}" 
                                          data-meas="{{$in->measruingUnit}}"
                                          data-id="{{$in->dish_id}}" 
                                          data-iid="{{$in->ingredient_id}}"
                                          data-name="{{$ingredient->name }}" 
                                          data-bs-toggle="modal"
                                          href="#myModal2" >&nbsp;
                                                حذف</a>
                                </td>
                               
                          @endif
                       
                      @endforeach
                        
                      @endforeach 
                    </tr>
                      
                   
                  
                   
                </tbody>
                <tfoot>
                  
                </tfoot>
              </table>
              <?php  
                      // <ul>
                      //     @foreach($dish->ingredients as $ingredient)
                      //     <li>{{ $ingredient->name }}</li>
                      //     @endforeach
                      // </ul>
                   
               ?> 
              <!-- // -->
            </div>
            </div>

            <div class="content">
                <h3 class="mx-5 px-3">{{ $dish->name }}</h3>
                <ul class="mx-5 px-3">
                  <li>السعرات الحرارية: {{ $dish->calories }}.</li>
                  <li>إجمالي الدهون: {{ $dish->totalFat }} (g).</li>
                  <li>كوليسترول: {{ $dish->cholesterol }} (mg).</li>   
                  <li>صوديوم: {{ $dish->sodium }} (mg).</li>
                  <li> فيتامين أ: {{ $dish->vitaminA }} (%DV).</li>
                  <li> فيتامين سي: {{ $dish->vitaminC }} (%DV).</li>
                  <li> بروتين : {{ $dish->protein }} (g).</li>
                  <li> سكريات : {{ $dish->sugars }} (g).</li>
                </ul>      
                  
            </div>
            <div class="content">
            <h3 class="mx-5 px-3">{{ $dish->name }}</h3>
<?php
           
            // <a class="btn btn-outline-success btn-sm m-1 mx-5 px-3 my-2"
            //    href="{{ url('/chef/dashboard/steps') }}/{{ $dish->id }}"
            // role="button">
            //         طريقة التحضير</a>
        ?>
            
            <a class="modal-effect btn btn-outline-success btn-sm m-1 mx-5 px-3 my-2" data-effect="effect-scale"
            
                data-dish="{{$dish->id}}"  
                data-bs-toggle="modal"
                 href="#myModal4" >&nbsp;
                 طريقة التحضير</a>
            

                <table class="mx-5 px-3" >
                    @php
                        $i = 0;
                    @endphp    
                @foreach ($steps as $step)
                  <tr>  @php
                        $i++;
                        @endphp   
                    <td  style="width:10%">{{$i}}) </td>
                    <td>{{ $step->content }}. </td>
                    <td>
                  <a class="modal-effect btn btn-outline-danger btn-sm mx-5" data-effect="effect-scale"
                             data-step="{{$step->id}}" 
                             data-dish="{{$dish->id}}" 
                              
                               data-bs-toggle="modal"
                               href="#myModal3" >&nbsp;
                                                حذف</a>
                    </td>
                </tr>
                 
                  
                  @endforeach
</table>  
            </div>
        <!-- </div>
    </div> -->

    <div class="content">
        <h3 class="mx-5 px-3">{{ $dish->name }}</h3>
        <a class="modal-effect btn btn-outline-success btn-sm m-1 mx-5 px-3 my-2" data-effect="effect-scale"
            
            data-bs-toggle="modal"
             href="#Modal6" >&nbsp;
              إضافة ملاحظات</a>

              <table class="mx-5 px-3" >
                    @php
                        $i = 0;
                    @endphp    
                @foreach ($notes as $note)
                  <tr>  @php
                        $i++;
                        @endphp   
                    <td  style="width:10%">{{$i}}) </td>
                    <td>{{ $note->content }}. </td>
                    <td>
                  <a class="modal-effect btn btn-outline-danger btn-sm mx-5" data-effect="effect-scale"
                             data-note="{{$note->id}}" 
                             data-dish="{{$dish->id}}" 
                              
                               data-bs-toggle="modal"
                               href="#Modal7" >&nbsp;
                                                حذف</a>
                    </td>
                </tr>
                 
                  
                  @endforeach
            </table>  
    </div>
<div class="content">
uuyyy
</div>
</div>
    </div>
    <!-- //// -->
            </div>
          </div>
        </div>
      </div>


<!-- ////model -->
<div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        <h4 class="modal-title " >
                        <label> {{ $dish->name }}/ </label>
                        <input class=" bg-warning border-0 text-white  " name="" id="name"
                                      type="text" value="" readonly></h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/chef/dashboard/update_dish_ingredient') }}" method="post"  autocomplete="off">
                        {{ method_field('patch') }}
                         {{ csrf_field() }}    
                        <div class="mb-3">
                           
                              <input class="form-control " name="old_quantity" id="quant"
                                      type="hidden" value="" readonly>
                                <label class="form-label required">الكمية</label>
                                <input class="form-control " name="new_quantity" id="quant"
                                    type="number" value="" required>
                            </div>
                            <div class="mb-3">

                              <input class="form-control " name="old_measruingUnit" id="meas"
                                        type="hidden" value="" readonly>
                                <label class="form-label required">وحدة القياس</label>
                                <select class="form-control " name="new_measruingUnit"  id="meas" required >
                                      
                                
                                    <option  value="جرام">جرام</option>
                                    <option value="معلقة صغيرة">معلقة صغيرة</option>
                                    <option value="معلقة كبيرة">معلقة كبيرة</option>
                                    <option value="كوب">كوب</option>
                                  
                                  
                                </select>
                            </div>
                            <div class="mb-3">
                            <label class="form-label required">النوع</label>
                                <select class="form-control " name="type"  id="type" required >
                                      
                                    <option  value="ثانوي">ثانوي</option>
                                    <option value="رئيسي">رئيسي</option>
                                
                                </select>
                           
                            </div>
                            <div class="mb-3">
                           
                            <input class="form-control " name="dish_id" id="id"
                                    type="hidden" value="" readonly>
                             
                            </div>
                            <div class="mb-3">
                           
                            <input class="form-control " name="ingredient_id" id="iid"
                                    type="hidden" value="" readonly>
                             
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

<!-- /// -->
<!-- ////model2 -->
<div class="modal" id="myModal2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        <h4 class="modal-title " >
                        <label> {{ $dish->name }}/ </label>
                        <input class=" bg-warning border-0 text-white  " name="" id="name"
                                      type="text" value="" readonly></h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/chef/dashboard/delete_dish_ingredient') }}" method="post"  autocomplete="off">
                      
                         {{ csrf_field() }}    
                        <div class="mb-3">
                        <label class="form-label h5">هل أنت متأكد من عملية الحذف؟</label>
                              <input class="form-control " name="quantity" id="quant"
                                      type="hidden" value="" readonly>
                                
                            </div>
                            <div class="mb-3">

                              <input class="form-control " name="measruingUnit" id="meas"
                                        type="hidden" value="" readonly>
                                
                            </div>
                            
                            <div class="mb-3">
                           
                            <input class="form-control " name="dish_id" id="id"
                                    type="hidden" value="" readonly>
                             
                            </div>
                            <div class="mb-3">
                           
                            <input class="form-control " name="ingredient_id" id="iid"
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
<!-- ///////model2 -->

mm
<!-- ////modal7 -->
<div class="modal" id="Modal7">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        <h4 class="modal-title " >
                        </h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/chef/dashboard/delete_dish_note') }}" method="post"  autocomplete="off">
                      
                         {{ csrf_field() }}    
                        <div class="mb-3">
                        <label class="form-label h5">هل أنت متأكد من عملية الحذف؟</label>
                              <input class="form-control " name="dish_id" id="dish"
                                      type="hidden" value="" readonly>
                                
                            </div>
                            <div class="mb-3">

                              <input class="form-control " name="note_id" id="note"
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
<!-- ///////model7 -->


///Model5
<!-- ////model5 -->
<div class="modal" id="Model5">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        <h6 class="modal-title " >
                        </h6>

                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/chef/dashboard/update_dish_info') }}" method="post"  autocomplete="off">
                      
                        {{ method_field('patch') }}
                        {{ csrf_field() }}    
                        <div class="mb-2  ">
                    
                              <input class="form-control " name="dish_id" id=""
                                      type="hidden" value="{{ $dish->id }}" readonly>
                                
                            </div>
                            <div class="mb-3" >
                            <label style="width:50px;" > النوع : </label>
                                <select class= " py-1 px-5 border border-warning bg-white rounded " style="width:250px;" name="dish_type"  id="dtype" required >
                                      
                                <option value="فطور">فطور</option>
                                <option value="غداء\عشاء">غداء\عشاء</option>
                                <option value="حلويات">حلويات</option>
                                <option value="مشروبات">مشروبات</option>
                                
                                </select>
                           
                            </div>

                            <div class="mb-3  ">
                            <label style="width:50px;" >النمط : </label>
                                <select class="py-1 px-5 border border-warning bg-white rounded  " style="width:250px;" name="dish_pattern"  id="dpattern" required >
                                      
                                <option value="رئيسي">رئيسي</option>
                                <option value="مقبلات">مقبلات</option>
                                
                                </select>
                            </div>

                            <div class="mb-3">
                            <label style="width:50px;" >البلد : </label>
                                <select class="py-1 px-5 border border-warning bg-white rounded  " style="width:250px;" name="dish_country"  id="dcountry" required >
                                      
                                <option value="شرقي">شرقي</option>
                                <option value="غربي">غربي</option>
                                
                                </select>
                            </div>

                            <div class="mb-3">
                            <label style="width:50px;" >الكلفة : </label>
                                <select class="py-1 px-5 border border-warning bg-white rounded  " style="width:250px;"  name="dish_cost"  id="dcost" required >
                                      
                                <option value="منخفضة">منخفضة</option>
                                <option value="متوسطة">متوسطة</option>
                                <option value="عالية">عالية</option>
                                
                                </select>
                            </div>
                            
                            <div class="mb-3">
                            <label style="width:100px;" >وقت تحضيره : </label>
                            <input class="py-1 px-5-1 border border-warning bg-white rounded " style="width:200px;"  name="dish_cookTime" 
                                    type="number" value="{{ $dish->cookTime }}" placeholder="{{ $dish->cookTime }}"> دقيقة
                            </div>
                            <div class="mb-3">
                           
                            <label style="width:100px;" >عدد الحصص : </label>
                            <input class="px-5 py-1 border border-warning bg-white rounded" style="width:200px;"  name="dish_numberIndividual" 
                                    type="number" value="{{ $dish->	numberIndividual }}" required>
                             
                            </div>
                            <div class="mb-1">
                           
                            <label for="w3review">  توصيف عن الطبق </label>

                            <textarea id="w3review" name="dish_description" rows="4" cols="50" >
                            {{ $dish->description }}
                            </textarea>
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
<!-- ///////model5 -->
//model5
//////Modal6/
<div class="modal" id="Modal6" >
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        <h4 class="modal-title " > </h4>
                        
                        
                    </div>
                    <div class="modal-body">
                    <form action="/chef/dashboard/store_notes" method="post">
                    @csrf 
                    <table class="table " id="table2">
                        <tr>
                            <th>الملاحظة:</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td> <input type="text" name="inputs[0][content]" placeholder="Enter Space" class="form-control" required></td>
                            <td> <input type="hidden" name="inputs[0][dish_id]" value="{{$dish->id}}" class="form-control" readonly></td>
                            <td><button type="button" name="add2" id="add2" class="btn btn-success">+</button></td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary col-md-2">حفظ</button>
                      
                    </form>
                </div>
            </div>
        </div>
    </div>

////Modal6

<!-- ////model3 -->
<div class="modal" id="myModal3">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        <h4 class="modal-title " > </h4>
                        
                        
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/chef/dashboard/delete_dish_step') }}" method="post"  autocomplete="off">
                      
                         {{ csrf_field() }}    
                        <div class="mb-3">
                        <label class="form-label h5">هل أنت متأكد من عملية الحذف؟</label>
                              <input class="form-control " name="step_id" id="step"
                                      type="hidden" value="" readonly>
                                
                            </div>
                            
                            
                            <div class="mb-3">
                           
                            <input class="form-control " name="dish_id" id="dish"
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
///////model3
<!-- ////model4 -->
<div class="modal" id="myModal4" >
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        <h4 class="modal-title " > </h4>
                        
                        
                    </div>
                    <div class="modal-body">
                    <form action="/chef/dashboard/store_steps" method="post">
                    @csrf 
                    <table class="table " id="table">
                        <tr>
                            <th>الخطوة</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td> <input type="text" name="inputs[0][content]" placeholder="Enter Space" class="form-control" required></td>
                            <td> <input type="hidden" name="inputs[0][dish_id]" value="{{$dish->id}}" class="form-control" readonly></td>
                            <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary col-md-2">حفظ</button>
                      
                    </form>
                </div>
            </div>
        </div>
    </div>
///////model4


    </main>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.tab_btn');
            const all_content = document.querySelectorAll('.content');

            tabs.forEach((tab, index) => {
                tab.addEventListener('click', (e) => {
                    tabs.forEach(tab => {
                        tab.classList.remove('active');
                    });
                    tab.classList.add('active');

                    var line = document.querySelector('.line');
                    line.style.width = e.target.offsetWidth + "px";
                    line.style.left = e.target.offsetLeft + "px";

                    all_content.forEach(content => {
                        content.classList.remove('active');
                    });
                    all_content[index].classList.add('active');
                });
            });
        });
    </script>




<script src="/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="/js/jquery-3.5.1.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
   
    <script src="/js/dataTables.bootstrap5.min.js"></script>

    <script src="/js/script.js"></script>

    

 
<!-- /////model -->
<script>
    $('#myModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var quant = button.data('quant')
        var meas = button.data('meas')
        var type = button.data('type')
        var id = button.data('id')
        var iid = button.data('iid')
        var name = button.data('name')
        // alert(name);
        var modal = $(this)
        modal.find('.modal-body #quant').val(quant);
        modal.find('.modal-body #meas').val(meas);
        modal.find('.modal-body #type').val(type);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #iid').val(iid);
        //
        modal.find('.modal-title #name').val(name);
    })

</script>
<!-- /////model2 -->
<script>
    $('#myModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var quant = button.data('quant')
        var meas = button.data('meas')
        var id = button.data('id')
        var iid = button.data('iid')
        var name = button.data('name')
        // alert(name);
        var modal = $(this)
        modal.find('.modal-body #quant').val(quant);
        modal.find('.modal-body #meas').val(meas);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #iid').val(iid);
        //
        modal.find('.modal-title #name').val(name);
    })

</script>

<!-- /////model3 -->
<script>
    $('#myModal3').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var step = button.data('step')
        var dish = button.data('dish')
        
        // alert(dish);
        var modal = $(this)
        modal.find('.modal-body #step').val(step);
        modal.find('.modal-body #dish').val(dish);
       
    })

</script>

<!-- /////model4 -->
<script>
    $('#myModal4').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
       
        var dish = button.data('dish')
        
        // alert(dish);
        var modal = $(this)
     
        modal.find('.modal-body #dish').val(dish);
       
    })

</script>

<!-- /////modal7 -->
<script>
    $('#Modal7').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
       
        var dish = button.data('dish')
        var note = button.data('note')
        
        // alert(note);
        var modal = $(this)
     
        modal.find('.modal-body #dish').val(dish);
        modal.find('.modal-body #note').val(note);
       
    })

</script>



<!-- /////model5 -->
<script>
    $('#Model5').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
       
        var dtype = button.data('dtype')
        var dpattern = button.data('dpattern')
        var dcountry = button.data('dcountry')
        var dcost = button.data('dcost')
        // alert(dpattern);
        var modal = $(this)
     
        modal.find('.modal-body #dtype').val(dtype);
        modal.find('.modal-body #dpattern').val(dpattern);
        modal.find('.modal-body #dcountry').val(dcountry);
        modal.find('.modal-body #dcost').val(dcost);
       
    })

</script>

<!-- ////steps -->
<script>
       var i = 0 ;
    $('#add').click(function(){
        ++i;
        $('#table').append(
            `<tr>
                <td>
                    <input type="text" name="inputs[`+i+`][content]" placeholder="Enter Space" class="form-control" required />
                </td>
                <td>
                    <input type="hidden" name="inputs[`+i+`][dish_id]" value="{{$dish->id}}" class="form-control" readonly />
                </td>
                <td>
                     <button type="button" class="btn btn-danger remove-table-raw">-</button>
                </td>
                </tr>`);

    });

    $(document).on('click','.remove-table-raw',function(){
        $(this).parents('tr').remove();
    });
        </script>
<!-- ////steps -->

<!-- ////notes -->
<script>
       var i = 0 ;
    $('#add2').click(function(){
        ++i;
        $('#table2').append(
            `<tr>
                <td>
                    <input type="text" name="inputs[`+i+`][content]" placeholder="Enter Space" class="form-control" required />
                </td>
                <td>
                    <input type="hidden" name="inputs[`+i+`][dish_id]" value="{{$dish->id}}" class="form-control" readonly />
                </td>
                <td>
                     <button type="button" class="btn btn-danger remove-table-raw">-</button>
                </td>
                </tr>`);

    });

   
        </script>
<!-- ////notes -->

<script>

// $('#myModal').on('show.bs.modal', function(event) {
//   var button = $(event.relatedTarget)
//   var in_quantity = button.data('in_quantity')
//   var in_measruingUnit = button.data('in_measruingUnit')
  // var in_quantity = button.data('in_quantity')
  // alert(in_measruingUnit)
  //   var modal = $(this)

  //   modal.find('.modal-body #in_quantity').val(in_quantity);
  //   modal.find('.modal-body #in_measruingUnit').val(in_measruingUnit);
  //
    
  
   
// })

</script>
    </body>
</html>