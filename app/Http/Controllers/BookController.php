<?php

namespace App\Http\Controllers;

use App\Book;
use App\Tag;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Book::paginate(20);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
 
        return view('books.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'reading_state' => 'required',
        ],
        [
            'name.required' => '書名は必須です。',
            'author.required' => '著者名は必須です。',
            'reading_state.required' => '書籍の状態は必須です。',
        ]);
        
        $book = new Book();
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->image = $request->input('image');
        $book->publish_date = $request->input('publish_date');
        $book->isbn = $request->input('isbn');
        $book->issn = $request->input('issn');
        $book->page_count = $request->input('page_count');
        $book->language = $request->input('language');
        $book->publisher = $request->input('publisher');
        $book->price = $request->input('price');
        $book->blurb = $request->input('blurb');
        $book->reading_state = $request->input('reading_state');
        $book->save();
        
        return redirect()->route('books.show', compact('book'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $tags = Tag::all();
 
        return view('books.create', compact('book', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'reading_state' => 'required',
        ],
        [
            'name.required' => '書名は必須です。',
            'author.required' => '著者名は必須です。',
            'reading_state.required' => '書籍の状態は必須です。',
        ]);
        
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->image = $request->input('image');
        $book->publish_date = $request->input('publish_date');
        $book->isbn = $request->input('isbn');
        $book->issn = $request->input('issn');
        $book->page_count = $request->input('page_count');
        $book->language = $request->input('language');
        $book->publisher = $request->input('publisher');
        $book->price = $request->input('price');
        $book->blurb = $request->input('blurb');
        $book->reading_state = $request->input('reading_state');
        $book->update();
        
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        
        return redirect()->route('books.index');
    }

    public function interesting()
    {
        $books=Book::where('reading_state', 'interesting')->get();
        return view('books.interesting', compact('books'));
    }
    
    public function bought()
    {
        $books=Book::where('reading_state', 'bought')->get();
        return view('books.bought', compact('books'));
    }
    
    public function reading()
    {
        $books=Book::where('reading_state', 'reading')->get();
        return view('books.reading', compact('books'));
    }
    
    public function read()
    {
        $books=Book::where('reading_state', 'read')->get();
        return view('books.read', compact('books'));
    }
}