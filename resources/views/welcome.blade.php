<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <!-- CSS -->
    <link href="{{ asset('css/app2.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Blog Management
        </div>
        <div class="links">
            <a href="{{ route('blogs.create') }}">Add new Blog</a>
            <a href="{{ route('blogs.index') }}">Blog list</a>
            <a href="{{ route('categories.create') }}">Add new Category</a>
            <a href="{{ route('categories.index') }}">Category list</a>
        </div>
    </div>
</div>
</body>
</html>