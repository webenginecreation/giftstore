@extends('user.master')
@section('main-section')
<!-- END MAIN CONTENT -->
<div class="main_content">
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<style type="text/css">
    .offer_slider
    {
        padding: 20px 0 !important;
       position: relative;
    }
    /*brand slider*/
    /* Slider */

.slick-slide {
    margin: 0px 20px;
}

.slick-slide img {
    width: 100%;
}

.slick-slider
{
    position: relative;
    display: block;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
            user-select: none;
    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;
    display: block;
}
.slick-track:before,
.slick-track:after
{
    display: table;
    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;
    height: auto;
    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}
.rounds
{
   border-radius: 15px; 
}

</style>


@include('user.common.banner')

<br>
<div class="container">
     <div class="row">
            <div class="col-12">
                <div class="heading_s1">
                    <h2>Our Awesome Varities</h2>
                </div>
                <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-margin="20"  data-nav="true" data-responsive='{"0":{"items": "2"}, "481":{"items": "2"}, "768":{"items": "2"}, "1199":{"items": "5"}}' data-loop="true">
                    
                    @foreach($headerCategories as $index => $value)
                    
                    <div class="item" >
                        <div class="product rounds">
                             <a href="{{ route('getproducts',["category_id" => $value->id]) }}">
                            <div class="product_img">
                               
                               
                               
                            </div>
                                 <img src="{{ url('category_images') }}/{{$value->category_icon }}" class="rounds" alt="product_img1">
                                </a>
                            <div class="product_info">
                                <h6 class="product_title"><a href="{{ route('getproducts',["category_id" => $value->id]) }}">{{ $value->category_name }}</a></h6>
                               
                                
                              
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</div>





<div class="section pb_20">
	<div class="container">
    	<div class="row">
        	<div class="col-md-6">
            	<div class="single_banner">
                    <a href="https://amzn.to/2XeFAuE" class="single_bn_link">
                	<img data-src="{{url('Users_assets')}}/assets/images/home1.jpg" class="lazyload rounds" alt="shop_banner_img1"/>
                    <div class="single_banner_info">
                        <h5 class="single_bn_title1"></h5>
                        <h3 class="single_bn_title"></h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            	<div class="single_banner">
                    <a href="https://amzn.to/2Vxs1ps" class="single_bn_link">
                	<img data-src="{{url('Users_assets')}}/assets/images/home2.jpg" alt="shop_banner_img2" class="lazyload rounds"/>
                    <div class="single_banner_info">
                        <h3 class="single_bn_title"></h3>
                        <h4 class="single_bn_title1"></h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BANNER -->


@foreach($grouped as $index => $value)

