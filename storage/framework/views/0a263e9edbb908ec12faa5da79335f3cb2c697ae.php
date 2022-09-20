<div class="sidebar-container">
 				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
	                <div id="remove-scroll">
	                    <ul class="sidemenu  page-header-fixed sidemenu-hover-submenu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
	                        <li class="sidebar-toggler-wrapper hide">
	                            <div class="sidebar-toggler">
	                                <span></span>
	                            </div>
	                        </li>

	                          <li class="sidebar-user-panel">
	                            <div class="user-panel">
	                                <div class="">
	                                   <img src="<?php echo e(url('images')); ?>/<?php echo e($siteConfig->logo); ?>">
	                                </div>
	                               
	                            </div>
	                        </li>
	                        <li class="nav-item ">
	                                    <a href="<?php echo e(route('admin-dashboard')); ?>" class="nav-link ">
	                                         <i class="fa fa-tachometer" aria-hidden="true"></i>
	                                        <span class="title">Dashboard</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>

	                                 <li class="nav-item start">
	                            <a href="javascript:void();" class="nav-link nav-toggle">
	                                <i class="material-icons">dashboard</i>
	                                <span class="title">CMS</span>
                                	<span class="selected"></span>
                                	<span class="arrow open"></span>
	                            </a>
	                            <ul class="sub-menu">
	                            	<li class="nav-item ">
	                                    <a href="<?php echo e(route('add-sliders')); ?>" class="nav-link ">
	                                        <span class="title">Main Banners</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>


	                                <li class="nav-item ">
	                                    <a href="<?php echo e(route('customize.template')); ?>" class="nav-link ">
	                                        <span class="title">Customize Theme</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>

	                                 <li class="nav-item ">
	                                    <a href="" class="nav-link ">
	                                        <span class="title">Pages</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>


	                                
	                                
	                               
	                            </ul>
	                        </li>
	                      
	                       
                           <li class="nav-item start">
	                            <a href="#" class="nav-link nav-toggle">
	                                <i class="material-icons">store</i>
	                                <span class="title">Ecommerce</span>
                                	<span class="selected"></span>
                                	<span class="arrow open"></span>
	                            </a>
	                            <ul class="sub-menu">

	                            	<li class="nav-item ">
	                                    <a href="<?php echo e(route('brand.index')); ?>" class="nav-link ">
	                                        <span class="title">Brand Management</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                                
	                            	<li class="nav-item ">
	                                    <a href="<?php echo e(url('admin/category')); ?>" class="nav-link ">
	                                        <span class="title">Categories Management</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                                
	                                
	                                <li class="nav-item ">
	                                    <a href="<?php echo e(url('admin/addproduct')); ?>" class="nav-link ">
	                                        <span class="title">Add Products</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                                
	                                 <li class="nav-item ">
	                                    <a href="<?php echo e(route('show.products')); ?>" class="nav-link ">
	                                        <span class="title">All Products List</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                                
	                                
	                               
	                            </ul>
	                        </li>
	                        
	                        <li class="nav-item start">
	                            <a href="#" class="nav-link nav-toggle">
	                                <i class="material-icons">shopping_cart</i>
	                                <span class="title">Orders</span>
                                	<span class="selected"></span>
                                	<span class="arrow open"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                
	                                <li class="nav-item ">
	                                    <a href="<?php echo e(route('today-orders')); ?>" class="nav-link ">
	                                        <span class="title">Today's Orders</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                            	<li class="nav-item ">
	                                    <a href="<?php echo e(route('admin-orders')); ?>" class="nav-link ">
	                                        <span class="title">All Order History</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                                
	                                
	                                
	                            </ul>
	                        </li>
	                        
	                       <li class="nav-item start">
	                            <a href="#" class="nav-link nav-toggle">
	                               <i class="fa fa-bullhorn" aria-hidden="true"></i>
	                                <span class="title">Promotions</span>
                                	<span class="selected"></span>
                                	<span class="arrow open"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                
	                                <li class="nav-item ">
	                                    <a href="<?php echo e(route('create.offers')); ?>" class="nav-link ">
	                                        <span class="title">Create Offers</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                                
	                                <li class="nav-item ">
	                                    <a href="<?php echo e(route('offers.products')); ?>" class="nav-link ">
	                                        <span class="title">Add Products Offers</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                            	
	                            	
	                                
	                                
	                                
	                            </ul>
	                        </li>

	                          <li class="nav-item start">
	                            <a href="#" class="nav-link nav-toggle">
	                                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
	                                <span class="title">Blogs</span>
                                	<span class="selected"></span>
                                	<span class="arrow open"></span>
	                            </a>
	                            <ul class="sub-menu">
	                            	<li class="nav-item ">
	                                    <a href="<?php echo e(route('blog-category.index')); ?>" class="nav-link ">
	                                        <span class="title">Blogs Categories</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                                <li class="nav-item ">
	                                    <a href="<?php echo e(route('blog.index')); ?>" class="nav-link ">
	                                        <span class="title">Manage Blogs</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                                
	                               
	                            </ul>
	                        </li>


	                        <li class="nav-item ">
	                                    <a href="" class="nav-link nav-toggle">
	                                        <i class="fa fa-bar-chart-o"></i>
	                                        <span class="title">Sales Reports</span>
	                                        <span class="selected"></span>
	                                        <span class="arrow open"></span>
	                                    </a>

	                                    <ul class="sub-menu">
	                                
	                                <li class="nav-item ">
	                                    <a href="<?php echo e(route('dailyCollection')); ?>" class="nav-link ">
	                                        <span class="title">Daily Report</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                            	<li class="nav-item ">
	                                    <a href="<?php echo e(route('datewiseReport')); ?>" class="nav-link ">
	                                        <span class="title">DateWise Report</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                                
	                                
	                                
	                            </ul>
	                                </li>

	                                   <li class="nav-item ">
	                                    <a href="<?php echo e(route('inventory.index')); ?>" class="nav-link ">
	                                         <i class="material-icons">info</i>
	                                        <span class="title">Inventory</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                                
	                                
	                                    <li class="nav-item ">
	                                    <a href="<?php echo e(route('admin-customers')); ?>" class="nav-link ">
	                                         <i class="material-icons f-left">people</i>
	                                        <span class="title">Customers</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                                
	                                    <li class="nav-item ">
	                                    <a href="<?php echo e(route('site.settings')); ?>" class="nav-link ">
	                                         <i class="material-icons">settings</i>
	                                        <span class="title">Site Settings</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                                
	                                <li class="nav-item ">
	                                    <a href="<?php echo e(route('adminProfile')); ?>" class="nav-link ">
	                                         <i class="material-icons">account_circle</i>
	                                        <span class="title">Profile Setting</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                                
	                                 <li class="nav-item ">
	                                    <a href="" class="nav-link ">
	                                         <i class="material-icons">power_settings_new</i>
	                                        <span class="title">Logout</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                                
	                             



	                       
	                    </ul>
	                </div>
                </div>
            </div><?php /**PATH /home/u980489449/domains/happiness.gifts/public_html/resources/views/Admin/common/sidebar.blade.php ENDPATH**/ ?>