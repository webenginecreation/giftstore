
<?php $__env->startPush('css'); ?>
<link href="<?php echo e(url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main-section'); ?>
<div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Orders Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo e(route('admin-dashboard')); ?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Show-Orders</li>
                            </ol>
                        </div>
                    </div>
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="row">
                    <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>All Orders</header>
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
                    							<th>Order Code</th>
                    							<th>Order name</th>
                    							<th>City</th>
                    							<th>Payment</th>
                    							<th>Status</th>
                    							<th>Order Date</th>
                                                <th> Action </th>
                                                <th> Change</th>
						                    </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                        <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(++$i); ?></td>
                                                <td><?php echo e($data->order_code); ?> </td>
                    					        <td><?php echo e($data->order_name); ?></td>
                    					        <td><?php echo e($data->city); ?></td>
                    					        <td><?php echo e($data->payment); ?></td>



                    					        <td>
                                                       <?php if($data->status == "Pending"): ?>
                                                       <span class="label label-info">Pending</span>
                                                       <?php elseif($data->status == "Inprocess"): ?>
                                                        <span class="label label-info">Inprocess</span>
                                                      
                                                       <?php elseif($data->status == "Shipped"): ?>
                                                         <span class="label label-warning">Shipped</span>
                                                        <?php elseif($data->status == "Delivered"): ?>
                                                        <span class="label label-success">Delivered</span>
                                                       <?php elseif($data->status == "Cancle"): ?>
                                                        <span class="label label-danger">Cancle</span>
                                                       <?php elseif($data->status == "Rejected"): ?>
                                                        <span class="label label-danger">Rejected</span>
                                                       <?php endif; ?> 
                                                    </td>





                    					        <td>  <?php echo e(\Carbon\Carbon::parse($data->created_at)->format('j F Y h:i:s A')); ?></td>
                                                <td> <a class="btn btn-info btn-xs" href="<?php echo e(route('order-details',['order_code' =>$data->order_code ])); ?>"  > View </a> </td>
                                                 <td class="valigntop">
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin" type="button" data-toggle="dropdown" aria-expanded="false"> Change Status
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="<?php echo e(route('change-order-status',['status' =>'Pending','order_code' => $data->order_code ])); ?>">
                                                                    <i class="icon-flag"></i> Pending </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(route('change-order-status',['status' =>'Inprocess','order_code' => $data->order_code ])); ?>">
                                                                    <i class="icon-flag"></i> In-Process </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(route('change-order-status',['status' =>'Shipped','order_code' => $data->order_code ])); ?>">
                                                                    <i class="icon-flag"></i> Shipped </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                <a href="<?php echo e(route('change-order-status',['status' =>'Delivered','order_code' => $data->order_code ])); ?>">
                                                                    <i class="icon-flag"></i> Delivered
                                                                    
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(route('change-order-status',['status' =>'Cancle','order_code' => $data->order_code ])); ?>">
                                                                    <i class="icon-flag"></i> Cancle
                                                                    
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(route('change-order-status',['status' =>'Rejected','order_code' => $data->order_code ])); ?>">
                                                                    <i class="icon-flag"></i> Rejected
                                                                    
                                                                </a>
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
<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u980489449/domains/happiness.gifts/public_html/resources/views/Admin/show_orders.blade.php ENDPATH**/ ?>