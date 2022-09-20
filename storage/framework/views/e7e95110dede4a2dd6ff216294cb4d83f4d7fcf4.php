
<?php $__env->startSection('main-section'); ?>
<style type="text/css">
    label.error {
        color: red;
        font-size: 1rem;
        display: block;
        margin-top: 5px;
    }
    input.error { border-left: 4px solid #f00; }
</style>
<!-- START MAIN CONTENT -->
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1></h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="#"><?php echo e(Auth::user()->name); ?></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<div class="main_content">
<!-- START SECTION SHOP -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Dashboard</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Orders</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>My Address</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Account details</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('logout')); ?>"><i class="ti-lock"></i>Logout</a>
                      </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">
                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Dashboard</h3>
                                <p>Welcome : <b><?php echo e(Auth::user()->name); ?> </b></p>
                            </div>
                            <div class="card-body">
                                <p>From your account dashboard. you can easily check &amp; view your <a href="javascript:void(0);" onclick="$('#orders-tab').trigger('click')">recent orders</a>, manage your <a href="javascript:void(0);" onclick="$('#address-tab').trigger('click')">shipping and billing addresses</a> and <a href="javascript:void(0);" onclick="$('#account-detail-tab').trigger('click')">edit your password and account details.</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Orders</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th colspan="3">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $myOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><a href="<?php echo e(route('UserviewOrder',['order_code' => $value->order_code ])); ?>"  >#<?php echo e($value->order_code); ?></a></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($value->created_at)->format('j F Y h:i:s A')); ?></td>
                                                <td><?php echo e($value->status); ?></td>
                                                <td>&#8377;<?php echo e($value->total_amount); ?></td>
                                                <td><a href="<?php echo e(route('UserviewOrder',['order_code' => $value->order_code ])); ?>"  ><i class="fa fa-eye" aria-hidden="true" style="color:#ffc107"></i></a></td>
                                               
                                                <td> <a href="<?php echo e(route('generate-pdf',['order_code' =>$value->order_code ])); ?>" target="_blank"><i class="fa fa-print" aria-hidden="true" style="color:blue"></i></a></td>
                                                 <?php if($value->status == 'Pending' OR $value->status == 'Inprocess' ): ?>
                                                <td> <a href="<?php echo e(route('user-order-cancle',['order_code' =>$value->order_code ])); ?>" class="btn btn-danger btn-xs">cancle</a> </td>
                                                <?php endif; ?>
                                            </tr>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                                 <tr> 
                                                    <th><?php echo e($myOrders->links()); ?></th>
                                            
                                         </tr>
                                       
                                        </tbody>
                                            
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-3 mb-lg-0">
                                    <div class="card-header">
                                        <h3>Billing Address</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" id="userBillingAddress" action="<?php echo e(route('billing_address_update')); ?>">
                                            <?php echo e(csrf_field()); ?>


                                        <address>
                                            <div class="form-group mb-0">
                        <textarea rows="2" class="form-control"  id="address_1" name="address_1" placeholder="Address line 1"><?php echo e(Auth::user()->address_1); ?></textarea>
                    </div>
                                            <br>
                                           <div class="form-group mb-0">
                        <textarea rows="2" class="form-control" id="address_line_2"  name="address_line_2" placeholder="Address line 2"><?php echo e(Auth::user()->address_line_2); ?></textarea>
                    </div><br>
                                            <div class="form-group">
                        <div class="custom_select">
                            <select class="form-control" id="state" name="state">
                                <option value="">Select State</option>
                                <option value="Andhra Pradesh" <?php if(Auth::user()->state == "Andhra Pradesh"): ?> selected <?php endif; ?>>Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands" <?php if(Auth::user()->state == "Andaman and Nicobar Islands"): ?> selected <?php endif; ?>>Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh" <?php if(Auth::user()->state == "Arunachal Pradesh"): ?> selected <?php endif; ?>>Arunachal Pradesh</option>
