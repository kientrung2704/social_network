<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'comments',
                'comment_id' => $this->id,
                'attributes' => [
                    'commented_by' => new UserResource($this->user),
                    'body' => $this->body,
                    // 'commented_at' => $this->created_at->diffForHumans(),
                    'commented_at' => $this->created_at
                ]
            ]
            // 'links' => [
            //     'self' => url('/posts/' . $this->post_id)
            // ]
        ];
    }
}