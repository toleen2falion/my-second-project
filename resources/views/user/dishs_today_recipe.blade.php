<!DOCTYPE html>
<html lang="en">

<head>
<title> View Chefs </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- // -->
   <!-- <link rel="stylesheet" href="/tab_style.css"> -->
   <link rel="stylesheet" href="/css/bootstrap.min.css" />
    
    <!-- <link rel="stylesheet" href="/css/dataTables.bootstrap5.min.css" /> -->
    <!-- <link rel="stylesheet" href="/css/style.css" /> -->
    <!-- // -->
    <!-- Style Link -->
    <link rel="stylesheet" href="/home_Page/style.css">
    
    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Favicon -->
    <!--<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">-->
    <link rel="stylesheet" href="/view_chef/style.css">
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
    <header class="today_recipe">
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
                      <span class="me-2">
                      <i class="fa-duotone fa-hat-chef"></i>
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
        <div class="content" lang="ar" dir="rtl">
            <h1>  ماذا أطبخ اليوم؟
            <!-- <a href="#eastern"> الشرقية </a>
                و
                <a href="#western">الغربية </a> -->
            </h1>
            <h2><a href="#dish_maxVal"><span class="primary-text">الأطباق الأكثر ملائمة</span></a></h2>
            <p><a href="#dishs">الأطباق التي تحتوي مكون واحد على الأقل من المكونات التي تم تحديدها</a></p>
            <!-- <a href="#search" class="btn btn-primary search-btn">بحث</a> -->
            
            
        </div>
    </header>
    
    <!-- Header End -->
    <!-- <main  lang="ar" dir="rtl">
    <section id="review">
            <div class="review" id="Review">
                <h1 class="primary-text">حددي الأطباق<span>المتوفرة لديكِ </span></h1>
            </div>
   
   </section>
   <h1 class="primary-text text-center">حددي المكونات المتوفرة لديكِ </h1>
        </main> -->
      

    <main class="p-0">
        
     
   
<br>
<div class="flex-container-cards p-5" id="dishs">

@foreach ($dishs as $dish)
<div class="card my-3 mx-2 ">
  <div class="card-img-shadow ">

      <img src="/image_Dish/{{$dish->image}}" alt=""></div>
      
  <div class="card-content">
    <h2>{{$dish->name}}</h2>
    <p>وقت التحضير: {{$dish->cookTime}} <br>
       عدد الحصص: {{$dish->numberIndividual}} <br>
      الكلفة: {{$dish->cost}} 
    
    <br>
      
    </p>
     
    <div class="button-shadow">
      <div class="card-button">
        <a href="{{ url('/home/chefs/view_chef_BreakfastDish') }}/{{$dish->id}}" > عرض الطبق   </a>
         </div>
      
    </div>
  </div>
</div>
 
@endforeach
</div>


   
          
           
      
    <!-- الأطباق الحديثة Section End -->
 
<br>
<!-- test   الاطباق ال -->


<div class="flex-container-cards dish_black p-5" id="dish_maxVal">
<br>
@foreach ($dishs_maxVal as $dish)
<div class="card1 my-3 mx-2 ">
<div class="card-img-shadow ">

  <img src="/image_Dish/{{$dish->image}}" alt=""></div>
  
<div class="card-content">
<h2>{{$dish->name}}</h2>
<p>وقت التحضير: {{$dish->cookTime}} <br>
   عدد الحصص: {{$dish->numberIndividual}} <br>
  الكلفة: {{$dish->cost}} 

<br>
  
</p>
 
<div class="button-shadow">
  <div class="card-button">
    <a href="{{ url('/home/chefs/view_chef_BreakfastDish') }}/{{$dish->id}}" > عرض الطبق   </a>
     </div>
  
</div>
</div>
</div>

@endforeach
</div>
<!-- /test    -->
    
 
  
    </main>

                    
        
    <footer id="footer">
        <p> 2023 made by <b> <a href="# "
                    target="_blank">Tulin Youmna Rania </a> </b></p>
    </footer>

    <script src="/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="/js/jquery-3.5.1.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
   
    <script src="/js/dataTables.bootstrap5.min.js"></script>

    <script src="/js/script.js"></script>

    
   

    </body>
</html>