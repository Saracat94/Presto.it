<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Laravel\Sail\Console\PublishCommand;

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

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');

Route::get('about', [PublicController::class, 'about'])->name('about');

Route::get('/article/create', [ArticleController::class, 'createArticle'])->middleware('auth')->name('createArticle');

Route::get('/article/index', [ArticleController::class, 'articleIndex'])->name('articleIndex');

Route::get('/article/detail/{article}',[ArticleController::class,'articleDet'])->name('articleDet');

Route::get('/article/detail/{article}',[ArticleController::class,'articleCarousel'])->name('articleDet');

Route::get('/article/{article}/edit', [ArticleController::class, 'articleEdit'])->name('articleEdit');

Route::delete('/articles/{article}', [ArticleController::class,'destroy'])->name('articleDelete');

Route::get('/categoria/{category}', [ArticleController::class, 'categoryShow'])->name('categoryShow');

Route::get('/ricerca/annuncio', [ArticleController::class, 'articleSearch'])->name('articleSearch');

Route::get('/revisor/home', [RevisorController::class, 'revisorIndex'])->middleware('isRevisor')->name('revisorIndex');

Route::patch('/accetta/article/{article}', [RevisorController::class, 'acceptArticle'])->name('acceptArticle');

Route::patch('/rifiuta/article/{article}', [RevisorController::class, 'rejectArticle'])->name('rejectArticle');

Route::patch('/revisor/undo/{article}', [RevisorController::class, 'undoArticle'])->middleware('isRevisor')->name('undoArticle');

Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

Route::get('make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

Route::get('reject/revisor/{user}', [RevisorController::class, 'rejectRevisor'])->name('reject.revisor');

Route::get('revisor/revisorHistory', [PublicController::class, 'revisorHistory'])->middleware('isRevisor')->name('revisorHistory');

Route::post('lingua/{lang}', [PublicController::class, 'setLanguage'])->name('set_language_locale');

Route::get('/make/profile', [PublicController::class, 'createProfile'])->middleware('auth')->name('createProfile');

Route::get('profile', [PublicController::class, 'showProfile'])->middleware('auth')->name('showProfile');

Route::get('profile/{profile}/edit', [PublicController::class, 'edit'])->name('profile.edit');