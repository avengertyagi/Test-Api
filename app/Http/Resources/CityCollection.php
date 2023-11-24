<?php

namespace App\Http\Resources;

use App\Http\Traits\ApiResponser;
use App\Models\User;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CityCollection extends ResourceCollection
{
    use ApiResponser;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'message' => $this->messageResponse('get_cities'),
            'statusCode' => 200,
            'responseCode' => 'ok',
            //'data' => $this->collection,
            'id' => $this->id,
        ];
    }
}
