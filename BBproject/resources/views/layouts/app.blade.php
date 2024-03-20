<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/main.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>掲示板</title>
</head>
<body>
    <header>
        <div class="site-title">掲示板</div>
    </header>
    <main class="container">
        @yield('content')
    </main>
   
    <footer>
    <hr>
        <div class="site-title">掲示板</div>
    </footer>
</body>
</html>