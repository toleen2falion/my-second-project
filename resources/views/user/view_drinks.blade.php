<!DOCTYPE html>
<html lang="en">

<head>
<title> View Chefs </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- // -->
   <link rel="stylesheet" href="/css/bootstrap.min.css" />
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
    <header>
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
                    <li><a href="#Gallary"> الـأقسام</a></li>
                    <li><a href="{{ url('/') }}">الصفحة الرئيسية</a></li>
                </ul>
              
            </nav>
        </div>
        <div class="content">
            <h1>  ال{{$type}}   
            
            </h1>
          
            <p>Here you can find Most delicacies food in the world</p>
            <!-- <a href="#search" class="btn btn-primary search-btn">Search</a> -->
             <!-- <a href="#search" class="btn btn-primary search-btn">بحث</a> -->
             <a class="modal-effect btn btn-outline-success btn-sm" data-effect="effect-scale"
               data-type="{{$type}}" 
                data-bs-toggle="modal"
                href="#myModal" >&nbsp;
                                        
                 بحث</a>
               <!-- //search -->

        </div>
    </header>
    <br>
    <!-- Header End -->
    <main  lang="ar" dir="rtl">

    <h3 id="eastern"> </h3>

    <div class="flex-container-cards">
  
    @foreach ($drinks as $dish)
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

        <!-- ////model -->
<div class="modal" id="myModal" lang="ar" dir="rtl">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning ">
                        
                        <button type="button" class="btn-close " data-bs-dismiss="modal"></button>
                        <h4 class="modal-title " >
                        <label> </label>
                        <!-- <input class=" bg-warning border-0 text-white  " name="" id="name"
                                      type="text" value="" readonly></h4> -->
                    </div>
                    <div class="modal-body text-danger">
                        <form action="{{ route('drinks_search') }}" method="GET"  autocomplete="off">
                      
                         {{ csrf_field() }}    
                        <div class="mb-2 p-0">
                           
                            
                              
                           
                            <input class="form-control " name="type" id="type"
                                      type="hidden" value="" readonly>

                            </div>
                            <div class="mb-2 p-0">
                            <label >اختر مستوى الكلفة</label>
                                <select class="form-control " name="cost"  id=""  >
                                  <option selected value="">الكل</option>
                                  <option value="منخفضة">منخفضة</option>
                                  <option value="متوسطة">متوسطة</option>
                                  <option value="عالية">عالية</option>
                                  
                                
                                </select>
                           
                           
                            <label >حدد عدد الحصص </label>
                            <input class="form-control p-1 m-0 " name="numberIndividual" id=""
                                    type="number" value="" >
                             
                            </div>
                            <div class="mb-2 p-0">
                            <label >حدد العدد الأقصى لوقت التحضير</label>
                            <input class="form-control p-1 m-0 " name="cookTime" id=""
                                    type="number" value="" >
                             
                            </div>
                            <div class="mb-3">
                            <label >حدد عدد السعرات الحرارية</label>
                            <input class="form-control p-1 m-0 " name="calories" id=""
                                    type="number" step=any value="" >
                             
                            </div>
                            <div class="mb-3">
                            <label >حدد الحد الأقصى لعدد السعرات الحرارية</label>
                            <input class="form-control p-1 m-0 " name="max_calories" id=""
                                    type="number" step=any value="" >
                             
                            </div>
                       
                    </div>
                    <div class="modal-footer p-0 m-0">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">إلغاء</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

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
<script>
    $('#myModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var type = button.data('type')

        // alert(chef_id);
        var modal = $(this)
        modal.find('.modal-body #type').val(type);
    })

</script>
</body>

</html>
</body>

</html>