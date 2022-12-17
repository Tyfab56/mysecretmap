<?php

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SpotsController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\DestinationController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [IndexController::class, 'index'])->name('home');
Route::post('godestination', [IndexController::class, 'godestination'])->name('godestination');
Route::get('nextdestinations', [IndexController::class, 'nextdestinations'])->name('nextdestinations');
Route::get('whatsnext', [IndexController::class, 'whatsnext'])->name('whatsnext');
Route::get('benefits', [IndexController::class, 'benefits'])->name('benefits');
Route::get('tourism', [IndexController::class, 'tourism'])->name('tourism');
Route::get('photographers', [IndexController::class, 'photographers'])->name('photographers');
Route::get('contact', [IndexController::class, 'contact'])->name('contact');
Route::get('patreon', [IndexController::class, 'contact'])->name('patreon');
Route::get('aboutus', [IndexController::class, 'aboutus'])->name('aboutus');
Route::get('medias', [IndexController::class, 'medias'])->name('medias');
Route::get('myaccount', [IndexController::class, 'myaccount'])->name('myaccount');
Route::get('addimagespot/{spotid}', [IndexController::class, 'addimagespot'])->name('addimagespot');
Route::get('delimagespot/{id}', [IndexController::class, 'delimagespot'])->name('delimagespot');
Route::post('addimagespot/store', [IndexController::class, 'addimagespotstore'])->name('addimagespot.store');

Route::get('/listmarkers/{idpays}/{nelat}/{nelng}/{swlat}/{swlng}', [DestinationController::class, 'listmarkers'])->name('listmarkers');

Route::get('/destination/{id}/{spotid?}', [DestinationController::class, 'index'])->name('destination');
Route::get('/thewall/{idpays}', [DestinationController::class, 'thewall'])->name('thewall');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');


Route::get('/admin/listspots', [SpotsController::class, 'index'])->name('admin.listspots')->middleware('App\Http\Middleware\CheckAdmin');;
Route::get('/admin/addspot', [SpotsController::class, 'addspot'])->name('admin.addspot')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/spot/edit/{id}/{lang?}', [SpotsController::class, 'edit'])->name('admin.spot.edit')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/spot/delete/{id}', [SpotsController::class, 'delete'])->name('admin.spot.delete')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/spot/latlng/{id}/{lat}/{lng}/', [SpotsController::class, 'latlng'])->name('admin.latlng.store');
Route::get('/admin/social/{id}', [SpotsController::class, 'social'])->name('admin.social');
Route::post('/admin/spot/store', [SpotsController::class, 'spotStore'])->name('admin.spot.store')->middleware('App\Http\Middleware\CheckAdmin');
Route::post('/admin/spot/textstore', [SpotsController::class, 'spotTextStore'])->name('admin.spot.textstore')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/detailpays/{id}', [PaysController::class, 'detail'])->name('admin.detailpays');
require __DIR__ . '/auth.php';
