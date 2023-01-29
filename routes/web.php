<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use App\Models\Newsletter;
use App\Models\Song;
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

Route::view('/', 'index')->name('index');
Route::get('/article', [ArticleController::class, 'getArticle'])->name('article');
Route::get('/news', [NewsletterController::class, 'getNewsletter'])->name('news');
Route::view('/contact', 'contact')->name('contact');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/song', [SongController::class, 'index'])->name('songs.song');
    Route::get('/addsong', [SongController::class, 'create'])->name('songs.createsong');
    Route::post('/savesong', [SongController::class, 'store'])->name('songs.addsong');
    Route::get('/editsong/{id}', [SongController::class, 'edit'])->name('songs.editsong');
    Route::put('/updatesong/{id}', [SongController::class, 'update'])->name('songs.updatesong');
    Route::delete('/deletesong/{id}', [SongController::class, 'destroy'])->name('songs.deletesong');

    Route::get('/lyrics', [ArticleController::class, 'index'])->name('articles.lyrics');
    Route::get('/getdetails/{id}', [ArticleController::class, 'getDetails'])->name('articles.getdetails');
    Route::get('/addlyrics', [ArticleController::class, 'create'])->name('articles.createlyrics');
    Route::post('/savelyrics', [ArticleController::class, 'store'])->name('articles.addlyrics');
    Route::get('/editlyrics/{id}', [ArticleController::class, 'edit'])->name('articles.editlyrics');
    Route::put('/updatelyrics/{id}', [ArticleController::class, 'update'])->name('articles.updatelyrics');
    Route::delete('/deletelyrics/{id}', [ArticleController::class, 'destroy'])->name('articles.destroylyrics');

    Route::get('/newsletter', [NewsletterController::class, 'index'])->name('newsletters.newsletter');
    Route::get('/addnewsletter', [NewsletterController::class, 'create'])->name('newsletters.createnewsletter');
    Route::post('/savenewsletter', [NewsletterController::class, 'store'])->name('newsletters.addnewsletter');
    Route::get('/editnewsletter/{id}', [NewsletterController::class, 'edit'])->name('newsletters.editnewsletter');
    Route::put('/updatenewsletter/{id}', [NewsletterController::class, 'update'])->name('newsletters.updatenewsletter');
    Route::delete('/deletenewsletter/{id}', [NewsletterController::class, 'destroy'])->name('newsletters.destroynewsletter');

    Route::get('/user', [UserController::class, 'index'])->name('accounts.user');
    Route::get('/signout', [UserController::class, 'destroy'])->name('accounts.signout');
});

Route::get('/register', [UserController::class, 'create'])->name('accounts.register');
Route::post('/registered', [UserController::class, 'store'])->name('accounts.registered');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/logedin', [UserController::class, 'loginUser'])->name('accounts.logedin');