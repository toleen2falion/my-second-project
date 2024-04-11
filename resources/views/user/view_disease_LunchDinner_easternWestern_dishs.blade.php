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
</head>

<body>
    <!-- Header Start -->
    <header  class="diseases">
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
                    <li><a href="{{ url('/') }}" >الصفحة الرئيسية</a></li>
                </ul>
              
            </nav>
        </div>
        <div class="content" lang="ar" dir="rtl">
            <h1> أطباق ال{{$type}}   
            <a href="#eastern"> الشرقية </a>
                و
                <a href="#western">الغربية </a>
            </h1>
            <h2>المناسبة لمرضى  <span class="primary-text">{{$disease->name}}</span></h2>
            <?php
            if($pattern=="رئيسي"){?>
            <h2> أطباق {{$pattern}}ة </h2>
            <?php }
            else {?>
                <h2>  {{$pattern}} </h2>
            <?php } ?>
            <br>
            <!-- <p>Here you can find Most delicacies food in the world</p> -->
           
             
        </div>
    </header>
    <br>
    <!-- Header End -->
    <main  lang="ar" dir="rtl">

    <h3 id="eastern">الأطباق الشرقية</h3>

    <div class="flex-container-cards">
  
    @foreach ($eastern_dishs as $dish)
    <div class="card">
      <div class="card-img-shadow ">
    
          <img src="/image_Dish/{{$dish->image}}" alt=""></div>
          
      <div class="card-content">
        <h2>{{$dish->name}}</h2>
        <p>وقت التحضير: {{$dish->cookTime}}دقيقة <br>
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
<!-- test   الاطباق ال غربية-->


<div class="flex-container-cards dish_black">
<h3 id="western">الأطباق الغربية</h3>
@foreach ($western_dishs as $dish)
<div class="card1">
  <div class="card-img-shadow ">

      <img src="/image_Dish/{{$dish->image}}" alt=""></div>
      
  <div class="card-content">
    <h2>{{$dish->name}}</h2>
    <p>وقت التحضير: {{$dish->cookTime}}دقيقة <br>
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

  
        <!-- About Section Start -->
 </main>

<!-- ////model -->

<!-- ///model -->
        <br>
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
    <!-- /////model -->

</body>

</html>