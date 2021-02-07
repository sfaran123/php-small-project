<?php

namespace App\Mappers\Request;

use Illuminate\Http\Request;

class BranchMapper
{
	public static function map(Request $request)
	{
		return [
			'name'				            => $request->input('name'),
			'manager'			            => $request->input('manager')
		];
	}
}
