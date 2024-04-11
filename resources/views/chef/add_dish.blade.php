
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
        
      <div class="row" lang="ar" dir="rtl">   
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


  <!-- row -->
  <!-- <div class="row" lang="ar" dir="rtl">

<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-body">
e
        </div>
    </div>
t
</div>

</div>

oo -->

        </div>  

    <div class="row" lang="ar" dir="rtl">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="store_dish" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label >صورة الطبق</label>
                                <input type="file" class="form-control"  name="dish_image"
                                     required>
                            </div>

                            <div class="col">
                                <label>اسم الطبق</label>
                                <input class="form-control " name="dish_name" 
                                    type="text" value="" required>
                            </div>

                            <div class="col">
                                <label>نوعه </label>
                                <select class="form-control " name="dish_type" required >
                                    <option selected disabled></option>
                                    <option value="فطور">فطور</option>
                                    <option value="غداء\عشاء">غداء\عشاء</option>
                                    <option value="حلويات">حلويات</option>
                                    <option value="مشروبات">مشروبات</option>
                                </select>
                                  
                            </div>

                        </div>
<br><br>
                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                            <label>نمطه </label>
                                <select class="form-control " name="dish_pattern" required >
                                    <option selected disabled></option>  
                                    <option value="رئيسي">رئيسي</option>
                                    <option value="مقبلات">مقبلات</option>
                                </select>
                            </div>

                            <div class="col">
                            <label>البلد </label>
                                <select class="form-control " name="dish_country" required >
                                    <option selected disabled></option>  
                                    <option value="شرقي">شرقي</option>
                                    <option value="غربي">غربي</option>
                                </select>
                            </div>

                            <div class="col">
                            <label>تكلفته </label>
                                <select class="form-control " name="dish_cost" required >
                                    <option selected disabled></option>  
                                    <option value="منخفضة">منخفضة</option>
                                    <option value="متوسطة">متوسطة</option>
                                    <option value="عالية">عالية</option>
                                </select>
                            </div>

                            
                        </div><br>


                        {{-- 3 --}}

                        <div class="row">
                            <div class="col">
                            <label>وقت تحضيره </label>
                            <input class="form-control " name="dish_cookTime" 
                                    type="number" value="" required>
                            </div>

                            <div class="col">
                            <label>عدد الحصص </label>
                            <input class="form-control " name="dish_numberIndividual" 
                                    type="number" value="" required>
                            </div>

                            <div class="col">
                            
                            <label for="w3review">  توصيف عن الطبق </label>

                                <textarea id="w3review" name="dish_description" rows="4" cols="50">
                           
                                </textarea>
                            </div>


                            
                        </div>
                            


                        {{-- 4 --}}

                        <div class="row">
                            <div class="col">
                            <!-- <label>chef id  </label> -->
                            <input class="form-control " name="chef_id" 
                                    type="hidden" value="{{ Auth::guard('chef')->user()->id;}}" readonly>
 
                            </div>

                            <div class="col">
                            <input class="form-control " name="state" 
                                    type="hidden" value='0' readonly>
                            </div>
                            
                           

                            
                        </div>


                        {{-- 5 --}}

                        <br>
                         <!-- <div class="d-flex justify-content-center">
                             <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                         </div> -->
                     
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- row closed -->   


    </div>   
</div>     
    @extends('chef.layouts.footer-scripts')
    </body>
</html>