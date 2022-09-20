<!-- START SECTION BANNER -->



<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
        <div class="carousel-inner">

            <?php $__currentLoopData = $Banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?> background_bg" data-img-src="<?php echo e(url('slider_image')); ?>/<?php echo e($value->slider_image); ?>">

                <?php if($value->slider_text == 1): ?>
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-7 col-9">
                                <div class="banner_content overflow-hidden">
                                	<h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s"><?php echo e($value->title_1); ?></h5>
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s"><?php echo e($value->title_2); ?></h2>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="<?php echo e($value->banner_link); ?>" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- END SECTION BANNER --><?php /**PATH C:\xampp\htdocs\happiness\resources\views/user/common/banner.blade.php ENDPATH**/ ?>