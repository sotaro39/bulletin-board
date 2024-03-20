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
        @foreach ($sortedDeleteTopics as $sortedDeleteTopic)
        <article class="article-item">
            <div class="article-title">
                <a>トピックID:{{ $sortedDeleteTopic['topic_id'] }}     トピック名：{{ $sortedDeleteTopic['topic_name'] }}</a>
                <p><a>削除依頼件数:{{ $sortedDeleteTopic['require_count'] }}</a><p>
                <a href="{{ route('deleteTopicRequirements.destroy', $sortedDeleteTopic['topic_id']) }}">削除する</a>
            </div>
        </article>
        @endforeach
    </main>
</body>
</html>