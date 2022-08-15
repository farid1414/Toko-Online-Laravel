<?php

use App\Http\Controllers\Api\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// untuk menampilkan provinsi
Route::get('provinces', [LocationController::class, 'provinces'])->name('api-provinsi');
// muntuk menampilkan kabupaten
Route::get('regencies/{provinces_id}', [LocationController::class, 'regencies'])->name('api-kabupaten');
// menampilkan kecamatan
Route::get('distric/{regencies_id}', [LocationController::class, 'distric'])->name('api-kecamatan');
// menampilkan daerah
Route::get('village/{districs_id}', [LocationController::class, 'village'])->name('api-daerah');