<option value="Assam" <?php if(Auth::user()->state == "Assam"): ?> selected <?php endif; ?>>Assam</option>
<option value="Bihar" <?php if(Auth::user()->state == "Bihar"): ?> selected <?php endif; ?>>Bihar</option>
<option value="Chandigarh" <?php if(Auth::user()->state == "Chandigarh"): ?> selected <?php endif; ?>>Chandigarh</option>
<option value="Chhattisgarh" <?php if(Auth::user()->state == "Chhattisgarh"): ?> selected <?php endif; ?>>Chhattisgarh</option>
<option value="Dadar and Nagar Haveli" <?php if(Auth::user()->state == "Dadar and Nagar Haveli"): ?> selected <?php endif; ?>>Dadar and Nagar Haveli</option>
<option value="Daman and Diu" <?php if(Auth::user()->state == "Daman and Diu"): ?> selected <?php endif; ?>>Daman and Diu</option>
<option value="Delhi" <?php if(Auth::user()->state == "Delhi"): ?> selected <?php endif; ?>>Delhi</option>
<option value="Lakshadweep" <?php if(Auth::user()->state == "Lakshadweep"): ?> selected <?php endif; ?>>Lakshadweep</option>
<option value="Puducherry" <?php if(Auth::user()->state == "Puducherry"): ?> selected <?php endif; ?>>Puducherry</option>
<option value="Goa" <?php if(Auth::user()->state == "Goa"): ?> selected <?php endif; ?>>Goa</option>
<option value="Gujarat" <?php if(Auth::user()->state == "Gujarat"): ?> selected <?php endif; ?>>Gujarat</option>
<option value="Haryana" <?php if(Auth::user()->state == "Haryana"): ?> selected <?php endif; ?>>Haryana</option>
<option value="Himachal Pradesh" <?php if(Auth::user()->state == "Himachal Pradesh"): ?> selected <?php endif; ?>>Himachal Pradesh</option>
<option value="Jammu and Kashmir" <?php if(Auth::user()->state == "Jammu and Kashmir"): ?> selected <?php endif; ?>>Jammu and Kashmir</option>
<option value="Jharkhand" <?php if(Auth::user()->state == "Jharkhand"): ?> selected <?php endif; ?>>Jharkhand</option>
<option value="Karnataka" <?php if(Auth::user()->state == "Karnataka"): ?> selected <?php endif; ?>>Karnataka</option>
<option value="Kerala" <?php if(Auth::user()->state == "Kerala"): ?> selected <?php endif; ?>>Kerala</option>
<option value="Madhya Pradesh" <?php if(Auth::user()->state == "Madhya Pradesh"): ?> selected <?php endif; ?>>Madhya Pradesh</option>
<option value="Maharashtra" <?php if(Auth::user()->state == "Maharashtra"): ?> selected <?php endif; ?>>Maharashtra</option>
<option value="Manipur" <?php if(Auth::user()->state == "Manipur"): ?> selected <?php endif; ?>>Manipur</option>
<option value="Meghalaya" <?php if(Auth::user()->state == "Meghalaya"): ?> selected <?php endif; ?>>Meghalaya</option>
<option value="Mizoram" <?php if(Auth::user()->state == "Mizoram"): ?> selected <?php endif; ?>>Mizoram</option>
<option value="Nagaland" <?php if(Auth::user()->state == "Nagaland"): ?> selected <?php endif; ?>>Nagaland</option>
<option value="Odisha" <?php if(Auth::user()->state == "Nagaland"): ?> selected <?php endif; ?>>Odisha</option>
<option value="Punjab" <?php if(Auth::user()->state == "Punjab"): ?> selected <?php endif; ?>>Punjab</option>
<option value="Rajasthan" <?php if(Auth::user()->state == "Rajasthan"): ?> selected <?php endif; ?>>Rajasthan</option>
<option value="Sikkim" <?php if(Auth::user()->state == "Sikkim"): ?> selected <?php endif; ?>>Sikkim</option>
<option value="Tamil Nadu" <?php if(Auth::user()->state == "Tamil Nadu"): ?> selected <?php endif; ?>>Tamil Nadu</option>
<option value="Telangana" <?php if(Auth::user()->state == "Telangana"): ?> selected <?php endif; ?>>Telangana</option>
<option value="Tripura" <?php if(Auth::user()->state == "Tripura"): ?> selected <?php endif; ?>>Tripura</option>
<option value="Uttar Pradesh" <?php if(Auth::user()->state == "Uttar Pradesh"): ?> selected <?php endif; ?>>Uttar Pradesh</option>
<option value="Uttarakhand" <?php if(Auth::user()->state == "Uttarakhand"): ?> selected <?php endif; ?>>Uttarakhand</option>
<option value="West Bengal" <?php if(Auth::user()->state == "West Bengal"): ?> selected <?php endif; ?>">West Bengal</option>
                              
                            </select>
                        </div>
                    </div><br>
                                            <div class="form-group">
                        <input class="form-control"  type="text" id="city" name="city" value="<?php echo e(Auth::user()->city); ?>"  placeholder="City/Town">
                    </div> <br>
                        <div class="form-group">
                        <input class="form-control"  type="text" id="zip" value="<?php echo e(Auth::user()->Zip); ?>" name="zip"  placeholder="Enter Zip code">
                    </div> <br>
                                           
                                     </address>
                                       
                                        <button  type="submit" class="btn btn-fill-out">Update</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Account Details</h3>
                            </div>
                            <div class="card-body">
                               
                                <form method="post" name="UseraccountDetailsValidation" id="UseraccountDetailsValidation" action="<?php echo e(route('userProfileUpdate')); ?>">

                                    <?php echo e(csrf_field()); ?>


                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>First Name <span class="">*</span></label>
                                            <input  value="<?php echo e(Auth::user()->name); ?>" id="name" class="form-control" name="name" type="text">
                                         </div>
                                         <div class="form-group col-md-6">
                                            <label>Last Name <span class="">*</span></label>
                                            <input  value="<?php echo e(Auth::user()->last_name); ?>" id="last_name" class="form-control" name="last_name">
                                        </div>
                                       
                                        <div class="form-group col-md-12">
                                            <label>Email Address <span class="">*</span></label>
                                            <input  class="form-control" id="email" value="<?php echo e(Auth::user()->email); ?>" readonly="" name="email" type="email">
                                        </div>
                                       
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-fill-out" name="submit">Profile Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                           <div class="card">
                            <div class="card-header">
                                <h3>Change Password</h3>
                            </div>
                            <div class="card-body">
                               
                                <form method="post" name="enq" id="UserChangePasswordValidation" action="<?php echo e(route('updatePassword')); ?>">

                                    <?php echo e(csrf_field()); ?>

                                    <div class="row">
                                       
                                        <div class="form-group col-md-12">
                                            <label>Current Password <span class="">*</span></label>
                                            <input class="form-control" id="old_password" name="old_password" type="password">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>New Password <span class="">*</span></label>
                                            <input class="form-control" id="new_password" name="new_password" type="password">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Confirm Password <span class="">*</span></label>
                                            <input class="form-control" id="confirm_password" name="confirm_password" type="password">
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Change Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

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
                        <input type="text" ="" class="form-control rounded-0" placeholder="Enter Email Address">
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



<!-- Home Popup Section -->
<div class="modal fade subscribe_popup" id="showOrder" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
                <div class="row no-gutters">
                    <div class="col-sm-5">
                        <div class="background_bg h-100" data-img-src="assets/images/popup_img.jpg"></div>
                    </div>
                    <div class="col-sm-7">
                        <div class="popup_content">
                            <div class="popup-text">
                                <div class="heading_s1">
                                    <h4>Subscribe and Get 25% Discount!</h4>
                                </div>
                                <p>Subscribe to the newsletter to receive updates about new products.</p>
                            </div>
                            <form method="post">
                                <div class="form-group">
                                    <input name="email"  type="email" class="form-control rounded-0" placeholder="Enter Your Email">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-fill-line btn-block text-uppercase rounded-0" title="Subscribe" type="submit">Subscribe</button>
                                </div>
                            </form>
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                    <label class="form-check-label" for="exampleCheckbox3"><span>Don't show this popup again!</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Screen Load Popup Section --> 



<?php $__env->stopSection(); ?>


<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u980489449/domains/happiness.gifts/public_html/resources/views/user/dashboard/my_account.blade.php ENDPATH**/ ?>