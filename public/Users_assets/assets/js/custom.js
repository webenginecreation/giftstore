$(document)
    .ready(function() {
        $('.customer-logos')
            .slick({
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
@if(Session::has('message'))
var type = "{{ Session::get('alert-type', 'info') }}";
switch (type) {
    case 'info':
        toastr.options = {
            "closeButton": true,
            "progressBar": false
        }
        toastr.info("{{ Session::get('message') }}");
        break;
    case 'warning':
        toastr.options = {
            "closeButton": true,
            "progressBar": false
        }
        toastr.warning("{{ Session::get('message') }}");
        break;
    case 'success':
        toastr.options = {
            "closeButton": true,
            "progressBar": false
        }
        toastr.success("{{ Session::get('message') }}");
        break;
    case 'error':
        toastr.options = {
            "closeButton": true,
            "progressBar": false
        }
        toastr.error("{{ Session::get('message') }}");
        break;
}
@endif

function addToCart($id, $qty) {
    $(document)
        .ready(function() {
            $ablsize = $('#ablsize')
                .val();
            //alert($ablsize);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]')
                        .attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                data: {
                    'product_id': $id,
                    "qty": $qty,
                    'size': $ablsize
                },
                url: "http://127.0.0.1:8000/add-to-cart/",
                success: function(response) {
                    relaodCart();
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": false,
                    }
                    toastr.success("Product Added in Cart !!");
                }
            });
        });
}

function relaodCart() {
    $('.cart-items-header')
        .load(location.href + ' .cart-items-header');
}
$(document)
    .ready(function() {
        $(".update-cart")
            .click(function(e) {
                e.preventDefault();
                var ele = $(this);
                var qty = ele.parents("tr")
                    .find(".qty")
                    .val()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name="_token"]')
                            .attr('content')
                    }
                });
                $.ajax({
                    url: "update-cart",
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id"),
                        quantity: qty
                    },
                    success: function(response) {
                        //alert(response);
                        window.location.reload();
                    }
                });
            });
        $(".remove-from-cart")
            .click(function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name="_token"]')
                            .attr('content')
                    }
                });
                e.preventDefault();
                var ele = $(this);
                if (confirm("Are you sure")) {
                    $.ajax({
                        url: 'remove-from-cart',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.attr("data-id")
                        },
                        success: function(response) {
                            //alert(response);
                            window.location.reload();
                        }
                    });
                }
            });
    });

function addToWishlist() {
    toastr.options = {
        "closeButton": true,
        "progressBar": false,
        "positionClass": 'toast-top-center',
    }
    toastr.warning("Please Login first to add Wishlist");
}

function addWishlist($product_id, $user_id) {
    $(document)
        .ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]')
                        .attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: 'dashboard/add-to-wishlist',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_id: $user_id,
                    product_id: $product_id
                },
                success: function(response) {
                    if (response == 200) {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": false,
                        }
                        toastr.success("Added In Wishlist");
                    } else {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": false,
                        }
                        toastr.error("Already Added");
                    }
                }
            });
        });
}