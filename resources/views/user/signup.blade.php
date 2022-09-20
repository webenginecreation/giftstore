@extends('user.master')
@section('main-section')
<style type="text/css">
    label.error {
        color: red;
        font-size: 1rem;
        display: block;
        margin-top: 5px;
    }
    input.error { border-left: 4px solid #f00; }
    
</style>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Register</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Register</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START LOGIN SECTION -->
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Create an Account</h3>
                        </div>
                        <form method="post" id="userSignUp" action="{{ route('user-registration') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" id="name"  class="form-control" name="name" placeholder="Enter Your Name">
                                 @error('name')
                                                       <div class="alert alert-danger">{{ $message }}</div>
                                                           @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" id="email"  class="form-control" name="email" placeholder="Enter Your Email">
                                 @error('email')
                                                       <div class="alert alert-danger">{{ $message }}</div>
                                                           @enderror
                            </div>
                             <div class="form-group">
                                <input type="text" id="mobile"  class="form-control" name="mobile" placeholder="Enter Your Mobile">
                                 @error('mobile')
                                                       <div class="alert alert-danger">{{ $message }}</div>
                                                           @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="password"  type="password" name="password" placeholder="Password">
                                  @error('password')
                                                       <div class="alert alert-danger">{{ $message }}</div>
                                                           @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password">
                                  @error('password_confirmation')
                                                       <div class="alert alert-danger">{{ $message }}</div>
                                                           @enderror
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input"  type="checkbox" checked="" readonly="" name="checkbox" id="exampleCheckbox2" value="">
                                        <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="register">Be A Memeber</button>
                            </div>
                        </form>
                       
                        <div class="form-note text-center">Already have an account? <a href="{{ route('login') }}">Log in</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<div class="section bg_default small_pt small_pb">
    <div class="container"> 
        <div class="row align-items-center">    
            <div class="col-md-6">
                <div class="heading_s1 mb-md-0 heading_light">
                    <h3>Subscribe Our Newsletter</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form">
                    <form>
                        <input type="text"  class="form-control rounded-0" placeholder="Enter Email Address">
                        <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->
@stop
@push('extra-script')
<script>
    $(document).ready(function(){
        $('#password').tooltip({'trigger':'focus', 'title': 'Your password must contain at least one uppercase,Lowecase, special character, Number & Minimun length 7'});
        $('#mobile').tooltip({'trigger':'focus', 'title': 'Only Enter 10 digits Mobile Number'});
        $('#name').tooltip({'trigger':'focus', 'title': 'Only Enter Your First Name'});
        $('#email').tooltip({'trigger':'focus', 'title': 'Enter Valid Email for verification'});
    });
    
</script>


@endpush

