@extends('layouts.app')
@section('content')
@include('commons.errors')
        @if($user->id === $topic->user_id)
        <form action="{{ route('topics.destroy', $topic->id) }}" method="post">
            @csrf 
            <dl class="form-list">
                <dt>トピックID <br>{{$topic->id}}</dt>
                <dd><input value="{{ $topic->id }}" type="hidden" name="topic_id"></dd>
            </dl>
            <dl class="form-list">
                <dt>トピック名 <br> {{$topic->topic_name}}</dt>
                <dd><input value="{{ $topic->topic_name }}" type="hidden" name="topic_name"></dd>
            </dl>
            <button type="submit" class="btn btn-danger">削除する</button>
             <a href="{{ route('topics.index') }}" class="btn btn-secondary">キャンセル</a>
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
            <button type="submit" class="btn btn-danger">削除を依頼する</button>
            <a href="{{ route('topics.index') }}" class="btn btn-secondary">キャンセル</a>
        </form>
        @endif

@endsection()