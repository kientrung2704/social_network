<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post as PostResources;
use App\Http\Resources\PostCollection;
use App\Models\Friend;
use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index()
    {
        $friends = Friend::friendships();

        if ($friends->isEmpty()) {
            return new PostCollection(\request()->user()->posts);
        }

        return new PostCollection(
            Post::whereIn('user_id', [$friends->pluck('user_id'), $friends->pluck('friend_id')])
                ->get()
        );
    }

    public function store()
    {
        $data = request()->validate([
            'body' => '',
            'image' => '',
            'width' => '',
            'height' => ''
        ]);

        if (isset($data['image'])) {
            $image = $data['image']->store('post-images');

            Image::make($data['image'])
                ->fit($data['width'], $data['height'])
                ->save(public_path('storage/post-images/' . $data['image']->hashName()));
        }

        $post = request()->user()->posts()->create([
            'body' => $data['body'],
            'image' => $image ?? null
        ]);

        return new PostResources($post);
    }

    public function show(Post $post)
    {
        return new PostResources($post);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return new PostResources($post);
    }

    public function update(Post $post, Request $request)
    {
        // $this->authorize('update', $post);

        if (isset($request->image)) {
            $path = $request->image->store('post-images', 'public');
        }
        $post->update([
            'body' => $request->body,
            'image' => $path ?? null
        ]);

        return response()->json(
            [
                'code' => 1000,
                'message' => "Cập nhật bài viết thành công"
            ], 200);

    }

    public function destroy(Post $post)
    {

        // $this->authorize('delete', $post);

        $post->delete();

        return response()->json(
            [
                'code' => 1000,
                'message' => "Xóa bài thành công"
            ], 200);

    }
}