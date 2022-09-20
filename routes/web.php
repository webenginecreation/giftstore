<?php

use Illuminate\Support\Facades\Route;


    Route::GET('push',function(){
        return view('user.push');
    });
      
  //Testing Repo Brand Listner Mail sent
   Route::GET('get-brand','Admin\BrandController@index');
  //End
  //Testing Event Listner Mail sent
  Route::GET('event-sent','User\HomeController@eventCall');
  //End Of Event Test
  Route::GET('search-products','User\HomeController@search')->name('search-products');
  Route::any('add-to-cart','User\ShoppingController@addtocart')->name('add-to-cart');
  Route::GET('cart','User\ShoppingController@cart')->name('show.cart');
  Route::POST('order/attach/store','Common\imageuploadController@orderAttachmentStore')->name('order.upload');
  Route::delete('remove-from-cart', 'User\ShoppingController@removeCart');
  Route::patch('update-cart', 'User\ShoppingController@updateCart');
  route::get('checkout','User\ShoppingController@checkout')->name('checkout')->middleware('auth');
  route::POST('save-order','User\ShoppingController@order')->name('save-order');
  route::get('order-completed','User\ShoppingController@orderCompleted')->name('order.completed');
  route::get('payment-order-failed','User\ShoppingController@paymentFailed')->name('order.payment-order-failed');
  
  //Test with server side order id in Prod mode
  Route::post('/payment-initiate-request','Admin\PaymentController@Initiate');
  // for Payment complete
  Route::post('/payment-complete','Admin\PaymentController@Complete');
  
  Route::get('/','User\HomeController@index')->name('home');

Route::get('all-categories','User\HomeController@showAllCategories')->name('showAllCategories');

  Route::get('products/{category_id?}','User\HomeController@showAllProducts')->name('getproducts');
  Route::get('product-details/{slug}','User\HomeController@details')->name('products.details');
  Route::get('/admin','Admin\AdminLoginController@index')->name('admin-login');
  Route::POST('admin/login','Admin\AdminLoginController@authanticate')->name('adminlogin');

  Route::get('allsession',function(){
  
  \Artisan::call('route:clear');
  \Artisan::call('view:clear');
  \Artisan::call('config:clear');
  \Artisan::call('cache:clear');
  \Artisan::call('optimize:clear');
  
  
  });
  Route::get('clear-cart',function(){
   \Session::flush();
   return redirect()->route('home'); 
   })->name('clear-route');

Route::get('user/login', 'User\UserLoginController@index')->name('login');
Route::get('user/signup', 'User\UserLoginController@signUp')->name('signup');
Route::POST('user/registration', 'User\UserLoginController@registration')->name('user-registration');
Route::POST('user/authanticate', 'User\UserLoginController@authanticate')->name('user-authenticate');
Route::Any('user/forget-password', 'User\UserLoginController@forgetPassword')->name('user-forget-password');

//User side blog Route Started
Route::get('blogs', 'User\BlogController@index')->name('userblog.index');
Route::get('blogs/{id}/category', 'User\BlogController@index')->name('blog.category');
Route::get('blogs/{slug}/details', 'User\BlogController@blogDetails')->name('blog.details');
//End User Side  blog route
Route::get('about-us','User\HomeController@about');
Route::get('contact-us','User\HomeController@contact');
Route::get('sitemap.xml','User\HomeController@sitemap');
Route::get('reseller','User\HomeController@reseller');
Route::group(['prefix' => 'dashboard',  'middleware' => 'auth'], function()
{
 

  route::get('/','User\UserController@index')->name('dashboard');
  route::get('logout','User\UserLoginController@logout')->name('logout');
  route::get('user-order-cancle/{order_code}','User\UserController@cancleOrder')->name('user-order-cancle');
  route::POST('billing/address/update','User\UserController@billingAddressUpdate')->name('billing_address_update');
  route::POST('shipping/address/update','User\UserController@shippingAddressUpdate')->name('shipping_address_update');
  route::POST('user/profile/update','User\UserController@userProfileUpdate')->name('userProfileUpdate');
  route::POST('user/profile/update/password','User\UserController@updatePassword')->name('updatePassword');
  route::GET('user/view-order/{order_code}','User\UserController@viewOrder')->name('UserviewOrder');
  route::GET('user/generate-pdf/{order_code}','User\ShoppingController@getInvoice')->name('generate-pdf');
  
  route::GET('my-wishlists','Common\WishlistController@index')->name('my-wishlists');

   route::POST('add-to-wishlist','Common\WishlistController@addToWishlist')->name('add-to-wishlist');
   route::GET('remove-to-wishlist/{id}','Common\WishlistController@removeToWishlist')->name('remove-to-wishlist'); 
  
});


