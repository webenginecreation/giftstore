
<?php $__env->startSection('main-section'); ?>

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
                    <li class="breadcrumb-item"><a href="<?php echo e(route('show.cart')); ?>">Cart</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

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
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
    <div class="container">
      
       
        <div class="row">
            <div class="col-md-6">
                <div class="heading_s1">
                    <h4>Billing Details</h4>
                </div>
                <form method="post" id="userCheckout" action="<?php echo e(route('save-order')); ?>">
                    <?php $order_id = "ORD".rand(1,9999);  ?>
                    <input type="hidden" name="order_id" value="<?php echo e($order_id); ?>" id="order_id" >
                    <?php echo e(csrf_field()); ?>

                    <div class="payment_method">
                        <div class="heading_s1">
                            <h4>Shipping Option</h4>
                        </div>
                        <div class="payment_option">
                            <div class="custome-radio">
                                <input class="form-check-input"  type="radio" name="shipping_method" id="exampleRadios3"  value="0" checked="" onclick="shippingMethodChages(this.value)">
                                <label class="form-check-label" for="exampleRadios3">SELF PICKUP</label>
                                
                            </div>
                            <div class="custome-radio">
                                <input class="form-check-input" type="radio" name="shipping_method" id="exampleRadios4" value="1" onclick="shippingMethodChages(this.value)">
                                <label class="form-check-label" for="exampleRadios4">SHIPPING ON ADDRESS</label>
                                </div>
                            
                        </div>
                        </div>
                    <div class="form-group">
                        <input type="text"  class="form-control" id="order_name" name="order_name" <?php if(Auth::check()): ?> ? value='<?php echo e(Auth::user()->name); ?>' : '' <?php endif; ?>   placeholder="First name *">
                    </div>
                    <div class="form-group">
                        <input type="text"  class="form-control" id="order_lastname"  name="order_lastname" placeholder="Last name *" <?php if(Auth::check()): ?> ? value='<?php echo e(Auth::user()->last_name); ?>' : '' <?php endif; ?>>
                    </div>
                   
                    
                    <div class="form-group">
                        <input type="text" class="form-control" id="order_address" name="order_address"  placeholder="Address *"  <?php if(Auth::check()): ?> ? value='<?php echo e(Auth::user()->address_1); ?>' : '' <?php endif; ?>>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="order_address2" name="order_address2"  placeholder="Address line2"  <?php if(Auth::check()): ?> ? value='<?php echo e(Auth::user()->address_line_2); ?>' : '' <?php endif; ?>>
                    </div>
                    <div class="form-group">
                        <div class="custom_select">
                            <select class="form-control" id="state" name="state">
                                <option value="">Select State</option>
                               <option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="city"  <?php if(Auth::check()): ?> ? value='<?php echo e(Auth::user()->city); ?>' : '' <?php endif; ?>  type="text" name="city" placeholder="City / Town *">
                    </div>
                   
                    <div class="form-group">
                        <input class="form-control"  <?php if(Auth::check()): ?> ? value='<?php echo e(Auth::user()->Zip); ?>' : '' <?php endif; ?>  id="order_zip" type="text" name="order_zip" placeholder="Postcode / ZIP *">
                    </div>
                    <div class="form-group">
                        <input class="form-control"  id="order_phone" type="text" name="order_phone" <?php if(Auth::check()): ?> ? value='<?php echo e(Auth::user()->mobile); ?>' : '' <?php endif; ?> placeholder="Phone *">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="order_email" type="text" name="order_email" <?php if(Auth::check()): ?> ? value='<?php echo e(Auth::user()->email); ?>' : '' <?php endif; ?> readonly placeholder="Email address *">
                    </div>
                   
                 
                    
                   
                    <div class="heading_s1">
                        <h4>Additional information</h4>
                    </div>
                    <div class="form-group mb-0">
                        <textarea rows="5" class="form-control" id="order_notes" name="order_notes" placeholder="Order notes"></textarea>
                    </div>
               
            </div>
            <div class="col-md-6">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4>Your Order</h4>
                    </div>
                    <div class="table-responsive order_table">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th>Variant</th>
                                    <th>Product</th>
                                    
                                    <th colspan="2">Total</th>
                                </tr>
                            </thead>
                            <tbody>
    
                                <?php $total = 0;
                                      $shipping_total = 0;
                                ?>
                                <?php if(session('cart')): ?>
                                <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              
                                <?php $total += $details['price'] * $details['quantity'] ?>
                                <?php $shipping_total += $details['shipping_charges']* $details['quantity'];  ?>
                                <tr>
                                     <td>  <?php echo e((!empty($details['size']))?$details['size']:'N.A'); ?></td>
                                    <td><?php echo e($details['name']); ?> <span class="product-qty">x <?php echo e($details['quantity']); ?></span></td>
                                    
                                    <td><?php echo e($siteConfig->currency); ?><?php echo e($details['price'] *  $details['quantity']); ?></td>
                                    
                                    


                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                             
                            </tbody>
                            <tfoot>
                                <tr>
                                    <tH></tH>
                                    <th>SubTotal</th>
                                    <td class="product-subtotal"><?php echo e($siteConfig->currency); ?><?php echo e($total); ?></td>
                                </tr>
                                <tr>
                                    <tH></tH>
                                    <th>Shipping</th>
                                    <td id="shippingCharges"></td>
                                </tr>
                                <tr>
                                    <tH></tH>
                                    <th>Total<span style="color: red">(*Including All taxes*)</span></th>
                                    <td class="product-subtotal" id="cartTotal"></td>
                                </tr>
                            </tfoot>
                            <?php endif; ?>
                        </table>
                    </div>
                    <input type="hidden" name="total_amount" id="total_amount" >
                    <div class="row">
                        
                       
                        <div class="col-md-12">
                            <button type="submit"  class="btn btn-fill-out btn-block" formaction="<?php echo e(url('/payment-initiate-request')); ?>"><i class="fa fa-credit-card" aria-hidden="true"></i>PAY ONLINE</button>
                        </div>
                    </div>
                    
                    
                    </form>
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

