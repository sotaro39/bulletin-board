@extends('layouts.auth')
@section('auth-content')

    <form action="{{ route('login') }}" method="post">
        @csrf 
        <h1 class="text-center mb-4">ログイン</h1>
        <div class="form-floating mb-3">
             <input type="email" name="email" value="{{ old('email') }}" class="form-control custom-width" id="floatingInput" placeholder="name@example.com">
             <label for="floatingInput">メールアドレス</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control custom-width" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">パスワード</label>
        </div>
        <button class="btn btn-primary" type="submit">ログイン</button>
        <a href="/" class="btn btn-secondary">キャンセル</a>
    </form>
    
@endsection()
