@extends('master')

@section('content')
<nav class="bg-indigo-600 p-4 flex justify-between items-center">
    <a  href="{{ route('login.dashboard') }}" class="text-white text-lg focus:outline-none">Home</a>
    <div class="text-white text-lg">Hello, {{ auth()->user()->name }}</div>
    <a href="{{ route('login.destroy') }}" class="bg-red-500 text-white px-4 py-2 rounded">Logout</a>
</nav>



<div class="flex justify-center items-center h-screen">
    <form class="bg-white shadow-md rounded-lg p-4 w-full max-w-sm" action="{{ route('books.update', ['book' => $book->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <h2 class="text-xl font-semibold mb-4">Edit Books</h2>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" value="{{ $book->name }}" class="mt-1 p-2 border rounded-md w-full">
        </div>
        <div class="mb-4">
            <label for="ISBN" class="block text-sm font-medium text-gray-700">ISBN</label>
            <input type="text" id="ISBN" name="ISBN" value="{{ $book->ISBN }}" class="mt-1 p-2 border rounded-md w-full">
        </div>
        <div class="mb-4">
            <label for="value" class="block text-sm font-medium text-gray-700">Value</label>
            <input type="text" id="value" name="value" value="{{ $book->value }}" class="mt-1 p-2 border rounded-md w-full">
        </div>
        <div class="flex justify-between items-center">
            <a href="{{ route('books.index') }}" class="bg-red-500 text-white px-4 py-2 rounded">Back</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
