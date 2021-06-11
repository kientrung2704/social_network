<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentCollection;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{

    public function index(Post $post)
    {

        return (new CommentCollection($post->comments))->response()->setStatusCode(200);

    }

    public function store(Post $post)
    {
        $data = \request()->validate([
            'body' => 'required'
        ]);
        $post->comments()->create(array_merge($data, [
            'user_id' => auth()->user()->id
        ]));

        return new CommentCollection($post->comments);

    }

    public function show(Comment $comment)
    {

        return (new CommentResource($comment))->response()->setStatusCode(200);

    }

    public function edit(Comment $comment)
    {

        return new CommentResource($comment);

    }

    public function update(Comment $comment, Request $request)
    {
        $data = \request()->validate([
            'body' => 'required'
        ]);

        // $this->authorize('update', $comment);

        $comment->update($data);
        // $comment->update([
        //     'body' => $request->body
        // ]);

        return response()->json(
            [
                'code' => 1000,
                'message' => "Cập nhật comment thành công"
            ], 200);
    }

    public function destroy(Comment $comment)
    {

        $this->authorize('delete', $comment);
        $comment->delete();

        return response()->json(
            [
                'code' => 1000,
                'message' => "Xóa comment thành công"
            ], 200);

    }
}