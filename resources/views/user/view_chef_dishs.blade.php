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
    <header >
        <div id="navbar">
            <img src="/home_Page/img/logo.png" alt="Food Lover Logo">
            <nav role="navigation">
                <ul>
                    <li><a href="#about">حول الموقع</a></li>
                    <li> <a href="{{ url('/' . ($page = 'home/chefs')) }}" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span> الطهاة</span>
                    </a></li>
                    <li><a href="#Gallary"> الـأقسام</a></li>
                    <li><a href="{{ url('/') }}" class="nav-link px-3">الصفحة الرئيسية</a></li>
                </ul>
              
            </nav>
        </div>
        <div class="content">
            <h1>عرض أطباق الشيف <span class="primary-text">{{$chef->name}}</span> </h1>
            <p>Here you can find Most delicacies food in the world</p>
            <a href="#search" class="btn btn-primary search-btn">Search</a>

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
                عدد الأطباق التي قام بنشرها {{$breakfast_dishs}} 
                </p>
                <a href="{{ url('/home/chefs/view_chef_breakfast_dishs') }}/{{$chef->id}}" class="gallary_btn">عرض</a>
            </div>

            <div class="gallary_image">
                <img src="/home_Page/img/gallary_2.jpg">

                <h3>مشروبات</h3>
                <p>
                عدد المشروبات التي قام بنشرها {{$drinks}} 
                </p>
                <a href="{{ url('/home/chefs/view_chef_drinks') }}/{{$chef->id}}" class="gallary_btn">عرض</a>
            </div>

            <div class="gallary_image">
                <img src="/home_Page/img/gallary_3.jpg">

                <h3>غداء\عشاء
                    <br>
                     مقبلات
                </h3>
                <p>
                عدد الأطباق التي قام بنشرها {{$LunchDinner_dishs}} 
                </p>
                <a href="{{ url('/home/chefs/view_chef_LunchDinner_dishs') }}/{{$chef->id}}" class="gallary_btn">عرض</a>
            </div>

            <div class="gallary_image">
                <img src="/home_Page/img/gallary_4.jpg">

                <h3>حلويات</h3>
                <p>
                عدد الأطباق التي قام بنشرها {{$sweets_dishs}} 
                </p>
                <a href="{{ url('/home/chefs/view_chef_sweets_dishs') }}/{{$chef->id}}" class="gallary_btn">عرض</a>
            </div>

            <div class="gallary_image">
                <img src="/home_Page/img/gallary_5.jpg">

                <h3>جميع الوصفات</h3>
                <p>
                عدد الوصفات التي قام بنشرها {{$all_dishs}} 
                </p>
                <a href="{{ url('/home/chefs/view_chef_all_dishs') }}/{{$chef->id}}" class="gallary_btn">عرض</a>
            </div>

            <div class="gallary_image">
                <img src="/home_Page/img/gallary_6.jpg">

                <h3>غداء\عشاء
                    <br>
                    أطباق رئيسية
                </h3>
                <p>
                عدد الأطباق التي قام بنشرها {{$LunchDinner_dishsMain}} 
                </p>
                <a href="{{ url('/home/chefs/view_chef_LunchDinner_dishsMain') }}/{{$chef->id}}" class="gallary_btn">عرض</a>
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