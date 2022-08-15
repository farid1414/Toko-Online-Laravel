<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DetailsController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\TokoTransaksiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\toko\ProdukController;
use App\Http\Controllers\HomeController;


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
//     return view('pages.home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/details/{id:slug}', [DetailsController::class, 'index'])->name('details');



Route::get('/success', [CardController::class, 'success'])->name('success');
Route::get('/register/success', [CardController::class, 'regisSuccess'])->name('regisSuccess');
Route::get('/pembelian', [TransaksiController::class, 'index'])->name('pembelian-produk');
Route::get('/pembelian/detail', [TransaksiController::class, 'detailPembelian'])->name('detail-pembelian-produk');

// route middleware auth
Route::middleware(['web'])->group(function () {
    Route::post('addToCard/{id}', [DetailsController::class, 'addToCard'])->name('add-to-card');
    Route::get('/card', [CardController::class, 'index'])->name('card');
    Route::DELETE('/card/{id}', [CardController::class, 'deleteCard'])->name('delete-card');

});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('post-login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::Post('/register', [AuthController::class, 'postRegister'])->name('post-regis');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ======= Page admin Toko =======
Route::prefix('toko')->namespace('Toko')->group(function () {
    Route::get('/dashboard', [TokoController::class, 'dashboard'])->name('toko-dashboard');

    Route::get('/pengaturan-toko', [TokoController::class, 'pengaturanToko'])->name('toko-pengaturan-toko');

    Route::resource('produk','\App\Http\Controllers\toko\ProdukController');
    Route::DELETE('produk/delete-gambar/{id}', [ProdukController::class, 'destroyGambar'])->name('toko-hapus-gambar');
    Route::post('tambah-gambar-produk/{id}', [ProdukController::class, 'storeGambarProduk'])->name('toko-store-gambar-produk');
    Route::get('edit-gambar-produk/{id}', [ProdukController::class, 'showGambarProduk'])->name('toko-show-gambar-produk');
    Route::post('edit-gambar-produk/{id}', [ProdukController::class, 'editGambarProduk'])->name('toko-edit-gambar-produk');

    // Route::get('/produk', [TokoProdukController::class, 'index'])->name('toko-produk');
    // Route::get('/tambah-produk', [TokoProdukController::class, 'tambahProduk'])->name('toko-tambah-produk');
    // Route::get('/edit-produk', [TokoProdukController::class, 'editProduk'])->name('toko-edit-produk');
    Route::get('/transaksi-produk', [TokoTransaksiController::class, 'index'])->name('toko-transaksi');
    Route::get('/detail-transaksi', [TokoTransaksiController::class, 'detailTransaksi'])->name('toko-detail-transaksi');
});


// ====== Akhir Page admin Toko ==
Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin-dashboard');
    Route::resource('kategori','\App\Http\Controllers\admin\CategoriController');
    Route::resource('carousel','\App\Http\Controllers\admin\CarouselController');
});
// ====== Page Admin web ========


// ====== Akhir Page Admin web ==

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });