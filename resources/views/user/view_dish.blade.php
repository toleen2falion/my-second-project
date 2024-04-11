<!DOCTYPE html>
<html lang="en">

<head>
<title> View dish </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tab_style.css">
    <link rel="stylesheet" href="/bootstrap5/css/bootstrap.css">
  
    <!-- Style Link -->
    <link rel="stylesheet" href="/home_Page/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
   
    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Favicon -->
    <!--<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">-->
    <!-- <link rel="stylesheet" href="../view_chef/style.css"> -->

    <style>
    .profile>a{color:maroon;}
    .profile>a:hover {
  color: #e4b95b;
  font-weight: bold;
}

</style>

</head>

<body>
    <!-- Header Start -->
    <!-- <header> -->
        <nav id="h">
        <div id="navbar">
            <img src="/home_Page/img/logo.png" alt="Food Lover Logo">
            <nav role="navigation">
                <ul>
                    

                <li><a href="#about">حول الموقع</a></li>
                    <!-- // -->
                    
                    <div class="btn-group"  lang="ar" dir="rtl">
                    <button class="btn btn-outline-light dropdown-toggle p-0 border-0 " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    ملفي الشخصي
                       
                        </button>
                        <ul class="dropdown-menu text-center profile">
                        @if(!Auth::guard('web')->check())
                        <a  href="{{ route('register') }}">تسجيل الدخول </a>
                             <form action="{{ route('register') }}"  method="get">@csrf</form>
                        @endif
                        @if(Auth::guard('web')->check())
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" >تسجيل الخروج</a>
                            <form action="{{ route('logout') }}" id="logout-form" method="post">@csrf</form>
                        
                        <a href="{{ url('/' . ($page = 'userRegistered/dashboard/shopping_list')) }}"> قائمة المشتريات</a>
                        @endif
                        
</ul>
</div>
                   
                    <!-- // -->
                    <li> <a href="{{ url('/' . ($page = 'home/chefs')) }}" >
                      <span class="me-2"><i class="fa-duotone fa-user-chef"></i>
                      </span>
                      <span> الطهاة</span>
                    </a></li>
                    <li><a href="{{ url('/' . ($page = 'home/diseases')) }}"> الأمراض</a></li>
                    <li><a href="{{ url('/' . ($page = 'home/today_recipe')) }}"> طبخة اليوم</a></li>
                    <li><a href="{{ url('/') }}">الصفحة الرئيسية</a></li>

                    
                    <!-- test notofication -->
                    <div class="btn-group"  lang="ar" dir="rtl"> 
                        <!-- <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            </a> -->
                         @if(Auth::guard('web')->check())
                        <button class="btn btn-outline-light dropdown-toggle p-0 border-0 " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                       
                        </button>
                        <ul class="dropdown-menu text-center profile">
                            <!-- <h4 ><span class="primary-text text-center" style="width: 100%;text-align: center"> عدد الإشعارات </span></h4> -->
                        <a ><span class="primary-text text-center"> عدد الإشعارات ({{Auth::User()->unreadNotifications->count()}})</span></a>
                        @if(Auth::User()->unreadNotifications->count()!=0)
                        <a href="/userRegistered/dashboard/remove_all_notifications" ><span class="danger-text"> حذف الكل</span></a>
                        @endif
                        @foreach(Auth::User()->unreadNotifications as $notification )
                        
                         <a href="{{ url('/userRegistered/dashboard/view_new_dish') }}/{{$notification->data['dish_id']}}">تم نشر طبق جديد من قبل الشيف {{$notification->data['chef_name']}} <br>
                         {{$notification->data['dish_name']}}<br>
                            {{$notification->created_at}}<br>
                           
                        </a>
                        
                        @endforeach
                        </ul>
                        @endif
                        </div>
                        <!-- test notofication_end -->
                   


                </ul>
              
            </nav>
        </div>
        <div class="content">
            <h1> {{$dish->type}} <span class="primary-text">{{$dish->name}}</span> </h1>
         
          

        </div>
