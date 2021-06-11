<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
                'type' => 'users',
                'user_id' => $this->id,
                'attributes' => [
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'avatar' => $this->avatar,
                    'email' => $this->email,
                    // 'password'      => $this->password,
                    'cover_image' => new UserImage($this->coverImage),
                    'profile_image' => new UserImage($this->profileImage)
                ]
            ]
            // 'links' => [
            //     'self' => url('/users/' . $this->id)
            // ]
        ];
    }
}