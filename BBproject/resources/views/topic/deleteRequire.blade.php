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
        @if($user->id === $topic->user_id)
        <form action="{{ route('topics.destroy', $topic->id) }}" method="post">
            @csrf 
            <dl class="form-list">
                <dt>トピックID {{$topic->id}}</dt>
                <dd><input value="{{ $topic->id }}" type="hidden" name="topic_id"></dd>
            </dl>
            <dl class="form-list">
                <dt>トピック名 {{$topic->topic_name}}</dt>
                <dd><input value="{{ $topic->topic_name }}" type="hidden" name="topic_name"></dd>
            </dl>
            <button type="submit">削除する</button>
            <a href="{{ route('topics.index') }}">キャンセル</a>
        </form>
        @else
        <form action="{{ route('deleteTopicRequirements.store') }}" method="post">
            @csrf 
            <dl class="form-list">
                <dt>トピックID {{$topic->id}}</dt>
                <dd><input value="{{ $topic->id }}" type="hidden" name="topic_id"></dd>
            </dl>
            <dl class="form-list">
                <dt>トピック名 {{$topic->topic_name}}</dt>
            </dl>
            <button type="submit">削除を依頼する</button>
            <a href="{{ route('topics.index') }}">キャンセル</a>
        </form>
        @endif
    </main>
    <footer>
        <div class="site-title">掲示板</div>
    </footer>
</body>
</html>