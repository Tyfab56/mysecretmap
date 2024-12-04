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
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\DestinationController;
use App\Http\Controllers\CharlyPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopifysalesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RandoController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\ShareMediaController;
use App\Http\Controllers\UserCreditController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\FolderUserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MessageAdminController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SpotBannerUserController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AudioguideController;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\GiftProductController;


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

Route::get('/tostore', [StoreController::class, 'tostore'])->name('tostore');
Route::get('/instructions', [IndexController::class, 'instructions'])->name('instructions');

Route::get('/api/check-product', [ApiController::class, 'checkProduct'])->middleware('App\Http\Middleware\CorsMiddleware');
Route::post('/api/check-product', [ApiController::class, 'checkProduct']);
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/charly-posts/{pays_id}', [CharlyPostController::class, 'index'])->name('charly_posts');



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
Route::get('mes-medias', [IndexController::class, 'mesMedias'])->name('mes-medias')->middleware('auth');
Route::get('public-folders', [IndexController::class, 'publicFolders'])->name('public-folders')->middleware('auth');
Route::get('private-folders', [IndexController::class, 'privateFolders'])->name('private-folders')->middleware('auth');
Route::get('medias/{idspot?}', [IndexController::class, 'medias'])->name('medias');
Route::get('timeline', [IndexController::class, 'timeline'])->name('timeline');
Route::post('/contact', [ContactController::class, 'submitContactForm'])->name('contact.submit');

Route::get('myaccount', [IndexController::class, 'myaccount'])->name('myaccount')->middleware('auth');

Route::get('delimagespot/{id}', [IndexController::class, 'delimagespot'])->name('delimagespot');
Route::post('addimagespot/store', [IndexController::class, 'addimagespotstore'])->name('addimagespot.store');
Route::post('addimagespot/storedz', [IndexController::class, 'addimagespotstoredz'])->name('addimagespot.storedz');

Route::get('/listmarkers/{idpays}/{nelat}/{nelng}/{swlat}/{swlng}', [DestinationController::class, 'listmarkers'])->name('listmarkers');
Route::get('/getzoom/{idspot}', [DestinationController::class, 'getzoom'])->name('getzoom');
Route::get('/gallery/{idspot?}', [DestinationController::class, 'gallery'])->name('gallery');

// Route avec ID, redirige vers la nouvelle URL avec slug

Route::get('/destination/{id}/{spotid?}', [DestinationController::class, 'indexbyid'])->name('destination');

// Nouvelle route avec slug
Route::get('/spot/{id}/{slug?}', [DestinationController::class, 'index'])->name('destination.slug');

Route::get('/thewall/{idpays}', [DestinationController::class, 'thewall'])->name('thewall');
Route::get('/thewall/{idpays}/{tri?}/{size?}', [DestinationController::class, 'thewall']);
Route::get('/distance/{idspot}', [DistanceController::class, 'index'])->name('distance');
Route::get('/pictures/{idspot}', [DestinationController::class, 'pictures'])->name('pictures');
Route::get('/addtour/{idspot}/{idcircuit}', [DestinationController::class, 'addtour'])->name('addtour');
Route::get('/removetour/{idspot}/{idcircuit}', [DestinationController::class, 'removetour'])->name('removetour');
Route::get('/refreshtour/{idspays}/{idcircuit}', [DestinationController::class, 'updatetour'])->name('refreshtour');
Route::get('/circuit/{idcircuit}', [DestinationController::class, 'circuit'])->name('circuit');
Route::get('/search', [IndexController::class, 'search'])->name('search');
Route::get('/partner/transport', [IndexController::class, 'transport'])->name('transport');
Route::get('/partner/bloggers', [IndexController::class, 'bloggers'])->name('bloggers');
Route::get('/partner/hotel', [HotelController::class, 'partnership'])->name('hotels');
Route::get('/partner/croisiere', [IndexController::class, 'croisiere'])->name('croisiere');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile/me', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/me', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/me', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::put('/user/social/{user}', [UserController::class, 'updateSocial'])->name('user.updateSocial');
    Route::put('/profil/update', [UserController::class, 'updateWhoIAm'])->name('whoiam.update');
    Route::post('/update-photographer-info', [UserController::class, 'updatePhotographerInfo'])
        ->name('update.photographer.info');
    Route::get('/get-photographer-info', [UserController::class, 'getPhotographerInfo'])->name('get.photographer.info');
    Route::post('/addimageprofil', [UserController::class, 'updatePhotoProfil'])->name('addimageprofil');
    Route::post('/submitpicture', [SpotsController::class, 'submitPicture'])->name('submitpicture');
});

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

