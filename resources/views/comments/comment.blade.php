<li>
    <h3>{{ $comment->owner->name }} said...</h3>

    <div class="body">
        {{ $comment->body }}
    </div>

    @if (Auth::check())
        @include ('comments.form', ['parentId' => $comment->id])
    @endif

    @if (isset($comments[$comment->id]))
        @include ('comments.list', ['collection' => $comments[$comment->id]])
    @endif
</li>