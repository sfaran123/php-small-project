<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'                        => $this->id,
            'name'                      => $this->name,
            'manager'                   => $this->manager,
        ];
    }
}
