@extends('layouts.main')

@section('container')
    {{-- halaman about menampilkan nama, email, gambar --}}
    <h1>About</h1>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="img/{{ $image }}" alt="{{ $name }}" width="150" class="img-thumbnail rounded-circle">
        
@endsection