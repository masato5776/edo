<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍情報入力フォーム</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea,
        img,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            margin: auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
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
    <script>
        async function fetchBookInfo() {
            const isbn = document.getElementById('isbn').value;
            const response = await fetch(`https://api.openbd.jp/v1/get?isbn=${isbn}&pretty`);
            const data = await response.json();

            if (data && data[0] && data[0].summary) {
                const book = data[0].summary;
                document.getElementById('title').value = book.title || '';
                document.getElementById('author').value = book.author || '';
                document.getElementById('publisher').value = book.publisher || '';
                document.getElementById('pubdate').value = book.pubdate || '';
                document.getElementById('cover').src = "https://ndlsearch.ndl.go.jp/thumbnail/"+isbn + ".jpg";

            } else {
                alert('書籍情報が見つかりませんでした。');
            }
        }
    </script>
</head>
<body>

<h2>書籍情報入力フォーム</h2>
<a href={{ route('book-list.index') }} class="button">登録書籍一覧</a>
<form action="{{ route('book-add.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <label for="isbn">ISBN:</label>
    <input type="text" id="isbn" name="isbn" required>
    <button type="button" onclick="fetchBookInfo()">情報を取得</button>

    <label for="title">タイトル:</label>
    <input type="text" id="title" name="title" required>

    <label for="author">著者:</label>
    <input type="text" id="author" name="author" required>

    <label for="publisher">出版社:</label>
    <input type="text" id="publisher" name="publisher">

    <label for="pubdate">出版日:</label>
    <input type="text" id="pubdate" name="pubdate">

    <label for="cover">表紙画像:</label>
    <img id="cover" src="{{asset('/img/noimage.jpg')}}" alt="表紙画像" style="display:block; margin-top: 10px; max-width: 100px;">

    <button type="submit">送信</button>
</form>

</body>
</html>
