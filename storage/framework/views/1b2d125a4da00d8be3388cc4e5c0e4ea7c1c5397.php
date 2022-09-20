<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Larastore.ml inside store management" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="author" content="SmartUniversity" />
    <title>Login  |  Admin </title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="<?php echo e(url('Eadmin/fonts/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo e(url('Eadmin/fonts/material-design-icons/material-icon.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- bootstrap -->
	<link href="<?php echo e(url('Eadmin/assets/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="<?php echo e(url('Eadmin/assets/css/pages/extra_pages.css')); ?>">
	<!-- favicon -->
    <link rel="shortcut icon" href="<?php echo e(url('Eadmin/assets/img/favicon.ico')); ?>" /> 
</head>
<body>
<?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Login Form-->
    <div class="login-form text-center">
    
        <div class="toggle"><i class="fa fa-user-plus"></i>
        </div>
        <div class="form formLogin">

            <form method="POST" action="<?php echo e(route('adminlogin')); ?>">
            <?php echo csrf_field(); ?>
                <input type="email" name="email" placeholder="Enter Email" />
                <input type="password" name="password" placeholder="Enter Password" />
                
                <button>Login</button>
                <div class="forgetPassword"><a href="javascript:void(0)">Forgot your password?</a>
                </div>
            </form>
            <img src = "<?php echo e(url('images')); ?>/<?php echo e($siteConfig->logo); ?>" style="width:100%;">

        </div>
        <div class="form formRegister">
            <h2>Create an account</h2>
            <form>
                <input type="text" placeholder="Username" />
                <input type="password" placeholder="Password" />
                <input type="email" placeholder="Email Address" />
                <input type="text" placeholder="Full Name" />
                <input type="tel" placeholder="Phone Number" />
                <button>Register</button>
            </form>
        </div>
        <div class="form formReset">
            <h2>Reset your password?</h2>
            <form>
                <input type="email" placeholder="Email Address" />
                <button>Send Verification Email</button>
            </form>
        </div>
    </div>
    <!-- start js include path -->
    <script src="<?php echo e(url('Eadmin/assets/plugins/jquery/jquery.min.js')); ?>" ></script>
    <script src="<?php echo e(url('Eadmin/assets/js/pages/extra_pages/pages.js')); ?>" ></script>
    <!-- end js include path -->
</body>

</html><?php /**PATH C:\xampp\htdocs\Shopping\resources\views/Admin/login.blade.php ENDPATH**/ ?>