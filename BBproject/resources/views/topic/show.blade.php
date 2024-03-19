<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>{{ $topic->topic_name }}</h1> 
  <hr>
  <main class="container">
  <p><a href="{{ route('comments.create', $topic->id) }}">コメントを書く</a></p>
  <a href="{{ route('topics.index') }}">戻る</a>
        @foreach ($comments as $comment)
        <article class="comment-item">
            <div class="comment-body">{{ $comment->comment_text }}</div>
        </article>
        @endforeach
        
    </main>
</body>
</html>

