
<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', 'aboutController@about');
Route::get('blog', 'blogController@blog');
Route::get('booking', 'bookingController@booking');
Route::get('contact', 'contactController@contact');
Route::get('trangchu', 'trangchuController@trangchu')->name('trangchu');
Route::get('menu', 'menuController@menu');
Route::get('giohang', 'giohangController@giohang');

Route::get('food', 'foodController@food');

Route::get('drinks', 'drinksController@drinks');
Route::get('product/{id}', 'productController@product');
Route::get('profile/{id}', 'myController@profile');
Route::get('history', 'myController@history');

Route::get('signin', 'myController@getsignin');
Route::post('signin', 'myController@postsignin')->name('signin');

Route::get('signup', 'myController@getsignup');
Route::post('signup', 'myController@postSignup')->name('signup');

Route::get('search','myController@search')->name('search');

Route::get('logout','myController@logout')->name('logout');

Auth::routes();
Route::get('/home', 'myController@index');

Route::group(['prefix'=>'admin'],function ()
{
    Route::group(['prefix'=>'order'],function (){
        Route::get('danhsach','orderController@getdanhsach');
        Route::get('xoa/{id}','orderController@getXoa');

        Route::get('sua/{id}','orderController@getsua');
        Route::post('sua/{id}','orderController@postsua');
    });
    Route::group(['prefix'=>'sanpham'],function (){
        Route::get('danhsach','productController@getdanhsach');
        //Thêm
        Route::get('them','productController@getthem');
        Route::post('them','productController@postthem');
        //Sửa
        Route::get('sua/{id}','productController@getsua');
        Route::post('sua/{id}','productController@postsua');
        //Xoá
        Route::get('xoa/{id}','productController@getxoa');
    });
    Route::group(['prefix'=>'user'],function (){
        Route::get('danhsach','personsController@getdanhsach');
        //Them
//        Route::get('them','personsController@getthem');
//        Route::post('them','personsController@postthem');
        //Sửa
        Route::get('sua/{id}','personsController@getsua');
        Route::post('sua/{id}','personsController@postsua');
        //Xoá
        Route::get('xoa/{id}','personsController@getxoa');
    });
});

Route::get('addcart/{id}','productController@getcart')->name('addcart');
Route::get('delcart/{id}','productController@delcart')->name('delcart');
Route::get('dat_hang','orderController@getorder');
Route::post('dat_hang','orderController@postorder')->name('dat_hang');

Route::get('suggest','productController@getsuggest');
Route::post('suggest','productController@postsuggest')->name('suggest');

Route::get('editprofile/{id}','personsController@geteditprofile');
Route::post('editprofile/{id}','personsController@posteditprofile');

Route::get('comment/{id}','productController@getComment');
Route::post('comment/{id}','productController@postComment')->name('comment');


Route::post('delcomment/{id}','productController@delComment')->name('delcomment');
Route::post('send','mailController@send');
Route::get('email','mailController@email');
