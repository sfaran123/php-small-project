<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;

class EmployeeRepository
{

    public static function getEmployees()
    {
        return DB::table('employees as e')
            ->select('e.*');

    }
}
