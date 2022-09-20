
<?php $__env->startPush('css'); ?>
<link href="<?php echo e(url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main-section'); ?>
<div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Report Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo e(route('admin-dashboard')); ?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Datewise Report</li>
                            </ol>
                        </div>
                    </div>
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="row">
                    <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>DateWise Report<small>&nbsp;(By Default Today's Date Selected)</small></header>
                                    <div class="col-md-12">

                                        <form method="POST"  action="<?php echo e(route('datewiseReport')); ?>">
                                            <?php echo e(csrf_field()); ?>

                                  <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                        <h4 for="simpleFormEmail"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color: blue"></i> &nbsp;From Date</h4>
                                        <input type="date" class="form-control" name="from_date"  >
                                    </div>
                                     
                                        <div class="form-group">
                                        <h4 for="simpleFormEmail"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color: blue"></i> &nbsp;To Date</h4>
                                        <input type="date" class="form-control" name="to_date"  >
                                    </div>

                                     <div class="form-group">
                                                    <h4><i class="fa fa-list-alt" aria-hidden="true" style="color: #1e293c"></i> &nbsp;Status</h4>
                                                    <select class="form-control" name="status">
                                                    <option value="-1"><-- select Status --></option>
                                                     <option value="Pending">Pending</option>
                                                    <option value="Inprocess">Inprocess</option>
                                                       <option value="Shipped">Shipped</option>
                                                        <option value="Delivered">Delivered</option>
                                                         <option value="Cancle">Cancle</option>
                                                         <option value="Rejected">Rejected</option>
                                                
                                                    </select>
                                                </div>

                                     <div class="form-group">
                                        <h4 for="simpleFormEmail"></h4>
                                        <input type="submit" class="btn btn-success" value="GET REPORT">
                                        </div>
                                        </div>

                                        <div class="col-md-7">
                                            <img src="https://cdn.syncfusion.com/boldreports/home/banner-image.png" style="width: 90%">
                                        </div>
                                    </div>


                                    </form>

                                    

                                    </div>
                                </div>
                                
                                <div class="card-body ">
                                  <div class="table-scrollable">
                                    <table  class="table display product-overview"  style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> Order Total </th>
                                                <th> Order Total </th>
                    							<th>Order Code</th>
                    							<th>Payment</th>
                    							<th>Status</th>
                    							<th> Action </th>
                                                <th> Change</th>
						                    </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; 
                                                $totalAmount = 0;   
                                            ?>
                                        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                         <?php
                                                $totalAmount += $data->total_amount;
                                        ?>
                                         


                                            <tr>
                                                <td><?php echo e(++$i); ?></td>
                                                <td><?php echo e($data->order_date); ?> </td>
                                                <td> <?php echo e(env('DEFAULT_SYMBOL')); ?> <?php echo e($data->total_amount); ?> </td>
                                                <td><?php echo e($data->order_code); ?> </td>
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

                                            <tr>
                                                <th></th>
                                                 <th></th>
                                                <th> <?php echo e(env('DEFAULT_SYMBOL')); ?> <?php echo e($totalAmount); ?> </th>
                                                <th colspan="8">  TOTAL COLLECTION </th>
                                            </tr>
                                           
                                        </tbody>
                                    </table>

                                   
                                    </div>
                                     <ul class="list-group">
                                            <li class="list-group-item"><b>* Default Date Automatically today selected</b></li>
                                            <li class="list-group-item"><b>* Status Not Consider Cancle/Rejected </b></li>
                                            <li class="list-group-item"><b>* Total Not Consider Cancle & Rejected Orders</b></li>
                                            <li class="list-group-item"><b>* Report Not Consider cancle & Rejected Orders</b></li>
                                            
                                        </ul>
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
<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u980489449/domains/happiness.gifts/public_html/resources/views/Admin/datewise_report.blade.php ENDPATH**/ ?>