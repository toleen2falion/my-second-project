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
    <header class="dont_eat">
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
                    <li><a href="{{ url('/' . ($page = 'home/today_recipe')) }}"> طبخة اليوم</a></li>
                    <li><a href="{{ url('/') }}" >الصفحة الرئيسية</a></li>
                </ul>
              
            </nav>
        </div>
        <div class="content" lang="ar" dir="rtl">
            <h1> سنساعدك في اختيار الأطباق المناسبة لصحتك
            <!-- <a href="#eastern"> الشرقية </a>
                و
                <a href="#western">الغربية </a> -->
            </h1>
            <h2><span class="primary-text"></span></h2>
            <p>Here you can find Most delicacies food in the world</p>
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
        <!-- <div class=" dish_black "> -->
      <div class="container-fluid py-5">
      <nav class="navbar navbar-expand-sm  navbar-dark" style="width: 60%">
    <div class="container bg-muted"  lang="ar" dir="rtl">
    <a class="btn btn-outline-success  fw-bold" href=" {{ url('/home/dont_eat_cart') }}">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> المكونات المضافة <span class="badge bg-warning">{{ count((array) session('dont_eat_cart')) }}</span>
    </a>
  </div>
</nav>
    
        <div class="row ">
          <div class="col-md-12 mb-3 ">
            <div class="card mx-auto"  style="width: 60%">
              <div class="card-header text-danger text-center fw-bold">
                <span><i class=""></i></span>  حدد المكونات الغذائية التي لا تستطيع تناولها     
              </div>
                
              <div class="card-body ">
                <div class="table-responsive text-center text-danger">
                  <table
                    id="example"
                    class="table table-striped data-table"
                  
                    lang="ar" dir="rtl"
                  >
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>رقم المكون </th>
                        <th>اسم المكون</th>
                      
                        
                        <th></th>
                        
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
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>
                                              {{ $ingredient->id }}
                                        </td>
                                       
                                        <td>
                                              {{ $ingredient->name }}
                                        </td>
                                      
                                        
                                     
                                       
                                        <td class="btn-holder"><a href="{{ url('/home/add_ingredient_to_dont_eat_cart') }}/{{ $ingredient->id }}" class="btn btn-outline-danger">+</a> </td>
                                     
                        
                                       
                                       
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
      </div>


<!-- </div> -->

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