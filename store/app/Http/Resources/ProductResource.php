<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = "Product";
    public function toArray(Request $request): array
    {
     //   return parent::toArray($request);
     return [

'id' =>$this->resource->id,
'name'=>$this->resource->name,
'description'=>$this->resource->description,
'price'=>$this->resource->price,
'quantity'=>$this->resource->quantity,
'photo'=>$this->resource->photo

     ];
    }
}
