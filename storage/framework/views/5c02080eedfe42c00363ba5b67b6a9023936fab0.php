<br>
<div class="row">
          <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>All Slider</header>
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
                                                <th>image</th>
                                                <th>Text Allowed</th>
                                                <th>H5 Text</th>
                                                <th>H2 Text</th>
                                                <th>Position</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                              <?php $i=0; ?>
                                            <?php $__currentLoopData = $allBanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                             <td><?php echo e(++$i); ?></td>
                                             <td> <img src="/slider_image/<?php echo e($value->slider_image); ?>" height="50px;" width="50px;"> </td>
                                              <td><?php if($value->slider_text == 0): ?> 

                                                     <a href="">
                                                     <span class="label label-sm label-danger"> NO </span>  </a> 
                                                    <?php else: ?> 
                                                    <a href="">
                                                    <span class="label label-sm label-success">YES </span>   </a>  <?php endif; ?></td>
                                              <td><?php echo e($value->title_1); ?></td>
                                              <td><?php echo e($value->title_2); ?></td>
                                            <td><?php echo e($value->position); ?></td>
                                           
                                            <td>
                                                
                                                <a href="<?php echo e(route('delete.sliders',['id' => $value->id ])); ?>" class="label label-sm label-danger"> Delete</a>
                                            </td>
                                        </tbody>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><?php /**PATH C:\xampp\htdocs\giftstore\resources\views/Admin/allbanners.blade.php ENDPATH**/ ?>