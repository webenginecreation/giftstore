
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
                                <li class="active">Order-Details</li>
                            </ol>
                        </div>
                    </div>
                   
	                   <div class="row">
	                    <div class="col-md-12">
	                        <div class="white-box">
	                            <h3><b>INVOICE</b> <span class="pull-right">#<?php echo e($order->order_code); ?></span></h3>

	                            <hr>
	                            <div class="row">
	                                <div class="col-md-12">
										<div class="pull-left">
											<address>
												<img src="<?php echo e(url('images')); ?>/<?php echo e($siteConfig->logo); ?>" width="120px" height="42.52px" alt="logo" class="logo-default" />
												<p class="font-weight-bold mb-4">Billing Address</p>
												<p class="text-muted m-l-5">
												    
													<?php echo e($order->order_address); ?>, <br>
													<?php echo e($order->city); ?>, <br><?php echo e($order->order_zip); ?>

												</p>

												<p class="font-weight-bold mb-4">Order Details</p>

												 <p>Date : <b> <?php echo e(\Carbon\Carbon::parse($order->order_date)->format('j F, Y')); ?> </b> </p>
                            <p>Payment Type:<b> <?php if($order->payment == 'cod'): ?>  <?php echo e("Pay On Delivery"); ?><?php elseif($order->payment == 'online'): ?> <?php echo e("Online"); ?>  <?php endif; ?> </b> </p>

                           
											</address>
										</div>
										<div class="pull-right text-right">
											<address>
												<p class="addr-font-h3">To,</p>
												<p class="addr-font-h4"><?php echo e($order->order_name); ?></p>
											    <p class="addr-font-h4"><?php echo e($order->order_email); ?></p>
                                                <p class="addr-font-h4"><?php echo e($order->order_phone); ?></p>
                                                
												
											</address>
										</div>
										
										
										
									</div>
									<div class="col-md-12">
									    
											<address>
											    <?php if(!empty($order->order_notes)): ?>
											    <p class="font-weight-bold mb-4">Order Notes:-</p>
												<p class="text-muted m-l-5"><?php echo e($order->order_notes); ?></p>
											   <?php endif; ?>
                                                
												
											</address>
										
										
									</div>
	                                <div class="col-md-12">
	                                    <div class="table-responsive m-t-40">
	                                        <table class="table table-hover border">
	                                            <thead>
	                                                <tr>
	                                                    <th class="text-left">#</th>
	                                                    <th class="text-center"> Product Name</th>
	                                                    <tH class="text-center"> Personalize Images  </tH>
	                                                    <tH class="text-center"> Personalize Text</tH>
	                                                    <th class="text-center"> Variant</th>
	                                                    <th class="text-center"> Qty</th>
	                                                    <th class="text-right">Price</th>
	                                                    <th class="text-right">Sub Total</th>
	                                                </tr>
	                                            </thead>
	                                            <tbody>
	                                            	<?php $srno = 0;  ?>	
	                                            	<?php $__currentLoopData = json_decode($order->order_products); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	                                            	<tr>
	                                            		<td> <?php echo e(++$srno); ?> </td>
	                                            		<td> <?php echo e($value->name); ?>  </td>
	                                                    <td>
	                                                    <?php

	                                                    if(isset($value->personalize_image))
	                                                    {
	                                                    	$count = count($value->personalize_image);
	                                                    	
	                                                    	for($i=0; $i<$count; $i++)
	                                                    	{
	                                                    		?>
	                                                    		<a href="<?php echo e(env('APP_URL')); ?>/order-images/<?php echo e($value->personalize_image[$i]); ?>" download rel="noopener noreferrer" target="_blank">
	                                                    		<img src="<?php echo e(env('APP_URL')); ?>/order-images/<?php echo e($value->personalize_image[$i]); ?>" height="50px;" download width="50px;"> 
	                                                    	</a>

	                                                    	<?php }
	                                                   
	                                                   }
	                                                    ?>

	                                                   

	                                                    
                                                        
	                                                    		
	                                                    </td>
	                                            		<td> <?php echo e($value->customtext); ?>  </td>
	                                            		<td> <?php echo e((!empty($value->size))?$value->size:'N.A'); ?></td>
	                                            		<td>  <?php echo e($value->quantity); ?> </td>
	                                            		<td><?php echo e($siteConfig->currency); ?> <?php echo e($value->price); ?> </td>
	                                            		<td><?php echo e($siteConfig->currency); ?><?php echo e($value->price * $value->quantity); ?> </td>
		                                            	</tr>

	                                            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                                               
	                                                
	                                            </tbody>
	                                        </table>
	                                    </div>
	                                </div>
	                                <div class="col-md-12">
	                                    <div class="pull-right m-t-30 text-right">
	                                       <hr>
	                                        <h4><b>Grand Total :<?php echo e($siteConfig->currency); ?><?php echo e($order->total_amount); ?></h4> </b></div>
	                                   
	                                  
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
<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u980489449/domains/happiness.gifts/public_html/resources/views/Admin/order_details.blade.php ENDPATH**/ ?>