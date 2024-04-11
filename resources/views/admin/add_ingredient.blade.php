
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
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                <br>
                    <form action="store_ingredients" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label >اسم المكون</label>
                                <input type="text" class="form-control"  name="ingredient_name"
                                     required>
                            </div>

                            <div class="col">
                                <label> حجم الحصة</label>
                                <input class="form-control " name="ingredient_servingSize" 
                                    type="text" value="100 جرام" readonly>
                            </div>

                            <div class="col">
                                <label>السعرات الحرارية</label>
                                <input class="form-control " name="ingredient_calories" 
                                    type="text" required>
                            </div>

                            <div class="col">
                            <label>إجمالي الدهون (g)</label>
                                <input class="form-control " name="ingredient_totalFat" 
                                    type="text" required>
                                   
                            </div>

                            <div class="col">
                            <label>الكولسترول (mg)</label>
                                <input class="form-control " name="ingredient_cholesterol" 
                                    type="text" required>
                            </div>

                        </div>
<br><br>
                        {{-- 2 --}}
                        <div class="row">
                          

                            <div class="col">
                            <label> صوديوم (mg)</label>
                                <input class="form-control " name="ingredient_sodium" 
                                    type="text" required>
                            </div>

                            <div class="col">
                            <label> Aفيتامين (%DV)</label>
                                <input class="form-control " name="ingredient_vitaminA" 
                                    type="text" required>
                                   
                            </div>

                            <div class="col">
                            <label> Cفيتامين (%DV)</label>
                                <input class="form-control " name="ingredient_vitaminC" 
                                    type="text" required>
                            </div>

                            <div class="col">
                            <label>بروتين (g)</label>
                                <input class="form-control " name="ingredient_protein" 
                                    type="text" required>
                            </div>
                            <div class="col">
                            <label>السكريات (g)</label>
                                <input class="form-control " name="ingredient_sugars" 
                                    type="text" required>
                            </div>
                        </div>


                        {{-- 3 --}}

                        
                        


                        {{-- 4 --}}

                       


                        {{-- 5 --}}

                        <br>
                         <!-- <div class="d-flex justify-content-center">
                             <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                         </div> -->
                     


                       <br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>


                    </form>
               <br>
            </div>
        </div>
    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
    @extends('admin.layouts.footer-scripts')
