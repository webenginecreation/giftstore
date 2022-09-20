
<?php $__env->startSection('main-section'); ?>
<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- STAT SECTION ABOUT --> 
<div class="section">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-lg-6">
            	<div class="about_img scene mb-4 mb-lg-0">
                    <img src="https://www.hostfinch.net/themes/demo/assets/img/hosting-reseller-home.png" alt="about_img"/>
                </div>
            </div>
            <div class="col-lg-6">
               
                    <!--here reseller Form-->
                    <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Reseller Sign Up</h3>
                        </div>
                        <form method="post" id="userSignUp" action="<?php echo e(route('user-registration')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <input type="text" id="name"  class="form-control" name="name" placeholder="Enter Your Name">
                                 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                       <div class="alert alert-danger"><?php echo e($message); ?></div>
                                                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" id="email"  class="form-control" name="email" placeholder="Enter Your Email">
                                 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                       <div class="alert alert-danger"><?php echo e($message); ?></div>
                                                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                             <div class="form-group">
                                <input type="text" id="mobile"  class="form-control" name="mobile" placeholder="Enter Your Mobile">
                                 <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                       <div class="alert alert-danger"><?php echo e($message); ?></div>
                                                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="password"  type="password" name="password" placeholder="Password">
                                  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                       <div class="alert alert-danger"><?php echo e($message); ?></div>
                                                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password">
                                  <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                       <div class="alert alert-danger"><?php echo e($message); ?></div>
                                                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                <button type="submit" class="btn btn-fill-out btn-block" name="register">Be A Reseller</button>
                            </div>
                        </form>
                       
                     
                    </div>
                </div>
                    
            </div>
        </div>
            <div class="container">
                <div class="row align-iteams-center"></div>
                  <div class="heading_s1">
                    <h2>What is the Reseller Program?</h2>
                </div>
                <p>An Online Business to earn profits by reselling Products worldwide at a profit margin sitting at the comfort of your home or working full time in a Job or as a Business Owner.</p><p>
We have resellers worldwide who sell using WhatsApp, Facebook, Instagram. They follow some basic Processes and Steps & Dedicate a few hours to the Business weekly and make a Good Profit. We are now looking at New Resellers worldwide who can make profit and meet sales targets.
</p>
            </div>
        	<div class="container">
        <div class="row align-iteams-center">
            <h2>How to Resell?</h2>
<p>
You can Become a Reseller from anywhere in the world. Sell and Ship Products to your customers worldwide. You just need a Phone, and Basic knowledge of WhatsApp, Facebook, and Instagram.</p><p>
Step 1 – Decide your Target Customer and Audience: So you can start with family, friends or Office colleagues, Ask them what they are interested in and Share the Product Images which we will send to you on your WhatsApp Daily.</p>
<p>
You can Share the Products on Facebook Groups, WhatsApp groups, Create your own Facebook Business Page and Instagram Business Page and start sharing / Posting.</p>
<p>
Step 2 – Decide Profit Margin: We will send you Our Price (Wholesale Price) for the Product you can add whatever Profit margin you want on top and send to the customer keeping the Customer in mind. There will be Shipping cost on top which we will teach you how to calculate for anywhere in the world.</p>
<p>
Step 3 – Once you get a Sale/ Order: Once customer decides to buy after all negotiations please take payment from the customer through whichever mode is easier for you and the customer.
Then you pay us our price + Shipping Price using PayPal or Remittance. We will share details on how to buy once you become a Reseller. Once Payment is done we ship direct to your customer or we can ship to your address as well. Online tracking number will be shared which you can forward to the customer.
</p>
        </div>
        </div>
        
    </div>
</div>
<!-- END SECTION ABOUT --> 

<!-- START SECTION WHY CHOOSE --> 
<div class="section bg_light_blue2 pb_70">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-lg-6 col-md-8">
            	<div class="heading_s1 text-center">
                	<h2>Why Choose Us?</h2>
                </div>
                <p class="text-center leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </div>
        </div>
        <div class="row justify-content-center">
        	<div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-pencil-alt"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Creative Design</h5>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-layers"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Flexible Layouts</h5>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-email"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Email Marketing</h5>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION WHY CHOOSE --> 

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
                        <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                        <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u980489449/domains/happiness.gifts/public_html/resources/views/user/reseller.blade.php ENDPATH**/ ?>