<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
   
    <title>Happiness.gifts | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   @include('Admin.common.css')
   @stack('css')
 </head>
 <!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
    <div class="page-wrapper">
        <!-- start header -->
       
       @include('Admin.common.header')
        <!-- end header -->
      
        <!-- start page container -->
        <div class="page-container">
 			<!-- start sidebar menu -->
 			 @include('Admin.common.sidebar')
             
            <!-- end sidebar menu --> 
            <!-- start page content -->
            
            @yield('main-section')
           
            <!-- end page content -->
           
        </div>
        <!-- end page container -->
        <!-- start footer -->
     
       @include('Admin.common.footer')
       
    </div>
   @include('Admin.common.script')
   @stack('scripts')
  </body>

</html>