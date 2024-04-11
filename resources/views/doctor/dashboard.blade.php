<!-- <h2>Doctor Dashboard</h2>
<a href="{{ route('doctor.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                     <form action="{{ route('doctor.logout') }}" id="logout-form" method="post">@csrf</form> -->


 @extends('doctor.layouts.head')
  <body>
    <!-- top navigation bar -->
    @extends('doctor.layouts.top-navigation-bar')
    <!-- top navigation bar -->
    <!-- offcanvas -->
    @extends('doctor.layouts.offcanvas')
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
           
          </div>
          <div class="col-md-3 mb-3">
           
          </div>
          <div class="col-md-3 mb-3">
            
          </div>
          <div class="col-md-3 mb-3">
           
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            
          </div>
          <div class="col-md-6 mb-3">
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
           
      </div>
      </div>
    </main>
    @extends('doctor.layouts.footer-scripts')
 