// Route charly-posts
// Enregistrer un nouveau CharlyPost
Route::post('/admin/charly-posts', [CharlyPostController::class, 'store'])->name('admin.charly-posts.store')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/charly-posts/create', [CharlyPostController::class, 'create'])->name('admin.charly-posts.create')->middleware('App\Http\Middleware\CheckAdmin');
// Afficher la liste des CharlyPost
Route::get('/admin/charly-posts', [CharlyPostController::class, 'listpost'])->name('admin.charly-posts.listposts');
// Afficher un CharlyPost unique
Route::get('/admin/charly-posts/{id}', [CharlyPostController::class, 'show'])->name('admin.charly-posts.show');
// Afficher le formulaire de modification
Route::get('/admin/charly-posts/{id}/edit', [CharlyPostController::class, 'edit'])->name('admin.charly-posts.edit');


// Route Spots
Route::get('/admin/hotels/create', [HotelController::class, 'create'])->name('admin.hotels.create')->middleware('App\Http\Middleware\CheckAdmin');;
Route::post('/admin/hotels', [HotelController::class, 'store'])->name('admin.hotels.store')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/hotels', [HotelController::class, 'index'])->name('admin.hotels')->middleware('App\Http\Middleware\CheckAdmin');
Route::delete('/hotels/{hotel}', [HotelController::class, 'destroy'])->name('admin.hotels.destroy')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('admin/hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('admin.hotels.edit')->middleware('App\Http\Middleware\CheckAdmin');
Route::put('admin/hotels/{hotel}', [HotelController::class, 'update'])->name('admin.hotels.update')->middleware('App\Http\Middleware\CheckAdmin');

Route::get('/admin/listspots/', [SpotsController::class, 'index'])->name('admin.listspots')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/filterspots/', [SpotsController::class, 'filter'])->name('admin.filterspots')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/addspot', [SpotsController::class, 'addspot'])->name('admin.addspot')->middleware('App\Http\Middleware\CheckAdmin');

Route::get('/admin/spot/edit/{id}/{lang?}', [SpotsController::class, 'edit'])->name('admin.spot.edit')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/spot/delete/{id}', [SpotsController::class, 'delete'])->name('admin.spot.delete')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/spot/latlng/{id}/{lat}/{lng}/', [SpotsController::class, 'latlng'])->name('admin.latlng.store');
Route::get('/admin/social/{id}', [SpotsController::class, 'social'])->name('admin.social');
Route::post('/admin/spot/store', [SpotsController::class, 'spotStore'])->name('admin.spot.store')->middleware('App\Http\Middleware\CheckAdmin');
Route::post('/admin/spot/textstore', [SpotsController::class, 'spotTextStore'])->name('admin.spot.textstore')->middleware('App\Http\Middleware\CheckAdmin');
Route::post('admin/spot/{spot}/update-translations', [SpotsController::class, 'updateTranslations'])->name('admin.spot.updateTranslations');
Route::post('admin//upload-media', [SpotsController::class, 'uploadGuideMedia'])->name('admin.upload.guidemedia');
// Route to get the list of media for a specific spot
Route::get('admin/guide/spots/{spot}/media', [SpotsController::class, 'getGuideMediaForSpot'])->name('admin.spot.guidemedia');
// Route to move media up in rank
Route::post('admin/guide/{media}/move-up', [SpotsController::class, 'moveMediaUp'])->name('admin.guidemedia.moveUp');
// Route to move media down in rank
Route::post('admin/guide/{media}/move-down', [SpotsController::class, 'moveMediaDown'])->name('admin.guidemedia.moveDown');
Route::delete('admin/guide/media/{media}', [SpotsController::class, 'deleteGuideMedia'])->name('admin.guidemedia.delete');



