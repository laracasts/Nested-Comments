<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>

    <div class="body">{{ $post->body }}</div>

    <hr>

    <h3>Comments</h3>

    @include ('comments.list', ['collection' => $comments['root']])

    @if (Auth::check())
        <h3>Leave a Reply</h3>

        @include ('comments.form')
    @endif

</body>
</html>