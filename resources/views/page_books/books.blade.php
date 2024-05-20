@extends('master')

@section('content')
<nav class="bg-indigo-600 p-4 flex justify-between items-center">
    <a  href="{{ route('login.dashboard') }}" class="text-white text-lg focus:outline-none">Home</a>
    <div class="text-white text-lg">Hello, {{ auth()->user()->name }}</div>
    <a href="{{ route('login.destroy') }}" class="bg-red-500 text-white px-4 py-2 rounded">Logout</a>
</nav>

<div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm flex justify-center mb-10">
    <a href="{{ route('books.create') }}" class="rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register Books</a>
</div>
<div class="flex justify-center">
    <div class="w-full lg:w-2/3 lg:mr-4 mb-4 lg:mb-0">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-300">Name</th>
                        <th class="px-6 py-3 border-b border-gray-300">ISBN</th>
                        <th class="px-6 py-3 border-b border-gray-300">Value</th>
                        <th class="px-6 py-3 border-b border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($books as $book)
                        <tr>
                            <td class="px-6 py-4 text-center whitespace-nowrap">{{ $book->name }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">{{ $book->ISBN }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">$ {{ $book->value }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="text-blue-500 hover:text-blue-700 bg-blue-100 hover:bg-blue-200 rounded-md px-3 py-1 mr-2">Edit</a>
                                <form action="{{ route('books.destroy', ['book' => $book->id]) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 bg-red-100 hover:bg-red-200 rounded-md px-3 py-1">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
