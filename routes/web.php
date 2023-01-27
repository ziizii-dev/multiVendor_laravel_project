<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\HomeSliderController;



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
    return view('frontend.index');
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(DemoController::class)->group(function(){
    Route::get('/about','Index')->name('about.page')->middleware('check');
    Route::get('/contact','ContactMethod')->name('contact.page');
});

//Admin all routes
Route::controller(AdminController::class)->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/logout','logout')->name('admin#logout');
        Route::get('/profile','adminProfile')->name('admin#profile');
        Route::get('/editProfile','editProfile')->name('admin#editProfile');
        Route::post('/updateProfile','updateProfile')->name('admin#updateProfile');
        Route::get('/changePassword','changePassword')->name('admin#changePassword');
        Route::post('/updatePassword','updatePassword')->name('admin#updatePassword');
    });


});

//Home Slide Page
Route::controller(HomeSliderController::class)->group(function(){
    Route::prefix('slide')->group(function(){
        Route::get('/home','homeSlider')->name('home#slide');
        Route::post('/home','updateSlider')->name('update#slider');

    });


});
//About Slide Page
Route::controller(AboutController::class)->group(function(){
    Route::prefix('about')->group(function(){
        Route::get('/page','aboutPage')->name('about#page');
        Route::post('/update','updateAbout')->name('update#about');
        Route::get('/about','homeAbout')->name('home#about');
        Route::get('/multi/image','aboutMultiImage')->name('about#multiImage');
        Route::post('/store/multi/image','storeMultiImage')->name('store#multiImage');
        Route::get('/all/multi/image','allMultiImage')->name('all#multiImage');
        Route::get('/edit/multi/image/{id}','editMultiImage')->name('edit#multiImage');
        Route::post('/update/multi/image','updateMultiImage')->name('update#multiImage');
        Route::get('/delete/multi/image/{id}','deleteMultiImage')->name('delete#multiImage');


    });


});
//Portfolio  Page
Route::controller(PortfolioController::class)->group(function(){
    Route::prefix('portfolio')->group(function(){
        Route::get('/all','allPortfolio')->name('all#portfolio');
        Route::get('/add','addPortfolio')->name('add#portfolio');
        Route::post('/store','storePortfolio')->name('store#portfolio');




    });


});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Admin section


require __DIR__.'/auth.php';
