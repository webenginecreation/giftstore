
<?php $__env->startPush('css'); ?>
<link href="<?php echo e(url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css"/>
<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
<style type="text/css">
    label{
        font-weight: bold;
    }
    label.error {
        color: red;
        font-size: 1rem;
        display: block;
        margin-top: 5px;
    }
    input.error { border-left: 4px solid #f00; }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main-section'); ?>
<div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Profile Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo e(route('admin-dashboard')); ?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Profile</li>
                            </ol>
                        </div>
                    </div>
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                
                                <div class="card-body " id="bar-parent">
                                    <form method="POST" id="adminProfileValidation" action="<?php echo e(route('change.password')); ?>" > <?php echo csrf_field(); ?>     
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card-head">
                                                        <header> Admin Change Password</header>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Admin Email</label>
                                            <input type="text" readonly=""  value="<?php echo e(Auth::user()->email); ?>" class="form-control" name="">
                                               
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Old Password</label>
                                            <input type="text" class="form-control" id="old_password" name="old_password">
                                                <?php if($errors->has('old_password')): ?>
                                                        <?php echo e($errors->first('old_password')); ?>

                                                          <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="simpleFormEmail">New Password</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                                <?php if($errors->has('password')): ?>
                                                        <?php echo e($errors->first('password')); ?>

                                                          <?php endif; ?>
                                        </div>
                                         <div class="form-group">
                                            <label for="simpleFormEmail">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                                <?php if($errors->has('confirm_password')): ?>
                                                        <?php echo e($errors->first('confirm_password')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                         <button type="submit" class="btn btn-success"  style="float: right;">Change Password</button>
                                       </div>
                                      </div>
                                       <div class="col-md-6">
                                          <img src="https://defendit.io/resources/views/front/assets/img/img-login-banner.png" width="100%">
                                        </div>
                                          
                                      
                                    </form>

                                </div>



                                     
                            </div>

                      </div>
                    
                 

                    </div>


                  
                      
                 
              
                    
                  
                </div>
            </div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(url('Eadmin/assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')); ?>" ></script>
<script src="<?php echo e(url('Eadmin/assets/js/pages/table/table_data.js')); ?>" ></script>
<script src="<?php echo e(url('Eadmin/assets/plugins/jquery-validation/js/jquery.validate.min.js')); ?>" ></script>
<script src="<?php echo e(url('Eadmin/assets/plugins/jquery-validation/js/additional-methods.min.js')); ?>" ></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u980489449/domains/happiness.gifts/public_html/resources/views/Admin/admin_profile.blade.php ENDPATH**/ ?>