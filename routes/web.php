<?php

use App\Http\Controllers\{
    ArticleController,
    CategoryController,
    DashboardController,
    HomeController,
    ItemController,
    PointShopController,
    ReportController,
    UserController,
    UserReportController
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile-information', function () {
        return view('backend.pages.auth.profile');
    })->name('profile-information');

    Route::get('/change-password', function () {
        return view('backend.pages.auth.change-password');
    })->name('change-password');

    Route::get('buat-laporan', [ReportController::class, 'create'])->name('create.report')->middleware('role:user');
    Route::post('buat-laporan', [ReportController::class, 'store'])->name('store.report')->middleware('role:user');
    Route::group(['prefix' => 'kelapah-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

Route::group(['middleware' => 'role:admin'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::put('/report-update-status/{id}', [ReportController::class, 'updateStatus'])->name('report-update-status');
    Route::delete('report/{id}', [ReportController::class, 'destroy'])->name('report.destroy');
    Route::resource('user', UserController::class);
    Route::resource('article', ArticleController::class)->except(['show']);
    Route::resource('category', CategoryController::class)->except(['show']);
    Route::resource('items', ItemController::class)->except(['show']);
});

// User stuff
Route::group(['middleware' => 'role:user'], function(){
    Route::get('/user-dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
    Route::resource('user-reports', UserReportController::class)->only(['index', 'store', 'destroy']);
    Route::get('/user-profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/user-point-shop', [PointShopController::class, 'index'])->name('point-shop.index');
    Route::get('/user-point-shop/{id}', [PointShopController::class, 'show'])->name('point-shop.show');
    Route::post('/user-point-shop', [PointShopController::class, 'purchase'])->name('point-shop.exchange');
    Route::get('/user-exchange-history', [PointShopController::class, 'exchangeHistory'])->name('exchange-history');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/daftar-article', [ArticleController::class, 'listArticle'])->name('list.article');
Route::get('article/{article:slug}', [ArticleController::class, 'show'])->name('show.article');
