@extends('layouts.app')
@section('content')
    <a href="{{ route('topics.show', $comment->topic_id) }}" class="btn btn-secondary">戻る</a>
    <article class="card my-3">
        <div class="card-body">
          @if ($comment->to_id != null)
          <div class="comment-body">>>{{ $comment->to_id }}</div>
          @endif
          <div class="comment-body">{{ $comment->comment_text }}</div>
          <div class="comment-body">{{ $comment->comment_id }}  : {{ $comment->created_at }}</div>
        </div>
    </article>
    @foreach ($replies as $reply)
        <article class="card my-3">
            <div class="card-body">
              <div class="comment-body">>> {{ $reply->to_id }}</div>
              <div class="comment-body">{{ $reply->comment_text }}</div>
              <div class="comment-body">{{ $reply->comment_id }} :  {{ $reply->created_at }}</div>
            </div>
        </article>
    @endforeach
@endsection
