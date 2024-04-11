<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthy Food</title>
    <!-- Style Link -->
    <link rel="stylesheet" href="home_Page/style.css">
    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Favicon -->
    <!--<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">-->
</head>

<body>
    <!-- Header Start -->
    <header class="home">
        <div id="navbar">
            <img src="home_Page/img/logo.png" alt="Food Lover Logo">
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
                    <li><a href="#home">الصفحة الرئيسية</a></li>

                    
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
        <div class="content">
            <h1>مرحباً بك في موقع  <span class="primary-text"> الطعام الصحي  </span> </h1>
            <p>يمكنك إيجاد أكثر الأطعمة المناسبة لك</p>
            <!-- <a href="#search" class="btn btn-primary search-btn">Search</a> -->

        </div>
    </header>
    <!-- Header End -->
    <main >
<!-- return from profile page -->
    @if (session()->has('AddProfile'))
    <script>
    alert("تم حفظ المعلومات.");
    </script>
    @endif
    <br> 
<br>
        <!-- About Section Start -->
        <section id="about" lang="ar" dir="rtl">
            <div class="container">
                <div class="title">
                    <h2>عن<span> الموقع </span></h2>
                  
                </div>
                <div class="about-content">
                    <div>
                        <br>
                        <br>
                        <br>
                        <p>معلومات دقيقة وموثوقة حول الوصفات الغذائية  ، يمكنك  الاعتماد على الموقع لإعداد وجبات صحية ولذيذة.<p>
                        <p>  يمكنك التواصل مع أطباء تغذية للحصول على نصائح مخصصة ومساعدة في تحديد الأطعمة المناسبة لحالتك الصحية والجسدية.<p>
                        <a href="#" class="btn btn-secondary"> المزيد</a>
                    </div>
                    <img src="home_Page/img/about_img.png" alt="aboyt">
                    
                </div>
   
            </div>
   
        </section>
        <br> 
<br>
        <!-- About Section End -->
   

        <section id="offers">
    
        </section>
        <!-- الأطباق الحديثة Section End -->
        <br> 
<br>

        <!-- الإغذية الممنوعة -->
        <section id="about" >
            <div class="container" >
                <div class="title">
                    <h2>الطعام<span> المناسب لصحتك </span></h2>
                  
                </div>
                <div class="about-content" >
                    
                    <div lang="ar" dir="rtl">
                        <p>هل يمنعك طبيبك من تناول بعض الأطعمة،<br> وتجد صعوبة في اختيار الوجبات اليومية المناسبة لك؟ <p>
                        <p> <p>
                        <a href="{{ url('/' . ($page = 'home/dont_eat')) }}" class="btn btn-secondary"> المزيد</a>
                    </div>
                    <img src="home_Page/img/food-as-medicine1.png" alt="aboyt">
                </div>
            </div>
        </section>
        <!-- end الإغذية الممنوعة -->

        <!-- Chefs Section Start -->
      
               
        
        <!-- chefs Section End -->


<br> 
<br>
<section id="offers1">
    
    </section>
       <!--Category-->

       <div class="gallary" id="Gallary" lang="ar" dir="rtl">
        <h1>Categories<span>التصنيفات</span></h1>

        <div class="gallary_image_box">
            <div class="gallary_image">
                <img src="home_Page/img/gallary_1.jpg">

                <h3>فطور</h3>
                <p>
                
                </p>
                <a href="{{ url('/home/view_breakfast_dishs') }}" class="gallary_btn">عرض</a>
            </div>

            <div class="gallary_image">
                <img src="home_Page/img/gallary_2.jpg">

                <h3>مشروبات</h3>
                <p>
              
                </p>
                <a href="{{ url('/home/view_drinks') }}" class="gallary_btn">عرض</a>
            </div>

            <div class="gallary_image">
                <img src="home_Page/img/gallary_3.jpg">

                <h3>غداء\عشاء
                    <br>
                     مقبلات
                </h3>
                <p>
                
                </p>
                <a href="{{ url('/home/view_LunchDinner_dishs') }}" class="gallary_btn">عرض</a>
            </div>

            <div class="gallary_image">
                <img src="home_Page/img/gallary_4.jpg">

                <h3>حلويات</h3>
                <p>
                
                </p>
                <a href="{{ url('/home/view_sweets_dishs') }}" class="gallary_btn">عرض</a>
            </div>

            <div class="gallary_image">
                <img src="home_Page/img/gallary_5.jpg">

                <h3>جميع الوصفات</h3>
                <p>
                
                </p>
                <a href="{{ url('/home/view_all_dishs') }}" class="gallary_btn">عرض</a>
            </div>

            <div class="gallary_image">
                <img src="home_Page/img/gallary_6.jpg">

                <h3>غداء\عشاء
                    <br>
                    أطباق رئيسية
                </h3>
                <p>
                
                </p>
                <a href="{{ url('/home/view_LunchDinner_dishsMain') }}" class="gallary_btn">عرض</a>
            </div>

        </div>

    </div>
        <!-- category Section End -->



        <!-- Contact Section Start -->
        <section id="contact">
            <div class="container">
                <div class="contact-content">
                    <div class="contact-info">
                        <div>
                            <h3>ADDRESS</h3>
                            <p><i class="fa-solid fa-location-dot"></i> Alsham-Private-University</p>
                            <p><i class="fa-solid fa-phone"></i> Phone: 544454</p>
                            <p><i class="fa-regular fa-envelope"></i> alsham@.com</p>
                        </div>
                       
                        <div>
                            <h3>FOLLOW US</h3>
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                    <form>
                        <input type="text" name="Name" id="name" placeholder="Full Name">
                        <input type="email" name="email" id="email" placeholder="Email Address">
                        <input type="text" name="subject" id="subject" placeholder="Subject">
                        <textarea name="message" id="message" cols="30" rows="5" placeholder="Message"></textarea>
                        <button type="submit" class="btn btn-third">إرسال</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- Contact Section End -->
    </main>
    <footer id="footer">
        <p> 2023 made by <b> <a href="# "
                    target="_blank">Tulin Youmna Rania </a> </b></p>
    </footer>
</body>

</html>