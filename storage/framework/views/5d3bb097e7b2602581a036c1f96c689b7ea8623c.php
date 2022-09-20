
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
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Wishlist</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive wishlist_table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-stock-status">Stock Status</th>
                                <th class="product-add-to-cart"></th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php $total = 0 ?>
                               <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="product-thumbnail"><a href="#"><img src="<?php echo e(url('images')); ?>/<?php echo e($value->images); ?>" alt="product1"></a></td>
                                <td class="product-name" data-title="Product"><a href="#"><?php echo e($value->name); ?></a></td>
                            <td class="product-price" data-title="Price"><?php echo e($siteConfig->currency); ?><?php echo e($value->discount_price); ?></td>
                                 <?php if($value->stock_status == 1): ?>   
                                <td class="product-stock-status" data-title="Stock Status"><span class="badge badge-pill badge-success">In Stock</span></td>

                                


                                 <?php if(!empty($value->product_link)): ?>

                                   <td class="product-add-to-cart"><a href="<?php echo e($value->product_link); ?>" target="_blank" class="btn btn-sm btn-fill-out"><i class="icon-basket-loaded"></i> Buy Now</a></td>

                                   <?php else: ?>

                                     <td class="product-add-to-cart"><a href="javascript:void(0);" class="btn btn-sm btn-fill-out" onclick="addToCart(<?php echo e($value->id); ?>,1)"><i class="icon-basket-loaded"></i> Add to Bag</a></td>

                                 <?php endif; ?>

                                <?php else: ?>
                                <td class="product-stock-status" data-title="Stock Status"><span class="badge badge-pill badge-danger">Out of Stock</span></td>


                                   <td class="product-add-to-cart"><a href="#" class="btn btn-fill-out"><i class="icon-basket-loaded"></i>Sold Out</a></td>



                                <?php endif; ?>


                              

                                <td class="product-remove" data-title="Remove"><a href="<?php echo e(route('remove-to-wishlist',['id' => $value->wishlist_id])); ?>"><i class="ti-close"></i></a></td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                        </tbody>
                    </table>
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
                        <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
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


<?php $__env->stopSection(); ?>


<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u980489449/domains/happiness.gifts/public_html/resources/views/user/wishlists.blade.php ENDPATH**/ ?>