<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use Illuminate\Http\Request;

class BookAddController extends Controller
{
    public function index()
    {
        return view('book-add');
    }

    public function store(Request $request)
    {
        $service = new BookService();
        $service->save($request->all());
        return redirect()->route('book-add.index');
    }
}
