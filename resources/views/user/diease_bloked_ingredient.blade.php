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
            <h1>   الأغذية الممنوعة لمرضى   <span class="primary-text">  {{$disease->name}} </span> </h1>
            <!-- <p>نقدم لك الوصفات المناسبة للأمراض الشائعة، <br>بحيث لا تحتوي هذه الوصفات على الأغذية التي يمنع تناولها من قبل أصحاب المرض.</p> -->
            <!-- <a href="#search" class="btn btn-primary search-btn">Search</a> -->
             

        </div>
    </header>
    <br>
    <!-- Header End -->
    <main style="width: 90%" class="m-auto text-dark fs-5" lang="ar" dir="rtl">
   <!-- lllhhh -->
  <!-- /////// -->
  <div class="row">             
       <div class="table-responsive mx-5 my-3 px-5 ">
                  <table
                    style="width: 70%"
                    mx-5
                  >
                    <thead>
                      <tr>
                        <th  style="width:5%"></th>
                        <th></th>
                        <th></th>
                       
                        
                      </tr>
                    </thead>
                    <tbody>
                  
                     @php
                            $i = 1;
                    @endphp
                
                    @foreach($disease->ingredients as $ingredient)
                     
                   <tr>
                         <td class="text-danger">{{ $i++ }})</td>    
                         <td>{{$ingredient->name }}.</td>
                             
                            
                    </tr>
                      @endforeach
                  </tbody>
                <tfoot>
                  
                </tfoot>
              </table>
             
            </div>
</div>
       <!-- /////// -->

               
                  

<!-- row closed -->


  
   <!-- jjjjjj     -->
    </main>
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

</body>

</html>