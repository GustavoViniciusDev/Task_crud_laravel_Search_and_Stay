@extends('master')

@section('content')
<nav class="bg-indigo-600 p-4 flex justify-between items-center">
    <a  href="{{ route('login.dashboard') }}" class="text-white text-lg focus:outline-none">Home</a>
    <div class="text-white text-lg">Hello, {{ auth()->user()->name }}</div>
    <a href="{{ route('login.destroy') }}" class="bg-red-500 text-white px-4 py-2 rounded">Logout</a>
</nav>


<div class="flex justify-center items-center h-screen">
    <form action="{{ route('books.store') }}" class="bg-white shadow-md rounded-lg p-4 w-full max-w-sm" method="POST">
        @csrf
        <h2 class="text-xl font-semibold mb-4">Register Books</h2>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" class="mt-1 p-2 border rounded-md w-full" placeholder="Pride and Prejudice">
        </div>
        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">ISBN</label>
            <input type="text" id="ISBN" name="ISBN" class="mt-1 p-2 border rounded-md w-full" maxlength="9" pattern="[0-9]{9}" title="O ISBN deve conter apenas 9 dígitos numéricos" placeholder="123456789">

        </div>
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Value</label>
            <input type="text" id="value" name="value" class="mt-1 p-2 border rounded-md w-full" placeholder="$ 0,00">
        </div>
        <div class="flex justify-between items-center">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Register</button>
            <a href="{{ route('books.index') }}" class="bg-red-500 text-white px-4 py-2 rounded">Back</a>
        </div>
    </form>
</div>
@endsection
