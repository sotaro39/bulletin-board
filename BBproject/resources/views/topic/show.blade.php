@extends('layouts.app')
@section('content')
@include('commons.errors')
<h1 style="margin-bottom: 30px;">{{ $topic->topic_name }}</h1>
<div class="d-flex justify-content-between mb-3">
  <p><a href="{{ route('comments.create', $topic->id) }}" class="btn btn-success">コメントを書く</a></p>
  <a href="{{ route('topics.index') }}" class="btn btn-secondary mb-3">戻る</a>
</div>
<hr>
@foreach ($comments as $comment)
  <article class="card my-3 sm">
    <div class="card-body">
      <div class="row">
        <div class="col">
          @if ($comment->to_id != null)
          <p class="card-title">>>{{ $comment->to_id }} </p>
          @endif
          <p class="card-title">{{ $comment->comment_text }}</p>
          <p class="card-title">{{ $comment->comment_id }}  : {{ $comment->created_at }}</p>
        </div>
        <div class="col-auto">
        <a href="{{ route('replies.index', $comment->id) }}" class="btn btn-info">コメント返信一覧</a>
          @if($user->id === $comment->user_id)
            <a href="{{ route('comments.deleteRequire', $comment->id) }}" class="btn btn-danger">コメント削除</a>
          @else
            <a href="{{ route('comments.deleteRequire', $comment->id) }}" class="btn btn-warning">コメント削除依頼</a>
          @endif
        </div>
      </div>
    </div>
  </article>
@endforeach
@endsection()


