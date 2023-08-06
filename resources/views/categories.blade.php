{{-- @dd($article) --}}

@extends('layouts.main')

@section('container')

    {{-- category article --}}
    <h1 class="mb-5 text-center">Article Categories</h1>

    {{-- card category article --}}
    <div class="container">
        <div class="row">

            @foreach ($categories as $category)
            <div class="col-md-4 mb-4">
                <a href="/article?category={{ $category->slug }}">
                <div class="card text-bg-dark text-white">
                    <img src="https://source.unsplash.com/500x500?{{ $category->name }}" 
                    class="card-img" alt="{{ $category->name }}">
                    <div class="card-img-overlay d-flex align-items-center p-0">
                      <h5 class="card-title text-center flex-fill p-2 fs-5" style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</h5>
                    </div>
                  </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>

    {{-- @foreach ($categories as $category)
       <ul>
            <li>
                <h2><a href="/categories/{{ $category->slug }}" class="text-decoration-none">{{ $category->name }}</a></h2>
            </li>
       </ul>
    @endforeach --}}
@endsection