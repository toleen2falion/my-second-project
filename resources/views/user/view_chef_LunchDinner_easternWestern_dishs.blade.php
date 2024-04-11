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
            <h2>المضافة من قبل الشيف <span class="primary-text">{{$chef->name}}</span></h2>
            <?php
            if($pattern=="رئيسي"){?>
            <h2> أطباق {{$pattern}}ة </h2>
            <?php }
            else {?>
                <h2>  {{$pattern}} </h2>
            <?php } ?>
            <br>
            <!-- <p>Here you can find Most delicacies food in the world</p> -->
            <!-- <a href="#search" class="btn btn-primary search-btn">بحث</a> -->
            <a class="modal-effect btn btn-outline-success btn-sm" data-effect="effect-scale"
               data-cid="{{$chef->id}}" 
               data-type="{{$type}}"
               data-pattern="{{$pattern}}" 
                data-bs-toggle="modal"
                href="#myModal" >&nbsp;
                                        
                 بحث</a>
               <!-- //search -->
       
      <?php
        // <form action="{{ route('chef_dishs_cost_search') }}" method="GET" class="search">
        ?>
          <!-- <h3> ابحث عن طاهي: </h3> -->
          <!-- <input type="text" name="name" class="form-control p-0 m-0" placeholder="ه" autocomplete="off"> -->
          <!-- <input type="hidden" name="type" value=" type  class="form-control" >
          <input type="hidden" name="chef_id" value="chef->id" class="form-control" >
          <select class="form-control " name="cost"  >
             <option selected disabled>---  حدد مستوى الكلفة الذي تريد ---</option>  
             <option value="منخفضة">منخفضة</option>
             <option value="متوسطة">متوسطة</option>
             <option value="عالية">عالية</option>
             <option value="الكل">الكل</option>
         </select>
<div>
          <input type="submit" value="بحث" class="btn btn-primary search-btn" >
</div>
        </form> -->

    <!-- //end search -->

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
                        <form action="{{ route('chef_LunchDinner_dishs_search') }}" method="GET"  autocomplete="off">
                      
                         {{ csrf_field() }}    
                        <div class="mb-2 p-0">
                           
                              <input class="form-control " name="chef_id" id="chef_id"
                                      type="hidden" value="" readonly>
                              
                           
                            <input class="form-control " name="type" id="type"
                                      type="hidden" value="" readonly>

                            <input class="form-control " name="pattern" id="pattern"
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
                            <label >حدد العدد الأقصى لوقت الطهي</label>
                            <input class="form-control p-1 m-0 " name="cookTime" id=""
                                    type="number" value="" >
                             
                            </div>
                            <div class="mb-3">
                            <label >حدد عدد السعرات الحرارية</label>
                            <input class="form-control p-1 m-0 " name="calories" id=""
                                    type="number" step=any value="" >
                             
                            </div>
                            <div class="mb-3">
                            <label >حدد الحد الأقصى السعرات الحرارية</label>
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
        var chef_id = button.data('cid')
        var type = button.data('type')
        var pattern = button.data('pattern')
        
        // alert(chef_id);
        var modal = $(this)
        modal.find('.modal-body #chef_id').val(chef_id);
        modal.find('.modal-body #type').val(type);
        modal.find('.modal-body #pattern').val(pattern);
    })

</script>
</body>

</html>