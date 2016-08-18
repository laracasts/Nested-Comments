<ul>
    @foreach ($collection as $comment)
        @include ('comments.comment')
    @endforeach
</ul>