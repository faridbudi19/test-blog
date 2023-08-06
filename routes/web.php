<?php

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use Illuminate\Routing\Route as RoutingRoute;


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

// --> Routes root default
Route::get('/', function () {
    return view('welcome');
});


// --> Routes halaman home
Route::get('/home', function () {
    
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});


// --> Routes halaman article Closure (tanpa controller)
// Route::get('/article', function () { 

//     return view('article', [
//         "title" => "Article",
//         "article" => Article::all()
//     ]);
// });
Route::get('/article', [ArticleController::class, 'index'] ); // --> Menggunakan controller (Membuat file controller ArticleController)

// --> Slug untuk halaman article (closure tanpa controller)
// Route::get('article/{slug}', function($slug) {

//     return view('post', [
//         "title" => "Single Post",
//         "post" => Article::find($slug)
//     ]);
// });
//Route::get('/article/{slug}', [ArticleController::class, 'show']); // --> Menggunakan controller
Route::get('/article/{post:slug}', [ArticleController::class, 'show']);

// --> Routes halaman about (closure tanpa controller)
Route::get('/about', function () { 

    return view('about', [
        "title" => "About",
        "name" => "Fergusso",
        "email" => "Fergusso010@gmail.com",
        "image" => "download.jpeg",
        "active" => "about"
    ]);
});

// --> Routes halaman article categories
Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Article Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('category', [
//         'title' => $category->name,
//         'article' => $category->article,
//         'category' => $category->name
//     ]);
// });

// --> Routes halaman article berdasarkan category
// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('article', [
//         'title' => "Kategori artikel : $category->name",
//         'active' => 'categories',
//         'article' => $category->article->load('category','author') // --> Lazy eager loading menggunakan func. load()
//     ]);
// });

// --> Routes halaman article berdasarkan author
// Route::get('authors/{author:username}', function (User $author) {
//     return view('article', [
//         'title' => "Penulis artikel : $author->name",
//         'article' => $author->article->load('category', 'author'), // --> Lazy eager loading menggunakan func. load()
//         'active' => 'article'
//     ]);
// });

// --> Routes halaman login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// --> Routes halaman register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

// --> Routes input data register
Route::post('/register', [RegisterController::class, 'store']);

// --> Routes halaman dashboard
Route::get('/dashboard', function() {
    return view('dashboard.index'); 
})->middleware('auth');

Route::get('/dashboard/article/checkSlug', [DashboardArticleController::class, 'checkSlug']);

Route::resource('/dashboard/article', DashboardArticleController::class) ->middleware('auth');
