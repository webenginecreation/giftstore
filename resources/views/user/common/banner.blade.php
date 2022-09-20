<!-- START SECTION BANNER -->



<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
        <div class="carousel-inner">

            @foreach($Banners as $index => $value)

            <div class="carousel-item {{ $index == 0 ? 'active' : '' }} background_bg" data-img-src="{{url('slider_image')}}/{{ $value->slider_image }}">

                @if($value->slider_text == 1)
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-7 col-9">
                                <div class="banner_content overflow-hidden">
                                	<h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">{{ $value->title_1 }}</h5>
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">{{ $value->title_2 }}</h2>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="{{ $value->banner_link }}" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
                @endif
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- END SECTION BANNER -->