</nav>
    <!-- </header> -->
    <br>
    
    <!-- Header End     <img src="/home_Page/img/gallary_1.jpg">-->
    <main  lang="ar" dir="rtl">
   
<!-- whate to learn -->
<section id="instructor" class="py-5 " >
    <div class="container p-0 " id="tab1">
        <div class="row ">
            <div class="col col-md-4  align-items-center justify-content-center pt-0  v_d ">
                <img src="/image_Dish/{{$dish->image}}" alt="" class="img-fluid img-thumbnail">
                <p class="mt-1">{{$dish->description}}
                    <br><span class="primary-text fw-bold fs-5">وقت التحضير: </span> {{$dish->cookTime}}دقيقة
                    <br><span class="primary-text fw-bold fs-5">عدد الحصص: </span>{{$dish->numberIndividual}}
                    <br><span class="primary-text fw-bold fs-5">الكلفة: </span>{{$dish->cost}}

                </p>
                
            </div>
            <!-- /// -->
            <div class="col-lg-7 px-1 mx-0 ">
            <div class="card">
            <div class="container">
        <div class="tab_box">
            <button class="tab_btn p-0"> </button>
            <button class="tab_btn py-0 px-4 active1">المكونات</button>
            <button class="tab_btn py-0 px-4">خطوات التحضير</button>
            <button class="tab_btn py-0 px-4">الملاحظات</button>
            <button class="tab_btn py-0 px-4">القيم الغذائية</button>
            <button class="tab_btn py-0 px-4">التعليقات</button>
            <div class="line1 py-0 px-4 my-0"></div>
        </div>
        <div class="content_box ">
            
            <div class="content">
            @if (session()->has('Add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('Add') }}</strong>
                    
                </div>
            @endif
               <!-- table -->
               <div class="table-responsive">
                  <table
                    style="width: 80%"
                  >
                    <thead>
                      <tr>
                        <th  style="width:5%"></th>
                        <th style="width:20%"></th>
                        <th style="width:20%"></th>
                        <th style="width:35%"></th>
                      
                       
                        
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
                         <td>{{ $i }})</td>    
                         <td>{{$ingredient->name }}</td>
                              
                               <td>{{$in->quantity}} {{$in->measruingUnit}}</td>
                               <!-- shoping list -->
                               @if(Auth::guard('web')->check())
                               <td> 
                               <?php
                            
                                    //     href="{{ url('/userRegistered/dashboard/add_to_shopping_list') }}/{{ $ingredient->id }}"
                                    //     role="button"><i class="fas fa-eye"></i>&nbsp;
                                    // إضافة المكون إلى سلة المشتريات</a>
                              
                                ?>
                            @if( (count($ingredient->users)==0))
                            <a class="btn btn-outline-success "
                            href="{{ url('/userRegistered/dashboard/add_to_shopping_list') }}/{{ $ingredient->id }}"
                                        role="button"><i class="fa fa-shopping-cart"></i>&nbsp;
                                    إضافة المكون إلى سلة المشتريات</a>
                            @endif
                            @foreach($ingredient->users as $user)  
                            @if(Auth::guard('web')->check())                      
                            @if($user->id == Auth::guard('web')->user()->id )  
                            
                            <!-- <h1> ooo</h1> -->
                    <form action="{{ url('/userRegistered/dashboard/add_quantity_to_shopping_list') }}" method="get"  autocomplete="off" style="width:100%">
                      
                      {{ csrf_field() }}  
                      
                        
                         <input class="form-control " name="ingredient_id" 
                                 type="hidden" value="{{ $ingredient->id }}" readonly>
                          
                        
                         <input class="form-control " name="ingredient_quantity" 
                                 type="hidden" value="{{ $in->quantity }}" readonly>
                          
                         <input class="form-control " name="ingredient_measruingUnit" 
                                 type="hidden" value="{{ $in->measruingUnit }}" readonly>
                    
                     <button  type="submit" class="btn btn-outline-danger">إضافة الكمية إلى سلة المشتريات</button>
                    
                 </form>
                               <!-- ooo -->
                            @break;
                            
                            
                        
                        
                        @endif

                        
                        @endif
                        @endforeach

                    @if((count($ingredient->users)!=0) && ($user->id != Auth::guard('web')->user()->id))
                    <a class="btn btn-outline-success "
                            href="{{ url('/userRegistered/dashboard/add_to_shopping_list') }}/{{ $ingredient->id }}"
                                        role="button"><i class="fa fa-shopping-cart"></i>&nbsp;
                                    إضافة المكون إلى سلة المشتريات</a>
                    @endif 
</td>
@endif 
                               <!-- shoping list end -->
                               
                          @endif
                       
                      @endforeach
                        
                      @endforeach 
                    </tr>
                      
                   
                  
                   
                </tbody>
                <tfoot>
                  
                </tfoot>
              </table>
            </div>
            <!--/ table -->
            </div>
            <!-- // -->
            <div class="content">
                <!-- table -->
                <table  >
                    @php
                        $i = 0;
                    @endphp    
                @foreach ($steps as $step)
                  <tr>  @php
                        $i++;
                        @endphp   
                    <td  style="width:6%">{{$i}})  </td>
                    <td>{{ $step->content }}. </td>
                   
                </tr>
                 
                  
                  @endforeach
