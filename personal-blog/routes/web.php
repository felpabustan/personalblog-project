<?php

use Symfony\Component\HttpKernel\Fragment\RoutableFragmentRenderer;

Route::get('/', 'PublicController@index')->name('index');
Route::get('/post/{post}', 'PublicController@singlePost')->name('singlePost');
Route::get('/about', 'PublicController@about')->name('about');
Route::get('/contact', 'PublicController@contact')->name('contact');
//post routes
Route::post('/contact', 'PostController@contactPost')->name('contactPost');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

//user
Route::prefix('user')->group(function(){
    Route::get('dashboard', 'UserController@dashboard')->name('userDashboard');
    Route::get('comments', 'UserController@comments')->name('userComments');
        Route::post('comment/{id}/delete', 'UserController@deleteComment')->name('deleteComment');
    Route::get('profile', 'UserController@profile')->name('userProfile');
    Route::post('profile', 'UserController@profilePost')->name('userProfilePost');
});

//author
Route::prefix('author')->group(function(){
    Route::get('dashboard', 'AuthorController@dashboard')->name('authorDashboard');
    Route::get('posts', 'AuthorController@posts')->name('authorPosts');
    Route::get('posts/new', 'AuthorController@newPost')->name('authorNewPost');
    Route::post('posts/new', 'AuthorController@createPost')->name('authorCreatePost');
    Route::get('posts/{id}/edit', 'AuthorController@postEdit')->name('authorPostEdit');
    Route::post('posts/{id}/edit', 'AuthorController@postEditPost')->name('authorPostEditPost');
    Route::post('posts/{id}/delete', 'AuthorController@postDelete')->name('authorPostDelete');
    Route::get('comments', 'AuthorController@comments')->name('authorComments');
});

//admin
Route::prefix('admin')->group(function(){
    Route::get('dashboard', 'AdminController@dashboard')->name('adminDashboard');
    Route::get('posts', 'AdminController@posts')->name('adminPosts');
    Route::get('comments', 'AdminController@comments')->name('adminComments');
    Route::get('users', 'AdminController@users')->name('adminUsers');

});
