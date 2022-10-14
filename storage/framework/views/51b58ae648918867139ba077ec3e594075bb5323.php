
<?php $__env->startPush('css'); ?>
<link href="<?php echo e(url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main-section'); ?>
<div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Customer Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo e(route('admin-dashboard')); ?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Customers</li>
                            </ol>
                        </div>
                    </div>
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                   
                   <div class="row">
          <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>All Customers</header>
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
                                                <th>Name</th>
                                                <th>Lastname</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>User Type</th>
                                                
                                                </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                        <?php $__currentLoopData = $getAllCustomers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(++$i); ?></td>
                                              
                                                
                                                 <td><?php echo e(ucfirst($value->name)); ?></td>
                                                 <td><?php echo e(ucfirst($value->last_name)); ?></td>
                                                 <td><?php echo e(ucfirst($value->email)); ?></td>
                                                 <td><?php echo e(ucfirst($value->mobile)); ?></td>
                                                <td class="valigntop">
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs btn-success dropdown-toggle no-margin" type="button" data-toggle="dropdown" aria-expanded="false"> <?php echo e(strtoupper($value->user_type)); ?>

                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                             <li>
                                                                <a href="<?php echo e(route('change-user-type',['id'=>$value->id,'user_type'=>'normal'])); ?>">
                                                                    <i class="icon-user"></i> Normal </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(route('change-user-type',['id'=>$value->id,'user_type'=>'reseller'])); ?>">
                                                                    <i class="icon-user"></i> Reseller </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(route('change-user-type',['id'=>$value->id,'user_type'=>'wholeseller'])); ?>">
                                                                    <i class="icon-user"></i> Wholeseller </a>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>
                                                </td>
  </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                            
                                        </tbody>
                                  
                                  
                                    </table>
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
<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\giftstore\resources\views/Admin/customers.blade.php ENDPATH**/ ?>