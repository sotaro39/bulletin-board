@extends('layouts.app')
@section('content')
@include('commons.errors')
        @if($user->id === $comment->user_id)
        <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
            @csrf 
            <dl class="form-list">
                <dt>コメントID <br> {{$comment->comment_id}}</dt>
                <dd><input value="{{ $comment->id }}" type="hidden" name="comment_id"></dd>
            </dl>
            <dl class="form-list">
                <dt>コメント内容 <br> {{$comment->comment_text}}</dt>
                <dd><input value="{{ $comment->comment_text }}" type="hidden" name="comment_text"></dd>
            </dl>
            <button type="submit" class="btn btn-danger">削除する</button>
             <a href="{{ route('topics.show', $value) }}" class="btn btn-secondary">キャンセル</a>
            
        </form>
        @else
        <form action="{{ route('deleteCommentRequirements.store') }}" method="post">
            @csrf 
            <dl class="form-list">
                <dt>コメントID <br> {{$comment->comment_id}}</dt>
                <dt>コメント内容 <br> {{$comment->comment_text}}</dt>
                <dd><input value="{{ $comment->id }}" type="hidden" name="comment_id"></dd>
            </dl>
            <button type="submit" class="btn btn-danger">削除を依頼する</button>
            <a href="{{ route('topics.show', $value) }}" class="btn btn-secondary">キャンセル</a>
        </form>
        @endif
    @endsection()