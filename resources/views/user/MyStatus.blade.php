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
        <nav id="hU">
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
        <div class="content text-light">
            <h2> <span class="primary-text">{{ Auth::guard('web')->user()->name }}</span> أهلا بك </h2>
         <h5><p class="text-center">الرجاء إضافة 
         <a href="#الأمراض"> الأمراض </a>
                التي تعاني منها و
                <a href="#المكونات">المكونات الغذائية  </a>
                التي لا تستطيع تناولها إلى ملفك الشخصي
                <br>
                <a href="{{ url('/userRegistered/dashboard/RigtDishForUser') }}" class="modal-effect btn btn-sm btn-secondary mx-5 my-3" style="color:white"><i
                                class="fas fa-plus"></i>&nbsp;  تم</a>
                            بعد الانتهاء اضغط على
         </p>
</h5>
          

        </div>
</nav>
    <!-- </header> -->
    <br>
    
    <!-- Header End     <img src="/home_Page/img/gallary_1.jpg">-->
    <main style="width: 90%" class="m-auto">
   <!-- lllhhh -->

  
   
   <!-- الأمراض -->
   <div class="row"   class="py-0 my-0">
          <div class="col-md-12 mb-3 py-0 my-0">
            <div class="card">
              <div class="card-header text-center text-danger" id="الأمراض">
                <span>الأمراض <i class="bi bi-table me-2 "></i></span>  
              </div>
              <div class="card-body">
                <div class="table-responsive text-danger "  lang="ar" dir="rtl">

                  <table
                    id="example"
                    class="table table-striped data-table"
                    style="width: 100%"
                    lang="ar" dir="rtl"
                  >
                    <thead >
                      <tr>
                        <th></th>
                        <th> </th>
                        
                        
                        <?php
                        // <th>كلمة المرور</th>
                        ?>
                        
                        
                      </tr>
                    </thead>
                    <tbody >
                          @php
                                $i = 0;
                                @endphp
                                @foreach ($diseases as $disease)
                                    @php
                                    $i++
                                    @endphp
                                    <tr>
                                        <td>{{ $i }})</td>
                                        
                                        
                                        <td><h4>{{ $disease->name }} :</h4>
                                       <ul>
                                        <li>

                                             {{ $disease->description }}
                                        </li>
                                        <br>
                                        <li>

                                       <b> تمت إضافته بواسطة: </b>د. {{ $disease->created_by }}.
                                        </li>
                                        <br>
                                        <li>

                                       <b>تاريخ الإضافة: </b> {{ $disease->created_at }}.
                                        </li>
                                        
                                        </ul>
                                      
                                       
                                             
                                        <a class="btn btn-outline-danger btn-sm mx-2 px-3 my-2 fw-bold text-decoration-underline fs-6" 
                                            href="{{ url('/home/disease/bloked_ingredients') }}/{{$disease->id}}"
                                            role="button">
                                                    الأغذية الممنوعة </a>
                                                    
                                        
                                        <a class="btn btn-outline-success btn-sm mx-2 px-3 my-2 fw-bold text-decoration-underline fs-6" 
                                            href="{{ url('/home/disease/dishes_right') }}/{{$disease->id}}"
                                            role="button">
                                                     الأطباق المناسبة </a>

                                        @if(count($disease->users)==0)
                                        <a class="btn btn-outline-primary btn-sm mx-2 px-3 my-2 fw-bold text-decoration-underline fs-6" 
                                            href="{{ url('/userRegistered/dashboard/diseaseUserAdd') }}/{{$disease->id}}"
                                            role="button">
                                                     إضافة </a>
                                            @endif

                                        @foreach($disease->users as $user)  
                                                               
                                            @if($user->id == Auth::guard('web')->user()->id )  
                                            
                                            <a class="btn btn-outline-secondary btn-sm mx-2 px-3 my-2 fw-bold text-decoration-underline fs-6" 
                                            href="{{ url('/userRegistered/dashboard/diseaseUserRemove') }}/{{$disease->id}}"
                                            role="button">
                                                     إلغاء الإضافة </a> 
                                                @break;
                                            
                                            @endif
                                        @endforeach  
                                        @if((count($disease->users)!=0) && ($user->id != Auth::guard('web')->user()->id))           
                                        <a class="btn btn-outline-primary btn-sm mx-2 px-3 my-2 fw-bold text-decoration-underline fs-6" 
                                            href="{{ url('/userRegistered/dashboard/diseaseUserAdd') }}/{{$disease->id}}"
                                            role="button">
                                                     إضافة </a>
                                        @endif
                                           

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


