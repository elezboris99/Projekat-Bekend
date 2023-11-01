<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = "Invoice";
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
return[
'id' => $this->resource->id,
'user' => new UserResource($this->resource->user),
'product' =>new ProductResource($this->resource->product),
'quantity'=>$this->resource->quantity
];
    }
}
