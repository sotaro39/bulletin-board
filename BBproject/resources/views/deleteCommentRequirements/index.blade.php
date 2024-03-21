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
        <a href="{{ route('topics.index') }}">ホーム画面</a>
        <a href="{{ route('deleteTopicRequirements.index') }}">トピック削除依頼一覧</a>
        @foreach ($sortedDeleteComments as $sortedDeleteComment)
        <article class="article-item">
            <div class="article-title">
                <a>トピックID:{{ $sortedDeleteComment['comment_topic_id'] }}    トピック名:{{ $sortedDeleteComment['comment_topic_name'] }}     コメントID:{{ $sortedDeleteComment['comment_topic_comment_id'] }}</a></a>
                <a>コメント内容：{{ $sortedDeleteComment['comment_text'] }}</a>
                <p><a>削除依頼件数:{{ $sortedDeleteComment['require_count'] }}</a><p>
                <a href="{{ route('deleteCommentRequirements.destroy', $sortedDeleteComment['comment_id']) }}">削除する</a>
            </div>
        </article>
        @endforeach
    </main>
</body>
</html>