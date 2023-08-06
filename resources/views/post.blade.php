{{-- @dd($post) --}}

@extends('layouts.main')

@section('container')

    {{-- card isi article (read more) --}}
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <p>Created By. <a href="/article?author={{ $post->author->username }}" 
                    class="text-decoration-none">{{ $post->author->name }}</a> in 
                    <a href="/article?category={{ $post->category->slug }}" 
                        class="text-decoration-none">{{ $post->category->name }}</a></p>
        
                {{-- <h5>
                    {{ $post["author"] }}
                    {{ $post->author }}
                </h5> --}}
                {{-- <p>
                    {{ $post["body"] }}
                </p> --}}
                {{-- {{ $post->body }} --}}
        
                @if ($post->image)
                <div style="max-height: 350px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
                @endif

                <article class="my-3 fs-6">
                    {!! $post->body !!}      
                </article>
        
                <a href="/article" class="text-decoration-none d-block mt-3">Back to all article</a>
            </div>
        </div>
    </div>
    {{-- article slug dari data dummy pada models article --}}
    {{-- <h2>
        {{ $post["title"] }}
        {{ $post->title }}
    </h2> --}}

@endsection