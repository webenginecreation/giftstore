
<!-- // Let's Click this button automatically when this page load using javascript -->
<!-- You can hide this button -->
<button id="rzp-button1" hidden>Pay</button>  
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "<?php echo e($response['razorpayId']); ?>", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo e($response['total_amount']); ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "<?php echo e($response['currency']); ?>",
    "name": "<?php echo e($response['order_name']); ?>",
    "description": "<?php echo e($response['description']); ?>",
    "image": "https://happiness.gifts/images/1625153625.imgonline-com-ua-resize-gVkrinb014m.jpg", // You can give your logo url
    "order_id": "<?php echo e($response['orderId']); ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        //alert(response);
        console.log(response.order_name);
        // After payment successfully made response will come here
        // send this response to Controller for update the payment response
        // Create a form for send this data
        // Set the data in form
        document.getElementById('rzp_paymentid').value = response.razorpay_payment_id;
        document.getElementById('rzp_orderid').value = response.razorpay_order_id;
        document.getElementById('rzp_signature').value = response.razorpay_signature;
        // // Let's submit the form automatically
        document.getElementById('rzp-paymentresponse').click();
    },
    "prefill": {
        "name": "<?php echo e($response['order_name']); ?>",
        "email": "<?php echo e($response['order_email']); ?>",
        "contact": "<?php echo e($response['order_phone']); ?>"
    },
    "notes": {
        "address": "<?php echo e($response['order_address']); ?>",
        "order_address2": "<?php echo e($response['order_address2']); ?>",
    },
    "theme": {
        "color": "#F37254"
    }
};
var rzp1 = new Razorpay(options);

rzp1.on('payment.failed', function (response){
window.location.href = "<?php echo e(url('payment-order-failed')); ?>";
});
window.onload = function(){
    document.getElementById('rzp-button1').click();
};

document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

<!-- This form is hidden -->
<form action="<?php echo e(url('/payment-complete')); ?>" method="POST" hidden>
        <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token" /> 
        <input type="text" class="form-control" id="rzp_paymentid"  name="rzp_paymentid">
        <input type="text" class="form-control" id="rzp_orderid" name="rzp_orderid">
        <input type="text" class="form-control" id="rzp_signature" name="rzp_signature">
        <input type="text" class="form-control" id="order_code" name="order_code" value="<?php echo e($response['orderId']); ?>">
        <input type="text" class="form-control" id="order_name" name="order_name" value="<?php echo e($response['order_name']); ?>">
        <input type="text" class="form-control" id="order_lastname" name="order_lastname" value="<?php echo e($response['order_lastname']); ?>">
        <input type="text" class="form-control" id="order_email" name="order_email" value="<?php echo e($response['order_email']); ?>">
        <input type="text" class="form-control" id="order_phone" name="order_phone" value="<?php echo e($response['order_phone']); ?>">
        <input type="text" class="form-control" id="city" name="city" value="<?php echo e($response['city']); ?>">
        <input type="text" class="form-control" id="state" name="state" value="<?php echo e($response['state']); ?>">
        <input type="text" class="form-control" id="order_zip" name="order_zip" value="<?php echo e($response['order_zip']); ?>">
        <input type="text" class="form-control" id="order_address" name="order_address" value="<?php echo e($response['order_address']); ?>">
        <input type="text" class="form-control" id="order_address2" name="order_address2" value="<?php echo e($response['order_address2']); ?>">
        <input type="text" class="form-control" id="order_notes" name="order_notes" value="<?php echo e($response['order_notes']); ?>">
        <input type="text" class="form-control" id="total_amount" name="total_amount" value="<?php echo e($response['total_amount']); ?>">
       
    <button type="submit" id="rzp-paymentresponse" class="btn btn-primary">Submit</button>
</form><?php /**PATH /home/u980489449/domains/happiness.gifts/public_html/resources/views/user/payment.blade.php ENDPATH**/ ?>