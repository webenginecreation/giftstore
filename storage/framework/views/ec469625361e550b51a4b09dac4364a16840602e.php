
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
                                <div class="page-title">Promotion Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo e(route('admin-dashboard')); ?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Offer-Products</li>
                            </ol>
                        </div>
                    </div>
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                
                                <div class="card-body " id="bar-parent">
                                    <form method="POST" action="<?php echo e(route('store.offers.products')); ?>" > <?php echo csrf_field(); ?>     
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card-head">
                                                        <header> Add Products In Offers</header>
                                         
                                                </div>
                                            </div>
                                          
                                        </div><br>
                                        <div class="row">

                                            <div class="col-lg-10">
                                               <div class="form-group">
                                                <label>Select Offers</label>
                                                <select class="form-control" required name="offers_id">
                                                
                                                <?php $__currentLoopData = $allOffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option  value="<?php echo e($value->id); ?>"><?php echo e(ucfirst($value->offers_name)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                 <?php if($errors->has('offers_id')): ?>
                                                        <?php echo e($errors->first('offers_id')); ?>

                                                          <?php endif; ?>  
                                            </div>
                                                
                                              <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>Products List</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                  <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Sr.no</th>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Display Price</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                           <?php $i=0; ?>
                                        <?php $__currentLoopData = $allproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td> <input type="checkbox" name="product_id[]" value="<?php echo e($value->id); ?>"> </td>
                                                <td><?php echo e(++$i); ?></td>
                                                  <td> <img src="<?php echo e(env('APP_URL')); ?>/images/<?php echo e($value->images); ?>" height="60px" width="60px"> </td>
                                                
                                                 <td><?php echo e(ucfirst($value->name)); ?></td>
                                                <td><b><?php echo e(ucfirst($value->discount_price)); ?></b></td>
                                               </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                            
                                          
                                       
                                        </tbody>
                                        
                                          <tr> 
                                          <th>
                                            <button type="submit" class="btn btn-primary"> Add Selected  </button>
                                            </th>
                                            </tr>
                                       
                                        </form>
                                    </table>
                                    </div>
                                </div>
                            </div>   
                            
                            
                                                          
                                        
                                        
                                            </div>
                                            <div class="col-lg-2">
                                              
                                          
                                        
                                           </div>

                                         </div> 
                                      
                                    

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
<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u980489449/domains/happiness.gifts/public_html/resources/views/Admin/offers_products.blade.php ENDPATH**/ ?>