<!-- START SECTION SHOP -->
<div class="section offer_slider">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="heading_s1" >
                    <h2>{{ $index }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true"  data-nav="true" data-margin="20" data-dots="true" data-responsive='{"0":{"items": "2"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "5"}}'>
                    @foreach($value as $i => $v)
                    
                    <div class="item">
                        <div class="product">
                            @auth
                            @if(Auth::user()->user_type == "normal")
                            <span class="pr_flash">@php  $sale =  ($v->base_price - $v->discount_price )/$v->base_price; echo round($sale*100, 0);   @endphp % Off </span>
                            @elseif(Auth::user()->user_type == "reseller")
                            <span class="pr_flash">Reseller</span>
                            @elseif(Auth::user()->user_type == "wholeseller")
                            <span class="pr_flash">Wholeseller</span>
                            @endif
                            @endauth
                            @guest
                            <span class="pr_flash">@php  $sale =  ($v->base_price - $v->discount_price )/$v->base_price; echo round($sale*100, 0);   @endphp % Off </span>
                            @endguest
                            
                            
                          <div class="product_img">
                                <a href="{{route('products.details',$v->slug)}}">
                                    <img data-src="{{url('images')}}/{{ $v->images }}" class="lazyload" alt="product_img1">
                                </a>
                                
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                  @if(empty($v->product_link))   


                                        @if($v->images_allowed == "Yes" || $v->text_allowed == "Yes")
                                        
                                        <li class="add-to-cart"><a href="{{route('products.details',$v->slug)}}"><i class="icon-basket-loaded" ></i> Personalize item </a></li>
                                        
                                        @else
                                  <li class="add-to-cart" onclick="addToCart({{$v->id}},1)">
                                <a href="javascript:void(0)"><i class="icon-basket-loaded" ></i> 
                                Add To Cart
                                </a>
                            </li>

                                     @endif
                             @else
                             <li class="add-to-cart">
                                <a href="{{$v->product_link}}" target="_blank">
                                <i class="icon-basket-loaded"></i>ADD TO BAG</a>
                            </li>
                            @endif

                                    @auth
                                     <li><a href="javascript:void(0);" onclick="addWishlist({{$v->id}},{{Auth::user()->id}})"><i class="icon-heart"></i></a></li>
                                     
                                    @endauth

                                    @guest
                                       
                                        <li><a href="javascript:void(0);"><i class="icon-heart" onclick="addToWishlist()"></i></a></li>
                                        
                                    @endguest
                                    <li><a href="{{route('products.details',$v->slug)}}"><i class="icon-eye"></i></a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="{{route('products.details',$v->slug)}}">{{ $v->name }}</a></h6>
                                <div class="product_price">
                                    @auth
                                   @if(Auth::user()->user_type == "normal")
                                    
                                    <span class="price">&#8377;{{$v->discount_price}}</span>
                                    <del>{{$siteConfig->currency}}{{$v->base_price}}</del>
                                   
                                   @elseif(Auth::user()->user_type == "reseller")
                                   
                                   <span class="price">&#8377;{{$v->reseller_price}}</span>
                                   
                                   @elseif(Auth::user()->user_type == "wholeseller")
                                   
                                   <span class="price">&#8377;{{$v->wholeseller_price}}</span>
                                   
                                   @endif
                                   @endauth
                                   @guest
                                   <span class="price">&#8377;{{$v->discount_price}}</span>
                                    <del>{{$siteConfig->currency}}{{$v->base_price}}</del>
                                   @endguest
                                    
                                   
                                   
                                   {{-- <div class="on_sale">
                                        <span>@php  $sale =  ($v->base_price - $v->discount_price )/$v->base_price; echo round($sale*100, 0);   @endphp % Off </span>
                                    </div>--}}
                                </div>
                                
                               
                               
                              
                            </div>
                        </div>
                    </div>
                    
                    @endforeach
                </div>
            </div>
        </div>
       
    </div>
</div>
<!-- END SECTION SHOP -->

@endforeach
<!-- START SECTION SINGLE BANNER --> 
<div class="section bg_light_blue2 pb-0 pt-md-0">
	<div class="container">
    	<div class="row align-items-center flex-row-reverse">
            <div class="col-md-6 offset-md-1">
            	<div class="medium_divider d-none d-md-block clearfix"></div>
            	<div class="trand_banner_text text-center text-md-left">
                    <div class="heading_s1 mb-3">
                        <span class="sub_heading">The Man Company Facial Care Kit | Charcoal Face Wash, Face Scrub, Peel Off Mask, Moisturising Face Cream | Cleansing, Exfoliates, Blackhead Remover</span>
                        <h2>Charcoal</h2>
                    </div>
                    <h5 class="mb-4">Sale Get up to 50% Off</h5>
                    <a href="https://amzn.to/3hmS0b4" class="btn btn-fill-out rounded-0">Shop Now</a>
                </div>
            	<div class="medium_divider clearfix"></div>
            </div>
            <div class="col-md-5">
                <div class="text-center trading_img">
                    <img data-src="{{url('Users_assets')}}/assets/images/home3.jpg" class="lazyload" alt="tranding_img"/>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SINGLE BANNER --> 



<!-- START SECTION SHOP INFO -->
<div class="section pb_70">
    	<div class="container">
            <div class="row no-gutters">
                <div class="col-lg-4">	
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-shipped"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>Free Delivery</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">	
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-money-back"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>30 Day Return</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">	
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-support"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>27/4 Support</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END SECTION SHOP INFO -->

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
<!-- END MAIN CONTENT -->
@stop