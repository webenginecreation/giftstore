@extends('user.master')
@section('main-section')

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1></h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Shopping Cart</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="table-responsive shop_cart_table">
                    <table class="table" id="cartdata" >
                        @if(session('cart'))
                        <thead>
                            <tr>
                                <th class="product-thumbnail" colspan="2">#</th>
                                <th class="product-name">Item</th>
                                <th class="product-price">Price</th>
                                <th class="product-price">Variant</th>
                                <th class="product-quantity">Qty</th>
                                <th class="product-subtotal">Total</th>
                                
                            </tr>
                        </thead>
                        <tbody >
                            <?php $total = 0 ?>
                                
                                @foreach(session('cart') as $id => $details)
                                <?php $total += $details['price'] * $details['quantity'] ?>
                                
                            <tr>
                                <td class="product-remove" data-title="Remove">

                                   <a href="javascript:void(0);" class="remove-from-cart" data-id="{{ $id }}" ><i class="ti-close remove-from-cart"></i></a>   

                                </td>
                                <td class="product-thumbnail"><a href="#"><img src="{{url('images')}}/{{ $details['photo'] }}" alt="product1"></a></td>
                                 
                                <td class="product-name" data-title="Product"><a href="#">{{ $details['name'] }}</a></td>
                                <td class="product-price" data-title="Price">{{$siteConfig->currency}}{{ $details['price'] }}</td>

                                 <td class="product-price" data-title="Size">{{(!empty($details['size']))?$details['size']:'N.A'  }}</td>


                                <td class="product-quantity" data-title="Quantity"><div class="quantity">
                                <input type="button" value="-" class="minus update-cart" data-id="{{ $id }}"   >
                                <input type="text" name="quantity" value="{{ $details['quantity']  }}" title="Qty" class="qty" size="4">
                                <input type="button" value="+" class="plus update-cart" data-id="{{ $id }}" >
                              </div></td>
                                <td class="product-subtotal" data-title="Total">{{$siteConfig->currency}}{{ $details['price'] * $details['quantity'] }}</td>


                               
                            </tr>
                            @endforeach
                              
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="px-0">
                                    <div class="row no-gutters align-items-center">

                                        <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                           <a href="" class="btn btn-line-fill btn-sm" ><i class="fas fa-arrow-left"></i>CONTINUE SHOPPING</a>
                                        </div>
                                        <div class="col-lg-8 col-md-6 text-left text-md-right">
                                            <a href="{{ route('clear-route') }}" class="btn btn-line-fill btn-sm" >Empty Cart</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>


                </div>
            </div>
            <div class="col-md-4">
                 <div class="border p-3 p-md-4">
                    <div class="heading_s1 mb-3">
                        <h6>Cart Totals</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">Subtotal</td>
                                    <td class="cart_total_amount">{{$siteConfig->currency}}{{ $total }}</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Shipping</td>
                                    <td class="cart_total_amount">Free Shipping</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Pay Total</td>
                                    <td class="cart_total_amount"><strong>{{$siteConfig->currency}}{{ $total }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    @auth
                    <a href="{{ route('checkout') }}" class="btn btn-line-fill btn-sm"><i class="fa fa-shopping-cart" aria-hidden="true"></i>PROCEED TO CHECKOUT</a>
                    @endauth
                    @guest
                    <a href="{{ route('login') }}" class="btn btn-line-fill btn-sm"><i class="fa fa-shopping-cart" aria-hidden="true"></i>PROCEED TO CHECKOUT</a>
                    @endguest
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="medium_divider"></div>
                <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                <div class="medium_divider"></div>
            </div>
        </div>
      

         @endif
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<div class="section bg_default small_pt small_pb">
    <div class="container"> 
        <div class="row align-items-center">    
            <div class="col-md-6">
                <div class="heading_s1 mb-md-0 heading_light">
                    <h3>Subscribe Our Newsletter</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form">
                    <form>
                        <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                        <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
@stop

