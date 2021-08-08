<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            "id" => $this->id,
            "title" => $this->title,
            "excerpt" => $this->excerpt,
            "content" => $this->content,
            "created_at" => date("d-m-Y H:i:s",strtotime($this->created_at)),
            "categories" => $this->when($request->input("include") == "categories" , CategoryResource::collection($this->categories))
        ];
    }
}
