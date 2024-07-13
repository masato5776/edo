<?php

namespace App\Http\Controllers;

use App\Services\BookService;
class BookListController extends Controller
{
    public function index()
    {
        $service = new BookService();
        $ret = $service->getBookList();
        return view('book-list', ['books' => $ret]);
    }

}
