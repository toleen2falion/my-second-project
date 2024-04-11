
@extends('chef.layouts.head')
 
<body>
    <!-- top navigation bar -->
    @extends('chef.layouts.top-navigation-bar')
    <!-- top navigation bar -->
    <!-- offcanvas -->
    @extends('chef.layouts.offcanvas')
    <!-- offcanvas -->
    <main class="mt-5 pt-3" >
      <div class="container-fluid">
        
      <div class="row" lang="ar" dir="rtl">   
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
  <div class="row" lang="ar" dir="rtl">

<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-body">
        <!-- {{ url('invoices/update') }} -->
            <form action="{{ url('/chef/dashboard/update_dish') }}" method="post" enctype="multipart/form-data" autocomplete="off" >
                {{ method_field('patch') }}
                {{ csrf_field() }}
                {{-- 1 --}}
                <div class="row">

                <div class="col">
                      
                        <input type="hidden" name="dish_id" value="{{ $dish->id }}">

                        <label>صورة الطبق</label>
                     <input type="file" name="dish_image" class="form-control"  placeholder="image">
                     <img src="/image_Dish/{{ $dish->image  }}" width="300px" required>
                </div>
                <div class="col">
                    <label>اسم الطبق</label>
                    <input type="text" class="form-control" id="inputName" name="dish_name"
                            title="" value="{{ $dish->name }}" required>
                    </div>
                   
                </div>

                {{-- 2 --}}
                <div class="row">
               
              
                </div>   


                {{-- 3 --}}

               

                   

                {{-- 4 --}}

                

                {{-- 5 --}}
               <br><br>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                </div>


            </form>
        </div>
    </div>
</div>
</div>

</div>



        </div>       
    </div>   
</div>     
@extends('chef.layouts.footer-scripts')
