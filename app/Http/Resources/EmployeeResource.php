<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'                     => $this->id,
            'magnetCard'             => $this->magnetic_card,
            'name'                   => $this->name,
            'phone'                  => $this->phone,
            'isActive'               => $this->is_active,
        ];
    }
}
