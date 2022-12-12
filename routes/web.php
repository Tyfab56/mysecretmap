<?php

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AdminController;
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
Route::get('aboutus', [IndexController::class, 'aboutus'])->name('aboutus');
Route::get('medias', [IndexController::class, 'medias'])->name('medias');
Route::get('myaccount', [IndexController::class, 'myaccount'])->name('myaccount');
Route::get('addimagespot/{spotid}', [IndexController::class, 'addimagespot'])->name('addimagespot');
Route::post('addimagespot/store', [IndexController::class, 'addimagespotstore'])->name('addimagespot.store');

Route::get('/listmarkers/{idpays}/{nelat}/{nelng}/{swlat}/{swlng}', [DestinationController::class, 'listmarkers'])->name('listmarkers');

Route::get('/destination/{id}/{spotid?}', [DestinationController::class, 'index'])->name('destination');


Route::get('spots', [AdminController::class, 'spots'])->name('admin.spots');

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


require __DIR__ . '/auth.php';
