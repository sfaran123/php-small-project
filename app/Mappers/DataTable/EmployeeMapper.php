<?php

namespace App\Mappers\DataTable;

class EmployeeMapper
{
    public static function map()
    {
        return [
            'id'                             => 'e.id',
            'name'                           => 'e.name',
            'magnetCard'                     => 'e.magnetic_card',
            'phone'                          => 'e.phone',
            'isActive'                       => 'e.is_active',
        ];
    }
}
