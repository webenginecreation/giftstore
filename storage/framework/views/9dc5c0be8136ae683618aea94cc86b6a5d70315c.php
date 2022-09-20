
<?php $__env->startSection('title', $productDetails->name); ?>
<?php $__env->startSection('meta_keywords', $productDetails->meta_keyword); ?>
<?php $__env->startSection('meta_description', $productDetails->meta_description); ?>
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
                    <li class="breadcrumb-item"><a href="<?php echo e(route('getproducts',["category_id" =>  $productDetails->category->id])); ?>"><?php echo e($productDetails->category->category_name); ?></a></li>
                    <li class="breadcrumb-item active"><?php echo e($productDetails->name); ?></li>
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

            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
              <div class="product-image vertical_gallery">
                    <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-vertical="true" data-vertical-swiping="true" data-slides-to-show="5" data-slides-to-scroll="1" data-infinite="false">
                        <div class="item">
                            <a href="#" class="product_gallery_item active" data-image="<?php echo e(url('images')); ?>/<?php echo e($productDetails->images); ?>" data-zoom-image="<?php echo e(url('images')); ?>/<?php echo e($productDetails->images); ?>">
                                <img data-src="<?php echo e(url('images')); ?>/<?php echo e($productDetails->images); ?>" class="lazyload" alt="product_small_img1" />
                            </a>
                        </div>
                        <?php if(!empty($productDetails->images1)): ?>
                        <div class="item">
                             <a href="#" class="product_gallery_item active" data-image="<?php echo e(url('images')); ?>/<?php echo e($productDetails->images1); ?>" data-zoom-image="<?php echo e(url('images')); ?>/<?php echo e($productDetails->images1); ?>">
                                <img data-src="<?php echo e(url('images')); ?>/<?php echo e($productDetails->images1); ?>" class="lazyload" />
                            </a>
                        </div>
                        <?php endif; ?>
                         <?php if(!empty($productDetails->images2)): ?>
                        <div class="item">
                            <a href="#" class="product_gallery_item active" data-image="<?php echo e(url('images')); ?>/<?php echo e($productDetails->images2); ?>" data-zoom-image="<?php echo e(url('images')); ?>/<?php echo e($productDetails->images2); ?>">
                                <img data-src="<?php echo e(url('images')); ?>/<?php echo e($productDetails->images2); ?>" alt="product_small_img1"  class="lazyload"/>
                            </a>
                        </div>
                        <?php endif; ?>
                         <?php if(!empty($productDetails->images3)): ?>
                        <div class="item">
                             <a href="#" class="product_gallery_item active" data-image="<?php echo e(url('images')); ?>/<?php echo e($productDetails->images3); ?>" data-zoom-image="<?php echo e(url('images')); ?>/<?php echo e($productDetails->images3); ?>">
                                <img data-src="<?php echo e(url('images')); ?>/<?php echo e($productDetails->images3); ?>" alt="product_small_img1" class="lazyload"/>
                            </a>
                        </div>
                        <?php endif; ?>
                         <?php if(!empty($productDetails->images4)): ?>
                        <div class="item">
                            <a href="#" class="product_gallery_item active" data-image="<?php echo e(url('images')); ?>/<?php echo e($productDetails->images4); ?>" data-zoom-image="<?php echo e(url('images')); ?>/<?php echo e($productDetails->images4); ?>">
                                <img data-src="<?php echo e(url('images')); ?>/<?php echo e($productDetails->images4); ?>" alt="product_small_img1" class="lazyload"/>
                            </a>
                        </div>
                        <?php endif; ?>
                        
                    </div>
                    <div class="product_img_box">
                        <img id="product_img" src='<?php echo e(url('images')); ?>/<?php echo e($productDetails->images); ?>' data-zoom-image="<?php echo e(url('images')); ?>/<?php echo e($productDetails->images); ?>" alt="product_img1" />
                        <a href="#" class="product_img_zoom" title="Zoom">
                            <span class="linearicons-zoom-in"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="pr_detail">
                    <div class="product_description">
                        <h4 class="product_title"><a href="#"><?php echo e($productDetails->name); ?></a></h4>

                        <div class="product_price">
                           <?php if(auth()->guard()->check()): ?>
                                   <?php if(Auth::user()->user_type == "normal"): ?>
                                    
                                    <span class="price">&#8377;<?php echo e($productDetails->discount_price); ?></span>
                                    <del><?php echo e($siteConfig->currency); ?><?php echo e($productDetails->base_price); ?></del>
                                    <div class="on_sale">
                                        <span><?php  $sale =  ($productDetails->base_price - $productDetails->discount_price )/$productDetails->base_price; echo round($sale*100, 0);   ?> % Off</span>
                                   </div>
                                   <?php elseif(Auth::user()->user_type == "reseller"): ?>
                                   <span class="price">&#8377;<?php echo e($productDetails->reseller_price); ?></span>
                                   <?php elseif(Auth::user()->user_type == "wholeseller"): ?>
                                   <span class="price">&#8377;<?php echo e($productDetails->wholeseller_price); ?></span>
                                   <?php endif; ?>
                                   <?php endif; ?>
                                   <?php if(auth()->guard()->guest()): ?>
                                   <span class="price">&#8377;<?php echo e($productDetails->discount_price); ?></span>
                                   <del><?php echo e($siteConfig->currency); ?><?php echo e($productDetails->base_price); ?></del>
                                   <?php endif; ?>
                        </div>
                        <br>
                       <div class="pr_desc">
                            <p><?php echo e($productDetails->Short_details); ?></p>
                        </div>
                        <div class="product_sort_info">
                            <ul>
                                 <?php if(isset($productDetails->brand->brand_name)): ?>
     <li><i class="linearicons-shield-check"></i><b>Brand:</b> <a href="#"> <img src="<?php echo e(env('APP_URL')); ?>/brand_icon/<?php echo e($productDetails->brand->brand_icon); ?>" date-html="true" data-toggle="tooltip"   title="Trusted Brand"  style="height: 60px; width=auto;"  > | <b> <?php echo e($productDetails->brand->brand_name); ?></b></a> | <a href="javascript:void(0);" data-html="true" data-toggle="popover" title="<?php echo e($productDetails->brand->brand_name); ?>" data-content="<?php echo e($productDetails->brand->about_brand); ?>">More About <?php echo e($productDetails->brand->brand_name); ?> </a></li>
     
                       <?php endif; ?>
                                <li><i class="linearicons-shield-check"></i> Total Saving :<b><?php echo e($siteConfig->currency); ?> <?php echo $productDetails->base_price - $productDetails->discount_price;   ?> </b> </li>
                                <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                                <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>
                            </ul>
                        </div>
                        
                        <?php if(!empty($productDetails->size)): ?>

                       <div class="pr_switch_wrap">
                            <span class="switch_lable">Variant</span>
                            <div class="product_size_switch" >
                                <select name="ablsize" id="ablsize">
                                 <?php $__currentLoopData = explode(',', $productDetails->size); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                      <option value="<?php echo e($info); ?>"><?php echo e($info); ?></option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                             
                            
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <hr />
                    <div class="cart_extra">
                        <div class="cart-product-quantity">
                            <div class="quantity">
                                <input type="button" value="-" class="minus">
                                <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                <input type="button" value="+" class="plus">
                            </div>
                        </div>



                        <?php if($productDetails->stock_status == "1"): ?>
                        
                        <?php if(!empty($productDetails->product_link)): ?>
                        <div class="cart_btn">
                            <a href="<?php echo e($productDetails->product_link); ?>" class="btn btn-fill-out btn-addtocart" target="_blank" ><i class="icon-basket-loaded"></i>Buy Now</a>
                           
                        </div>
                        <?php elseif($productDetails->images_allowed == "Yes"): ?>
                         
                          <div class="cart_btn">
                            <button class="btn btn-line-fill btn-sm" data-toggle="modal" data-target="#personalize" type="button"  ><i class="fa fa-gift" aria-hidden="true"></i>PERSONALIZED ITEM</button>
                           
                        </div>
                        <?php elseif($productDetails->text_allowed == "Yes"): ?>

                         <div class="cart_btn">
                            <button class="btn btn-line-fill btn-sm" data-toggle="modal" data-target="#personalize" type="button"  ><i class="fa fa-gift" aria-hidden="true"></i>PERSONALIZED ITEM</button>
                           
                        </div>
                        <?php else: ?>
                            <div class="cart_btn">
                            <button class="btn btn-line-fill btn-sm btn-addtocart"  type="button" onclick="addToCart(<?php echo e($productDetails->id); ?>,1)" ><i class="fa fa-plus" aria-hidden="true"></i>ADD TO BAG</button>
                           
                        </div>
                        &nbsp;
                          <div class="cart_btn">
                            <button class="btn btn-line-fill btn-sm btn-addtocart"  type="button" onclick="addToWishlist()"><i class="fa fa-heart" aria-hidden="true" ></i>WISHLIST</button>
                           
                        </div>

                         <?php endif; ?>
                        <?php elseif($productDetails->stock_status == "0"): ?>
                        <div class="cart_btn">
                            <button class="btn btn-line-fill btn-sm btn-addtocart" type="button" disabled ><i class="icon-basket-loaded"></i>SOLD OUT</button>
                           
                        </div>
                        <?php endif; ?>
                        
                       
                    </div>
                    <hr />
                    <ul class="product-meta">
                        <li>SKU: <a href="#"><?php echo e($productDetails->sku); ?></a></li>
                        <li>Category: <a href="#"><?php echo e($productDetails->category->category_name); ?></a></li>
                        <li>Tags: <a href="#"><?php echo e($productDetails->tags); ?></a></li>
                       
                    </ul>
                    
                    <div class="product_share">
                        <span>Share:</span>
                        <ul class="social_icons">
                            <li><a href="#"   onclick="
    window.open(
      'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
      'facebook-share-dialog', 
      'width=626,height=436'); 
    return false;" ><i class="ion-social-facebook"></i></a></li>
                            <li  onclick="
    window.open(
      'https://twitter.com/intent/tweet?url=='+encodeURIComponent(location.href), 
      'twitter-share-dialog', 
      'width=626,height=436'); 
    return false;"><a href="#"><i class="ion-social-twitter"></i></a></li>

                            <li><a href="https://api.whatsapp.com/send?text=<?php echo e(Request::url()); ?>" target="_blank"><i class="icon ion-social-whatsapp"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="large_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="tab-style3">
					<ul class="nav nav-tabs" role="tablist">
                        <?php if(!empty($productDetails->details)): ?>
						<li class="nav-item">
							<a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                      	</li>
                        <?php endif; ?>

                        <?php if(!empty($productDetails->additional_info)): ?>

                            <li class="nav-item">
                            <a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Additional info</a>
                        </li>
                        <?php endif; ?>
                         <?php if(!empty($productDetails->specification)): ?>
                        <li class="nav-item">
                            <a class="nav-link" id="specification-tab" data-toggle="tab" href="#specification" role="tab" aria-controls="specification" aria-selected="false">specification</a>
                        </li>
                        <?php endif; ?>
                          <?php if(!empty($productDetails->youtube_url)): ?>
                        <li class="nav-item">
                            <a class="nav-link" id="youtube_url-tab" data-toggle="tab" href="#youtube_url" role="tab" aria-controls="youtube_url" aria-selected="false">youtube Url</a>
                        </li>
                        <?php endif; ?>


                       
                      
                      	
                    </ul>
                	<div class="tab-content shop_info_tab">
                      	<div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                        	<p><?php echo $productDetails->details; ?><p>
                      	</div>
                        <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">

                            <p><?php echo $productDetails->additional_info; ?><p>
                            
                        </div>
                         <div class="tab-pane fade" id="specification" role="tabpanel" aria-labelledby="specification-tab">

                            <p><?php echo $productDetails->specification; ?><p>
                            
                        </div>

                         <div class="tab-pane fade" id="youtube_url" role="tabpanel" aria-labelledby="youtube_url-tab">

                            <p><?php echo $productDetails->youtube_url; ?><p>
                            
                        </div>

                      
                	</div>


                  
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="small_divider"></div>
            	<div class="divider"></div>
                <div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="heading_s1">
                	<h3>Releted Products</h3>
                </div>
            	<div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                    
                    <?php $__currentLoopData = $getRelatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                	<div class="item">
                        <div class="product">
                            <div class="product_img">
                                <a href="<?php echo e(route('products.details',$value->slug)); ?>">
                                    <img data-src="<?php echo e(url('images')); ?>/<?php echo e($value->images); ?>" class="lazyload" alt="product_img1">
                                </a>
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                       <li><a href="#"><i class="icon-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="<?php echo e(route('products.details',$value->slug)); ?>"><?php echo e($value->name); ?></a></h6>
                                <div class="product_price">
                                    <span class="price"><?php echo e($siteConfig->currency); ?><?php echo e($value->discount_price); ?></span>
                                   
                                    <div class="on_sale">
                                        <span><?php echo e($siteConfig->currency); ?><?php  $sale =  ($value->base_price - $value->discount_price )/$value->base_price; echo round($sale*100, 0);   ?> % Off</span>
                                    </div>
                                </div>
                                
                              
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<!-- Home Popup Section -->
<div class="modal fade subscribe_popup" id="personalize" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
                <div class="row no-gutters">
                    <div class="col-sm-5">
                        <div class="background_bg h-100 lazyload" data-img-src="<?php echo e(url('images')); ?>/<?php echo e($productDetails->images); ?>"></div>
                    </div>
                    <div class="col-sm-7">
                        <div class="popup_content">
                            <div class="popup-text">
                                <div class="heading_s1">
                                    <h4>Personalize Your Product</h4>
                                </div>
                                
                            </div>

                            <?php if($productDetails->images_allowed == "Yes"): ?>

                            <form method="post" action="<?php echo e(route('order.upload')); ?>"  enctype="multipart/form-data" 
                  class="dropzone" id="dropzone" >
                                    <?php echo csrf_field(); ?>
                                        </form> 

                            <?php endif; ?>

                              <br>

                            <?php if($productDetails->text_allowed == "Yes"): ?>
                               <div class="form-group">
                                    <input name="text" required="" id="customtext" required type="text" class="form-control rounded-0" placeholder="Enter Your Text">
                                    <small> *Please Provide Required Text/Photo For Your Order </small>
                                </div>
                             <?php endif; ?>
                             
                             
                               <div class="form-group">
                                    <button class="btn btn-fill-line btn-block text-uppercase rounded-0" id="personalizeValidation" title="Subscribe" onclick="return valda();" type="button"  data-dismiss="modal" aria-label="Close">Add To Bag</button>
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
<?php $__env->startPush('extra-script'); ?>
<script>

function valda()
{
  //Attempt to get the element using document.getElementById
    var element1 = document.getElementById("dropzone");
    //alert(element1.value);
    //var count =   dropzone.files.length;
    //alert(count);
    var element2 = document.getElementById("customtext");
    //If it isn't "undefined" and it isn't "null", then it exists.
    if(typeof(element1) != 'undefined' && element1 != null){
       if(element1.value === '' )
            {
                 alert('Please Add Photo');
                 return false;
            }
            
    } 
    if(typeof(element2) != 'undefined' && element2 != null){
       
            if(element2.value === '')
            {
                 alert('We Need Custom Text');
                 return false;
            }
    }
    addToCart(<?php echo e($productDetails->id); ?>,1);
     
    
    
}
    
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u980489449/domains/happiness.gifts/public_html/resources/views/user/details.blade.php ENDPATH**/ ?>