


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/main.css">
</head>
<body>
    <header>
        <div class="site-title">掲示板</div>
    </header>
    <main class="container">
        <form action="{{ route('comments.store') }}" method="post">
            @csrf 
            <input type="text">
            <button type="submit">投稿する</button>
            <a href="{{ route('topics.show', $value) }}">キャンセル</a>
        </form>
    </main>
</body>
</html>