<?php

namespace App\Services;

use App\Models\Books;

class BookService
{

    public function save($input_data) {
        $book = Books::firstOrCreate([
            'isbn' => $input_data['isbn'],
            'title' => $input_data['title'],
            'author' => $input_data['author'],
            'publisher' => $input_data['publisher'],
            'pubdate'  => $input_data['pubdate'],
        ]);
    }

    public function getBookList()
    {
        $book_info_list = Books::all();
        return $book_info_list;
    }
}
