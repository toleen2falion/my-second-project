<?php
// @extends('chef.layouts.head')
 
// <body>
//     <!-- top navigation bar -->
//     <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
//       <div class="container-fluid">
//         <button
//           class="navbar-toggler"
//           type="button"
//           data-bs-toggle="offcanvas"
//           data-bs-target="#sidebar"
//           aria-controls="offcanvasExample"
//         >
//           <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
//         </button>
//         <a
//           class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
//           href="#"
//           >Chef Dashboard</a
//         >
//         <button
//           class="navbar-toggler"
//           type="button"
//           data-bs-toggle="collapse"
//           data-bs-target="#topNavBar"
//           aria-controls="topNavBar"
//           aria-expanded="false"
//           aria-label="Toggle navigation"
//         >
//           <span class="navbar-toggler-icon"></span>
//         </button>
//         <div class="collapse navbar-collapse" id="topNavBar">
//           <form class="d-flex ms-auto my-3 my-lg-0">
//             <div class="input-group">
//               <input
//                 class="form-control"
//                 type="search"
//                 placeholder="Search"
//                 aria-label="Search"
//               />
//               <button class="btn btn-primary" type="submit">
//                 <i class="bi bi-search"></i>
//               </button>
//             </div>
//           </form>
//           <ul class="navbar-nav">
//             <li class="nav-item dropdown">
//               <a
//                 class="nav-link dropdown-toggle ms-2"
//                 href="#"
//                 role="button"
//                 data-bs-toggle="dropdown"
//                 aria-expanded="false"
//               >
//                 <i class="bi bi-person-fill"></i>
//               </a>
//               <ul class="dropdown-menu dropdown-menu-end">
                
//                 <li>
//                 <a href="{{ route('chef.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
//                  <form action="{{ route('chef.logout') }}" id="logout-form" method="post">@csrf</form>
                
               
              
//               </li>
//                 <li><a class="dropdown-item" href="#">Another action</a></li>
//                 <li>
//                   <a class="dropdown-item" href="#">Something else here</a>
//                 </li>
//               </ul>
//             </li>
//           </ul>
//         </div>
//       </div>
//     </nav>
//     <!-- top navigation bar -->
//     <!-- offcanvas -->
//     @extends('chef.layouts.offcanvas')
//     <!-- offcanvas -->
//     <main class="mt-5 pt-3">
//       <div class="container-fluid">
        
      
//         <br>
//          <!-- row -->
//   <div class="row">

// <div class="col-lg-12 col-md-12">
//     <div class="card">
//         <div class="card-body ">
//         @if ($errors->any())
//         <div class="alert alert-danger text-center">
//             <ul>
//                 @foreach ($errors->all() as $error)
//                     <li>{{ $error }}</li>
//                 @endforeach
//             </ul>
//         </div>
//     @endif
    
//     @if (session()->has('success'))
//         <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
//             <strong>{{ session()->get('success') }}</strong>
           
           
//         </div>
//     @endif
//         </div>
//     </div>
// t
// </div>

// </div>

// oo

//         </div>  

//     <div class="row">

//         <div class="col-lg-12 col-md-12">
//             <div class="card">
//                 <div class="card-body">

//                     o
//                     <form action="/chef/dashboard/store_steps" method="post">
//                     @csrf 
//                     <table class="table table-bordered" id="table">
//                         <tr>
//                             <th>Steps</th>
//                             <th>Action</th>
//                         </tr>
//                         <tr>
//                             <td> <input type="text" name="inputs[0][content]" placeholder="Enter Space" class="form-control"></td>
//                             <td> <input type="text" name="inputs[0][dish_id]" value={{$id}} class="form-control" readonly></td>
//                             <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
//                         </tr>
//                     </table>
//                     <button type="submit" class="btn btn-primary col-md-2">Save</button>
//                 </div>
//             </div>
 
//         </div>
//     </div>

//     </div>

//     <!-- row closed -->   


//     </div>   
// </div>     

// <script src="/js/bootstrap.bundle.min.js"></script>
// <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

//     <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
//     <script src="/js/jquery-3.5.1.js"></script>
//     <script src="/js/jquery.dataTables.min.js"></script>
   
//     <script src="/js/dataTables.bootstrap5.min.js"></script>

//     <script src="/js/script.js"></script>

   
//     <script>
//        var i = 0 ;
//     $('#add').click(function(){
//         ++i;
//         $('#table').append(
//             `<tr>
//                 <td>
//                     <input type="text" name="inputs[`+i+`][content]" placeholder="Enter Space" class="form-control" />
//                 </td>
//                 <td>
//                     <input type="text" name="inputs[`+i+`][dish_id]" value={{$id}} class="form-control" readonly />
//                 </td>
//                 <td>
//                      <button type="button" class="btn btn-danger remove-table-raw">Remove</button>
//                 </td>
//                 </tr>`);

//     });

//     $(document).on('click','.remove-table-raw',function(){
//         $(this).parents('tr').remove();
//     });
//         </script>
//     </body>
// </html>

?>