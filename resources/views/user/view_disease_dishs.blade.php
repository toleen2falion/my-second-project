<!DOCTYPE html>
<html lang="en">

<head>
<title> View Chefs </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Style Link -->
    <link rel="stylesheet" href="/home_Page/style.css">
    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Favicon -->
    <!--<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">-->
    <!-- <link rel="stylesheet" href="../view_chef/style.css"> -->
</head>

<body>
    <!-- Header Start -->
    <header class="diseases">
        <div id="navbar">
            <img src="/home_Page/img/logo.png" alt="Food Lover Logo">
            <nav role="navigation">
                <ul>
                    <li><a href="#about">حول الموقع</a></li>
                    <li> <a href="{{ url('/' . ($page = 'home/chefs')) }}" >
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span> الطهاة</span>
                    </a></li>
                    <li><a href="{{ url('/' . ($page = 'home/diseases')) }}"> الأمراض</a></li>
                    <li><a href="{{ url('/' . ($page = 'home/today_recipe')) }}"> طبخة اليوم</a></li>
                    <li><a href="{{ url('/') }}">الصفحة الرئيسية</a></li>
                </ul>
              
            </nav>
        </div>
        <div class="content" lang="ar" dir="rtl">
            <h1>   الوصفات المناسبة لمرضى  <span class="primary-text"> {{$disease->name}}  </span> </h1>
            <p>نقدم لك الوصفات المناسبة للأمراض الشائعة، <br>بحيث لا تحتوي هذه الوصفات على الأغذية التي يمنع تناولها من قبل أصحاب المرض.</p>
            <!-- <a href="#search" class="btn btn-primary search-btn">Search</a> -->
             

        </div>
    </header>
    <br>
    <!-- Header End -->
    <main  lang="ar" dir="rtl">


<!--Category-->

<div class="gallary" id="Gallary">
 <h1>Categories<span>التصنيفات</span></h1>

 <div class="gallary_image_box">
     <div class="gallary_image">
         <img src="/home_Page/img/gallary_1.jpg">

         <h3>الفطور</h3>
         <p>
        عدد الوصفات {{$countBreakfast}}   
         </p>
         <a href="{{ url('/home/diseases/view_disease_breakfast_dishs') }}/{{$disease->id}}" class="gallary_btn">عرض</a>
     </div>

     <div class="gallary_image">
         <img src="/home_Page/img/gallary_2.jpg">

         <h3>مشروبات</h3>
         <p>
        عدد الوصفات {{$countDrink}}   
         </p>
         <a href="{{ url('/home/diseases/view_disease_drinks') }}/{{$disease->id}}" class="gallary_btn">عرض</a>
     </div>

     <div class="gallary_image">
         <img src="/home_Page/img/gallary_3.jpg">

         <h3>غداء\عشاء
             <br>
              مقبلات
         </h3>
         <p>
            عدد الوصفات {{$countLunchDinner}}   
         </p>
         <a href="{{ url('/home/diseases/view_disease_LunchDinner_dishs') }}/{{$disease->id}}" class="gallary_btn">عرض</a>
     </div>

     <div class="gallary_image">
         <img src="/home_Page/img/gallary_4.jpg">

         <h3>حلويات</h3>
         <p>
            عدد الوصفات {{$countSweets}}   
         </p>
         <a href="{{ url('/home/diseases/view_disease_sweets_dishs') }}/{{$disease->id}}" class="gallary_btn">عرض</a>
     </div>

     <div class="gallary_image">
         <img src="/home_Page/img/gallary_5.jpg">

         <h3>جميع الوصفات</h3>
         <p>
            عدد الوصفات {{$all_right_dishs}}   
         </p>
         <a href="{{ url('/home/diseases/view_disease_all_dishs') }}/{{$disease->id}}" class="gallary_btn">عرض</a>
     </div>

     <div class="gallary_image">
         <img src="/home_Page/img/gallary_6.jpg">

         <h3>غداء\عشاء
             <br>
             أطباق رئيسية
         </h3>
         <p>
            عدد الوصفات {{$countLunchDinnerMain}}   
         </p>
         <a href="{{ url('/home/diseases/view_disease_LunchDinner_dishsMain') }}/{{$disease->id}}" class="gallary_btn">عرض</a>
     </div>

 </div>

</div>
 <!-- category Section End -->
   




 <!-- About Section Start -->
 </main>
        <br>
    <footer id="footer">
        <p> 2023 made by <b> <a href="# "
                    target="_blank">Tulin Youmna Rania </a> </b></p>
    </footer>

  

</body>

</html>