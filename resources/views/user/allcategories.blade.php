@extends('user.master')
@section('main-section')
 
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
                    <li class="breadcrumb-item active">All Varities</li>
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
            <div class="col-12">
                <div class="heading_s1 text-center">
                    <h2 style="font-family: 'Lobster', cursive !important;">OUR COLLECTION</h2>
                </div>
                <div class="row shop_container grid">
                     @foreach($headerCategories as $value)
                    <div class="col-lg-4 col-md-4 col-6">
                        <div class="product">
                            <div class="product_img">
                                <a href="{{ route('getproducts',["category_id" => $value->id]) }}">
                                    <img data-src="{{ url('category_images') }}/{{$value->category_icon }}" class="lazyload" alt="product_img1">
                                </a>
                            
                            </div>
                            <div class="product_info">
                                <h6 class="product_title" style="font-family: 'Lobster', cursive !important;"><a href="{{ route('getproducts',["category_id" => $value->id]) }}">{{ $value->category_name }}</a></h6>
                               
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



                
@stop