<?php

namespace App\Http\Controllers;

use App\Http\Resources\LikeCollection;
use App\Models\Post;

class PostLikeController extends Controller {

    public function index(Post $post) {
        return new LikeCollection($post->likes);
    }

    public function store(Post $post) {
        $post->likes()->toggle(auth()->user());
        return new LikeCollection($post->likes);
    }
}
