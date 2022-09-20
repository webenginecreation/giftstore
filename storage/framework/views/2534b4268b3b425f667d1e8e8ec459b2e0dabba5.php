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
                                <div class="page-title">Inventory Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo e(route('admin-dashboard')); ?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Manage</li>
                            </ol>
                        </div>
                    </div>
        <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        

<div class="row">
          <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>Inventory Report</header>
                                    <div class="tools">
                                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Add New Or Update</button>
                                    </div>
                                </div>
                                <div class="card-body ">
                                  <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Item Name</th>
                                                <th>Available Qty</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                              <?php $i=0; ?>
                                            <?php $__currentLoopData = $inventory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                             <td><?php echo e(++$i); ?></td>
                                             <td><?php echo e($value->name); ?></td>
                                             <td><b><?php echo e($value->quantity); ?></b></td>
                                             <td> <a href="<?php echo e(route('delete.inventory',$value->id)); ?>" class="btn btn-danger btn-sm">Delete</a></td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <form method="POST" action="<?php echo e(route('store.inventory')); ?>">
              <?php echo csrf_field(); ?>
             <div class="form-group">
               <lable>Products</lable>
                <select class="form-control" name="product_id" required="">
                  <option value=""><-- Select Products --></option>
                  <?php $__currentLoopData = $allProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
            </div>
            &nbsp;
             <div class="form-group">
               <lable>Add Quantity</lable>
                  <input type="number" required="" class="form-control" name="quantity" placeholder="Enter Numeric value" >
            </div>

            
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Stock</button>

  </form>      </div>
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
<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Shopping\resources\views/Admin/Inventory/index.blade.php ENDPATH**/ ?>