<!-- row closed الأمراض -->


 <!-- المكونات الغذائية -->
 
 <div class="row"   class="py-0 my-0">
          <div class="col-md-12 mb-3 py-0 my-0">
            <div class="card">
              <div class="card-header text-center text-danger" id="المكونات">
                <span>المكونات  <i class="bi bi-table me-2 "></i></span>  
              </div>
              <div class="card-body ">
                <div class="table-responsive text-danger "  lang="ar" dir="rtl">

                  <table
                    id="example"
                    class="table table-striped data-table "
                    style="width: 100%"
                    lang="ar" dir="rtl"
                  >

                  <thead>
                                <tr>
                                    <th>#</th>
                                    
                                    <th> المكون</th>
                                    
                                    <?php
// <th> حجم الحصة</th>
// <th>القيم الغذائية:</th>
                                    // <th> السعرات الحرارية </th>
                                    // <th> (g)إجمالي الدهون </th>
                                    // <th> (mg)الكولسترول</th>
                                    // <th> (mg)صوديوم</th>
                                    // <th> (%DV) Aفيتامين </th>
                                    // <th> (%DV) Cفيتامين </th>
                                    // <th>(g)بروتين</th>
                                    // <th> (g)السكريات</th>
                                    ?>
                                    <th  style="width: 50%"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($ingredients as $ingredient)
                                    @php
                                    $i++
                                    @endphp
                                    <tr class="py-4 my-2 ">
                                        <td >{{ $i }}.</td>
                                        
                                       
                                
                                        <td ><h5>{{ $ingredient->name}}</h5>
                                       يحتوي ال {{ $ingredient->servingSize}} على:<br>
                                        
                                        <ol>
                                          <li>السعرات الحرارية: {{ $ingredient->calories}}.</li>
                                          <li>إجمالي الدهون: {{ $ingredient->totalFat}} (g).</li>
                                          <li>الكولسترول: {{ $ingredient->cholesterol}} (mg).</li>
                                          <li>صوديوم: {{ $ingredient->sodium}} (mg).</li>
                                          <li>Aفيتامين: {{ $ingredient->vitaminA}} (%DV).</li>
                                          <li>Cفيتامين: {{ $ingredient->vitaminC}} (%DV).</li>
                                          <li>بروتين: {{ $ingredient->protein}} (g).</li>
                                          <li>السكريات: {{ $ingredient->sugars}} (g).</li>
</ol>
                                      
                                        </td>
                                        <?php
                                        // <td ></td>
                                        // <td ></td>
                                        // <td class="p-0"></td>
                                        // <td class="p-0"></td>
                                        // <td class="p-0"></td>
                                        // <td class="p-0"></td>
                                        // <td class="p-0"></td>
                                     
                                       ?>
                                        

                                        
                                        <td class="text-end ">
                                          
                                        @if(count($ingredient->users_bloked_ingredients)==0)
                                        <a class="btn btn-outline-primary btn-sm mx-2 px-3 my-2 fw-bold text-decoration-underline fs-6" 
                                            href="{{ url('/userRegistered/dashboard/blokedIngredientUserAdd') }}/{{$ingredient->id}}"
                                            role="button">
                                                     إضافة </a>
                                            @endif

                                        @foreach($ingredient->users_bloked_ingredients as $user)  
                                                               
                                            @if($user->id == Auth::guard('web')->user()->id )  
                                            
                                            <a class="btn btn-outline-secondary btn-sm mx-2 px-3 my-2 fw-bold text-decoration-underline fs-6" 
                                            href="{{ url('/userRegistered/dashboard/blokedIngredientUserRemove') }}/{{$ingredient->id}}"
                                            role="button">
                                                     إلغاء الإضافة </a> 
                                                @break;
                                            
                                            @endif
                                        @endforeach  
                                        @if((count($ingredient->users_bloked_ingredients)!=0) && ($user->id != Auth::guard('web')->user()->id))           
                                        <a class="btn btn-outline-primary btn-sm mx-2 px-3 my-2 fw-bold text-decoration-underline fs-6" 
                                            href="{{ url('/userRegistered/dashboard/blokedIngredientUserAdd') }}/{{$ingredient->id}}"
                                            role="button">
                                                     إضافة </a>
                                        @endif
                                           


                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>                 
                      
      


<!-- row closed المكونات -->

  
   <!-- jjjjjj     -->
    </main>




<br>
<footer id="footer">
<p> 2023 made by <b> <a href="# "
            target="_blank">Tulin Youmna Rania </a> </b></p>
</footer>

  <!-- // -->
  <script src="/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="/js/jquery-3.5.1.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
   
    <script src="/js/dataTables.bootstrap5.min.js"></script>

    <script src="/js/script.js"></script>

    </body>

</html>