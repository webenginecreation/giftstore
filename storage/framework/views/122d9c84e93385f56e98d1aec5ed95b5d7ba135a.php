
<?php $__env->startPush('css'); ?>
<link href="<?php echo e(url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css"/>
<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
<style type="text/css">
    label{
        font-weight: bold;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main-section'); ?>
<div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Customize Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo e(route('admin-dashboard')); ?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Customize Design</li>
                            </ol>
                        </div>
                    </div>
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                
                                <div class="card-body " id="bar-parent">
                                    <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('update.customize.template',["id" => $site_config->id])); ?>" > <?php echo csrf_field(); ?>     
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card-head">
                                                        <header>Customize Template Here..</header>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col-md-6">
                                          
                                             <div class="form-group">
                                            <label for="simpleFormEmail">Additional CSS</label>
                                            <textarea class="form-control" name="additional_css" rows="8"> <?php echo e($site_config->additional_css); ?>  </textarea>
                                            </div>

                                            <div class="form-group">
                                            <label for="simpleFormEmail">Additional JS</label>
                                            <textarea class="form-control" name="additional_js" rows="8"> <?php echo e($site_config->additional_js); ?>  </textarea>
                                            </div>
                                        </div>

                                         <div class="col-md-6">
                                          
                                            <img src="https://www.wpglobalsupport.com/wp-content/uploads/2019/01/lkhjbklghb.png" width="100%">
                                        </div>



                                        <div class="row">
                                            <div class="col-md-12">
                                           
                                               <div class="col-md-4"> 
                                                <input type="submit" name="submit" value="Apply & Save" class="btn btn-success">
                                               </div>
                                              

                                               </div>
                                              
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
<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\giftstore\resources\views/Admin/customize_theme.blade.php ENDPATH**/ ?>