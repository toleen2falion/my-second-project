<!DOCTYPE html>
<html lang="en">

<head>
<title> View Chefs </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Style Link -->
    <link rel="stylesheet" href="../home_Page/style.css">
    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Favicon -->
    <!--<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">-->
    <link rel="stylesheet" href="../view_chef/style.css">
<!-- </head>

<body>
    Header Start -->
    <header>
        <div id="navbar">
       
            <img src="../home_Page/img/logo.png" alt="Food Lover Logo">
            <nav role="navigation">
                <ul>
                    <li><a href="#about">حول الموقع</a></li>
                    <!-- // -->
                    <li class="dropdown" lang="ar" dir="rtl">
                        <button class="dropbtn">ملفي الشخصي
                        <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                        @if(!Auth::guard('web')->check())
                        <a href="{{ route('register') }}">تسجيل الدخول</a>
                             <form action="{{ route('register') }}"  method="get">@csrf</form>
                        @endif
                        @if(Auth::guard('web')->check())
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">تسجيل الخروج</a>
                            <form action="{{ route('logout') }}" id="logout-form" method="post">@csrf</form>
                        
                        <a href="{{ url('/' . ($page = 'userRegistered/dashboard/shopping_list')) }}"> قائمة المشتريات</a>
                        <a href="{{ url('/' . ($page = 'userRegistered/dashboard/MyProfile')) }}">  تصنيف الموقع حسب حالتي</a>
                        @endif
                        
                        </div>
                    </li>
                    <!-- // -->
                    <li> <a href="{{ url('/' . ($page = 'home/chefs')) }}" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span> الطهاة</span>
                    </a></li>
                    <li><a href="{{ url('/' . ($page = 'home/diseases')) }}"> الأمراض</a></li>
                    <li><a href="{{ url('/' . ($page = 'home/today_recipe')) }}"> طبخة اليوم</a></li>
                    <li><a href="{{ url('/') }}">الصفحة الرئيسية</a></li>

                    
                    <!-- test notofication -->
                        
                        <!-- <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            </a> -->
                            @if(Auth::guard('web')->check())
                            <li class="dropdown " lang="ar" dir="rtl">
                        <button class="dropbtn">
                        <i class="fa fa-bell"></i>
                        </button>
                        <div class="dropdown-content"  >
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
                        </div>
                        @endif
                        <!-- test notofication_end -->
                        
                </ul>
              
            </nav>
        </div>
        <div class="content" lang="ar" dir="rtl">
            <h1>أهلاً بك في موقع  <span class="primary-text"> وصفات صحية </span> </h1>
            <p>نقدم لك أفضل الطهاة</p>
            <!-- <a href="#search" class="btn btn-primary search-btn">Search</a> -->
              <!-- //search -->
       
        <form action="{{ route('chef_search') }}" method="GET" class="search">
          <!-- <h3> ابحث عن طاهي: </h3> -->
          <input type="text" name="name" class="form-control" placeholder="ادخل اسم الطاهي" autocomplete="off">
<div>
          <input type="submit" value="بحث" class="btn btn-primary search-btn" >
</div>
        </form>

    <!-- //end search -->

        </div>
    </header>
    <br>
    <!-- Header End -->
    <main >
    @if (session()->has('follow'))
    <script>
    alert("تمت المتابعة بنجاح");
    </script>
    @endif

    @if (session()->has('unfollow'))
    <script>
    alert("تم  إلغاءالمتابعة بنجاح");
    </script>
    @endif
    
    
    <div class="flex-container-cards">
  
  @foreach ($chefs as $chef)
    <div class="card">
      <div class="card-img-shadow ">
    
          <img src="../image_Chef/{{ $chef->image }}" alt=""></div>
          
      <div class="card-content">
        <h2>{{ $chef->name }}</h2>
        <p>عدد الأطباق التي قام بنشرها على الموقع: {{ $chef->num_dishes }}<br>
          <a href="{{ url('/home/chefs/view_chef_dishs') }}/{{$chef->id}}" >
          عرض الأطباق </a>
        </p>
         
        <div class="button-shadow">
          <div class="card-button"> 
     
@if( (count($chef->users)==0) || (!Auth::guard('web')->check()))
<a href="{{ url('/userRegistered/dashboard/follow_chef') }}/{{$chef->id}}"> متابعة</a>
@endif
     @foreach($chef->users as $user)  
     @if(Auth::guard('web')->check())                      
      @if($user->id == Auth::guard('web')->user()->id )  
      
        <a href="{{ url('/userRegistered/dashboard/unfollow_chef') }}/{{$chef->id}}"> إلغاء المتابعة</a> 
        @break;
      
     
  
  
  @endif

  
  @endif
@endforeach
@if(Auth::guard('web')->check())
@if((count($chef->users)!=0) && ($user->id != Auth::guard('web')->user()->id) )
      <a href="{{ url('/userRegistered/dashboard/follow_chef') }}/{{$chef->id}}"> متابعة</a>
@endif   
@endif 
          </div>
      </div>
     

      </div>
     
    </div>
     
  @endforeach


  
  
  
  
</div>

<!-- // -->
<!-- <div class="review" id="Review">
<div class="review_box">
<div class="review_card">
        
        <div class="review_profile">
            <img src="home_Page/img/review_2.png">
         
        </div>

        <div class="review_text">
            <h2 class="name">MHD Deo</h2>

           

            <p>
               
            </p>
            <a href="#" class="user_btn">متابعة </a>
        </div>

    </div>
 </div>
</div> -->
<!-- //// -->

  
        <!-- About Section Start -->
        </main>
        <br>
    <footer id="footer">
        <p> 2023 made by <b> <a href="# "
                    target="_blank">Tulin Youmna Rania </a> </b></p>
    </footer>
</body>

</html>