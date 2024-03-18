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
        <form action="{{ route('topics.store') }}" method="post">
            @csrf 
            <dl class="form-list">
                <dt>トピック名</dt>
                <dd><input type="text" name="topic_name"></dd>
            </dl>
            <button type="submit">投稿する</button>
            <a href="{{ route('topics.index') }}">キャンセル</a>
        </form>
    </main>
    <footer>
        <div class="site-title">掲示板</div>
    </footer>
</body>
</html>