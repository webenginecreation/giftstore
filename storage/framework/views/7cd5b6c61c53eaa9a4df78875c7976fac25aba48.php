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
                                <div class="page-title">Promotion Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo e(route('admin-dashboard')); ?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Offers</li>
                            </ol>
                        </div>
                    </div>
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                
                                <div class="card-body " id="bar-parent">
                                    <form method="POST" id="adminOfferValidation" action="<?php echo e((isset($data->id) ? route('update-offers',$data->id) : route('store-offers') )); ?>" enctype="multipart/form-data" > <?php echo csrf_field(); ?>     
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="card-head">
                                                        <header><?php if(isset($data->id)): ?> Update <?php else: ?> Add <?php endif; ?>   Offers</header>
                                         
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <button type="submit" class="btn btn-primary" style="float: right;"><?php if(isset($data->id)): ?> Update <?php else: ?> Submit <?php endif; ?></button>
                                            </div>
                                        </div><br>
                                        <div class="row">

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                        <label for="simpleFormEmail">Offers Name</label>
                                                        <input type="text" class="form-control" value="<?php echo e((isset($data->offers_name) ?  $data->offers_name : '' )); ?>" id="offers_name" name="offers_name"  >
                                                        <?php if($errors->has('offers_name')): ?>
                                                        <?php echo e($errors->first('offers_name')); ?>

                                                          <?php endif; ?>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="simpleFormEmail">Start Date</label>
                                                        <input type="date" class="form-control"   value="<?php echo e((isset($data->start_date) ? $data->start_date  : '' )); ?>" id="start_date" name="start_date"  >
                                                        <?php if($errors->has('start_date')): ?>
                                                        <?php echo e($errors->first('start_date')); ?>

                                                          <?php endif; ?>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label for="simpleFormEmail">End Date</label>
                                                        <input type="date" id="end_date" class="form-control"  name="end_date"  value="<?php echo e((isset($data->end_date) ? $data->end_date  : '' )); ?>"  >
                                                        <?php if($errors->has('end_date')): ?>
                                                        <?php echo e($errors->first('end_date')); ?>

                                                          <?php endif; ?>
                                                    </div>
                                                    
                                                        <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="1"  >Active</option>
                                                    <option value="0" >Deactive</option>
                                                </select>
                                            </div>
                                     
                                                          
                                        
                                        
                                            </div>
                                            <div class="col-lg-8">
                                              
                                                 <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>Offers List</header>
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
                                                <th>Sr.no</th>
                                                
                                                <th>offers Name</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th> Action </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $i=0; ?>
                                        <?php $__currentLoopData = $allOffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <tr>
                                                <td><?php echo e(++$i); ?></td>
                                                 
                                               
                                                 <td><a href="<?php echo e(route('getOffersProducts',$value->id)); ?>"> <?php echo e(ucfirst($value->offers_name)); ?> </a></td>
                                                  <td><b><?php echo e($value->start_date); ?></b></td>
                                                   <td><b><?php echo e($value->end_date); ?></b></td>
                                         
                                              
                                                <td><?php if($value->status == 0): ?>
                                                 <a href="<?php echo e(route('offers-status',["status" => 0,"id" => $value->id])); ?>">
                                                     <span class="label label-sm label-danger"> Inactive </span>   </a>
                                                    <?php else: ?> 
                                                    <a href="<?php echo e(route('offers-status',["status" => 1,"id" => $value->id])); ?>">
                                                    <span class="label label-sm label-success">Active </span> </a>  <?php endif; ?> </td>
                                                  <td> 
                                                            <a href="<?php echo e(route('edit-offers',$value->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                                            <a href="<?php echo e(route('delete-offers',$value->id)); ?>" onclick="confirmDelete()" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>
                                                           
                                                    </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
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
<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Shopping\resources\views/Admin/offers.blade.php ENDPATH**/ ?>