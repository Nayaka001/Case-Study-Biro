<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
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

Route::get('/', [BeritaController::class, 'berita'])->name('berita');
Route::get('/detail/news/{id_berita}', [BeritaController::class, 'detailberita'])->name('detail.berita');


Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login/loading', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware(['auth']);
Route::get('/admin/add-news', [AdminController::class, 'addnews'])->name('add.news')->middleware(['auth']);
Route::get('/admin/list-news', [AdminController::class, 'listnews'])->name('list.news')->middleware(['auth']);
Route::post('/admin/add-news/store', [AdminController::class, 'storenews'])->name('news.store')->middleware(['auth']);
Route::delete('/admin/delete-news/{id_berita}', [AdminController::class, 'deletenews'])->name('news.delete')->middleware(['auth']);
Route::get('/admin/update-news/{id_berita}', [AdminController::class, 'updateindexnews'])->name('news.updateindex')->middleware(['auth']);
Route::post('/admin/update-news/action/{id_berita}', [AdminController::class, 'updatenews'])->name('news.update')->middleware(['auth']);
