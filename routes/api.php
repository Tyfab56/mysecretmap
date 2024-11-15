<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ShopifyWebhookController;
use App\Http\Controllers\GuideislParamsController;
use App\Http\Controllers\SpotsController;
use App\Http\Controllers\AnecdoteController;
use App\Http\Controllers\ActivationController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/shopify-webhook', [ShopifyWebhookController::class, 'handleWebhook']);

Route::get('/testapi/{idspot}/', [ApiController::class, 'AfficheVideo']);
Route::get('/video/{id}/{locale}', [VideoController::class, 'show']);


Route::get('/guideislparam', [GuideislParamsController::class, 'getGuideISParams']);
Route::get('/guidespots', [SpotsController::class, 'getGuideSpots']);

Route::get('/anecdotes/random', [AnecdoteController::class, 'getRandomAnecdotes']);
Route::get('/check-activation', [ActivationController::class, 'activateCode']);
