<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     // index untuk menampilkan data semua article 
    public function index()
    {
        // return Article::where('user_id', auth()->user()->id)->get();
        return view('dashboard.article.index', [
            'article' => Article::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     // View create
    public function create()
    {
        return view('dashboard.article.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     // Proses create
    public function store(Request $request)
    {

        // return $request->file('image')->store('article-images');

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:articles',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('article-images');
        }

        // Validasi 
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Article::create($validatedData);

        return redirect('/dashboard/article')->with('success', 'New article has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    
     // View read
    public function show(Article $article)
    {
        return view('dashboard.article.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    
     // View edit/update
    public function edit(Article $article)
    {
        return view('dashboard.article.edit', [
            'article' => $article,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    
     // Proses edit/update
    public function update(Request $request, Article $article)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ];
        
        if($request->slug != $article->slug) {
            $rules['slug'] = 'required|unique:articles';

        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Article::where('id', $article->id) 
            ->update($validatedData);

        return redirect('/dashboard/article')->with('success', 'Article has been updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    
     // Proses delete
    public function destroy(Article $article)
    {
        Article::destroy($article->id);

        return redirect('/dashboard/article')->with('success', 'Article has been deleted!');
    }

    // Untuk mengecek slug masih tersedia 
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
