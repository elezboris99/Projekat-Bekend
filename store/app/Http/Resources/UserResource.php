<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = "User";
    public function toArray(Request $request): array
    {
      //  return parent::toArray($request);
return [
    'id' =>$this->resource->id,
    'first_name'=>$this->resource->first_name,
    'last_name'=>$this->resource->last_name,
    'email'=>$this->resource->email,
    'type'=>$this->resource->type,
    'address'=>$this->resource->address


];


    }
}
