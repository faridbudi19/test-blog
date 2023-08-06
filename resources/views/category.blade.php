{{-- @dd($article) --}}

@extends('layouts.main')

@section('container')

    <h1 class="mb-5">Article Category : {{ $category }}</h1>

    {{-- mengambil data dummy pada models article untuk ditampilkan --}}
    @foreach ($article as $post)
        <article class="mb-5 border-bottom pb-4">
            <h2>
                {{-- <a href="/article/{{ $post["id"] }}">{{ $post["title"] }}</a> --}}
                {{-- <a href="/article/{{ $post->id }}">{{ $post->title }}</a> --}}
                <a href="/article/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
            </h2>
            {{-- <h5>
                {{ $post["author"] }}
                {{ $post->author }}
            </h5> --}}
            <p>
                {{-- {{ $post["body"] }} --}}
                {{ $post->excerpt }}
            </p>    
        </article>
    @endforeach
    <a href="/categories" class="text-decoration-none">Back to categories</a>

@endsection