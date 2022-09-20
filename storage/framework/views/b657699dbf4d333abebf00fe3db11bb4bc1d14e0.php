
<?php $__env->startPush('css'); ?>
<link href="<?php echo e(url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css"/>
<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>

    


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
                                <div class="page-title">Prodcuts Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo e(route('admin-dashboard')); ?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Prodcuts</li>
                            </ol>
                        </div>
                    </div>
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                
    <div class="card bg-light mt-3">
        <div class="card-header">
             Import Export Excel to database 
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('import')); ?>" id="AddProductExcelValidation" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="file" name="file" id="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Products Data</button>
               <a class="btn btn-warning" href="<?php echo e(route('export')); ?>">Export Products Data</a>
               <a href="">How to Make xls ?</a>
            </form>
        </div>
    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                
                                <div class="card-body " id="bar-parent">
                <form method="POST" <?php if(isset($data->id)): ?> id="adminEditProductValidation" <?php else: ?> id="adminAddProductValidation" <?php endif; ?>   action="<?php echo e((isset($data->id) ? route('update-products',$data->id) : route('store-products') )); ?>" enctype="multipart/form-data" > <?php echo csrf_field(); ?>     
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="card-head">
                                                        <header><?php if(isset($data->id)): ?> Update <?php else: ?> Add <?php endif; ?>   Products (Quick Launch)</header>
                                         
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <button type="submit" class="btn btn-primary" style="float: right;"><?php if(isset($data->id)): ?> Update <?php else: ?> Submit <?php endif; ?></button>
                                            </div>
                                        </div><br>
                                        <div class="row">

                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                        <label for="simpleFormEmail">Product Name<span style="color:#ff0000">*</span></label>
                                                        <input type="text" id="name" class="form-control" value="<?php echo e(old('name',$data->name)); ?>" name="name"  >
                                                        <?php if($errors->has('name')): ?>
                                                        <?php echo e($errors->first('name')); ?>

                                                          <?php endif; ?>
                                                    </div>
                                       <?php if($data->images): ?>
                                       
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Product current Main Image <span style="color:#ff0000">*</span></label>
                                            <input type="hidden" readonly class="form-control" value="<?php echo e($data->images); ?>" name="old_images"><br>
                                            <img src="<?php echo e(env('APP_URL')); ?>/images/<?php echo e($data->images); ?>" height="100px;" width="100;">
                                               
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">change Main Image </label>
                                            <input type="file" class="form-control" id="images" name="images">
                                                <?php if($errors->has('images')): ?>
                                                        <?php echo e($errors->first('images')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <?php else: ?>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Product Main Image <span style="color:#ff0000">*</span></label>
                                            <input type="file" class="form-control" name="images">
                                                <?php if($errors->has('images')): ?>
                                                        <?php echo e($errors->first('images')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <?php endif; ?>
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Short Description <span style="color:#ff0000">*</span></label>
                                            <textarea name="Short_details" id="Short_details" cols="100" rows="8"><?php echo e((!empty($data->Short_details)) ? $data->Short_details : ''); ?></textarea>
                                            <?php if($errors->has('Short_details')): ?>
                                                        <?php echo e($errors->first('Short_details')); ?>

                                                          <?php endif; ?> 
                                        </div>
                                        
                                         <div class="form-group">
                                            <label for="simpleFormEmail">Long Description<span style="color:#ff0000">*</span></label><br>
                                           
                                             <textarea class="summernote" id="details"  name="details"><?php echo e((!empty($data->details)) ? $data->details : ''); ?></textarea>
                                           <?php if($errors->has('details')): ?>
                                                        <?php echo e($errors->first('details')); ?>

                                                          <?php endif; ?>  
                                        </div>
                                        
                                           <div class="form-group">
                                                <label>Tags (write & press Tab key)</label>
                                                <br>
                                    <input type="text" name="tags" value="<?php echo e((!empty($data->tags)) ? $data->tags : 'Biztria'); ?>" data-role="tagsinput" style="width: 100%;" />
                                             </div>
                                                
                                        
                                            </div>
                                            <div class="col-lg-3">

                                                 <div class="form-group">
                                                <label>Personalize Images Allowed<span style="color:#ff0000">*</span></label>
                                                <select class="form-control" name="images_allowed">
                                                    <option value="Yes" <?php if($data->images_allowed == 'Yes' ): ?> selected  <?php endif; ?> >Yes</option>
                                                    <option value="No" <?php if($data->images_allowed == 'No' ): ?> selected  <?php endif; ?> >No</option>
                                                </select>
                                            </div>

                                             <?php if($errors->has('status')): ?>
                                                        <?php echo e($errors->first('status')); ?>


                                                          <?php endif; ?>  <div class="form-group">
                                                <label>Personalize Text Allowed <span style="color:#ff0000">*</span></label>
                                                <select class="form-control" name=" text_allowed" >
                                                    <option value="Yes" <?php if($data->text_allowed == 'Yes' ): ?> selected  <?php endif; ?> >Yes</option>
                                                    <option value="No" <?php if($data->text_allowed == 'No' ): ?> selected  <?php endif; ?> >No</option>
                                                </select>
                                            </div>

                                             <?php if($errors->has('status')): ?>
                                                        <?php echo e($errors->first('status')); ?>

                                                          <?php endif; ?> 

                                                <div class="form-group">
                                                <label>Select Category <span style="color:#ff0000">*</span></label>
                                                <select class="form-control" id="category_id" name="category_id">
                                                <option value=""> <-- Category --></option>
                                                <?php $__currentLoopData = $Categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($data->category_id == $Category->id ): ?> selected  <?php endif; ?> value="<?php echo e($Category->id); ?>"><?php echo e(ucfirst($Category->category_name)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                 <?php if($errors->has('category_id')): ?>
                                                        <?php echo e($errors->first('category_id')); ?>

                                                          <?php endif; ?>  
                                            </div>

                                            <!--  <div class="form-group">-->
                                            <!--    <label>Select Brand</label>-->
                                            <!--    <select class="form-control fillBrand"  name="brand_id">-->
                                            <!--    <option value=""> <-- Add Brand --><!--</option>-->
                                            <!--   <?php $__currentLoopData = $Brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                                            <!--        <option <?php if($data->brand_id == $brand->id ): ?> selected  <?php endif; ?> value="<?php echo e($brand->id); ?>" style="background-image:url(https://winmagictoys.com/wp-content/uploads/2018/09/dummy-logo.png);"><?php echo e(ucfirst($brand->brand_name)); ?></option>-->
                                            <!--    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                                            <!--    </select>-->
                                                
                                            <!--</div>-->
                                               
                                          
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Base(MARKET) Price <span style="color:#ff0000">*</span></label>
                                            <input type="number" id="base_price" value="<?php echo e(old('base_price',$data->base_price)); ?>" class="form-control" name="base_price"  >
                                                       <?php if($errors->has('base_price')): ?>
                                                        <?php echo e($errors->first('base_price')); ?>

                                                          <?php endif; ?> 
                                        </div>

                                         <div class="form-group">
                                            <label for="simpleFormEmail">Discount Price <span style="color:#ff0000">*</span></label>
                                            <input type="number" id="discount_price" value="<?php echo e(old('discount_price',$data->discount_price)); ?>" class="form-control" name="discount_price"  >
                                                       <?php if($errors->has('discount_price')): ?>
                                                        <?php echo e($errors->first('discount_price')); ?>

                                                          <?php endif; ?> 
                                        </div>
                                        
                                         <div class="form-group">
                                            <label for="simpleFormEmail">Reseller Price <span style="color:#ff0000">*</span></label>
                                            <input type="number" id="reseller_price" value="<?php echo e(old('reseller_price',$data->reseller_price)); ?>" class="form-control" name="reseller_price"  >
                                                       <?php if($errors->has('reseller_price')): ?>
                                                        <?php echo e($errors->first('reseller_price')); ?>

                                                          <?php endif; ?> 
                                        </div>
                                         <div class="form-group">
                                            <label for="simpleFormEmail">Wholeseller Price <span style="color:#ff0000">*</span></label>
                                            <input type="number" id="wholeseller_price" value="<?php echo e(old('wholeseller_price',$data->wholeseller_price)); ?>" class="form-control" name="wholeseller_price"  >
                                                       <?php if($errors->has('wholeseller_price')): ?>
                                                        <?php echo e($errors->first('wholeseller_price')); ?>

                                                          <?php endif; ?> 
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Shipping Charges For Item <span style="color:#ff0000">*</span></label>
                                            <input type="number" id="shipping_charges" value="<?php echo e(old('shipping_charges',$data->shipping_charges)); ?>" class="form-control" name="shipping_charges"   >
                                                       <?php if($errors->has('shipping_charges')): ?>
                                                        <?php echo e($errors->first('shipping_charges')); ?>

                                                          <?php endif; ?> 
                                        </div>
                                        
                                        
                                       
                                        
                                        
                                            <div class="form-group">
                                                <label>Status <span style="color:#ff0000">*</span></label>
                                                <select class="form-control" name="status">
                                                    <option value="1" <?php if($data->status == '1' ): ?> selected  <?php endif; ?> >Active</option>
                                                    <option value="0" <?php if($data->status == '0' ): ?> selected  <?php endif; ?> >Deactive</option>
                                                </select>
                                            </div>

                                             <?php if($errors->has('status')): ?>
                                                        <?php echo e($errors->first('status')); ?>

                                                          <?php endif; ?> 
                                                          
                                                    <div class="form-group">
                                                <label>Stock Status <span style="color:#ff0000">*</span></label>
                                                <select class="form-control" name="stock_status">
                                                    <option value="1" <?php if($data->stock_status == '1' ): ?> selected  <?php endif; ?> >Instock</option>
                                                    <option value="0" <?php if($data->stock_status == '0' ): ?> selected  <?php endif; ?> >Out of stock</option>
                                                </select>
                                                 <?php if($errors->has('stock_status')): ?>
                                                        <?php echo e($errors->first('stock_status')); ?>

                                                          <?php endif; ?>    
                                            </div>


                                         

                                                       
                                               
                                                          
                                     
                                        
                                        
                                        
                                     </div>

                                         </div> 
                                      
                                  

                                </div>

                                     
                            </div>

                      </div>
                    
                 

                    </div>
              
              <!--  Wizard Form -->
              <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Other Details</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body " id="bar-parent">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-3">
                                            <ul class="nav nav-tabs tabs-left">
                                                 <li class="nav-item">
                                                    <a href="#tab_6_1" data-toggle="tab" class="active"> <i class="fa  fa-tags"></i>SEO </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#tab_6_2" data-toggle="tab" ><i class="fa  fa-tags"></i> Inventory </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#tab_6_3" data-toggle="tab"><i class="fa   fa-plane"></i> Shipping </a>
                                                </li>
                                               
                                                <li class="nav-item">
                                                    <a href="#tab_6_4" data-toggle="tab"><i class="fa  fa-tags"></i> Affiliates Product </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#tab_6_5" data-toggle="tab"><i class="fa  fa-tags"></i> Attributes </a>
                                                </li>
                                                
                                                <li class="nav-item">
                                                    <a href="#tab_6_7" data-toggle="tab"><i class="fa fa-youtube-play"></i> Photos & Video </a>
                                                </li>
                                                 <li class="nav-item">
                                                    <a href="#tab_6_8" data-toggle="tab"><i class="fa  fa-tags"></i> Taxes </a>
                                                </li>
                                                
                                                 <li class="nav-item">
                                                    <a href="#tab_6_9" data-toggle="tab"><i class="fa  fa-tags"></i>Specification </a>
                                                </li>
                                                 <li class="nav-item">
                                                    <a href="#tab_6_10" data-toggle="tab"><i class="fa  fa-tags"></i>Additional info.</a>
                                                </li>
                                               
                                            </ul>
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-9">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_6_1">

                                                    <div class="row">
                                                        <div class="col-md-6"> 
                                                             <div class="form-group">
                                                        <label for="simpleFormEmail">Meta Title</label>
                                                        <input type="text" required="" id="meta_title" class="form-control" value="<?php echo e(old('meta_title',$data->meta_title)); ?>" name="meta_title"  >
                                                        <?php if($errors->has('meta_title')): ?>
                                                        <?php echo e($errors->first('meta_title')); ?>

                                                          <?php endif; ?>
                                                    </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Meta Description</label>
                                            <input type="text" value="<?php echo e(old('meta_description',$data->meta_description)); ?>"  class="form-control" id="meta_description" placeholder="Enter Meta Description" name="meta_description">
                                       <?php if($errors->has('meta_description')): ?>
                                                        <?php echo e($errors->first('meta_description')); ?>

                                                          <?php endif; ?>
                                         </div>
                                     </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                            <label for="simpleFormPassword">Meta Keywords</label>
                                            <input type="text" class="form-control" id="meta_keyword" value="<?php echo e(old('meta_keyword',$data->meta_keyword)); ?>" placeholder="Enter Meta Keywords" name="meta_keyword">
                                             <?php if($errors->has('meta_keyword')): ?>
                                                        <?php echo e($errors->first('meta_keyword')); ?>

                                                          <?php endif; ?>
                                        </div>

                                                              <div class="form-group">
                                            <label for="simpleFormPassword">Meta Author</label>
                                            <input type="text"  value="<?php echo e(old('meta_author',$data->meta_author)); ?>" class="form-control" name="meta_author" id="meta_author" placeholder="Enter Meta Author">
                                             <?php if($errors->has('meta_author')): ?>
                                                        <?php echo e($errors->first('meta_author')); ?>

                                                          <?php endif; ?>
                                        </div>
                                                        </div>
                                                    </div>
                                                   

                                                </div>
                                                <div class="tab-pane fade" id="tab_6_2">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">SKU</label>
                                            <input type="text" id="sku" value="<?php echo e(old('sku',$data->sku)); ?>" class="form-control" name="sku"  >
                                                       <?php if($errors->has('sku')): ?>
                                                        <?php echo e($errors->first('sku')); ?>

                                                          <?php endif; ?> 
                                        </div>
                                         <div class="form-group">
                                            <label for="simpleFormPassword">How Much Product In your Warhouse ?</label>
                                            <input type="number" value="<?php echo e(old('stock_amount',$data->stock_amount)); ?>" class="form-control" id="stock_amount" placeholder="Enter Number" name="stock_amount">
                                             <?php if($errors->has('stock_amount')): ?>
                                                        <?php echo e($errors->first('stock_amount')); ?>

                                                          <?php endif; ?>
                                        </div>

                                       <div class="form-group">
                                            <label for="simpleFormPassword">Low Stock Alert</label>
                                            <input type="number" value="<?php echo e(old('low_stock_alert',$data->low_stock_alert)); ?>" class="form-control" id="low_stock_alert" name="low_stock_alert" placeholder="Enter Number">
                                            <?php if($errors->has('low_stock_alert')): ?>
                                                        <?php echo e($errors->first('low_stock_alert')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                           
                                            <div class="checkbox checkbox-icon-black">
                                                <input id="notify_stock" name="notify_stock" type="checkbox"   value="yes"   >
                                               <label for="">Your Want to Notify Stock Alert ?</label>
                                            </div>
                                        </div>


                                                </div>
                                                <div class="tab-pane fade" id="tab_6_3">
                                                    <div class="form-group">
                                            <label for="simpleFormPassword">Weight(KG)</label>
                                            <input type="text" class="form-control" id="weight" placeholder="Weight" value="<?php echo e(old('weight',$data->weight)); ?>" name="weight">
                                            <?php if($errors->has('Weight')): ?>
                                                        <?php echo e($errors->first('Weight')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        
                                        <b>dimension:</b>

                                       <div class="form-group">
                                            <label for="simpleFormPassword">Length</label>
                                            <input type="number" value="<?php echo e(old('length',$data->length)); ?>" class="form-control" id="length" placeholder="Enter Number" name="length">
                                             <?php if($errors->has('length')): ?>
                                                        <?php echo e($errors->first('length')); ?>

                                                          <?php endif; ?>
                                        </div>
                                         <div class="form-group">
                                            <label for="simpleFormPassword">Width</label>
                                            <input type="number" value="<?php echo e(old('width',$data->width)); ?>"  class="form-control" id="width" name="width" placeholder="Enter Width">
                                             <?php if($errors->has('width')): ?>
                                                        <?php echo e($errors->first('width')); ?>

                                                          <?php endif; ?>
                                        </div>
                                         <div class="form-group">
                                            <label for="simpleFormPassword">Height</label>
                                            <input type="number" value="<?php echo e(old('height',$data->height)); ?>"  class="form-control" id="height" name="height" placeholder="Enter heigth">
                                             <?php if($errors->has('height')): ?>
                                                        <?php echo e($errors->first('height')); ?>

                                                          <?php endif; ?>
                                        </div>
                                      


                                                </div>
                                                <div class="tab-pane fade" id="tab_6_4">
                                                    <p><b>Note:</b>Once Product URL Enter it'll be Redirect on that URL. </p>
                                                     <div class="form-group">
                                            <label for="simpleFormEmail">Affiliate Carrier</label>
                                            <input type="text" name="affiliate_carrier" class="form-control" value="<?php echo e(old('affiliate_carrier',$data->affiliate_carrier)); ?>" id="affiliate_carrier" placeholder="Enter Carrier Name like Amazon,Myntra">
                                            <?php if($errors->has('affiliate_carrier')): ?>
                                                        <?php echo e($errors->first('affiliate_carrier')); ?>

                                                          <?php endif; ?>
                                        </div>
                                       
                                          <div class="form-group">
                                            <label for="simpleFormEmail">Product Affiliate Link</label>
                                            <input type="text" id="product_link" value="<?php echo e(old('product_link',$data->product_link)); ?>" class="form-control" name="product_link"  >
                                                       <?php if($errors->has('product_link')): ?>
                                                        <?php echo e($errors->first('product_link')); ?>

                                                          <?php endif; ?> 
                                        </div>
                                        
                                                </div>
                                                 <div class="tab-pane fade" id="tab_6_5">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                             <label for="simpleFormPassword">Cloting Sizes</label>
                                                       <div class="form-group">
                                                            <div class="checkbox checkbox-icon-black">
                                                               
                                                                <input type="checkbox" name="size[]" <?php echo e(in_array('small',explode(',',$data->size)) ? 'checked' : ''); ?> value="small">&nbsp;SMALL&nbsp;&nbsp;
                                            <input type="checkbox" name="size[]" <?php echo e(in_array('m',explode(',',$data->size)) ? 'checked' : ''); ?> value="m">&nbsp;M&nbsp;&nbsp;

                                            <input type="checkbox" name="size[]" <?php echo e(in_array('l',explode(',',$data->size)) ? 'checked' : ''); ?> value="l">&nbsp;LARGE&nbsp;&nbsp;
                                            <input type="checkbox" name="size[]" <?php echo e(in_array('xl',explode(',',$data->size)) ? 'checked' : ''); ?> value="xl">&nbsp;XL&nbsp;&nbsp;
                                             <input type="checkbox" name="size[]" <?php echo e(in_array('xxl',explode(',',$data->size)) ? 'checked' : ''); ?> value="xxl">&nbsp;XXL&nbsp;&nbsp;
                                              <input type="checkbox" name="size[]" <?php echo e(in_array('xxxl',explode(',',$data->size)) ? 'checked' : ''); ?> value="xxxl">&nbsp;XXXL&nbsp;&nbsp;
                                               <input type="checkbox" name="size[]" <?php echo e(in_array('4xl',explode(',',$data->size)) ? 'checked' : ''); ?> value="4xl">&nbsp;4XL&nbsp;&nbsp;
                                                <input type="checkbox" name="size[]" <?php echo e(in_array('5xl',explode(',',$data->size)) ? 'checked' : ''); ?> value="5xl">&nbsp;5XL&nbsp;&nbsp;
                                                              
                                                               
                                                               
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            Other Units Available Sizes
                                                             <div class="form-group">
                                                            <div class="checkbox checkbox-icon-black">
                                                               
                                                                <input type="checkbox" name="size[]" <?php echo e(in_array('10gm',explode(',',$data->size)) ? 'checked' : ''); ?> value="100gm">&nbsp;100 GM&nbsp;&nbsp;
                                            <input type="checkbox" name="size[]" <?php echo e(in_array('250gm',explode(',',$data->size)) ? 'checked' : ''); ?> value="100gm">&nbsp;250 GM&nbsp;&nbsp;

                                            <input type="checkbox" name="size[]" <?php echo e(in_array('500gm',explode(',',$data->size)) ? 'checked' : ''); ?> value="500gm">&nbsp;500 GM&nbsp;&nbsp;
                                            <input type="checkbox" name="size[]" <?php echo e(in_array('1kg',explode(',',$data->size)) ? 'checked' : ''); ?> value="1kg">&nbsp;1 KG&nbsp;&nbsp;
                                             <input type="checkbox" name="size[]" <?php echo e(in_array('5kg',explode(',',$data->size)) ? 'checked' : ''); ?> value="1kg">&nbsp;5 KG&nbsp;&nbsp;
                                              <input type="checkbox" name="size[]" <?php echo e(in_array('10kg',explode(',',$data->size)) ? 'checked' : ''); ?> value="1kg">&nbsp;10 KG&nbsp;&nbsp;
                                                              
                                                               
                                                               
                                                            </div>
                                                        </div>
                                                        </div>
                                                     </div>
                                                    

                                                </div>
                                        
                                                 <div class="tab-pane fade" id="tab_6_9">
                                                    <div class="form-group">
                                            <label for="simpleFormEmail">Specification</label><br>
                                           
                                             <textarea class="summernote" id="specification"  name="specification"><?php echo e((!empty($data->specification)) ? $data->specification : ''); ?></textarea>
                                           <?php if($errors->has('specification')): ?>
                                                        <?php echo e($errors->first('specification')); ?>

                                                          <?php endif; ?>  
                                        </div>

                                                </div>
                                                 <div class="tab-pane fade" id="tab_6_10">
                                                    <div class="form-group">
                                            <label for="simpleFormEmail">Additional Info.</label><br>
                                           
                                             <textarea class="summernote" id="additional_info" name="additional_info"><?php echo e((!empty($data->additional_info)) ? $data->additional_info : ''); ?></textarea>
                                           <?php if($errors->has('additional_info')): ?>
                                                        <?php echo e($errors->first('additional_info')); ?>

                                                          <?php endif; ?>  
                                        </div>

                                                </div>
                                                 <div class="tab-pane fade" id="tab_6_7">

                                                    <div class="row">
                                                        <div class="col-md-6"> 
                                        <?php if($data->images1): ?>
                                       
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Product current Image1</label>
                                            <input type="hidden" readonly class="form-control" value="<?php echo e($data->images1); ?>" name="old_images1"><br>
                                            <img src="<?php echo e(env('APP_URL')); ?>/images/<?php echo e($data->images1); ?>" height="100px;" width="100px;">
                                               
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">change  Image 1</label>
                                            <input type="file" class="form-control" id="images1" name="images1">
                                                <?php if($errors->has('images1')): ?>
                                                        <?php echo e($errors->first('images1')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <?php else: ?>
                                        
                                         <div class="form-group">
                                            <label for="simpleFormEmail">Product Image1</label>
                                            <input type="file" class="form-control" id="images1" name="images1">
                                                <?php if($errors->has('images1')): ?>
                                                        <?php echo e($errors->first('images1')); ?>

                                                          <?php endif; ?>
                                    </div>
                                    
                                    <?php endif; ?>
                                      <?php if($data->images3): ?>
                                       
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Product current Image3</label>
                                            <input type="hidden" readonly class="form-control" value="<?php echo e($data->images3); ?>" name="old_images3"><br>
                                            <img src="<?php echo e(env('APP_URL')); ?>/images/<?php echo e($data->images3); ?>" height="100px;" width="100px;">
                                               
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">change Image 3</label>
                                            <input type="file" class="form-control" id="images3" name="images3">
                                                <?php if($errors->has('images3')): ?>
                                                        <?php echo e($errors->first('images3')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <?php else: ?>
                                                
                                                
                                                <div class="form-group">
                                            <label for="simpleFormEmail">Product Image3</label>
                                            <input type="file" class="form-control" id="images3" name="images3">
                                                <?php if($errors->has('images3')): ?>
                                                        <?php echo e($errors->first('images3')); ?>

                                                          <?php endif; ?>
                                                </div>
                                                
                                                <?php endif; ?>
                                </div>
                                                        <div class="col-md-6">
                                                            <?php if($data->images2): ?>
                                       
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Product current Image2</label>
                                            <input type="hidden" readonly class="form-control" value="<?php echo e($data->images2); ?>" name="old_images2"><br>
                                            <img src="<?php echo e(env('APP_URL')); ?>/images/<?php echo e($data->images2); ?>" height="100px;" width="100px;">
                                               
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">change Image 2</label>
                                            <input type="file" class="form-control" id="images2" name="images2">
                                                <?php if($errors->has('images2')): ?>
                                                        <?php echo e($errors->first('images2')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <?php else: ?>
                                                
                                                
                                                
                                                <div class="form-group">
                                            <label for="simpleFormEmail">Product Image2</label>
                                            <input type="file" class="form-control" id="images2" name="images2">
                                                <?php if($errors->has('images2')): ?>
                                                        <?php echo e($errors->first('images2')); ?>

                                                          <?php endif; ?>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($data->images4): ?>
                                       
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Product current Image4</label>
                                            <input type="hidden" readonly class="form-control" value="<?php echo e($data->images4); ?>" name="old_images4"><br>
                                            <img src="<?php echo e(env('APP_URL')); ?>/images/<?php echo e($data->images4); ?>" height="100px;" width="100px;">
                                               
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">change Image 4</label>
                                            <input type="file" class="form-control" id="images4" name="images4">
                                                <?php if($errors->has('images4')): ?>
                                                        <?php echo e($errors->first('images4')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <?php else: ?>
                                                
                                                
                                                <div class="form-group">
                                            <label for="simpleFormEmail">Product Image4</label>
                                            <input type="file" class="form-control" id="images4" name="images4">
                                                <?php if($errors->has('images4')): ?>
                                                        <?php echo e($errors->first('images4')); ?>

                                                          <?php endif; ?>
                                                </div>
                                                
                                                <?php endif; ?>
                                    
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                             <div class="form-group">
                                            <label for="simpleFormEmail">Product Youtube Embeded URL</label>
                                            <input type="text" value="<?php echo e(old('youtube_url',$data->youtube_url)); ?>" class="form-control" id="youtube_url" placeholder="Enter Url" name="youtube_url">
                                        </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                 <div class="tab-pane fade" id="tab_6_8">
                                                     <div class="form-group">
                                            <label for="simpleFormEmail">CGST(%)</label>
                                            <input type="number" id="CGST" value="<?php echo e(old('CGST',$data->CGST)); ?>" class="form-control" name="CGST"  >
                                                       <?php if($errors->has('base_price')): ?>
                                                        <?php echo e($errors->first('base_price')); ?>

                                                          <?php endif; ?> 
                                        </div>
                                        
                                         <div class="form-group">
                                            <label for="simpleFormEmail">SGST(%)</label>
                                            <input type="number" id="SGST" value="<?php echo e(old('SGST',$data->SGST)); ?>" class="form-control" name="SGST"  >
                                                       <?php if($errors->has('SGST')): ?>
                                                        <?php echo e($errors->first('SGST')); ?>

                                                          <?php endif; ?> 
                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
               <!--  End Wizard Form -->     
                    </form>
                </div>
            </div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(url('Eadmin/assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')); ?>" ></script>
<script src="<?php echo e(url('Eadmin/assets/js/pages/table/table_data.js')); ?>" ></script>
<script src="<?php echo e(url('Eadmin/assets/plugins/jquery-validation/js/jquery.validate.min.js')); ?>" ></script>
<script src="<?php echo e(url('Eadmin/assets/plugins/jquery-validation/js/additional-methods.min.js')); ?>" ></script>
<script>
 $(document).ready(function() {
  $('.summernote').summernote({
      height: 250
  });
});


// function getBrand(id)
// {

//     $(document).ready(function(){
//     //This is for remove last all append and select first option default val null
//     $('.fillBrand option:not(:first)').remove();
//        $.ajax({
//             method:'GET',
//             url:"<?php echo e(url('admin/getbrands')); ?>/"+id+",    
//             //url:"getbrands/"+id,
//             data:{'category_id':id},
//             success:function(response)
//             {
//               console.log(response);
//                  var obj = JSON.parse(response);
//                  jQuery(obj).each(function(i, item){
//                       var opt = '<option value='+item.id+'>'+item.brand_name +'</option>';
//                       $('.fillBrand').append(opt);           
//                  })
//             }

//         });

//     });
// }

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u980489449/domains/happiness.gifts/public_html/resources/views/Admin/product.blade.php ENDPATH**/ ?>