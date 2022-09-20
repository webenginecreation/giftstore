<br>
<div class="container">

  <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s1 text-center">
                    <h2>Top Brands</h2>
                </div>
            </div>
        </div>
   <section class="customer-logos slider offer_slider">

        @foreach($brands as $brand)
      <div class="slide"><img src="{{env('APP_URL')}}/brand_icon/{{ $brand->brand_icon }}"> </div>
       @endforeach
   </section>
   
</div>