Route::get('/admin/circuits', [CircuitsController::class, 'index'])->name('admin.circuits')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/createzoom', [AdminController::class, 'createzoom'])->name('admin.createzoom')->middleware('App\Http\Middleware\CheckAdmin');
Route::post('/admin/createzoomid', [AdminController::class, 'createzoomid'])->name('admin.createzoomid')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/timeline', [TimelineController::class, 'index'])->name('admin.timeline')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('addimagespot/{spotid}', [IndexController::class, 'addimagespot'])->name('addimagespot')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/admin/detailpays/{id}', [PaysController::class, 'detail'])->name('admin.detailpays');
Route::post('/admin/timeline/store', [TimelineController::class, 'store'])->name('admin.timeline.store')->middleware('App\Http\Middleware\CheckAdmin');
Route::post('/shopifysales/store', [ShopifysalesController::class, 'store'])->name('admin.shopifysales.store')->middleware('App\Http\Middleware\CheckAdmin');;
Route::post('/shopifysales/reset/{id}', [ShopifySalesController::class, 'resetInstallations'])->name('shopifysales.reset');
Route::get('/shopifysales', [ShopifysalesController::class, 'form'])->name('admin.shopifysales')->middleware('App\Http\Middleware\CheckAdmin');;
Route::get('/shopifysaleslist', [ShopifysalesController::class, 'index'])->name('admin.shopifysaleslist')->middleware('App\Http\Middleware\CheckAdmin');;
Route::post('addavatar/store', [IndexController::class, 'avatarstore'])->name('addavatar.store');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('randos', RandoController::class)->except(['index', 'show']);
    Route::get('randos/listrandos', [RandoController::class, 'listRandos'])->name('randos.listrandos');
    Route::post('randos/storeTranslations', [RandoController::class, 'storeTranslations'])->name('randos.storeTranslations');
})->middleware('App\Http\Middleware\CheckAdmin');

Route::get('/admin/spots/search', [SpotsController::class, 'search'])->name('admin.spots.search');
Route::get('/videohike', [RandoController::class, 'videohike'])->name('videohike');

Route::post('/admin/randos/storeBaseInfo', [RandoController::class, 'storeBaseInfo'])->name('admin.randos.storeBaseInfo');
Route::view('/rodrigues', 'frontend.destinations.rodrigues')->name('rodrigues');
Route::view('/iceland', 'frontend.destinations.iceland')->name('iceland');
Route::view('/comoros', 'frontend.destinations.comoros')->name('comoros');
Route::view('/iceland/geology', 'frontend.destinations.iceland-geologie')->name('iceland.geology');
Route::view('/blog', 'frontend.destinations.blog')->name('blog');
Route::view('/blog/hotspot', 'frontend.destinations.blog-hotspot')->name('blog.hotspot');
Route::view('/reunion', 'frontend.destinations.reunion')->name('reunion');
Route::view('/audioguide', 'frontend.audioguide')->name('audioguide');
Route::view('/audioguides', 'frontend.audioguides')->name('audioguides');
Route::view('/changeavatar', 'frontend.loadavatar')->name('changeavatar');
Route::view('/affiliate', 'frontend.affiliate')->name('affiliate');

Route::get('/add-ot-spots', [IndexController::class, 'addotspot'])->name('addotspot');

Route::view('/guide_iceland_en', 'frontend.guide_iceland_en')->name('guide_iceland_en');

Route::get('/test', [TestController::class, 'index'])->name('test');

