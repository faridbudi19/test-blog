<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // query dari routes untuk diproses controller
    public function index() 
    {    

        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' category: ' . $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by: ' . $author->name;
        }

        // $article = Article::latest();

        // Query untuk pencarian (search)
        // if(request('search')) {
        //     $article->where('title', 'like', '%' . request('search') . '%')
        //     ->orWhere('body', 'like', '%' . request('search') . '%');
        // }

        return view('article', [
            "title" => "All article" . $title,
            "active" => 'article',
            // "article" => Article::all()
            // "article" => Article::latest()->get() // --> Menampilkan article yg terbaru (latest) nb: lazy loading
            
            // "article" => Article::latest()->get() // --> Menampilkan article yg terbaru (latest) nb: menggunakan eager loading
            
            // "article" => Article::latest()->filter()->get() // --> untuk pencarian (search cara 1)
            
            "article" => Article::latest()->filter(request(['search', 'category', 'author']))
                            ->paginate(7)->withQueryString() // alt pencarian (cara 2) menambahkan paginate (menampilkan artikel berdasarkan jumlah)
        ]);
    }

    // query dari routes untuk diproses controller (slug)
    // public function show($slug) 
    // {
    //     return view('post', [
    //         "title" => "Single Post",
    //         "post" => Article::find($slug)
    //     ]);
    // }

    public function show(Article $post) 
    {
        return view('post', [
            "title" => "Single Post",
            "active" => 'article',
            "post" => $post
        ]);
    }
}
