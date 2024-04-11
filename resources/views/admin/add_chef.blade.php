
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
                    <form action="store_chefs" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label >صورة الطاهي</label>
                                <input type="file" class="form-control"  name="chef_image"
                                     required>
                            </div>

                            <div class="col">
                                <label>اسم الطاهي</label>
                                <input class="form-control " name="chef_name" 
                                    type="text" value="" required>
                            </div>

                            <div class="col">
                                <label>رقم الهاتف</label>
                                <input class="form-control " name="chef_phone" 
                                    type="text" required>
                            </div>

                        </div>
<br><br>
                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                            <label>البريد الإلكتروني</label>
                                <input class="form-control " name="email" 
                                    type="email" required>
                                   
                            </div>

                            <div class="col">
                            <label>كلمة المرور</label>
                                <input class="form-control " name="chef_passwoard" 
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
                     

                        <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                        <h5 class="card-title">المرفقات</h5>

                        <div class="col-sm-12 col-md-12">
                            <input type="file" name="pic" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                data-height="70" />
                        </div><br>

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
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
    @extends('admin.layouts.footer-scripts')