Route::post('/getspot', [TimelineController::class, 'getSpot'])->name('getspot');
//Route::get('/check-product/{email}/{product_id}', [ApiController::class, 'checkProduct'])->name('check-product');


Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/folders', [FolderController::class, 'index'])->name('admin.folders.index');
        Route::get('/folders/create', [FolderController::class, 'create'])->name('admin.folders.create');
        Route::post('/folders', [FolderController::class, 'store'])->name('admin.folders.store');
        Route::get('/folders/{folder}/edit', [FolderController::class, 'edit'])->name('admin.folders.edit');
        Route::put('/folders/{folder}', [FolderController::class, 'update'])->name('admin.folders.update');
        Route::delete('/folders/{folder}', [FolderController::class, 'destroy'])->name('admin.folders.destroy');
    });

    // Si 'folderroot' est aussi considéré comme une partie de l'administration :
    Route::get('/folderroot', function () {
        return view('admin.folderroot');
    })->name('admin.folderroot')->middleware('App\Http\Middleware\CheckAdmin');
});

Route::middleware(['auth'])->group(function () {
    // Préfixer toutes les routes de gestion des médias par 'admin'
    Route::prefix('admin')->group(function () {
        Route::resource('sharemedias', ShareMediaController::class)->names([
            'index' => 'admin.sharemedias.index',
            'create' => 'admin.sharemedias.create',
            'store' => 'admin.sharemedias.store',
            'edit' => 'admin.sharemedias.edit',
            'update' => 'admin.sharemedias.update',
            'destroy' => 'admin.sharemedias.destroy',
        ]);
    });
});
Route::get('/folders/{folderId}/medias', [ShareMediaController::class, 'showByFolder'])->name('folders.medias');
Route::get('/show-folder/{folderId}', [IndexController::class, 'showByFolder'])->name('show-folder')->middleware('auth');


Route::get('/admin/credits', [UserCreditController::class, 'index'])->name('admin.credits.index')->middleware('App\Http\Middleware\CheckAdmin');;
Route::put('/admin/credits/{user}', [UserCreditController::class, 'update'])->name('admin.credits.update')->middleware('App\Http\Middleware\CheckAdmin');;

Route::post('/sharemedia/{mediaId}/order', [ShareMediaController::class, 'orderMedia'])
    ->middleware('auth')
    ->name('sharemedia.order');

Route::get('/credits/purchase', [CreditController::class, 'purchase'])->name('credits.purchase')->middleware('auth');
Route::get('/media/{media}/download', [ShareMediaController::class, 'download'])->name('media.download')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    // Préfixer toutes les routes de gestion des utilisateurs et dossiers par 'admin'
    Route::prefix('admin')->group(function () {
        // Routes pour la gestion des associations entre utilisateurs et dossiers
        Route::get('/userfolder', [FolderUserController::class, 'index'])->name('admin.userfolder.index');
        Route::post('/userfolder/add/{userId}/{folderId}', [FolderUserController::class, 'addFolderToUser'])->name('admin.userfolder.add');
        Route::post('/userfolder/addFolderToUser', [FolderUserController::class, 'addUserFolder'])->name('admin.userfolder.addFolderToUser');
        Route::post('/userfolder/remove', [FolderUserController::class, 'removeUserFolder'])->name('admin.userfolder.remove');
    });
});

Route::get('/admin/userfolder/{userId}/folders', [FolderUserController::class, 'getUserFolders'])->name('admin.userfolder.folders');

Route::get('/admin/userfolder/folders/search', [FolderUserController::class, 'searchFolders'])->name('userfolder.folders.search');

Route::get('purchases', [FolderUserController::class, 'allPurchases'])->name('admin.purchases.all');

Route::middleware(['auth'])->group(function () {
    // Route pour afficher la liste des messages
    Route::get('frontend/messages', [MessageController::class, 'index'])->name('messages.index');

    // Route pour afficher un message spécifique
    Route::get('frontend/messages/{message}', [MessageController::class, 'show'])->name('messages.show');

    // Route pour marquer un message comme lu
    Route::patch('frontend/messages/{message}/read', [MessageController::class, 'markAsRead'])->name('messages.markAsRead');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
});