<?php $__env->stopSection(); ?>
<?php $__env->startPush('extra-script'); ?>
<script>
$(document).ready(function(){
    //Default Shipping
     $('#shippingCharges').html("<p> Free Shipping </p>");
     $('#cartTotal').html("<p><?php echo e($siteConfig->currency); ?><?php echo e($total); ?> </p>");
     $('#total_amount').val(<?php echo e($total); ?>);
     $('#order_address').val("<?php echo e($siteConfig->address); ?>").prop('readonly',true);
     $('#order_address2').val("<?php echo e($siteConfig->address_2); ?>").prop('readonly',true);
     $('#city').val("<?php echo e($siteConfig->city); ?>").prop('readonly',true);
     $('#state').val("<?php echo e($siteConfig->state); ?>").prop('readonly',true);
     $('#order_zip').val("390002").prop('readonly',true);
     

});

function  shippingMethodChages(value)
{
    if(value == 0)
    {
        $('#shippingCharges').html("<p> Free Shipping </p>");
        $('#cartTotal').html("<p><?php echo e($siteConfig->currency); ?><?php echo e($total); ?> </p>");
         $('#total_amount').val(<?php echo e($total); ?>);
           $('#order_address').val("<?php echo e($siteConfig->address); ?>").prop('readonly',true);
        $('#order_address2').val("<?php echo e($siteConfig->address_2); ?>").prop('readonly',true);
        $('#city').val("<?php echo e($siteConfig->city); ?>").prop('readonly',true);
        $('#state').val("<?php echo e($siteConfig->state); ?>").prop('readonly',true);
        $('#order_zip').val("390002").prop('readonly',true);
    }
    else if(value == 1)
    {
        $('#shippingCharges').html("<p> <?php echo e($siteConfig->currency); ?><?php echo e($shipping_total); ?> </p>");
        $('#cartTotal').html("<p> <?php echo e($siteConfig->currency); ?><?php echo e($shipping_total+$total); ?> </p>");
        $('#total_amount').val(<?php echo e($shipping_total+$total); ?>);
        $('#order_address').val("<?php echo e(Auth::user()->address_1); ?>").prop('readonly',false);
        $('#order_address2').val("<?php echo e(Auth::user()->address_line_2); ?>").prop('readonly',false);
        $('#city').val("<?php echo e(Auth::user()->city); ?>").prop('readonly',false);
        $('#state').val("<?php echo e(Auth::user()->state); ?>").prop('readonly',false);
        $('#order_zip').val("<?php echo e(Auth::user()->Zip); ?>").prop('readonly',false);
    }
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u980489449/domains/happiness.gifts/public_html/resources/views/user/checkout.blade.php ENDPATH**/ ?>