@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $article->title }}</h1>

                <a href="/dashboard/article" class="btn btn-success mb-1"><span data-feather="arrow-left"></span> Back to all article</a>
                <a href="/dashboard/article/{{ $article->slug }}/edit" class="btn btn-warning mb-1"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/article/{{ $article->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger mb-1" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
                </form>

                @if ($article->image)
                <div style="max-height: 350px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->category->name }}" class="img-fluid mt-3">
                </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $article->category->name }}" alt="{{ $article->category->name }}" class="img-fluid mt-3">
                @endif
                
                <article class="my-3 fs-6">
                    {!! $article->body !!}      
                </article>
            </div>
        </div>
    </div>
@endsection