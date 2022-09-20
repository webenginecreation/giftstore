<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="SmartUniversity" />
    <title>Reset Password || </title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="{{url('Eadmin/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{url('Eadmin/fonts/material-design-icons/material-icon.css')}}" rel="stylesheet" type="text/css" />
    <!-- bootstrap -->
	<link href="{{url('Eadmin/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="{{url('Eadmin/assets/css/pages/extra_pages.css')}}">
	<!-- favicon -->
    <link rel="shortcut icon" href="{{url('Eadmin/assets/img/favicon.ico')}}" /> 
</head>
<body>
@include('flash-message')
    <!-- Login Form-->
    <div class="login-form text-center">
    
        <div class="toggle"><i class="fa fa-user-plus"></i>
        </div>
        <div class="form formLogin">
            <h1> Nutriann </h1>
            <h5> || Change Password ||</h5>
            <form method="POST" action="{{ route('change-password',$id) }}">
            @csrf
                <input type="text" name="password" placeholder="Enter password" />
                
                <input type="text" name="confirm_password" placeholder="Enter confirm password" />
                
                <button>Submit</button>
                
            </form>
        </div>
    </div>
    <!-- start js include path -->
    <script src="{{url('Eadmin/assets/plugins/jquery/jquery.min.js')}}" ></script>
    <script src="{{url('Eadmin/assets/js/pages/extra_pages/pages.js')}}" ></script>
    <!-- end js include path -->
</body>

</html>