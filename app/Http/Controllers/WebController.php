<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Tag;

class WebController extends Controller
{
    public function index(){
        $books=Book::all();
        $tags=Tag::all();
        
        return view('web.index', compact('books', 'tags'));
    }
}
