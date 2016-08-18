<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * A post can have many comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Load a threaded set of comments for the post.
     *
     * @return App\CommentsCollection
     */
    public function getThreadedComments()
    {
        return $this->comments()->with('owner')->get()->threaded();
    }

    /**
     * Add a comment to the post.
     *
     * @param array $attributes
     */
    public function addComment($attributes)
    {
        $comment = (new Comment)->forceFill($attributes);

        $comment->user_id = auth()->id();

        return $this->comments()->save($comment);
    }
}
