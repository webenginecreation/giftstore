<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $__env->yieldContent('title','Biztria.com | Lets Beauty With Us'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords','Facewash,eyliner,beardo,laptops,shoes'); ?>">
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description','Love Beauty? Descover best beauty products & Fashion products, Beauty guide, information about products, Mens & Womens.'); ?>">
    <link rel="canonical" href="<?php echo e(url()->current()); ?>"/>
    <meta name="_token" content="<?php echo e(csrf_token()); ?>">
    <?php echo $__env->make('user.common.link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style type="text/css">
    	.preloader {
   display: none;
   background-color: rgba(255,255,255,0.7);
   z-index:9999;
   color: #000000;
   
}
@media  only screen and (max-width: 1024px) {
   .preloader {
      display: none;
      background-color: rgba(255,255,255,0.7);
      z-index:9999;
      color: #000000;
   }
}
#pluswrap {
position: fixed;
width: 100%;
height:100%;
display: flex;
align-items: center;
top: 0;
}

.plus {
  display: flex;
  margin: 0 auto;
}
.float{
    position:fixed;
    width:60px;
    height:60px;
    bottom:40px;
    right:40px;
    background-color:#25d366;
    color:#FFF;
    border-radius:50px;
    text-align:center;
  font-size:30px;
    box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
    margin-top:16px;
}

    </style>
</head>
<body>
	<!-- LOADER -->
  <div class="preloader">
  <div id="pluswrap">
     <div class="plus">
         <div class="d-flex justify-content-center">
         <div class="spinner-border" role="status">
         <span class="sr-only">Loading...</span>
         </div>
    </div>
   </div>
  </div>
</div>

<a href="https://api.whatsapp.com/send?phone=918866174302&text=Hello, Trying to reach you!" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

<!-- END LOADER -->
<?php echo $__env->make('user.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('main-section'); ?>
<?php echo $__env->make('user.common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('user.common.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldPushContent('extra-script'); ?>
<!--Start of Tawk.to Script-->
<!--<script type="text/javascript">-->
<!--var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();-->
<!--(function(){-->
<!--var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];-->
<!--s1.async=true;-->
<!--s1.src='https://embed.tawk.to/60cb297165b7290ac63671c7/1f8cpjpme';-->
<!--s1.charset='UTF-8';-->
<!--s1.setAttribute('crossorigin','*');-->
<!--s0.parentNode.insertBefore(s1,s0);-->
<!--})();-->
<!--</script>-->
<!--End of Tawk.to Script-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WGN85R86BR"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-WGN85R86BR');
</script>
</body>
</html><?php /**PATH C:\xampp\htdocs\happiness\resources\views/user/master.blade.php ENDPATH**/ ?>