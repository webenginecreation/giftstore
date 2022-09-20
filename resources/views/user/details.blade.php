@extends('user.master')
@section('title', $productDetails->name)
@section('meta_keywords', $productDetails->meta_keyword)
@section('meta_description', $productDetails->meta_description)
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
                    <li class="breadcrumb-item"><a href="{{ route('getproducts',["category_id" =>  $productDetails->category->id]) }}">{{ $productDetails->category->category_name  }}</a></li>
                    <li class="breadcrumb-item active">{{ $productDetails->name }}</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

    {{-- scrollable menu --}}
{{-- <style>
div.scrollmenu {
  background-color: #ffffff;
  overflow: auto;
  white-space: nowrap;
  -webkit-overflow-scrolling: touch;*
}

div.scrollmenu a {
  display: inline-block;
  color: #909385;
  text-align: center;
  padding: 12px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
  
}
</style>

<div class="scrollmenu">
     @foreach($headerCategories as $value)
  <a href="{{ route('getproducts',["category_id" => $value->id]) }}" class="">{{ strtoupper($value->category_name) }}</a>
  @endforeach
</div>
 --}}

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
       
		<div class="row">

            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
              <div class="product-image vertical_gallery">
                    <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-vertical="true" data-vertical-swiping="true" data-slides-to-show="5" data-slides-to-scroll="1" data-infinite="false">
                        <div class="item">
                            <a href="#" class="product_gallery_item active" data-image="{{ url('images') }}/{{ $productDetails->images }}" data-zoom-image="{{ url('images') }}/{{ $productDetails->images }}">
                                <img data-src="{{ url('images') }}/{{ $productDetails->images }}" class="lazyload" alt="product_small_img1" />
                            </a>
                        </div>
                        @if(!empty($productDetails->images1))
                        <div class="item">
                             <a href="#" class="product_gallery_item active" data-image="{{ url('images') }}/{{ $productDetails->images1 }}" data-zoom-image="{{ url('images') }}/{{ $productDetails->images1 }}">
                                <img data-src="{{ url('images') }}/{{ $productDetails->images1 }}" class="lazyload" />
                            </a>
                        </div>
                        @endif
                         @if(!empty($productDetails->images2))
                        <div class="item">
                            <a href="#" class="product_gallery_item active" data-image="{{ url('images') }}/{{ $productDetails->images2 }}" data-zoom-image="{{ url('images') }}/{{ $productDetails->images2 }}">
                                <img data-src="{{ url('images') }}/{{ $productDetails->images2 }}" alt="product_small_img1"  class="lazyload"/>
                            </a>
                        </div>
                        @endif
                         @if(!empty($productDetails->images3))
                        <div class="item">
                             <a href="#" class="product_gallery_item active" data-image="{{ url('images') }}/{{ $productDetails->images3 }}" data-zoom-image="{{ url('images') }}/{{ $productDetails->images3 }}">
                                <img data-src="{{ url('images') }}/{{ $productDetails->images3 }}" alt="product_small_img1" class="lazyload"/>
                            </a>
                        </div>
                        @endif
                         @if(!empty($productDetails->images4))
                        <div class="item">
                            <a href="#" class="product_gallery_item active" data-image="{{ url('images') }}/{{ $productDetails->images4 }}" data-zoom-image="{{ url('images') }}/{{ $productDetails->images4 }}">
                                <img data-src="{{ url('images') }}/{{ $productDetails->images4 }}" alt="product_small_img1" class="lazyload"/>
                            </a>
                        </div>
                        @endif
                        
                    </div>
                    <div class="product_img_box">
                        <img id="product_img" src='{{ url('images') }}/{{ $productDetails->images }}' data-zoom-image="{{ url('images') }}/{{ $productDetails->images }}" alt="product_img1" />
                        <a href="#" class="product_img_zoom" title="Zoom">
                            <span class="linearicons-zoom-in"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="pr_detail">
                    <div class="product_description">
                        <h4 class="product_title"><a href="#">{{ $productDetails->name }}</a></h4>

                        <div class="product_price">
                           @auth
                                   @if(Auth::user()->user_type == "normal")
                                    
                                    <span class="price">&#8377;{{$productDetails->discount_price}}</span>
                                    <del>{{$siteConfig->currency}}{{$productDetails->base_price}}</del>
                                    <div class="on_sale">
                                        <span>@php  $sale =  ($productDetails->base_price - $productDetails->discount_price )/$productDetails->base_price; echo round($sale*100, 0);   @endphp % Off</span>
                                   </div>
                                   @elseif(Auth::user()->user_type == "reseller")
                                   <span class="price">&#8377;{{$productDetails->reseller_price}}</span>
                                   @elseif(Auth::user()->user_type == "wholeseller")
                                   <span class="price">&#8377;{{$productDetails->wholeseller_price}}</span>
                                   @endif
                                   @endauth
                                   @guest
                                   <span class="price">&#8377;{{$productDetails->discount_price}}</span>
                                   <del>{{$siteConfig->currency}}{{$productDetails->base_price}}</del>
                                   @endguest
                        </div>
                        <br>
                       <div class="pr_desc">
                            <p>{{ $productDetails->Short_details }}</p>
                        </div>
                        <div class="product_sort_info">
                            <ul>
                                 @if(isset($productDetails->brand->brand_name))
     <li><i class="linearicons-shield-check"></i><b>Brand:</b> <a href="#"> <img src="{{env('APP_URL')}}/brand_icon/{{ $productDetails->brand->brand_icon }}" date-html="true" data-toggle="tooltip"   title="Trusted Brand"  style="height: 60px; width=auto;"  > | <b> {{ $productDetails->brand->brand_name  }}</b></a> | <a href="javascript:void(0);" data-html="true" data-toggle="popover" title="{{$productDetails->brand->brand_name}}" data-content="{{$productDetails->brand->about_brand}}">More About {{ $productDetails->brand->brand_name  }} </a></li>
     
                       @endif
                                <li><i class="linearicons-shield-check"></i> Total Saving :<b>{{$siteConfig->currency}} @php echo $productDetails->base_price - $productDetails->discount_price;   @endphp </b> </li>
                                <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                                <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>
                            </ul>
                        </div>
                        
                        @if(!empty($productDetails->size))

                       <div class="pr_switch_wrap">
                            <span class="switch_lable">Variant</span>
                            <div class="product_size_switch" >
                                <select name="ablsize" id="ablsize">
                                 @foreach(explode(',', $productDetails->size) as $info) 
                                      <option value="{{$info}}">{{$info}}</option>
                                 @endforeach
                                </select>

                             
                            
                            </div>
                        </div>
                        @endif
                    </div>
                    <hr />
                    <div class="cart_extra">
                        <div class="cart-product-quantity">
                            <div class="quantity">
                                <input type="button" value="-" class="minus">
                                <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                <input type="button" value="+" class="plus">
                            </div>
                        </div>



                        @if($productDetails->stock_status == "1")
                        
                        @if(!empty($productDetails->product_link))
                        <div class="cart_btn">
                            <a href="{{$productDetails->product_link}}" class="btn btn-fill-out btn-addtocart" target="_blank" ><i class="icon-basket-loaded"></i>Buy Now</a>
                           
                        </div>
                        @elseif($productDetails->images_allowed == "Yes")
                         
                          <div class="cart_btn">
                            <button class="btn btn-line-fill btn-sm" data-toggle="modal" data-target="#personalize" type="button"  ><i class="fa fa-gift" aria-hidden="true"></i>PERSONALIZED ITEM</button>
                           
                        </div>
                        @elseif($productDetails->text_allowed == "Yes")

                         <div class="cart_btn">
                            <button class="btn btn-line-fill btn-sm" data-toggle="modal" data-target="#personalize" type="button"  ><i class="fa fa-gift" aria-hidden="true"></i>PERSONALIZED ITEM</button>
                           
                        </div>
                        @else
                            <div class="cart_btn">
                            <button class="btn btn-line-fill btn-sm btn-addtocart"  type="button" onclick="addToCart({{$productDetails->id}},1)" ><i class="fa fa-plus" aria-hidden="true"></i>ADD TO BAG</button>
                           
                        </div>
                        &nbsp;
                          <div class="cart_btn">
                            <button class="btn btn-line-fill btn-sm btn-addtocart"  type="button" onclick="addToWishlist()"><i class="fa fa-heart" aria-hidden="true" ></i>WISHLIST</button>
                           
                        </div>

                         @endif
                        @elseif($productDetails->stock_status == "0")
                        <div class="cart_btn">
                            <button class="btn btn-line-fill btn-sm btn-addtocart" type="button" disabled ><i class="icon-basket-loaded"></i>SOLD OUT</button>
                           
                        </div>
                        @endif
                        
                       
                    </div>
                    <hr />
                    <ul class="product-meta">
                        <li>SKU: <a href="#">{{ $productDetails->sku }}</a></li>
                        <li>Category: <a href="#">{{ $productDetails->category->category_name  }}</a></li>
                        <li>Tags: <a href="#">{{ $productDetails->tags  }}</a></li>
                       
                    </ul>
                    
                    <div class="product_share">
                        <span>Share:</span>
                        <ul class="social_icons">
                            <li><a href="#"   onclick="
    window.open(
      'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
      'facebook-share-dialog', 
      'width=626,height=436'); 
    return false;" ><i class="ion-social-facebook"></i></a></li>
                            <li  onclick="
    window.open(
      'https://twitter.com/intent/tweet?url=='+encodeURIComponent(location.href), 
      'twitter-share-dialog', 
      'width=626,height=436'); 
    return false;"><a href="#"><i class="ion-social-twitter"></i></a></li>

                            <li><a href="https://api.whatsapp.com/send?text={{Request::url()}}" target="_blank"><i class="icon ion-social-whatsapp"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="large_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="tab-style3">
					<ul class="nav nav-tabs" role="tablist">
                        @if(!empty($productDetails->details))
						<li class="nav-item">
							<a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                      	</li>
                        @endif

                        @if(!empty($productDetails->additional_info))

                            <li class="nav-item">
                            <a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Additional info</a>
                        </li>
                        @endif
                         @if(!empty($productDetails->specification))
                        <li class="nav-item">
                            <a class="nav-link" id="specification-tab" data-toggle="tab" href="#specification" role="tab" aria-controls="specification" aria-selected="false">specification</a>
                        </li>
                        @endif
                          @if(!empty($productDetails->youtube_url))
                        <li class="nav-item">
                            <a class="nav-link" id="youtube_url-tab" data-toggle="tab" href="#youtube_url" role="tab" aria-controls="youtube_url" aria-selected="false">youtube Url</a>
                        </li>
                        @endif


                       
                      
                      	
                    </ul>
                	<div class="tab-content shop_info_tab">
                      	<div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                        	<p>{!! $productDetails->details !!}<p>
                      	</div>
                        <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">

                            <p>{!! $productDetails->additional_info !!}<p>
                            
                        </div>
                         <div class="tab-pane fade" id="specification" role="tabpanel" aria-labelledby="specification-tab">

                            <p>{!! $productDetails->specification !!}<p>
                            
                        </div>

                         <div class="tab-pane fade" id="youtube_url" role="tabpanel" aria-labelledby="youtube_url-tab">

                            <p>{!! $productDetails->youtube_url !!}<p>
                            
                        </div>

                      
                	</div>


                  
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="small_divider"></div>
            	<div class="divider"></div>
                <div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="heading_s1">
                	<h3>Releted Products</h3>
                </div>
            	<div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                    
                    @foreach($getRelatedProducts as $index => $value)
                    
                	<div class="item">
                        <div class="product">
                            <div class="product_img">
                                <a href="{{route('products.details',$value->slug)}}">
                                    <img data-src="{{ url('images') }}/{{$value->images }}" class="lazyload" alt="product_img1">
                                </a>
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                       <li><a href="#"><i class="icon-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="{{route('products.details',$value->slug)}}">{{ $value->name }}</a></h6>
                                <div class="product_price">
                                    <span class="price">{{$siteConfig->currency}}{{ $value->discount_price }}</span>
                                   
                                    <div class="on_sale">
                                        <span>{{$siteConfig->currency}}@php  $sale =  ($value->base_price - $value->discount_price )/$value->base_price; echo round($sale*100, 0);   @endphp % Off</span>
                                    </div>
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

