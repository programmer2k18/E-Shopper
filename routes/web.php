<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//frontend routes
Route::get('/','homeController@homePage')->name('home');









Route::pattern('id','[0-9]+');
//backend routes
Route::get('/redirect','adminController@redirectUser')->name('redirectUser');
Route::get('/dashboard','adminController@show_dashboard')->name('dashboard');
Route::post('/admin/dashboard','adminController@login')->name('login_admin');
//Route::get('/logout','adminController@logout')->name('logout');

//category routes
Route::get('/Add_Category','categoryController@index')->name('showCategoryForm');
Route::post('/create_category','categoryController@createCategory')->name('addCategory');
Route::get('/all_categories','categoryController@allCategories')->name('allCategories');

Route::get('/modify_category/{id}/{value}/{message}','categoryController@activeOrUnactiveCategory')->name('modifyCategory');

Route::get('/editCategory/{id}','categoryController@showEditCategoryForm')->name('showEditForm');
Route::put('/edit_Category/{id}','categoryController@editCategory')->name('editCategory');
Route::get('/delete_Category/{id}','categoryController@deleteCategory')->name('deleteCategory');
//end category routes

//brands or manufacture routes
Route::get('/Add_brand','brandController@index')->name('showBrandForm');
Route::post('/create_brand','brandController@createBrand')->name('addBrand');
Route::get('/all_brands','brandController@allBrands')->name('allBrands');

Route::get('/modify_brand/{id}/{value}/{message}','brandController@activeOrUnactiveBrand')->name('modifyBrand');

Route::get('/editBrand/{id}','brandController@showEditBrandForm')->name('showEditBrandForm');
Route::put('/edit_Brand/{id}','brandController@editBrand')->name('editBrand');
Route::get('/delete_Brand/{id}','brandController@deleteBrand')->name('deleteBrand');

//end brands or manufacture routes

//start products routes
Route::get('/Add_product','ProductController@index')->name('showProductForm');
Route::post('/create_product','ProductController@createProduct')->name('addProduct');
Route::get('/all_products','ProductController@allProducts')->name('allProducts');

Route::get('/modify_product/{id}/{value}/{message}','ProductController@activeOrUnactiveProduct')->name('modifyProduct');
Route::get('/editProduct/{id}','ProductController@showProductForm')->name('showEditProductForm');
Route::put('/edit_Product/{id}','ProductController@editProduct')->name('editProduct');
Route::get('/delete_Product/{id}','ProductController@deleteProduct')->name('deleteProduct');
Route::get('/Categories/{id}/{name}','ProductController@productsByCategory')->name('productsByCategory');
Route::get('/Brands/{id}/{name}','ProductController@productsByBrand')->name('productsByBrand');
Route::get('/ViewProducts/{id}/{name}','ProductController@viewProduct')->name('viewProduct');
Route::get('/search/products','ProductController@searchProducts')->name('searchForProducts');
//end products routes

//starts slider routes
Route::get('/Add_slider','sliderContrller@index')->name('showSliderForm');
Route::post('/create_slider','sliderContrller@createSlider')->name('addSlider');
Route::get('/all_sliders','sliderContrller@allSliders')->name('allSliders');

Route::get('/modify_slider/{id}/{value}/{message}','sliderContrller@activeOrUnactiveSlider')->name('modifySlider');
Route::get('/editSlider/{id}','sliderContrller@showEditSliderForm')->name('showEditSliderForm');
Route::put('/edit_Slider/{id}','sliderContrller@editSlider')->name('editSlider');
Route::get('/delete_Slider/{id}','sliderContrller@deleteSlider')->name('deleteSlider');

//ends slider routes

//starts add to cart routes
Route::post('/Cart/AddToCart/{id}','cartContrller@addToCart')->name('addToCart');
Route::get('/Cart/showCart/','cartContrller@showCart')->name('showCart');
Route::get('/Cart/deleteProduct/{id}','cartContrller@deleteProduct')->name('deleteProductFromCart');
Route::get('/Cart/deleteCart/','cartContrller@deleteAllCartProducts')->name('deleteAllCartProducts');

//ends add to cart routes
Auth::routes();

//start checkout and payment routes

Route::get('/checkout','checkoutController@checkoutForm')->name('checkoutForm');
Route::post('/shipping/payment','checkoutController@shippingAndPayment')->name('shippingAndPayment');
Route::get('/placeOrder','checkoutController@placeOrder')->name('placeOrder');
//end checkout and payment routes

//start review routes
Route::post('/ReviewProduct/{id}/{name}','reviewController@reviewProduct')->name('review');
Route::get('/Reviews/deleteReview{id}/{name}','reviewController@deleteReview')->name('deleteReview');
//end review routes


//start contact-us routes

Route::get('/support/contact-us','contactUsController@showForm')->name('showForm');
Route::post('/support/contact-us','contactUsController@contactUs')->name('contact-us');

//end contact-us routes

//start blog routes

Route::get('/blog','blogController@blog')->name('blog');
Route::get('/blog/blog-single/{id}','blogController@showProductById')->name('singleProduct');
Route::post('/blog/order/AddOrder','blogController@storeOrder')->name('addOrderToBlog');
Route::post('/blog/product/addComment','blogController@addComment');

///end blog routes