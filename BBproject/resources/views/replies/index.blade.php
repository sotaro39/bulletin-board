<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <main class="container">
    <a href="{{ route('topics.show',$comment->topic_id) }}">戻る</a>
    <article class="comment-item">
        <div class="comment-body">{{ $comment->comment_id }}   {{ $comment->created_at }} </div>
        @if ($comment->to_id != null)
        <div class="comment-body">>>{{ $comment->to_id }} </div>
        @endif
        <div class="comment-body">{{ $comment->comment_text }} </div>
    </article>
        @foreach ($replies as $reply)
        <article class="comment-item">
            <div class="comment-body">{{ $reply->comment_id }}   {{ $reply->created_at }} </div>
            <div class="comment-body">>> {{ $reply->to_id }} </div>
            <div class="comment-body">{{ $reply->comment_text }} </div>
        </article>
        @endforeach
    </main>
</body>
</html>