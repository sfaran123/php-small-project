<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;

class CarRepository
{

    public static function getCars()
    {
        return DB::table('cars as c')
            ->join('branches as b', 'b.id', 'c.branch_id')
            ->select('c.*', 'b.name as branchName', );

    }
}
