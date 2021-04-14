<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\admin\ProductAttributeController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\frontend\ManufacturerUserController;
use App\Http\Controllers\frontend\WholesalerUserController;
use App\Http\Controllers\frontend\NormalUserController;

use App\Models\Category;

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

// Route::get('/', function () {
//     return view('frontend.home');
// });
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/register-user-manu', function () {
    return view('frontend.register.vendor');
});
Route::get('/register-user-whole', function () {
    return view('frontend.register.wholesaler');
});
Route::get('/register-user', function () {
    return view('frontend.register.user');
});
Route::get('/new-login', function () {
    return view('frontend.login.login');
});
//Route::resource('manu', ManufacturerController::class);
Route::post('/manufacturer', [ManufacturerUserController::class, 'create_user'])->name('manufacturer');
Route::post('/wholesaler', [WholesalerUserController::class, 'create_user'])->name('wholesaler');
Route::post('/user', [NormalUserController::class, 'create_user'])->name('user');


//Route::resource('/admin/tags', [TagController::class]);
Route::group(['prefix' => 'admin/', 'as' => 'admin.',  'middleware' => 'auth'], function() {
    /**
     * this is admin dashboard
     */
    Route::view('/', 'admin.dashboard.index');
    Route::resource('tag', TagController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('user', UserController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('attribute', ProductAttributeController::class);
    Route::resource('brand', BrandController::class);
    // Route::get('/profile/change-password', function () {
    //     return view('admin.profile.changepassword');
    // });
    Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('changepassword.index');
    Route::post('/changed-password', [ChangePasswordController::class, 'changepass'])->name('changepassword.changepass');
    //Route::post('/changepassword', [ProfileController::class, 'changePassword'])->name('changePassword');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::Post('/settings-update', [SettingsController::class, 'update'])->name('settings.update');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
