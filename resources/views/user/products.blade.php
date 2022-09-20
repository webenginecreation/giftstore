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
                    <li class="breadcrumb-item active">Prodcuts</li>
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
			<div class="col-lg-9">
            	<div class="row align-items-center mb-4 pb-1">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="product_header_left">
                               
                            </div>
                            <div class="product_header_right">
                            	<div class="products_view">
                                    <a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                    <a href="javascript:Void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row shop_container">
                   
                    @foreach($allproducts as $value)

                    <div class="col-md-4 col-6">
                        <div class="product">
                             <span class="pr_flash">@php  $sale =  ($value->base_price - $value->discount_price )/$value->base_price; echo round($sale*100, 0);   @endphp % Off </span>
                            

                           
                            <div class="product_img">
                                <a href="{{route('products.details',$value->slug)}}">
                                    <img  data-src="{{url('images')}}/{{ $value->images }}" class="lazyload" alt="{{$value->name}}">
                                </a>
                                
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        

                                         @if(empty($value->product_link)) 
                                          @if($value->stock_status == "1")
                                          


                                                @if($value->images_allowed == "Yes" || $value->text_allowed == "Yes")

                                               

                                                  <li class="add-to-cart"><a href="{{route('products.details',$value->slug)}}"><i class="icon-basket-loaded" ></i> Personalize item </a></li>
                                                
                                                @else

                                                <li class="add-to-cart" onclick="addToCart({{$value->id}},1)"><a href="javascript:void(0);"><i class="icon-basket-loaded" ></i> Add To Cart</a></li>


                                                @endif



                                          @elseif($value->stock_status == "0")
                                             <li class="add-to-cart"><a href="javascript:void(0);"><i class="icon-basket-loaded"></i> Add To Bag</a></li>


                                          @endif
                               @else
                             <li class="add-to-cart">
                                <a href="{{$value->product_link}}" target="_blank">
                                <i class="icon-basket-loaded"></i> 
                                Add To Cart
                                </a>
                            </li>
                                     @endif

                                      @auth
                                     <li><a href="javascript:void(0);" onclick="addWishlist({{$value->id}},{{Auth::user()->id}})"><i class="icon-heart"></i></a></li>
                                    @endauth

                                    @guest
                                       
                                        <li><a href="javascript:void(0);"><i class="icon-heart" onclick="addToWishlist()"></i></a></li>
                                    @endguest
                                         <li><a href="{{route('products.details',$value->slug)}}"><i class="icon-eye"></i></a></li>
                                       
                                    </ul>

                                </div>
                                
                            </div>
                            
                            
                            
                            
                            <div class="product_info">
                                <h6 class="product_title"><a href="{{route('products.details',$value->slug)}}">{{$value->name}}</a></h6>
                                <div class="product_price">
                                  @auth
                                   @if(Auth::user()->user_type == "normal")
                                    
                                    <span class="price">&#8377;{{$value->discount_price}}</span>
                                    <del>{{$siteConfig->currency}}{{$value->base_price}}</del>
                                    <div class="on_sale">
                                        <span>@php  $sale =  ($value->base_price - $value->discount_price )/$value->base_price; echo round($sale*100, 0);   @endphp % Off</span>
                                   </div>
                                   @elseif(Auth::user()->user_type == "reseller")
                                   <span class="price">&#8377;{{$value->reseller_price}}</span>
                                   @elseif(Auth::user()->user_type == "wholeseller")
                                   <span class="price">&#8377;{{$value->wholeseller_price}}</span>
                                   @endif
                                   @endauth
                                   @guest
                                   <span class="price">&#8377;{{$value->discount_price}}</span>
                                   <del>{{$siteConfig->currency}}{{$value->base_price}}</del>
                                  
                                   @endguest
                                    


                                </div>
                               
                                <div class="pr_desc">
                                    <p>{{ $value->Short_details }}</p>
                                </div>
                               
                                <div class="list_product_action_box">
                                    <ul class="list_none pr_action_btn">

                                         @if(empty($value->product_link)) 


                                            @if($value->stock_status == "1") 



                                                @if($value->images_allowed == "Yes" || $value->text_allowed == "Yes")

                                               

                                                  <li class="add-to-cart "><a href="{{route('products.details',$value->slug)}}" class="btn-sm"><i class="icon-basket-loaded" ></i> Personalize item </a></li>
                                                
                                                @else

                                                <li class="add-to-cart" onclick="addToCart({{$value->id}},1)"><a href="javascript:void(0);" class="btn-sm"><i class="icon-basket-loaded" ></i> ADD TO BAG</a></li>


                                                @endif




                                      

                                       @elseif($value->stock_status == "0")
                                             <li class="add-to-cart"><a href="javascript:void(0);" class="btn-sm"><i class="icon-basket-loaded" ></i> SOLD OUT</a></li>
                                            @endif

                                         @else
                                          <li class="add-to-cart">
                                <a href="{{$value->product_link}}" target="_blank">
                                <i class="icon-basket-loaded"></i> 
                                Buy Now
                                </a>
                            </li>

                                     @endif
                                      
                                        @auth
                                     <li><a href="javascript:void(0);" onclick="addWishlist({{$value->id}},{{Auth::user()->id}})" class="btn-sm"><i class="icon-heart"></i></a></li>
                                    @endauth

                                    @guest
                                       
                                        <li><a href="javascript:void(0);" class="btn-sm"><i class="icon-heart" onclick="addToWishlist()"></i></a></li>
                                    @endguest
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                  
                </div>
        		<div class="row">
                    <div class="col-12">
                        <ul class="pagination mt-3 justify-content-center pagination_style1">
                            
                            {{ $allproducts->links() }}
                            
                        </ul>
                    </div>
                </div>
        	</div>
            <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
            	<div class="sidebar">
                	<div class="widget">
                        <h5 class="widget_title">VARIETIES</h5>
                        <ul class="widget_categories">
                            <li><a href="{{ route('getproducts') }}"><span class="categories_name">All Products</span></a></li>
                            @foreach($headerCategories as $value)
                            <li><a href="{{ route('getproducts',["category_id" => $value->id]) }}"><span class="categories_name">{{$value->category_name}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>

                      <div class="widget">
                        <h5 class="widget_title">Recent Posts</h5>
                        <ul class="widget_recent_post">

                             @foreach($recentPosts as $key => $value)
                            <li>
                                <div class="post_footer">
                                    <div class="post_img">
                                        <a href="{{route('blog.details',["slug" => $value->blog_slug])}}"><img src="{{url('blogimg')}}/{{ $value->blog_images }}" alt="letest_post1"></a>
                                    </div>
                                    <div class="post_content">
                                        <h6><a href="{{route('blog.details',["slug" => $value->blog_slug])}}">{{ $value->blog_title }}</a></h6>
                                        <p class="small m-0">{{$value->created_at->diffForHumans()}}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                          
                        </ul>
                    </div>
                   
                    <div class="widget">
                        <div class="shop_banner">
                            <div class="banner_img overlay_bg_20">
                                <img data-src="https://img.freepik.com/free-vector/digital-marketing-infographic_52683-9003.jpg?size=338&ext=jpg" alt="sidebar_banner_img" class="lazyload">
                            </div> 
                            <div class="shop_bn_content2 text_white">
                                <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                                <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                                <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                            </div>
                        </div>
                    </div>
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
@stop