//AuthGuard is use for admin login check......
Route::group(['prefix' => 'admin',  'middleware' => 'AdminGuard'], function()
{
   
   Route::GET('change-user-type/{id}/{user_type}','User\UserController@changeUserType')->name('change-user-type');
   
   Route::GET('getbrands/{id}','Admin\CategoryController@getBrands')->name('getbrands');
   Route::POST('addbrands','Admin\CategoryController@addbrands')->name('addbrands');
   Route::post('import', 'Admin\ProductController@import')->name('import');
   Route::get('export', 'Admin\ProductController@export')->name('export');
   Route::get('customers','Admin\AdminController@getAllCustomers')->name('admin-customers');
   Route::get('dashboard','Admin\AdminController@index')->name('admin-dashboard');
   Route::get('sliders','Admin\SliderController@index')->name('add-sliders');
   Route::get('delete/sliders/{id}','Admin\SliderController@delete')->name('delete.sliders');
   Route::POST('sliders/store','Admin\SliderController@store')->name('store-slider');
   Route::get('logout','Admin\AdminLoginController@logout')->name('admin-logout');
   Route::get('category','Admin\CategoryController@index')->name('category');
   Route::post('add-category','Admin\CategoryController@store')->name('add-category');
   Route::get('edit-category/{id}','Admin\CategoryController@edit')->name('edit-category');
   Route::get('category-status/{status}/{id}','Admin\CategoryController@statusChange')->name('category-status');
   Route::post('update-category/{id}','Admin\CategoryController@update')->name('update-category');
   Route::get('delete-category/{id}','Admin\CategoryController@destroy')->name('delete-category');
   Route::resource('subcategory','Admin\SubcategoryController');
   Route::get('addproduct','Admin\ProductController@create')->name('products');
   Route::post('storeproduct','Admin\ProductController@store')->name('store-products');
   Route::get('edit-product/{id}','Admin\ProductController@edit')->name('edit-products');
   Route::post('update-product/{id}','Admin\ProductController@update')->name('update-products');
   Route::get('delete-product/{id}','Admin\ProductController@destroy')->name('delete-product');
   Route::get('show_products','Admin\ProductController@index')->name('show.products');
   Route::get('product-stock-status/{status}/{id}','Admin\ProductController@productStatusChange')->name('product-stock-status');
   Route::get('product-status/{status}/{id}','Admin\ProductController@StatusChange')->name('product-status');
   Route::get('orders-history','Admin\ProductController@get_orders')->name('admin-orders');
  //Blog category route
  Route::resource('blog-category','Admin\BlogCategoryController');
  Route::get('delete-blog-category/{id}','Admin\BlogCategoryController@destroy')->name('delete-blog-category');
  //Blogs
  Route::resource('blog','Admin\BlogController');
  Route::post('update-blog/{id}','Admin\BlogController@update')->name('update-blog');
  Route::get('delete-blog/{id}','Admin\BlogController@destroy')->name('delete-blog');
  Route::get('create-offers','Admin\OffersController@create')->name('create.offers');
  Route::post('store-offers','Admin\OffersController@store')->name('store-offers');
  Route::get('edit-offers/{id}','Admin\OffersController@edit')->name('edit-offers');
  Route::post('update-offers/{id}','Admin\OffersController@update')->name('update-offers');
  Route::get('delete-offers/{id}','Admin\OffersController@destroy')->name('delete-offers');
  Route::get('offers-status/{status}/{id}','Admin\OffersController@StatusChange')->name('offers-status');
  Route::get('get-offers/{id}','Admin\OffersController@show')->name('getOffersProducts');
  Route::get('add-offers-products','Admin\OffersProductsController@index')->name('offers.products');
  Route::POST('store-offers-products','Admin\OffersProductsController@store')->name('store.offers.products');
  Route::GET('remove-offer-product/{id}','Admin\OffersProductsController@destroy')->name('remove-offer-product');
  Route::GET('get-all-offers-products','Admin\OffersController@getAllOffersWithProducts')->name('getAllOffersWithProducts');
  Route::GET('order-details/{order_code}','Admin\AdminController@getOrderDetails')->name('order-details');
  Route::GET('change-order-status/{status}/{order_code}','Admin\AdminController@changeOrderStatus')->name('change-order-status');
  Route::GET('today-orders','Admin\AdminController@todayOrders')->name('today-orders');
  Route::ANY('daily-collection','Admin\AdminController@dailyCollection')->name('dailyCollection');
  Route::ANY('datewise-report','Admin\AdminController@datewiseReport')->name('datewiseReport');
  Route::GET('admin-profile','Admin\AdminController@Profile')->name('adminProfile');
  Route::POST('admin-change-password','Admin\AdminController@changePassword')->name('change.password');
  Route::GET('site-settings','Common\siteconfigController@index')->name('site.settings');
  Route::POST('update-site-settings/{id}','Common\siteconfigController@update')->name('update.site.config');
  Route::GET('customize-template','Common\siteconfigController@customizeTemplate')->name('customize.template');
  Route::POST('update-customize-template/{id}','Common\siteconfigController@updateTheme')->name('update.customize.template');

  Route::GET('brand-management','Admin\BrandController@index')->name('brand.index');
  Route::POST('brand-management','Admin\BrandController@store')->name('store.brand');
  Route::GET('delete-brand/{id}','Admin\BrandController@delete')->name('delete.brand');
  Route::GET('edit-brand/{id}','Admin\BrandController@edit')->name('brand.edit');
  Route::POST('update-brand/{id}','Admin\BrandController@update')->name('update.brand');

  Route::GET('inventory','Admin\InventoryController@index')->name('inventory.index');
  Route::POST('inventory','Admin\InventoryController@store')->name('store.inventory');
  Route::GET('inventory/{id}','Admin\InventoryController@delete')->name('delete.inventory');
});


