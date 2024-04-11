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
            <img src="../home_Page/img/logo.png" alt="Food Lover Logo">
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
            <h1>أهلاً بك في موقع  <span class="primary-text"> وصفات صحية </span> </h1>
            <p>نقدم لك الوصفات المناسبة للأمراض الشائعة، <br>بحيث لا تحتوي هذه الوصفات على الأغذية التي يمنع تناولها من قبل أصحاب المرض.</p>
            <!-- <a href="#search" class="btn btn-primary search-btn">Search</a> -->
             

        </div>
    </header>
    <br>
    <!-- Header End -->
    <main style="width: 90%" class="m-auto">
   <!-- lllhhh -->

  
   

   <div class="row"   class="py-0 my-0">
          <div class="col-md-12 mb-3 py-0 my-0">
            <div class="card">
              <div class="card-header text-center text-danger">
                <span>الأمراض <i class="bi bi-table me-2 "></i></span>  
              </div>
              <div class="card-body">
                <div class="table-responsive text-danger "  lang="ar" dir="rtl">

                  <table
                    id="example"
                    class="table table-striped data-table"
                    style="width: 100%"
                    lang="ar" dir="rtl"
                  >
                    <thead >
                      <tr>
                        <th></th>
                        <th> </th>
                        
                        
                        <?php
                        // <th>كلمة المرور</th>
                        ?>
                        
                        
                      </tr>
                    </thead>
                    <tbody >
                          @php
                                $i = 0;
                                @endphp
                                @foreach ($diseases as $disease)
                                    @php
                                    $i++
                                    @endphp
                                    <tr>
                                        <td>{{ $i }})</td>
                                        
                                        
                                        <td><h4>{{ $disease->name }} :</h4>
                                       <ul>
                                        <li>

                                             {{ $disease->description }}
                                        </li>
                                        <br>
                                        <li>

                                       <b> تمت إضافته بواسطة: </b>د. {{ $disease->created_by }}.
                                        </li>
                                        <br>
                                        <li>

                                       <b>تاريخ الإضافة: </b> {{ $disease->created_at }}.
                                        </li>
                                        
                                        </ul>
                                      
                                       
                                             
                                        <a class="btn btn-outline-danger btn-sm mx-2 px-3 my-2 fw-bold text-decoration-underline fs-6" 
                                            href="{{ url('/home/disease/bloked_ingredients') }}/{{$disease->id}}"
                                            role="button">
                                                    الأغذية الممنوعة </a>
                                                    
                                        
                                        <a class="btn btn-outline-success btn-sm mx-2 px-3 my-2 fw-bold text-decoration-underline fs-6" 
                                            href="{{ url('/home/disease/dishes_right') }}/{{$disease->id}}"
                                            role="button">
                                                     الأطباق المناسبة </a>
                                           

                                        </td>
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