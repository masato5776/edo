<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録書籍一覧</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        img {
            max-width: 100px;
        }
        .button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
            display: inline-block;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2>登録書籍一覧</h2>

<a href={{ route('book-add.index') }} class="button">新しい書籍を登録する</a>

<table>
    <thead>
        <tr>
            <th>表紙画像</th>
            <th>タイトル</th>
            <th>著者</th>
            <th>出版社</th>
            <th>出版日</th>
            <th>ISBN</th>
        </tr>
    </thead>
    <tbody id="book-list">
        @foreach ($books as $book)
        <tr>
          <td><img src="https://ndlsearch.ndl.go.jp/thumbnail/{{ $book->isbn }}.jpg"></td>
          <td>{{ $book->title }}</td>
          <td>{{ $book->author }}</td>
          <td>{{ $book->publisher }}</td>
          <td>{{ $book->pubdate }}</td>
          <td>{{ $book->isbn }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
