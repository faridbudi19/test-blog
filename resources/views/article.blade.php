{{-- @dd($article) --}}

@extends('layouts.main')

@section('container')

    {{-- judul article --}}
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    {{-- kolom search --}}
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/article">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari artikel..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    {{-- card article big --}}
    @if ($article->count())
    <div class="card mb-3">
        @if ($article[0]->image)
        <div style="max-height: 350px; overflow: hidden;">
            <img src="{{ asset('storage/' . $article[0]->image) }}" alt="{{ $article[0]->category->name }}" class="img-fluid rounded-top">
        </div>
        @else
            <img src="https://source.unsplash.com/1200x400?{{ $article[0]->category->name }}" class="card-img-top" alt="{{ $article[0]->category->name }}">
        @endif
        <div class="card-body text-center">
            <h3 class="card-title"><a href="/article/{{ $article[0]->slug }}" 
                class="text-decoration-none text-dark">{{ $article[0]->title }}</a></h3>
            <p>
                <small class="text-muted">
                    Created By. <a href="/article?author={{ $article[0]->author->username }}" 
                        class="text-decoration-none">{{ $article[0]->author->name }}</a> in 
                    <a href="/article?category={{ $article[0]->category->slug }}" 
                        class="text-decoration-none">{{ $article[0]->category->name }}</a> {{ $article[0]->created_at->diffForHumans() }}
                </small>
            </p>
            <p class="card-text">{{ $article[0]->excerpt }}</p>

            <a href="/article/{{ $article[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>

        </div>
    </div>

    {{-- card article small --}}
    <div class="container">
        <div class="row">
            @foreach ($article->skip(1) as $post)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 7)">
                            <a href="/article?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a>
                        </div>
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid rounded-top">
                        @else
                            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" 
                            class="card-img-top" alt="{{ $post->category->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                                <p>
                                    <small class="text-muted">
                                        Created By. <a href="/article?author={{ $post->author->username }}"
                                            class="text-decoration-none">{{ $post->author->name }}</a></a> {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="/article/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    {{-- // mengambil data dummy pada models article untuk ditampilkan
    @foreach ($article->skip(1) as $post)
        <article class="mb-5 border-bottom pb-4">
            <h2>
                <a href="/article/{{ $post["id"] }}">{{ $post["title"] }}</a>
                <a href="/article/{{ $post->id }}">{{ $post->title }}</a>
                <a href="/article/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
            </h2>
            <p>By <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

            <h5>
                {{ $post["author"] }}
                {{ $post->author }}
            </h5>
            <p>
                {{ $post["body"] }}
                {{ $post->excerpt }}
            </p>    
            <a href="/article/{{ $post->slug }}" class="text-decoration-none">Read more...</a>

        </article>
    @endforeach --}}

    @else
        <p class="text-center fs-4">Article Not Found.</p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $article->links() }}
    </div>

@endsection