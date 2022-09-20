
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
                    <li class="breadcrumb-item active">Prodcuts</li>
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
			<div class="col-lg-9">
            	<div class="row align-items-center mb-4 pb-1">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="product_header_left">
                               
                            </div>
                            <div class="product_header_right">
                            	<div class="products_view">
                                    <a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                    <a href="javascript:Void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row shop_container">
                   
                    <?php $__currentLoopData = $allproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-md-4 col-6">
                        <div class="product">
                             <span class="pr_flash"><?php  $sale =  ($value->base_price - $value->discount_price )/$value->base_price; echo round($sale*100, 0);   ?> % Off </span>
                            

                           
                            <div class="product_img">
                                <a href="<?php echo e(route('products.details',$value->slug)); ?>">
                                    <img  data-src="<?php echo e(url('images')); ?>/<?php echo e($value->images); ?>" class="lazyload" alt="<?php echo e($value->name); ?>">
                                </a>
                                
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        

                                         <?php if(empty($value->product_link)): ?> 
                                          <?php if($value->stock_status == "1"): ?>
                                          


                                                <?php if($value->images_allowed == "Yes" || $value->text_allowed == "Yes"): ?>

                                               

                                                  <li class="add-to-cart"><a href="<?php echo e(route('products.details',$value->slug)); ?>"><i class="icon-basket-loaded" ></i> Personalize item </a></li>
                                                
                                                <?php else: ?>

                                                <li class="add-to-cart" onclick="addToCart(<?php echo e($value->id); ?>,1)"><a href="javascript:void(0);"><i class="icon-basket-loaded" ></i> Add To Cart</a></li>


                                                <?php endif; ?>



                                          <?php elseif($value->stock_status == "0"): ?>
                                             <li class="add-to-cart"><a href="javascript:void(0);"><i class="icon-basket-loaded"></i> Add To Bag</a></li>


                                          <?php endif; ?>
                               <?php else: ?>
                             <li class="add-to-cart">
                                <a href="<?php echo e($value->product_link); ?>" target="_blank">
                                <i class="icon-basket-loaded"></i> 
                                Add To Cart
                                </a>
                            </li>
                                     <?php endif; ?>

                                      <?php if(auth()->guard()->check()): ?>
                                     <li><a href="javascript:void(0);" onclick="addWishlist(<?php echo e($value->id); ?>,<?php echo e(Auth::user()->id); ?>)"><i class="icon-heart"></i></a></li>
                                    <?php endif; ?>

                                    <?php if(auth()->guard()->guest()): ?>
                                       
                                        <li><a href="javascript:void(0);"><i class="icon-heart" onclick="addToWishlist()"></i></a></li>
                                    <?php endif; ?>
                                         <li><a href="<?php echo e(route('products.details',$value->slug)); ?>"><i class="icon-eye"></i></a></li>
                                       
                                    </ul>

                                </div>
                                
                            </div>
                            
                            
                            
                            
                            <div class="product_info">
                                <h6 class="product_title"><a href="<?php echo e(route('products.details',$value->slug)); ?>"><?php echo e($value->name); ?></a></h6>
                                <div class="product_price">
                                  <?php if(auth()->guard()->check()): ?>
                                   <?php if(Auth::user()->user_type == "normal"): ?>
                                    
                                    <span class="price">&#8377;<?php echo e($value->discount_price); ?></span>
                                    <del><?php echo e($siteConfig->currency); ?><?php echo e($value->base_price); ?></del>
                                    <div class="on_sale">
                                        <span><?php  $sale =  ($value->base_price - $value->discount_price )/$value->base_price; echo round($sale*100, 0);   ?> % Off</span>
                                   </div>
                                   <?php elseif(Auth::user()->user_type == "reseller"): ?>
                                   <span class="price">&#8377;<?php echo e($value->reseller_price); ?></span>
                                   <?php elseif(Auth::user()->user_type == "wholeseller"): ?>
                                   <span class="price">&#8377;<?php echo e($value->wholeseller_price); ?></span>
                                   <?php endif; ?>
                                   <?php endif; ?>
                                   <?php if(auth()->guard()->guest()): ?>
                                   <span class="price">&#8377;<?php echo e($value->discount_price); ?></span>
                                   <del><?php echo e($siteConfig->currency); ?><?php echo e($value->base_price); ?></del>
                                  
                                   <?php endif; ?>
                                    


                                </div>
                               
                                <div class="pr_desc">
                                    <p><?php echo e($value->Short_details); ?></p>
                                </div>
                               
                                <div class="list_product_action_box">
                                    <ul class="list_none pr_action_btn">

                                         <?php if(empty($value->product_link)): ?> 


                                            <?php if($value->stock_status == "1"): ?> 



                                                <?php if($value->images_allowed == "Yes" || $value->text_allowed == "Yes"): ?>

                                               

                                                  <li class="add-to-cart "><a href="<?php echo e(route('products.details',$value->slug)); ?>" class="btn-sm"><i class="icon-basket-loaded" ></i> Personalize item </a></li>
                                                
                                                <?php else: ?>

                                                <li class="add-to-cart" onclick="addToCart(<?php echo e($value->id); ?>,1)"><a href="javascript:void(0);" class="btn-sm"><i class="icon-basket-loaded" ></i> ADD TO BAG</a></li>


                                                <?php endif; ?>




                                      

                                       <?php elseif($value->stock_status == "0"): ?>
                                             <li class="add-to-cart"><a href="javascript:void(0);" class="btn-sm"><i class="icon-basket-loaded" ></i> SOLD OUT</a></li>
                                            <?php endif; ?>

                                         <?php else: ?>
                                          <li class="add-to-cart">
                                <a href="<?php echo e($value->product_link); ?>" target="_blank">
                                <i class="icon-basket-loaded"></i> 
                                Buy Now
                                </a>
                            </li>

                                     <?php endif; ?>
                                      
                                        <?php if(auth()->guard()->check()): ?>
                                     <li><a href="javascript:void(0);" onclick="addWishlist(<?php echo e($value->id); ?>,<?php echo e(Auth::user()->id); ?>)" class="btn-sm"><i class="icon-heart"></i></a></li>
                                    <?php endif; ?>

                                    <?php if(auth()->guard()->guest()): ?>
                                       
                                        <li><a href="javascript:void(0);" class="btn-sm"><i class="icon-heart" onclick="addToWishlist()"></i></a></li>
                                    <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                  
                </div>
        		<div class="row">
                    <div class="col-12">
                        <ul class="pagination mt-3 justify-content-center pagination_style1">
                            
                            <?php echo e($allproducts->links()); ?>

                            
                        </ul>
                    </div>
                </div>
        	</div>
            <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
            	<div class="sidebar">
                	<div class="widget">
                        <h5 class="widget_title">VARIETIES</h5>
                        <ul class="widget_categories">
                            <li><a href="<?php echo e(route('getproducts')); ?>"><span class="categories_name">All Products</span></a></li>
                            <?php $__currentLoopData = $headerCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('getproducts',["category_id" => $value->id])); ?>"><span class="categories_name"><?php echo e($value->category_name); ?></span></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                      <div class="widget">
                        <h5 class="widget_title">Recent Posts</h5>
                        <ul class="widget_recent_post">

                             <?php $__currentLoopData = $recentPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="post_footer">
                                    <div class="post_img">
                                        <a href="<?php echo e(route('blog.details',["slug" => $value->blog_slug])); ?>"><img src="<?php echo e(url('blogimg')); ?>/<?php echo e($value->blog_images); ?>" alt="letest_post1"></a>
                                    </div>
                                    <div class="post_content">
                                        <h6><a href="<?php echo e(route('blog.details',["slug" => $value->blog_slug])); ?>"><?php echo e($value->blog_title); ?></a></h6>
                                        <p class="small m-0"><?php echo e($value->created_at->diffForHumans()); ?></p>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                        </ul>
                    </div>
                   
                    <div class="widget">
                        <div class="shop_banner">
                            <div class="banner_img overlay_bg_20">
                                <img data-src="https://img.freepik.com/free-vector/digital-marketing-infographic_52683-9003.jpg?size=338&ext=jpg" alt="sidebar_banner_img" class="lazyload">
                            </div> 
                            <div class="shop_bn_content2 text_white">
                                <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                                <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                                <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
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
<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\happiness\resources\views/user/products.blade.php ENDPATH**/ ?>