
<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 
<!-- Latest jQuery --> 
<script data-cfasync="false" src="<?php echo e(url('Users_assets')); ?>/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="<?php echo e(url('Users_assets')); ?>/assets/js/jquery-1.12.4.min.js"></script> 
<!-- popper min js -->
<script src="<?php echo e(url('Users_assets')); ?>/assets/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap --> 
<script src="<?php echo e(url('Users_assets')); ?>/assets/bootstrap/js/bootstrap.min.js"></script> 
<!-- owl-carousel min js  --> 
<script src="<?php echo e(url('Users_assets')); ?>/assets/owlcarousel/js/owl.carousel.min.js"></script> 
<!-- magnific-popup min js  --> 
<script src="<?php echo e(url('Users_assets')); ?>/assets/js/magnific-popup.min.js"></script> 
<!-- waypoints min js  --> 
<script src="<?php echo e(url('Users_assets')); ?>/assets/js/waypoints.min.js"></script> 
<!-- parallax js  --> 
<script src="<?php echo e(url('Users_assets')); ?>/assets/js/parallax.js"></script> 
<!-- countdown js  --> 
<script src="<?php echo e(url('Users_assets')); ?>/assets/js/jquery.countdown.min.js"></script> 
<!-- imagesloaded js --> 
<script src="<?php echo e(url('Users_assets')); ?>/assets/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js --> 
<script src="<?php echo e(url('Users_assets')); ?>/assets/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="<?php echo e(url('Users_assets')); ?>/assets/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="<?php echo e(url('Users_assets')); ?>/assets/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="<?php echo e(url('Users_assets')); ?>/assets/js/jquery.elevatezoom.js"></script>
<!-- scripts js --> 
<script src="<?php echo e(url('Users_assets')); ?>/assets/js/scripts.js"></script>
<!--add-to-cart js -->
<script src="<?php echo e(url('Users_assets')); ?>/assets/js/add-to-cart.js"></script>
<!-- This is For toastr js for notification online CDN  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<!-- This is For jquery Validation online CDN  -->
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script src="<?php echo e(url('Users_assets')); ?>/assets/js/uservalidation.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
    
    $('.customer-logos').slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
        arrows: false,
        dots: false,
        pauseOnHover: true,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
</script>


<script>
  <?php if(Session::has('message')): ?>
    var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
    switch(type){
        case 'info':
         toastr.options =
  {
    "closeButton" : true,
    "progressBar" : false
  }
            toastr.info("<?php echo e(Session::get('message')); ?>");
            break;
        
        case 'warning':
         toastr.options =
  {
    "closeButton" : true,
    "progressBar" : false
  }
            toastr.warning("<?php echo e(Session::get('message')); ?>");
            break;

        case 'success':
        toastr.options =
  {
    "closeButton" : true,
    "progressBar" : false
  }
            toastr.success("<?php echo e(Session::get('message')); ?>");
            break;

        case 'error':
         toastr.options =
  {
    "closeButton" : true,
    "progressBar" : false
  }
            toastr.error("<?php echo e(Session::get('message')); ?>");
            break;
    }
  <?php endif; ?>
</script>

<script type="text/javascript">
        const personalizeImages = [];
        Dropzone.options.dropzone =
         {
            maxFilesize: 5,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png",
            addRemoveLinks: true,
            timeout: 5000,
            success: function(file, response) 
            {
                console.log(response);
                addArrayCustomeImages(response);
            },
            error: function(file, response)
            {
               return false;
            }
};


function addArrayCustomeImages(response)
{
      const count = personalizeImages.push(response.success);
      console.log(count);
         
       
}

  function addToCart($id,$qty)
{
  $(document).ready(function(){

        $ablsize = $('#ablsize').val();
        customtext = $('#customtext').val();
        $.ajaxSetup({
        headers: {
        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
        });
       

        $.ajax({
            type:'POST',
            data:{'product_id':$id,"qty":$qty,'size':$ablsize,'personalize_image':personalizeImages,'customtext':customtext},
            beforeSend: function()
            {
                 $('.preloader').show();
            },
            url:"/add-to-cart",
            success:function(response)
            {

               relaodCart();
               $('.preloader').hide();
               $('#personalize').modal('hide');
               toastr.options =
  {
    "closeButton" : true,
    "progressBar" : false,
    

  }
            toastr.success("Product Added in Cart !!");
                
                
                         
                

            }

    });

    });
}

function relaodCart(){
      
     $('.cart-items-header').load(location.href + ' .cart-items-header');
    
    }


</script>

<script type="text/javascript">





    $(document).ready(function(){

        $(".update-cart").click(function (e) {
           e.preventDefault();
           var ele = $(this);
            var qty = 	ele.parents("tr").find(".qty").val()
      
        $.ajaxSetup({
        headers: {
        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
        });
            $.ajax({
               url: "update-cart",
               method: "patch",
               data: {_token: '<?php echo e(csrf_token()); ?>', id: ele.attr("data-id"), quantity: qty},
               success: function (response) {
                   //alert(response);
                   window.location.reload();
               }
            });
        });



        $(".remove-from-cart").click(function (e) {

          e.preventDefault();
        
        $.ajaxSetup({
        headers: {
        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
        });
        
          
            var ele = $(this);
            if(confirm("Are you sure")) {



                $.ajax({
                    url: 'remove-from-cart',
                    method: "DELETE",
                    data: {_token: '<?php echo e(csrf_token()); ?>', id: ele.attr("data-id")},
                    success: function (response) {
                       //alert(response);

                        window.location.reload();
                    }
                });
            }
        });




});


    


</script>



<script type="text/javascript">
  function addToWishlist()
  {

    toastr.options =
  {
    "closeButton" : true,
    "progressBar" : false,
    "positionClass":'toast-top-center',
    

  }
            toastr.warning("Please Login first to add Wishlist");

  }


  function addWishlist($product_id,$user_id)
  {
      
  
    $(document).ready(function(){

       $.ajaxSetup({
        headers: {
        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
        });

      $.ajax({

          method:"POST",
          url:'/dashboard/add-to-wishlist',
          data:{_token: '<?php echo e(csrf_token()); ?>',user_id:$user_id,product_id:$product_id},
          success:function(response){

            if(response == 200)
            {
                toastr.options =
                {
                  "closeButton" : true,
                  "progressBar" : false,
                }
            toastr.success("Added In Wishlist");
            }
            else
            {
              toastr.options =
                {
                  "closeButton" : true,
                  "progressBar" : false,
                }
            toastr.error("Already Added");

            }
          
          }


      });

    });



  }
</script>


<!-- This is for userLogin Validation script  -->




<!-- This is Script Adjust by admin side additional js it should be a always last in the list  -->
<script>
	<?php if(isset($siteConfig->additional_js)): ?>
	<?php echo e($siteConfig->additional_js); ?>

	<?php endif; ?>
</script>



<?php /**PATH C:\xampp\htdocs\Shopping\resources\views/user/common/script.blade.php ENDPATH**/ ?>