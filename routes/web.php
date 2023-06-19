<?php

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SpotsController;
use App\Http\Controllers\CircuitsController;
use App\Http\Controllers\DistanceController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TimelineController;

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
Route::get('timeline', [IndexController::class, 'timeline'])->name('timeline');

Route::get('myaccount', [IndexController::class, 'myaccount'])->name('myaccount');

Route::get('delimagespot/{id}', [IndexController::class, 'delimagespot'])->name('delimagespot');
Route::post('addimagespot/store', [IndexController::class, 'addimagespotstore'])->name('addimagespot.store');
Route::post('addimagespot/storedz', [IndexController::class, 'addimagespotstoredz'])->name('addimagespot.storedz');

Route::get('/listmarkers/{idpays}/{nelat}/{nelng}/{swlat}/{swlng}', [DestinationController::class, 'listmarkers'])->name('listmarkers');
Route::get('/getzoom/{idspot}', [DestinationController::class, 'getzoom'])->name('getzoom');

Route::get('/destination/{id}/{spotid?}', [DestinationController::class, 'index'])->name('destination');
Route::get('/thewall/{idpays}', [DestinationController::class, 'thewall'])->name('thewall');
Route::get('/thewall/{idpays}/{tri?}/{size?}', [DestinationController::class, 'thewall']);
Route::get('/distance/{idspot}', [DistanceController::class, 'index'])->name('distance');
Route::get('/pictures/{idspot}', [DestinationController::class, 'pictures'])->name('pictures');
Route::get('/addtour/{idspot}/{idcircuit}', [DestinationController::class, 'addtour'])->name('addtour');
Route::get('/removetour/{idspot}/{idcircuit}', [DestinationController::class, 'removetour'])->name('removetour');
Route::get('/refreshtour/{idspays}/{idcircuit}', [DestinationController::class, 'updatetour'])->name('refreshtour');
Route::get('/circuit/{idcircuit}', [DestinationController::class, 'circuit'])->name('circuit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile/me', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/me', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/me', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
});

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');


Route::get('/admin/listspots/', [SpotsController::class, 'index'])->name('admin.listspots')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/filterspots/', [SpotsController::class, 'filter'])->name('admin.filterspots')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/addspot', [SpotsController::class, 'addspot'])->name('admin.addspot')->middleware('App\Http\Middleware\CheckAdmin');

Route::get('/admin/spot/edit/{id}/{lang?}', [SpotsController::class, 'edit'])->name('admin.spot.edit')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/spot/delete/{id}', [SpotsController::class, 'delete'])->name('admin.spot.delete')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/spot/latlng/{id}/{lat}/{lng}/', [SpotsController::class, 'latlng'])->name('admin.latlng.store');
Route::get('/admin/social/{id}', [SpotsController::class, 'social'])->name('admin.social');
Route::post('/admin/spot/store', [SpotsController::class, 'spotStore'])->name('admin.spot.store')->middleware('App\Http\Middleware\CheckAdmin');
Route::post('/admin/spot/textstore', [SpotsController::class, 'spotTextStore'])->name('admin.spot.textstore')->middleware('App\Http\Middleware\CheckAdmin');

Route::get('/admin/circuits', [CircuitsController::class, 'index'])->name('admin.circuits')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/createzoom', [AdminController::class, 'createzoom'])->name('admin.createzoom')->middleware('App\Http\Middleware\CheckAdmin');
Route::post('/admin/createzoomid', [AdminController::class, 'createzoomid'])->name('admin.createzoomid')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/timeline', [TimelineController::class, 'index'])->name('admin.timeline')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('addimagespot/{spotid}', [IndexController::class, 'addimagespot'])->name('addimagespot')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/detailpays/{id}', [PaysController::class, 'detail'])->name('admin.detailpays');
Route::post('/admin/timeline/store', [TimelineController::class, 'store'])->name('admin.timeline.store')->middleware('App\Http\Middleware\CheckAdmin');
Route::post('addavatar/store', [IndexController::class, 'avatarstore'])->name('addavatar.store');

Route::view('/rodrigues','frontend.destinations.rodrigues')->name('rodrigues');
Route::view('/iceland', 'frontend.destinations.iceland')->name('iceland');
Route::view('/iceland/geology', 'frontend.destinations.iceland-geologie')->name('iceland.geology');
Route::view('/blog', 'frontend.destinations.blog')->name('blog');
Route::view('/blog/hotspot', 'frontend.destinations.blog-hotspot')->name('blog.hotspot');
Route::view('/reunion', 'frontend.destinations.reunion')->name('reunion');
Route::view('/audioguide', 'frontend.audioguide')->name('audioguide');
Route::view('/changeavatar', 'frontend.loadavatar')->name('changeavatar');


Route::view('/test', 'frontend.test')->name('test');
Route::post('/getspot', [TimelineController::class, 'getSpot'])->name('getspot');
//Route::get('/check-product/{email}/{product_id}', [ApiController::class, 'checkProduct'])->name('check-product');

require __DIR__ . '/auth.php';
