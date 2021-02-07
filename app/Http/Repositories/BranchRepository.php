<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;

class BranchRepository
{

    public static function getBranches()
    {
        return DB::table('branches as b')
            ->select('b.*');

    }
}
