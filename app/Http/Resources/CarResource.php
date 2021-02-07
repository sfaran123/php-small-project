<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'                        => $this->id,
            'type'                      => $this->type,
            'brand'                     => $this->brand,
            'model'                     => $this->model,
            'price'                     => $this->price,
            'branchId'                  => $this->branch_id,
            'branchName'                => $this->branchName,
        ];
    }
}