Route::prefix('admin')->group(function () {
    Route::get('messages', [MessageAdminController::class, 'index'])->name('admin.messages.index')->middleware('App\Http\Middleware\CheckAdmin');;
    Route::post('messages/store', [MessageAdminController::class, 'store'])->name('admin.messages.store')->middleware('App\Http\Middleware\CheckAdmin');;
    Route::patch('messages/{message}/markAsRead', [MessageAdminController::class, 'markAsRead'])->name('admin.messages.markAsRead')->middleware('App\Http\Middleware\CheckAdmin');
    Route::delete('messages/{id}', [MessageAdminController::class, 'destroy'])->name('admin.messages.destroy')->middleware('App\Http\Middleware\CheckAdmin');
});
Route::get('/admin/users/search', [UserController::class, 'search'])->name('admin.users.search');
Route::POST('admin/users/getAssociatedSpots', [SpotBannerUserController::class, 'search']);
Route::post('users/getAssociatedBanners', [UserController::class, 'getAssociatedBanners']);

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');

Route::middleware(['App\Http\Middleware\CheckAdmin'])->group(function () {
    Route::get('banners', [BannerController::class, 'index'])->name('banners.index');
    Route::get('banners/create', [BannerController::class, 'create'])->name('banners.create');
    Route::get('banners/edit', [BannerController::class, 'create'])->name('banners.edit');
    Route::post('banners/store', [BannerController::class, 'store'])->name('banners.store');
    Route::delete('banners/destroy/{banner}', [BannerController::class, 'destroy'])->name('banners.destroy');
    Route::post('bannersattach/{spot}/{banner}/{user}', [SpotBannerUserController::class, 'attachBanner'])->name('banners.attach');
    Route::delete('bannersdetach/{spot}', [SpotBannerUserController::class, 'detachBanner'])->name('banners.detach');
    Route::get('associatebanners', [SpotBannerUserController::class, 'getBanners'])->name('userbanners.index');
    Route::get('/admin/spots/searchbanner', [SpotsController::class, 'searchbanner']);
});

Route::view('admin.dashboard', 'admin.dashboard')->name('admin.dashboard')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/spots', [DestinationController::class, 'getFilteredSpots']);
Route::get('/thingstodo/{country}', [DestinationController::class, 'thingsToDo'])->name('things-to-do');
Route::get('/admin/sorted-spots', [AdminController::class, 'showSortedSpotsPage'])->name('admin.sorted-spots')->middleware('App\Http\Middleware\CheckAdmin');
Route::post('/admin/sorted-spots/generate', [AdminController::class, 'generateSortedSpots'])->name('admin.sorted-spots.generate')->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/api/regions/{countryId}', [RegionController::class, 'getRegionsByCountry']);

Route::post('/delete-distances', [DistanceController::class, 'deleteDistances'])->name('delete.distances');
Route::post('/favorites/add', [FavoriteController::class, 'addFavorite'])->name('favorites.add')->middleware('auth');
Route::post('/favorites/remove', [FavoriteController::class, 'removeFavorite'])->name('favorites.remove')->middleware('auth');
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index')->middleware('auth');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/{id}', [CommentController::class, 'show'])->name('comment.show');

Route::get('/admin/audioguides', [AudioguideController::class, 'index'])->name('admin.audioguides.index');
Route::post('/admin/audioguides/add', [AudioguideController::class, 'addSpot'])->name('admin.audioguides.add');
Route::post('/admin/audioguides/remove', [AudioguideController::class, 'removeSpot'])->name('admin.audioguides.remove');
Route::post('/admin/import-audioguides', [AudioguideController::class, 'importAudioguides'])->name('admin.importAudioguides');

Route::resource('gift-products', GiftProductController::class)->middleware('App\Http\Middleware\CheckAdmin');
Route::get('/generate-circuits-json', [CircuitsController::class, 'generateJson'])->name('circuits.generate-json')->middleware('App\Http\Middleware\CheckAdmin');

Route::get('/admin/generate_json', function () {
    return view('admin.generate_json');
})->name('generate_json');

// Add this route in routes/web.php
// Ne pas laisser Laravel gérer les routes de la PWA
Route::get('/audioguide_iceland/{any}', function () {
    return File::get(public_path() . '/audioguide_iceland/index.html');
})->where('any', '.*');
require __DIR__ . '/auth.php';
