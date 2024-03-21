@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('topics.create') }}" class="btn btn-success">トピック作成</a>
        <a href="{{ route('logout') }}" class="btn btn-secondary">logout</a>
    </div>
        @foreach ($topics as $topic)
        <article class="card my-3">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="card-title" style="font-size: 1.2rem;">
                            <a href="{{ route('topics.show', $topic->id) }}">{{ $topic->id}}  : {{$topic->topic_name}}</a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="card-text">
                            @if($user->id === $topic->user_id)
                            <a href="{{ route('topics.deleteRequire', $topic->id) }}" class="btn btn-danger">トピック削除</a>
                            @else
                            <a href="{{ route('topics.deleteRequire', $topic->id) }}" class="btn btn-danger">トピック削除依頼</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </article>
        @endforeach
@endsection()