</table>  
                <!-- /table -->
            </div>
            <div class="content">
                <!-- table -->
                <table  >
                    @php
                        $i = 0;
                    @endphp    
                @foreach ($notes as $note)
                  <tr>  @php
                        $i++;
                        @endphp   
                    <td  style="width:6%">{{$i}}) </td>
                    <td>{{ $note->content }}. </td>
                   
                </tr>
                 
                  
                  @endforeach
            </table>  
                <!-- /table -->
            </div>
            <div class="content">
               <!-- // -->
               <ol class="px-4">
                  <li><span class="primary-text fw-bold fs-5">السعرات الحرارية:</span> {{ $dish->calories }}.</li>
                  <li><span class="primary-text fw-bold fs-5">إجمالي الدهون: </span> {{ $dish->totalFat }} (g).</li>
                  <li><span class="primary-text fw-bold fs-5">كوليسترول: </span> {{ $dish->cholesterol }} (mg).</li>   
                  <li><span class="primary-text fw-bold fs-5">صوديوم: </span>{{ $dish->sodium }} (mg).</li>
                  <li><span class="primary-text fw-bold fs-5"> فيتامين أ: </span> {{ $dish->vitaminA }} (%DV).</li>
                  <li><span class="primary-text fw-bold fs-5"> فيتامين سي: </span> {{ $dish->vitaminC }} (%DV).</li>
                  <li><span class="primary-text fw-bold fs-5"> بروتين : </span> {{ $dish->protein }} (g).</li>
                  <li><span class="primary-text fw-bold fs-5"> سكريات : </span> {{ $dish->sugars }} (g).</li>
                </ol>  
               <!-- // -->
            </div>
            <div class="content " >
                <!-- jjjuuuu -->
                <!-- Carousel -->
<!-- Carousel -->
@if(Auth::guard('web')->check())
<a class="modal-effect btn btn-outline-success btn-sm m-1 mx-5 px-3 my-2" data-effect="effect-scale"
            
            data-id="{{$dish->id}}"  
            data-uid="{{ Auth::guard('web')->user()->id }}"  
            data-bs-toggle="modal"
             href="#Modal" >&nbsp;
             إضافة تعليق</a>
@endif
<!-- toleen -->
@if ($errors->any())
        <div class="alert alert-danger ">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            
        </div>
    @endif
    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show " role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            
        </div>
    @endif

<div id="Carousel">

<nav class="cc" >



