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
        @if($user->id === $comment->user_id)
        <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
            @csrf 
            <dl class="form-list">
                <dt>コメントID {{$comment->comment_id}}</dt>
                <dd><input value="{{ $comment->id }}" type="hidden" name="comment_id"></dd>
            </dl>
            <dl class="form-list">
                <dt>コメント内容 {{$comment->comment_text}}</dt>
                <dd><input value="{{ $comment->comment_text }}" type="hidden" name="comment_text"></dd>
            </dl>
            <button type="submit">削除する</button>
            <a href="{{ route('topics.show', $value) }}">キャンセル</a>
        </form>
        @else
        <form action="{{ route('deleteCommentRequirements.store') }}" method="post">
            @csrf 
            <dl class="form-list">
                <dt>コメントID {{$comment->comment_id}}</dt>
                <dt>コメント内容 {{$comment->comment_text}}</dt>
                <dd><input value="{{ $comment->id }}" type="hidden" name="comment_id"></dd>
            </dl>
            <button type="submit">削除を依頼する</button>
        </form>
        @endif
    </main>
    <footer>
        <div class="site-title">掲示板</div>
    </footer>
</body>
</html>