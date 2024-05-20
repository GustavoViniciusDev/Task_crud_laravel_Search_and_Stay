@extends('master')

@section('content')

@auth
<nav class="bg-indigo-600 p-4 flex justify-between items-center">
    <div class="text-white text-lg">Hello, {{ auth()->user()->name }}</div>
    <a href="{{ route('home.index') }}" class="bg-red-500 text-white px-4 py-2 rounded">Logout</a>
</nav>


    <div class="container mx-auto mt-8">
        <div class="flex-grow flex flex-row justify-center items-center">
            <a href="{{ route('books.index') }}" class="bg-indigo-500 text-white px-6 py-3 rounded m-2">Books</a>
            <a href="{{ route('stores.index') }}" class="bg-indigo-500 text-white px-6 py-3 rounded m-2">Store</a>
        </div>
    </div>
@endauth
@endsection