<!-- Home Popup Section -->
<div class="modal fade subscribe_popup" id="personalize" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
                <div class="row no-gutters">
                    <div class="col-sm-5">
                        <div class="background_bg h-100 lazyload" data-img-src="{{ url('images') }}/{{ $productDetails->images }}"></div>
                    </div>
                    <div class="col-sm-7">
                        <div class="popup_content">
                            <div class="popup-text">
                                <div class="heading_s1">
                                    <h4>Personalize Your Product</h4>
                                </div>
                                
                            </div>

                            @if($productDetails->images_allowed == "Yes")

                            <form method="post" action="{{route('order.upload')}}"  enctype="multipart/form-data" 
                  class="dropzone" id="dropzone" >
                                    @csrf
                                        </form> 

                            @endif

                              <br>

                            @if($productDetails->text_allowed == "Yes")
                               <div class="form-group">
                                    <input name="text" required="" id="customtext" required type="text" class="form-control rounded-0" placeholder="Enter Your Text">
                                    <small> *Please Provide Required Text/Photo For Your Order </small>
                                </div>
                             @endif
                             
                             
                               <div class="form-group">
                                    <button class="btn btn-fill-line btn-block text-uppercase rounded-0" id="personalizeValidation" title="Subscribe" onclick="return valda();" type="button"  data-dismiss="modal" aria-label="Close">Add To Bag</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Screen Load Popup Section --> 
@stop
@push('extra-script')
<script>

function valda()
{
  //Attempt to get the element using document.getElementById
    var element1 = document.getElementById("dropzone");
    //alert(element1.value);
    //var count =   dropzone.files.length;
    //alert(count);
    var element2 = document.getElementById("customtext");
    //If it isn't "undefined" and it isn't "null", then it exists.
    if(typeof(element1) != 'undefined' && element1 != null){
       if(element1.value === '' )
            {
                 alert('Please Add Photo');
                 return false;
            }
            
    } 
    if(typeof(element2) != 'undefined' && element2 != null){
       
            if(element2.value === '')
            {
                 alert('We Need Custom Text');
                 return false;
            }
    }
    addToCart({{$productDetails->id}},1);
     
    
    
}
    
</script>
@endpush
