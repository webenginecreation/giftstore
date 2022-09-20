/* function addcart($pro_id){
             // alert();      
            $(document).ready(function(){

              $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
                $.ajax({

                    type:'POST',
                    data:{'pro_id':$pro_id},
                    url:"/addtocart/",
                    success:function(response)
                    {
                        alert(response);
                        var obj = jQuery.parseJSON(response);
                        var cart = "";
                        $.each(obj, function(key,value) {
                         cart += "<li>";
                         cart+="<a href=''><img src=''>"+ value.name +"</a>";
                         cart+="<span>"+ value.quantity +" × <span class='amount'>"+ value.price +"</span></span></li>";
                         }); 
                         $('#cart-data').html(cart);
                    }
                })


            });


             }

             */