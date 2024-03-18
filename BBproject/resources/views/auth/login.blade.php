<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>ログイン</h1>

<form action="{{ route('login') }}" method="post">
    @csrf 
    <dl class="form-list">
        <dt>メールアドレス</dt>
        <dd><input type="email" name="email" value="{{ old('email') }}"></dd>
        <dt>パスワード</dt>
        <dd><input type="password" name="password"></dd>
    </dl>
    <button type="submit">ログイン</button>
    <a href="/">キャンセル</a>
</form>
</body>
</html>