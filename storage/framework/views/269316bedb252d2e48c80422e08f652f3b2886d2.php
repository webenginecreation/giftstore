

 <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                    <a href="<?php echo e(route('admin-dashboard')); ?>">
                    
                    <span class="logo-default" >Happiness.<small>gifts</small></span> </a>
                </div>
                <!-- logo end -->
				<ul class="nav navbar-nav navbar-left in">
					<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
				</ul>
                
                <!-- start mobile menu -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
               <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                    	<!-- start language menu -->
                       
                                              <!-- end notification dropdown -->
                        <!-- start message dropdown -->
 					
                        <!-- end message dropdown -->
 						<!-- start manage user dropdown -->
 						<li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                               
                                <span class="username username-hide-on-mobile"><?php echo e($siteConfig->store_name); ?> - Admin </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default animated jello">
                               
                                <li>
                                    <a href="<?php echo e(route('admin-logout')); ?>">
                                        <i class="icon-logout"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end manage user dropdown -->
                       
                    </ul>
                </div>
            </div>
        </div><?php /**PATH C:\xampp\htdocs\Shopping\resources\views/Admin/common/header.blade.php ENDPATH**/ ?>