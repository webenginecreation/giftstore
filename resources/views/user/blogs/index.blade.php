@extends('user.master')
{{-- @section('title', $productDetails->name)
@section('meta_keywords', $productDetails->meta_keyword)
@section('meta_description', $productDetails->meta_description)--}}
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
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    
                    <li class="breadcrumb-item active">Blogs</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    @foreach($getAllBlogsWithCategory as $key => $value)
                    <div class="col-xl-4 col-md-6">
                        <div class="blog_post blog_style2 box_shadow1">
                            <div class="blog_img">
                                <a href="{{route('blog.details',["slug" => $value->blog_slug])}}">
                                    <img src="{{url('blogimg')}}/{{ $value->blog_images }}" alt="blog_small_img1">
                                </a>
                            </div>
                            <div class="blog_content bg-white">
                                <div class="blog_text">
                                    <h6 class="blog_title"><a href="{{route('blog.details',["slug" => $value->blog_slug])}}">{{ $value->blog_title }}</a></h6>
                                    <ul class="list_none blog_meta">
                                        <li><a href="#"><i class="ti-calendar"></i> {{$value->created_at->diffForHumans()}}</a></li>
                                        
                                    </ul>
                                   
                                        <a style="color:blue" href="{{route('blog.details',["slug" => $value->blog_slug])}}">CLICK HERE...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
                <div class="row">
                    <div class="col-12 mt-2 mt-md-4">
                        <ul class="pagination pagination_style1 justify-content-center">
                             {{ $getAllBlogsWithCategory->links() }}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                <div class="sidebar">
                    <div class="widget">
                        <div class="search_form">
                            <form> 
                                <input required="" class="form-control" placeholder="Search..." type="text">
                                <button type="submit" title="Subscribe" class="btn icon_search" name="submit" value="Submit">
                                    <i class="ion-ios-search-strong"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                  
                    <div class="widget">
                        <h5 class="widget_title">Posts Categories</h5>
                        <ul class="widget_archive">
                             <li><a href="{{ route('userblog.index') }}"><span class="archive_year">All Blogs</span></a></li>
                        @foreach($blogCategories as $key => $value)
                        <li><a href="{{ route('blog.category',["id" => $value->id]) }}"><span class="archive_year">{{ $value->blog_category_name }}</span></a></li>
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
                                <img src="https://img.freepik.com/free-vector/digital-marketing-infographic_52683-9003.jpg?size=338&ext=jpg" alt="sidebar_banner_img">
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
</div>

<!-- END MAIN CONTENT -->

@stop