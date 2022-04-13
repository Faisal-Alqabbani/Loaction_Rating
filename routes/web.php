<?php

use App\Http\Controllers\{
    BookmarkController,
    CategoryController,
    ContactController,
    LikeController,
    PlaceController,
    ReviewController,
    SearchController
};

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get("/search", [SearchController::class, 'autoComplete'])->name('auto-complete');
Route::post('/serach', [SearchController::class, 'show'])->name('search');
Route::get('bookmark/{place_id}', [BookmarkController::class, 'bookmark'])->name('bookmark'); 
Route::get('bookmarks', [BookmarkController::class, 'getByUsers'])->name('bookmarks');
Route::resource('report', ContactController::class, ['only' => ['create', 'store']]);
Route::get('/place/create', [PlaceController::class, 'create'])->name('place.create');
Route::post('/place/store', [PlaceController::class, 'store'])->name('place.store');
Route::get('{category:slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/', [PlaceController::class, 'index'])->name('home');
Route::get('/{place}/{slug}',[PlaceController::class, 'show'])->name('place.show');
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
route::post('/like', [LikeController::class, 'store'])->name('like.store');