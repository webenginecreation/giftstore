<?php $__env->startPush('css'); ?>
<link href="<?php echo e(url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css"/>
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
                                <div class="page-title">Product Category Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo e(route('admin-dashboard')); ?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Category</li>
                            </ol>
                        </div>
                    </div>
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header><?php if(isset($data->id)): ?> Update <?php else: ?> Add <?php endif; ?>  Category</header>
                                     
                                </div>
                                <div class="card-body " id="bar-parent">
            <form method="POST" id="adminCategory" enctype="multipart/form-data" action="<?php echo e((isset($data->id) ? route('update-category',$data->id) : route('add-category') )); ?>

                                    ">
                                    <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Category Name</label>
                                            <input type="text" id="category_name" class="form-control" name="category_name"  value="<?php echo e(old('category_name',$data->category_name)); ?>" placeholder="Enter Category Name">
                                        </div>


                                        <?php if($data->category_icon): ?>
                                       
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Category current Main Image</label>
                                            <input type="hidden" readonly class="form-control" value="<?php echo e($data->category_icon); ?>" name="old_icon"><br>
                                            <img src="<?php echo e(env('APP_URL')); ?>/category_images/<?php echo e($data->category_icon); ?>" height="100px;" width="100;">
                                               
                                        </div>

                                        <div class="form-group">
                                            <label for="simpleFormEmail">change Main Image</label>
                                            <input type="file" class="form-control" id="category_icon" name="category_icon">
                                                <?php if($errors->has('category_icon')): ?>
                                                        <?php echo e($errors->first('category_icon')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <?php else: ?>

                                         <div class="form-group">
                                            <label for="simpleFormEmail">Category Icon</label>
                                            <input type="file" id="category_icon" class="form-control" name="category_icon" >
                                             <?php if($errors->has('category_icon')): ?>
                                                        <?php echo e($errors->first('category_icon')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <?php endif; ?>


                                         <?php if($data->category_banner): ?>
                                       
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Category current Banner Image</label>
                                            <input type="hidden" readonly class="form-control" value="<?php echo e($data->category_banner); ?>" name="old_banner"><br>
                                            <img src="<?php echo e(env('APP_URL')); ?>/category_images/<?php echo e($data->category_banner); ?>" height="100px;" width="auto;">
                                               
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="simpleFormEmail">change  Banner Image</label>
                                            <input type="file" class="form-control" id="category_banner" name="category_banner">
                                                <?php if($errors->has('category_banner')): ?>
                                                        <?php echo e($errors->first('category_banner')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <?php else: ?>

                                         <div class="form-group">
                                            <label for="simpleFormEmail">Category Banner</label>
                                            <input type="file" id="category_banner" class="form-control" name="category_banner" >
                                             <?php if($errors->has('category_banner')): ?>
                                                        <?php echo e($errors->first('category_banner')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <?php endif; ?>
                                       <button type="submit" class="btn btn-primary"><?php if(isset($data->id)): ?> Update <?php else: ?> Add <?php endif; ?> Category</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    

                    </div>
                    <div class="row">
                    <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>All Categories</header>
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
                                                <th>Icon</th>
                                                <th>Banner</th>
                                                <th>category name</th>
                                                <th>Add Brands</th>
                                                <th>status</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                        <?php $__currentLoopData = $Categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(++$i); ?></td>
                                                <td>   <img src="/category_images/<?php echo e($Category->category_icon); ?>" height="50px;" width="50px;"> </td>
                                                <td>  <img src="/category_images/<?php echo e($Category->category_banner); ?>" height="50px;" width="auto"> </td>
                                                <td><?php echo e(ucfirst($Category->category_name)); ?></td>
                                               <td> <button type="button" class="btn btn-warning openBrandModel" data-id="<?php echo e($Category->id); ?>">
  Add Brands
</button>
 </td>
                                                <td><?php if($Category->status == 0): ?>            <a href="<?php echo e(route('category-status',["status" => 0 , "id" => $Category->id])); ?>">     
                                                     <span class="label label-sm label-danger"> Inactive </span>  </a> 
                                                    <?php else: ?> 
                                                    <a href="<?php echo e(route('category-status',["status" => 1 , "id" => $Category->id])); ?>"> 
                                                    <span class="label label-sm label-success"> Active </span></a>   <?php endif; ?> </td>
                                                <td>
                                                    <a href="<?php echo e(route('edit-category',$Category->id)); ?>" class="label label-sm label-success" > Edit </a>
                                                    <a href="<?php echo e(route('delete-category',$Category->id)); ?>" class="label label-sm label-danger" > Delete</a>
                                                    
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Available Brands</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="barndForm" action="<?php echo e(route('addbrands')); ?>" method="POST"> 
            <?php echo csrf_field(); ?>
            <input type="number" readonly="" name="category_id" value="" id="category_field_id">
         <div class="form-group">
                                          
                                                <div class="checkbox checkbox-icon-black p-0">
                                                    <label for="checkbox1">
                                                        Select Brands
                                                    </label><br>

                                                      <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <input id="checkbox<?php echo e($brand->id); ?>" type="checkbox" name="brandchk[]" value="<?php echo e($brand->id); ?>">
                                                   
                                                     <label for="checkbox1">
                                                       <img src="<?php echo e(env('APP_URL')); ?>/brand_icon/<?php echo e($brand->brand_icon); ?>" height="40px" width="auto">
                                                    </label>&nbsp;&nbsp;|&nbsp;&nbsp;
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                               
                                       </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
</form>
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

<script type="text/javascript">
    $(document).ready(function(){

            $('.openBrandModel').click(function(){

                    $id = $(this).attr('data-id');
                      $('#category_field_id').val($id);

                      $.ajax({
                        type:"GET",
                        url:"getbrands/"+$id,
                        Data:{'category_id':$id},
                        success:function(response)
                        {
                           var obj = JSON.parse(response);
                           jQuery(obj).each(function(i, item){
                            console.log(item.id);
                            $('input[type=checkbox][value='+item.id+']').attr('checked', true);
                            })
                            $('#exampleModal').modal('show');
                        }

                      });
             });

            //This is for clear form
            $('#exampleModal').on('hidden.bs.modal', function () {
             $('input:checkbox').removeAttr('checked');    
            $('#exampleModal form')[0].reset();
            });

    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Shopping\resources\views/Admin/categories.blade.php ENDPATH**/ ?>