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
    <link rel="stylesheet" href="/view_chef/style.css">
</head>

<body>
    <!-- Header Start -->
    <header class="diseases">
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
                    <li><a href="{{ url('/' . ($page = 'home/diseases')) }}"> الأمراض</a></li>
                    <li><a href="{{ url('/' . ($page = 'home/today_recipe')) }}"> طبخة اليوم</a></li>
                    <li><a href="{{ url('/') }}" class="nav-link px-3">الصفحة الرئيسية</a></li>
                </ul>
              
            </nav>
        </div>
        <div class="content" lang="ar" dir="rtl">
            <h1>  جميع الوصفات
            
            </h1>
            <h2>المناسبة لمرضى  <span class="primary-text">{{$disease->name}}</span></h2>
            <!-- <p>Here you can find Most delicacies food in the world</p> -->
            <!-- <a href="#search" class="btn btn-primary search-btn">Search</a> -->
                <!-- //search -->
       
       

    <!-- //end search -->

        </div>
    </header>
    <br>
    <!-- Header End -->
    <main  lang="ar" dir="rtl">

    <h3 id="eastern"> </h3>

    <div class="flex-container-cards">
  
    @foreach ($right_dishs as $dish)
    <div class="card">
      <div class="card-img-shadow ">
    
          <img src="/image_Dish/{{$dish->image}}" alt=""></div>
          
      <div class="card-content">
        <h2>{{$dish->name}}</h2>
        <p> {{$dish->type}} <br>
            وقت التحضير: {{$dish->cookTime}}دقيقة <br>
           عدد الحصص: {{$dish->numberIndividual}} <br>
          الكلفة: {{$dish->cost}} <br>
        
          
        </p>
         
        <div class="button-shadow">
          <div class="card-button">
            <a href="{{ url('/home/chefs/view_chef_BreakfastDish') }}/{{$dish->id}}" > عرض    </a>
             </div>
          
        </div>
      </div>
    </div>
     
  @endforeach
</div>


       
              
               
          
        <!-- الأطباق الحديثة Section End -->
     
<br>
<!-- test   الاطباق ال غربية-->




  
    <!-- /test    -->

  
        <!-- About Section Start -->
        </main>
        <br>
    <footer id="footer">
        <p> 2023 made by <b> <a href="# "
                    target="_blank">Tulin Youmna Rania </a> </b></p>
    </footer>
</body>

</html>