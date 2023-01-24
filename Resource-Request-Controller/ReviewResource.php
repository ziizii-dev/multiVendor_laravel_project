<?php

namespace App\Http\Resources\Mobile\User\V1;

use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'error' => false,
            'authorized' => true,
            'message' => 'Reviews',
            'data' => [
                'user_name' => $this->user_name,
                'description' => $this->description,
                'rating' => $this->rating,
                'created_at' => $this->created_at,
            ],
        ];
    }
}