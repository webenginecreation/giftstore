
<!-- START FOOTER -->
<footer class="footer_dark">
	<div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                	<div class="widget">
                        <div class="footer_logo">
                            <a href="#"><img src="{{url('images')}}/{{(isset($siteConfig->logo)) ? $siteConfig->logo : 'logo_dark.png' }}" alt="logo"/></a>
                        </div>
                        <p>Explore Site:- <a href="">Pen's</a> <a href="">Lamps</a> <a href="">Gifts For Her</a><a href="">Gifts For Him</a></p>
                    </div>
                   
        		</div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Useful Links</h6>
                        <ul class="widget_links">
                            <li><a href="{{ url('about-us') }}">About Us</a></li>
                            <li><a href="javascript:void(0);">FAQ</a></li>
                            <li><a href="javascript:void(0);">Affiliates</a></li>
                            <li><a href="javascript:void(0);">Contact</a></li>
                            <li><a href="javascript:void(0);">Become Reseller</a></li>
                             <li><a href="{{ url('contact-us') }}">Reach us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Category</h6>
                        <ul class="widget_links">

                            @php $count = 0;  @endphp

                           @foreach($headerCategories as $index => $value)
                               @if($index < 10)
                                    <li><a  href="{{ route('getproducts',["category_id" => $value->id]) }}">{{ strtoupper($value->category_name) }}</a></li> 
                                    @endif
                                     @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">My Account</h6>
                        <ul class="widget_links">

                            <li><a href="{{ route('dashboard') }}">My Account</a></li>
                            <li><a href="javascript:void(0);">Returns</a></li>
                            <li><a href="{{ route('dashboard') }}">Orders History</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Contact Info</h6>
                        <ul class="contact_info contact_info_light">
                            <li>
                                <i class="ti-location-pin"></i>
                                <p>{{ (!empty($siteConfig->address)) ? $siteConfig->address : 'NA' }}</p>
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                <a href="">{{ (!empty($siteConfig->email)) ? $siteConfig->email : 'NA' }}</a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <p>{{ (!empty($siteConfig->mobile)) ? $siteConfig->mobile : 'NA' }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-md-0 text-center text-md-left">{{ (!empty($siteConfig->footer_text)) ? $siteConfig->footer_text : 'Copyrights by Biztria' }}</p>
                </div>
                <div class="col-md-6">
                     <ul class="social_icons social_white">
                           @if((!empty($siteConfig->facebook)))
                             <li><a href="{{$siteConfig->facebook}}"><i class="ion-social-facebook"></i></a></li>   
                            @endif
                             @if((!empty($siteConfig->twitter)))
                            <li><a href="{{$siteConfig->twitter}}"><i class="ion-social-twitter"></i></a></li>
                            @endif
                             @if((!empty($siteConfig->skype)))
                            <li><a href="{{$siteConfig->skype}}"><i class="ion-social-skype"></i></a></li>
                            @endif
                             @if((!empty($siteConfig->pinterest)))
                            <li><a href="{{$siteConfig->pinterest}}"><i class="ion-social-youtube-outline"></i></a></li>
                            @endif
                             @if((!empty($siteConfig->instagram)))
                            <li><a href="{{$siteConfig->instagram}}"><i class="ion-social-instagram-outline"></i></a></li>
                            @endif
                        </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->
