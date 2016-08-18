<?php

// Assume a signed in user.
Auth::loginUsingId(1);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('posts/{post}', function (App\Post $post) {
    return view('posts.show')->with([
        'post' => $post,
        'comments' => $post->getThreadedComments()
    ]);
});


Route::post('posts/{post}/comments', function (App\Post $post) {
    $post->addComment([
        'body' => request('body'),
        'parent_id' => request('parent_id', null)
    ]);

    return back();
})->middleware('auth');




