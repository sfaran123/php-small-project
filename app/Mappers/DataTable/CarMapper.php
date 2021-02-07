<?php

namespace App\Mappers\DataTable;

class CarMapper
{
    public static function map()
    {
        return [
            'id'                             => 'c.id',
            'type'                           => 'c.type',
            'brand'                          => 'c.brand',
            'model'                          => 'c.model',
            'price'                          => 'c.price',
            'branchId'                         => 'b.name',
        ];


    }
}
