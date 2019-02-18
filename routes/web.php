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

use Gloudemans\Shoppingcart\Facades\Cart;

Route::get('/',  'HomeController@index')->name('page.index');
Route::get('/homes', function () {
    return view('pages.home');
})->name('page.home');

Route::get('/search', 'ShopController@search')->name('search');
Route::post('/addReview', 'ReviewController@reviewing')->name('addReview');

Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::get('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/{product}', 'CartController@update')->name('cart.update');



Route::get('/wishlist', 'WishlistController@index')->name('wishlist.index');
Route::post('/wishlist', 'WishlistController@store')->name('wishlist.store');
Route::get('/wishlist/{product}', 'WishlistController@destroy')->name('wishlist.destroy');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');

Route::get('/invoicepdf', function(){
    return view('pages.invoicepdf');
})->name('invoicepdf');
Route::get('/getPDF/{id}', 'CheckoutController@getPdf');
//blog routes
Route::get('/blog', function () {
    $posts = App\Post::all();
    return view('pages.blog', compact('posts'));
})->name('blog.show');

Route::get('/blog/{slug}', function($slug){
    $post = App\Post::where('slug', '=', $slug)->firstOrFail();
    $related_post = App\Post::all()->random(3);;

    return view('pages.post', compact('post','related_post'));
})->name('blog.post');

//mail routes
Route::get('/send','MailController@sendInvoice')->name('send');


Route::get('/my-account', 'OrderIndexController@index')->middleware('auth')->name('my-account');


Route::post('/my-account', 'OrderIndexController@store')->middleware('auth')->name('my-account.store');




Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/registration', function () {               /*both are same*/
    return view('auth.register');
})->name('registration');




// view modal
Route::get('dynamicModal/{id}',[
    'as'=>'dynamicModal',
    'uses'=> 'ShopController@loadModal'
]);

// admin routes
Route::get('/dashboard', function (){
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



// Coupon route

Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');



// Static pages

Route::get('/termsandcondition', function(){
    return view('pages.static.terms');
})->name('pages.terms');

Route::get('/refundandexchange', function(){
    return view('pages.static.refund');
})->name('pages.refund');

Route::get('/privacypolicy', function(){
    return view('pages.static.privacy');
})->name('pages.privacy');

Route::get('/deliverypolicy', function(){
    return view('pages.static.delivery');
})->name('pages.delivery');

Route::get('/about', function(){
    return view('pages.static.about');
})->name('pages.about');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');


Route::get('/invoice/{id}', 'OrderIndexController@pdfByCode');

Route::get('/contact', function(){
    return view('pages.static.contact');
})->name('pages.contact');

Route::post('/contact', 'ContactusController@store')->name('contact.store');
Route::post('/', 'ContactusController@subscribe')->name('mail.subscribe');
Route::get('/subscriber/list/download', 'SubscriberController@export')->name('export');

// password update
Route::get('/password-update', 'PasswordController@index')->name('password-update');

Route::post('update/password', 'PasswordController@update')->name('update-pass');