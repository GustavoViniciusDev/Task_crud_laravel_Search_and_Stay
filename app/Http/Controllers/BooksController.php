<?php

namespace App\Http\Controllers;

use App\Models\Books; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{

    public readonly Books $book;

    public function __construct()
    {
        $this->book = new Books();
    }

    public function index()
    {
        $books = $this->book->all();
        return view('page_books.books', ['books' => $books]);
    }


    public function create()
    {
        return view('page_books.books_create');
    }

   
    public function store(Request $request)
    {
        $created = $this->book->create([
            'name' => $request->input('name'),
            'ISBN' => $request->input('ISBN'),
            'value' => $request->input('value'), 
        ]);
    
        if ($created) {
            return redirect()->route('books.index');
        }
        return redirect()->back()->with('message', 'Error created');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $book)
    {
        return view('page_books.books_edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->book->where('id', $id)->update($request->except(['_token', '_method']));

        if($updated){
            return redirect()->route('books.index');
        }
        return redirect()->back()->with('message', 'Error update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Books::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('message', 'Book successfully deleted.');
    }
}
