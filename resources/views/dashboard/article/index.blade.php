@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My article</h1>
    </div>

    {{-- menampilkan alert sukses tambah article --}}
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/article/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Create new article</a>
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($article as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
                <td>
                    {{-- tombol read --}}
                    <a href="/dashboard/article/{{ $post->slug }}" class="badge bg-info mb-1"><span data-feather="eye"></span></a>
                    {{-- tombol update --}}
                    <a href="/dashboard/article/{{ $post->slug }}/edit" class="badge bg-warning mb-1"><span data-feather="edit"></span></a>
                    {{-- tombol delete --}}
                    <form action="/dashboard/article/{{ $post->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                    </form>
                </td>
                
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection