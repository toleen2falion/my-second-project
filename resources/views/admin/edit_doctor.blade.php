
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
        <!-- {{ url('invoices/update') }} -->
            <form action="{{ url('/admin/dashboard/update_doctor') }}" method="post" enctype="multipart/form-data" autocomplete="off" >
                {{ method_field('patch') }}
                {{ csrf_field() }}
                {{-- 1 --}}
                <div class="row">

                <div class="col">
                        <label for="inputName" class="control-label">صورةالطاهي</label>
                        <input type="hidden" name="doctor_id" value="{{ $doctors->id }}">
                        <input type="hidden" class="form-control" id="inputName" name="doctor_name"
                            title="" value="{{ $doctors->name }}" required>
                        <input type="file" name="doctor_image" class="form-control"  placeholder="image">
                    <img src="/image_doctor/{{ $doctors->image }}" width="300px" required>
                    </div>


                   

                    <div class="col">
                        <label>رقم الهاتف</label>
                        <input class="form-control " name="doctor_phone" 
                            type="text" value="{{ $doctors->phone }}" required>
                    </div>

                   

                </div>

                {{-- 2 --}}
                <div class="row">
                    <div class="col">
                            <label>البريد الالكتروني</label>
                            <input class="form-control " name="email" 
                                type="text" value="{{ $doctors->email }}" required>
                        </div>
                    <div class="col">
                            <label>كلمة المرور</label>
                            <input class="form-control " name="password" 
                                type="text" value="{{ $doctors->password }}" required>
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

</div>



        </div>       
    </div>   
</div>     
    @extends('admin.layouts.footer-scripts')
