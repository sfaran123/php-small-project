<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Branch extends BaseModel
{
    use HasFactory;

    public static function saveInstance($fields)
    {
        $model = new self;
        $model->fill($fields);
        $model->save();
        return true;
    }

}
