
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

        @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            
        </div>
    @endif


    
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
        <form action="{{ url('/admin/dashboard/update_ingredient') }}" method="post" enctype="multipart/form-data" autocomplete="off" >
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        {{-- 1 --}}
                    <div class="row">

                        <div class="col">
                                <label for="inputName" class="control-label">المكون</label>
                                <input type="hidden" name="ingredient_id" value="{{ $ingredients->id }}">
                                <input type="text" class="form-control" id="inputName" name="ingredient_name"
                                    title="" value="{{ $ingredients->name }}" required>
                        </div>
                        <div class="col">
                                <label>حجم الحصة</label>
                                <input class="form-control " name="ingredient_servingSize" 
                                    type="text" value="{{ $ingredients->servingSize }}" readonly>
                        </div>
                        <div class="col">
                                    <label>السعرات الحرارية</label>
                                <input class="form-control " name="ingredient_calories" 
                                    type="text" value="{{ $ingredients->calories }}" required>
                        </div>
                        <div class="col">
                                    <label>إجمالي الدهون (g)</label>
                                <input class="form-control " name="ingredient_totalFat" 
                                    type="text" value="{{ $ingredients->totalFat }}" required>

                        </div>
                        <div class="col">
                                    <label>الكولسترول (mg) </label>
                                <input class="form-control " name="ingredient_cholesterol" 
                                    type="text" value="{{ $ingredients->cholesterol }}" required>
                        </div> 
                    </div>
<br>    <br>

                        {{-- 2 --}}
                    <div class="row">
                        <div class="col">
                                    <label>صوديوم (mg) </label>
                                    <input class="form-control " name="ingredient_sodium" 
                                        type="text" value="{{ $ingredients->sodium }}" required>
                        </div> 
                        <div class="col">
                                <label> Aفيتامين (%DV) </label>
                                <input class="form-control " name="ingredient_vitaminA" 
                                    type="text" value="{{ $ingredients->vitaminA }}" required>
                        </div> 
                        <div class="col">
                                    <label> Cفيتامين (%DV) </label>
                                <input class="form-control " name="ingredient_vitaminC" 
                                    type="text" value="{{ $ingredients->vitaminC }}" required>
                        </div> 
                        <div class="col">
                                    <label>بروتين (g) </label>
                                <input class="form-control " name="ingredient_protein" 
                                    type="text" value="{{ $ingredients->protein }}" required>
                        </div> 
                        <div class="col">
                                    <label>السكريات (g)</label>
                                <input class="form-control " name="ingredient_sugars" 
                                    type="text" value="{{ $ingredients->sugars }}" required>
                        </div> 
                            

                    </div>   


                        {{-- 3 --}}

                       

                           

                        {{-- 4 --}}

                        

                        {{-- 5 --}}
                       <br><br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>


                    </form>


     

         </div>



        </div>       
    </div>   
</div>     
    @extends('admin.layouts.footer-scripts')