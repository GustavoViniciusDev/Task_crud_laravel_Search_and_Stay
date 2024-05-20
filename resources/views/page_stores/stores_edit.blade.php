@extends('master')

@section('content')
<nav class="bg-indigo-600 p-4 flex justify-between items-center">
    <a  href="{{ route('login.dashboard') }}" class="text-white text-lg focus:outline-none">Home</a>
    <div class="text-white text-lg">Hello, {{ auth()->user()->name }}</div>
    <a href="{{ route('login.destroy') }}" class="bg-red-500 text-white px-4 py-2 rounded">Logout</a>
</nav>



<div class="flex justify-center items-center h-screen">
    <form class="bg-white shadow-md rounded-lg p-4 w-full max-w-sm" action="{{ route('stores.update', ['store' => $store->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <h2 class="text-xl font-semibold mb-4">Edit Stores</h2>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" value="{{ $store->name }}" class="mt-1 p-2 border rounded-md w-full">
        </div>
        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" id="address" name="address" value="{{ $store->address }}" class="mt-1 p-2 border rounded-md w-full">
        </div>
        <div class="mb-4">
            <label for="active" class="block text-sm font-medium text-gray-700">Status</label>
            <div class="flex items-center">
                <input type="radio" id="active" name="active" value="1" {{ $store->active === '1' ? 'checked' : '' }} class="mr-2">
                <label for="active" class="mr-4">Active</label>
                <input type="radio" id="inactive" name="active" value="0" {{ $store->active === '0' ? 'checked' : '' }} class="mr-2">
                <label for="inactive">Inactive</label>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <a href="{{ route('stores.index') }}" class="bg-red-500 text-white px-4 py-2 rounded">Back</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
