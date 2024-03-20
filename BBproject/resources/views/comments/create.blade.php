@extends('layouts.app')
@section('content')
@include('commons.errors')
<form action="{{ route('comments.store') }}" method="post" class="my-4">
@csrf 
<div class="form-group">
    <label for="comment">コメント</label>
    <input type="text" name="comment" class="form-control" id="comment" placeholder="コメントを入力してください">
</div>
<input value="{{ $value }}" type="hidden" name="topic_id">
<div class="form-group" style="margin-top: 30px;">
    <button type="submit" class="btn btn-primary mr-2" style="margin-right: 30px;">投稿する</button>
    <a href="{{ route('topics.show', $value) }}" class="btn btn-secondary">キャンセル</a>
</div>
</form>
@endsection()