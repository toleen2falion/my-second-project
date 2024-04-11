
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
        
      <div class="row" lang="ar" dir="rtl">   
      <div class="card-header pb-0">
        <br>

        @if (session()->has('edit_profile'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit_profile') }}</strong>
            
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
            <form action="{{ url('/doctor/dashboard/update_doctor') }}" method="post" enctype="multipart/form-data" autocomplete="off" >
                {{ method_field('patch') }}
                {{ csrf_field() }}
                {{-- 1 --}}
                <div class="row">

               

                <input type="text" class="form-control text-center " id="inputName" name="doctor_name"
                            title="" value="{{ Auth::guard('doctor')->user()->name }}" readonly>
                            
                
                            </div>
                            <div class="row">
                            <div class="col">
                        <label for="inputName" class="control-label">صورتك الشخصية</label>
                        <input type="hidden" name="doctor_id" value="{{ Auth::guard('doctor')->user()->id }}">
                        
                        <input type="file" name="doctor_image" class="form-control"  placeholder="image">
                    <img src="/image_doctor/{{ Auth::guard('doctor')->user()->image }}" width="300px" required>
                    </div>
                  
                   
                   

                    <div class="col">
                        <label>رقم هاتفك</label>
                        <input class="form-control " name="doctor_phone" 
                            type="text" value="{{ Auth::guard('doctor')->user()->phone}}" required>
                    </div>

                   

                </div>

                {{-- 2 --}}
                <div class="row">
                    <div class="col">
                            <label>بريدك الالكتروني</label>
                            <input class="form-control " name="email" 
                                type="text" value="{{ Auth::guard('doctor')->user()->email }}" readonly>
                        </div>
                    <div class="col">
                            <label>كلمة المرور الخاصة بك</label>
                            <input class="form-control " name="password" 
                                type="text" value="{{ Auth::guard('doctor')->user()->password }}" required>
                        </div>

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
    @extends('doctor.layouts.footer-scripts')
    </body>
</html>