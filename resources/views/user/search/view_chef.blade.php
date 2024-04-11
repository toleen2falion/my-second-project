<!DOCTYPE html>
<html lang="en">

<head>
<title> View Chefs </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Style Link -->
    <link rel="stylesheet" href="../../home_Page/style.css">
    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Favicon -->
    <!--<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">-->
    <link rel="stylesheet" href="../../view_chef/style.css">
</head>

<body>
    <!-- Header Start -->
    <header>
        <div id="navbar">
            <img src="../../home_Page/img/logo.png" alt="Food Lover Logo">
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
                    <li><a href="{{ url('/') }}">الصفحة الرئيسية</a></li>
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
    
    <div class="flex-container-cards">
  
  @foreach ($chefs as $chef)
    <div class="card">
      <div class="card-img-shadow ">
    
          <img src="../../image_Chef/{{ $chef->image }}" alt=""></div>
          
      <div class="card-content">
        <h2>{{ $chef->name }}</h2>
        <p>عدد الأطباق التي قام بنشرها على الموقع: {{ $chef->num_dishes }}<br>
          <a href="{{ url('/home/chefs/view_chef_dishs') }}/{{$chef->id}}" >
          عرض الأطباق </a>
        </p>
         
        <div class="button-shadow">
          <div class="card-button">متابعة  </div>
          
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