@foreach($dish->users as $user)
<div class="slideCard">
@foreach($dish->comments as $comment) 


   
        <!-- <div class="image">
          <img src="images/img1.jpg" alt="" />
        </div> -->
     
                                                              
                                
      @if($user->id == $comment->user_id )  
                                  
         <h2>{{$user->name }}</h2>
        <p>{{$comment->content }}.</p>
                             
      <!-- // -->
      @if(Auth::guard('web')->check())
            @if($user->id == Auth::guard('web')->user()->id )  
            <a class="modal-effect btn btn-outline-danger btn-sm  " data-effect="effect-scale"
                data-id="{{$comment->dish_id}}" 
                data-uid="{{$comment->user_id}}"  
                data-bs-toggle="modal"
                href="#Modal3" 
                   >&nbsp;
                 حذف</a>
            @endif
     @endif
    </div>  
      @endif
         
     @endforeach  
     
  
   
    @endforeach  
    
     
      <!-- <div class="slideCard">
        <div class="image">
         <img src="images/img2.jpg" alt="" />
        </div>
        <h2>Someone Name</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elite.</p>
      </div>
      <div class="slideCard">
        <div class="image">
          <img src="images/img3.jpg" alt="" />
        </div>
        <h2>Someone Name</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elite.</p>
      </div>
      <div class="slideCard">
        <div class="image">
          <img src="images/img4.jpg" alt="" />
        </div>
        <h2>Someone Name</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elite.</p>
      </div> -->
</nav>
</div>  
  
<!-- ///////////////////////// -->

<!-- ///////////////////////// -->
                <!-- jjjuuuu -->

            </div>
            <div class="content">
                jjj
            </div>

        </div>
</div>
</div>
</div>

            <!-- // -->
              
               
            </div>
        </div>
    </div>
</section>

        <!-- model -->
        <!-- ////model -->
        <div class="modal" id="Modal" lang="ar" dir="rtl">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        <h4 class="modal-title " >
                        <label>   {{ $dish->name }} </label>
                       </h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/userRegistered/dashboard/add_comment') }}" method="get"  autocomplete="off">
                      
                         {{ csrf_field() }}  
                         <div class="mb-3">
                           
                            <input class="form-control " name="dish_id" id="id"
                                    type="hidden" value="" readonly>
                             
                            </div>
                            <div class="mb-3">
                           
                            <input class="form-control " name="user_id" id="uid"
                                    type="hidden" value="" readonly>
                             
                            </div>

                            <div class="mb-3">
                            <label for="w3review"  class="form-label h5">  أضف تعليقاً:</label>
                            <textarea id="w3review" name="comment_content" rows="4" cols="50" required >
                            
                            </textarea>
                                
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
    
<!-- ///////model2 -->

<!-- endModal -->
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
                        <form action="{{ url('/userRegistered/dashboard/delete_comment') }}" method="post"  autocomplete="off">
                      
                        
                        {{ csrf_field() }}  
                        <div class="mb-3">
                        <label class="form-label h5">  هل أنت متأكد من حذف تعليقك؟  </label>
                              <input class="form-control " name="dish_id" id="id"
                                      type="text" value="" readonly>
                                
                                <input class="form-control " name="user_id" id="uid"
                                      type="text" value="" readonly>
                                
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

        
        <!-- About Section Start -->
        </main>




        <br>
    <footer id="footer">
        <p> 2023 made by <b> <a href="# "
                    target="_blank">Tulin Youmna Rania </a> </b></p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.tab_btn');
            const all_content = document.querySelectorAll('.content');

            tabs.forEach((tab, index) => {
                tab.addEventListener('click', (e) => {
                    tabs.forEach(tab => {
                        tab.classList.remove('active1');
                    });
                    tab.classList.add('active1');

                    var line = document.querySelector('.line1');
                    line.style.width = e.target.offsetWidth + "px";
                    line.style.left = e.target.offsetLeft + "px";

                    all_content.forEach(content => {
                        content.classList.remove('active1');
                    });
                    all_content[index].classList.add('active1');
                });
            });
        });
    </script>



    <!-- // -->
    <script src="/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="/js/jquery-3.5.1.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
   
    <script src="/js/dataTables.bootstrap5.min.js"></script>

    <script src="/js/script.js"></script>
  
   
    <!-- // -->
    <!-- /////model3 -->
<script>
    $('#Modal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var uid = button.data('uid')
        
        // alert(dish);
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #uid').val(uid);
       
    })

</script>

<!-- Modal3 -->
<script>
    $('#Modal3').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var uid = button.data('uid')
       
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #uid').val(uid);
      
       
    })
   
    

</script>
</body>

</html>