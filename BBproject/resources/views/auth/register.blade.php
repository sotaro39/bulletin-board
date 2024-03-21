@extends('layouts.auth')
@section('auth-content')

<form action="{{ route('register') }}" method="post">
        @csrf 
        <h1 class="text-center mb-4">会員登録</h1>
        <div class="form-floating mb-3">
             <input type="text" name="name" value="{{ old('name') }}" class="form-control custom-width" id="floatingInput" placeholder="text">
             <label for="floatingInput">名前</label>
        </div>
        <div class="form-floating mb-3">
             <input type="email" name="email" value="{{ old('email') }}" class="form-control custom-width" id="floatingInput" placeholder="name@example.com">
             <label for="floatingInput">メールアドレス</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control custom-width" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">パスワード</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password_confirmation" class="form-control custom-width" id="floatingPassword" placeholder="もう一度入力">
            <label for="floatingPassword">確認用パスワード</label>
        </div>
        <button class="btn btn-primary" type="submit">登録する</button>
        <a href="/" class="btn btn-secondary">キャンセル</a>
</form>

@endsection()