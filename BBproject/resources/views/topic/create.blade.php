@extends('layouts.app')
@section('content')
@include('commons.errors')
<form action="{{ route('topics.store') }}" method="post" class="my-4">
    @csrf 
    <div class="form-group">
        <label for="topic_name">トピック名</label>
        <input type="text" name="topic_name" class="form-control" id="topic_name" placeholder="トピック名を入力してください">
    </div>
    <div class="form-group" style="margin-top: 30px;">
        <button type="submit" class="btn btn-primary mr-2" style="margin-right: 30px;">投稿する</button>
        <a href="{{ route('topics.index') }}" class="btn btn-secondary">キャンセル</a>
    </div>
</form>
@endsection
