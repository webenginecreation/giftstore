<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
   
    <title>Happiness.gifts | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php echo $__env->make('Admin.common.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php echo $__env->yieldPushContent('css'); ?>
 </head>
 <!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
    <div class="page-wrapper">
        <!-- start header -->
       
       <?php echo $__env->make('Admin.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end header -->
      
        <!-- start page container -->
        <div class="page-container">
 			<!-- start sidebar menu -->
 			 <?php echo $__env->make('Admin.common.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             
            <!-- end sidebar menu --> 
            <!-- start page content -->
            
            <?php echo $__env->yieldContent('main-section'); ?>
           
            <!-- end page content -->
           
        </div>
        <!-- end page container -->
        <!-- start footer -->
     
       <?php echo $__env->make('Admin.common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       
    </div>
   <?php echo $__env->make('Admin.common.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php echo $__env->yieldPushContent('scripts'); ?>
  </body>

</html><?php /**PATH C:\xampp\htdocs\giftstore\resources\views/Admin/master.blade.php ENDPATH**/ ?>