
<?php $__env->startSection('title', $getBlogsWithCategory->blog_title); ?>
<?php $__env->startSection('meta_keywords', $getBlogsWithCategory->meta_keyword); ?>
<?php $__env->startSection('meta_description', $getBlogsWithCategory->meta_description); ?>
<?php $__env->startSection('main-section'); ?> 

<!-- START MAIN CONTENT -->
<div class="main_content">
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
                    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('userblog.index')); ?>">All Blog</a></li>
                    <li class="breadcrumb-item active"><?php echo e($getBlogsWithCategory->blog_title); ?></li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-xl-9">
                <div class="single_post">
                    <h2 class="blog_title"><?php echo e($getBlogsWithCategory->blog_title); ?></h2>
                    <ul class="list_none blog_meta">
                        <li><a href="#"><i class="ti-calendar"></i><?php echo e($getBlogsWithCategory->created_at->diffForHumans()); ?></a></li>
                        
                    </ul>
                    <div class="blog_img">
                        <img src="<?php echo e(url('blogimg')); ?>/<?php echo e($getBlogsWithCategory->blog_images); ?>" alt="blog_img1">
                    </div>
                    <div class="blog_content">
                        <div class="blog_text">
                            <p><?php echo $getBlogsWithCategory->blog_details; ?></p>
                            
                           
                            
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-3 order-xl-first mt-4 pt-2 mt-xl-0 pt-xl-0">
                <div class="sidebar">
                    <div class="widget">
                        <div class="search_form">
                            <form> 
                                <input required="" class="form-control" placeholder="Search..." type="text">
                                <button type="submit" title="Subscribe" class="btn icon_search" name="submit" value="Submit">
                                    <i class="ion-ios-search-strong"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="widget">
                        <h5 class="widget_title">Blogs Category</h5>
                        <ul class="widget_archive">
                            <li><a href="<?php echo e(route('userblog.index')); ?>"><span class="archive_year">All Blogs</span></a></li>
                       <?php $__currentLoopData = $blogCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('blog.category',["id" => $value->id])); ?>"><span class="archive_year"><?php echo e($value->blog_category_name); ?></span></a></li>
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
                                <img src="https://img.freepik.com/free-vector/digital-marketing-infographic_52683-9003.jpg?size=338&ext=jpg">
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
</div>

<!-- END MAIN CONTENT -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u980489449/domains/happiness.gifts/public_html/resources/views/user/blogs/details.blade.php ENDPATH**/ ?>