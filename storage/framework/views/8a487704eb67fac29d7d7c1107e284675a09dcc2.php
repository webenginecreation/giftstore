
<?php $__env->startPush('css'); ?>
<link href="<?php echo e(url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main-section'); ?>
<div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Products Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo e(route('admin-dashboard')); ?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Show-Products</li>
                            </ol>
                        </div>
                    </div>
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    <div class="row">
                    <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>Products List</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                         <a class="btn btn-warning" href="<?php echo e(route('export')); ?>">Export Products Data</a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                  <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Image</th>
                                                <th>Brand</th>
                                                <th>Category</th>
                                                <th>Product Name</th>
                                                <th>Reseller Price</th>
                                                <th>Wholeseller Price</th>
                                                <th>Display Price</th>
                                                <th>Stock Status</th>
                                                <th>Status</th>
                                                <th> Action </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                        <?php $__currentLoopData = $allproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <td><?php echo e(++$i); ?></td>
 
                                                  <td> <img src="<?php echo e(env('APP_URL')); ?>/images/<?php echo e($value->images); ?>" height="60px" width="60px"> </td>
                                                  <td> <?php echo e(isset($value->brand->brand_name) ? 
                                                    $value->brand->brand_name
                                                   : 'N.A'); ?> </td>
                                                 <td><?php echo e(ucfirst($value->category->category_name)); ?></td>
                                                 <td><?php echo e(ucfirst($value->name)); ?></td>
                                                 
                                                 <td> <?php echo e(isset($value->reseller_price) ? 
                                                      $siteConfig->currency.$value->reseller_price
                                                   : 'N.A'); ?> </td>
                                                   
                                                  <td> <?php echo e(isset($value->wholeseller_price) ? 
                                                     $siteConfig->currency. $value->wholeseller_price
                                                   : 'N.A'); ?> </td>
                                                <td><b><?php echo e($siteConfig->currency); ?><?php echo e(ucfirst($value->discount_price)); ?></b></td>
                                                <td><?php if($value->stock_status == 0): ?> 
                                                <a href="<?php echo e(route('product-stock-status',["status" => 0,"id" => $value->id])); ?>">
                                                     <span class="label label-sm label-danger"> Out Of Stock </span>  </a> 
                                                    <?php else: ?> 
                                                     <a href="<?php echo e(route('product-stock-status',["status" => 1,"id" => $value->id])); ?>">
                                                    <span class="label label-sm label-success">Instock </span></a>  <?php endif; ?> </td>
                                              
                                                <td><?php if($value->status == 0): ?>
                                                 <a href="<?php echo e(route('product-status',["status" => 0,"id" => $value->id])); ?>">
                                                     <span class="label label-sm label-danger"> Inactive </span>   </a>
                                                    <?php else: ?> 
                                                    <a href="<?php echo e(route('product-status',["status" => 1,"id" => $value->id])); ?>">
                                                    <span class="label label-sm label-success">Active </span> </a>  <?php endif; ?> </td>
                                               <td> <button class="btn btn-success btn-xs">
                                                                <i class="fa fa-check"></i>
                                                            </button>
                                                            <a href="<?php echo e(route('edit-products',$value->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                                            <a href="<?php echo e(route('delete-product',$value->id)); ?>" onclick="confirmDelete()" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>
                                                           
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
<script>
function confirmDelete() {
  var txt;
  var r = confirm("Want to Delete ?");
 
}
</script>

<script src="<?php echo e(url('Eadmin/assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')); ?>" ></script>
<script src="<?php echo e(url('Eadmin/assets/js/pages/table/table_data.js')); ?>" ></script>
<script src="<?php echo e(url('Eadmin/assets/plugins/jquery-validation/js/jquery.validate.min.js')); ?>" ></script>
<script src="<?php echo e(url('Eadmin/assets/plugins/jquery-validation/js/additional-methods.min.js')); ?>" ></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\giftstore\resources\views/Admin/show_product.blade.php ENDPATH**/ ?>