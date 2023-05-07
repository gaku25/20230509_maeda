<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/css/search.css')}}">
    <link rel="stylesheet" href="{{asset('/css/reset.css')}}">
    <title>ToDo-app</title>
</head>

<body>
    <section class="app">
    <h1 class="app-title">@yield('title')</h1>
    <br>
    <div class="app_content">@yield('content')</div>
    <br>
    <div class="app_page">@yield('page')</div>
    <br>
    <div class="app_search">@yield('search')</div>
    </section>
</body>

</html>
