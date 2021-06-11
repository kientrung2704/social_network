<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Auth
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/signup', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);

Route::middleware('auth:api')->group(function () {
    // User
    Route::post('/change_password', [App\Http\Controllers\AuthController::class, 'changePassword']);
    Route::get('get_user_info', [App\Http\Controllers\AuthUserController::class, 'show']);
    Route::get('/profile/{user}', 'App\Http\Controllers\ProfileController@edit');
    Route::post('/set_user_info_{user}', 'App\Http\Controllers\ProfileController@update');

    // Post
    Route::get('get_list_posts', [App\Http\Controllers\PostController::class, 'index']);
    Route::get('get_post_{post}', [App\Http\Controllers\PostController::class, 'show']);
    Route::post('edit_post_{post}', [App\Http\Controllers\PostController::class, 'update']);
    Route::post('delete_post_{post}', [App\Http\Controllers\PostController::class, 'destroy']);
    // Route::delete('post/{post}', 'App\Http\Controllers\PostController@destroy');

    Route::apiResources([
        '/posts' => 'App\Http\Controllers\PostController',
        '/posts/{post}/like' => 'App\Http\Controllers\PostLikeController',
        '/posts/{post}/comment' => 'App\Http\Controllers\PostCommentController',
        '/users' => 'App\Http\Controllers\UserController',
        '/users/{user}/posts' => 'App\Http\Controllers\UserPostController',
        '/friend-request' => 'App\Http\Controllers\FriendRequestController',
        '/friend-request-response' => 'App\Http\Controllers\FriendRequestResponseController',
        '/get_friend_request' => 'App\Http\Controllers\FriendRequestController',
        '/set_friend_request' => 'App\Http\Controllers\FriendRequestResponseController',
        '/user-images' => 'App\Http\Controllers\UserImageController'
    ]
    );

    // Route::get('friend', [App\Http\Controllers\FriendRequestController::class, 'index']);

    Route::get('posts_{post}_like', [App\Http\Controllers\PostLikeController::class, 'index']);

    // Comment
    Route::post('delete_comment_{comment}', 'App\Http\Controllers\PostCommentController@destroy');
    Route::post('edit_comment_{comment}', 'App\Http\Controllers\PostCommentController@update');
    // Route::post('/posts/{post}/comment', 'App\Http\Controllers\PostCommentController@store');
    Route::post('/set_comment_{post}', 'App\Http\Controllers\PostCommentController@store');

    Route::get('/get_comment_{comment}', 'App\Http\Controllers\PostCommentController@show');

    // Route::resource('/posts', 'App\Http\Controllers\PostController');

    // Route::post('/user-images', 'App\Http\Controllers\UserImageController@store');
    // Route::apiResources([
    //     '/posts/{post}/like'       => 'App\Http\Controllers\PostLikeController',
    //     '/users'                   => 'App\Http\Controllers\UserController',
    //     '/users/{user}/posts'      => 'App\Http\Controllers\UserPostController',
    //     '/friend-request'          => 'App\Http\Controllers\FriendRequestController',
    //     '/friend-request-response' => 'App\Http\Controllers\FriendRequestResponseController',
    // ]);

    Route::get('/notifications', 'App\Http\Controllers\UserNotificationsController@index');
    Route::get('/read-notifications', 'App\Http\Controllers\UserNotificationsController@destroy');

    Route::post('/search', 'App\Http\Controllers\SearchController@search');

});