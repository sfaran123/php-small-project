<?php

namespace App\Mappers\DataTable;

class BranchMapper
{
    public static function map()
    {
        return [
            'id'                             => 'b.id',
            'name'                           => 'b.name',
            'manager'                        => 'b.manager'
        ];


    }
}
