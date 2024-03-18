<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/main.css">
</head>
<body>
    <header>
        <div class="site-title">掲示板</div>
    </header>
    <main class="container">
        <p><a href="{{ route('topics.create') }}">記事を書く</a></p>
        @foreach ($topics as $topic)
        <article class="article-item">
            <div class="article-title">
                <a href="{{ route('topics.show', $topic->id) }}">{{ $topic->topic_name }}</a>
            </div>
        </article>
        @endforeach
    </main>
    <footer>
        <div class="site-title">掲示板</div>
    </footer>
</body>
</html>