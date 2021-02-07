<?php

namespace App\Mappers\Request;

use Illuminate\Http\Request;

class CarMapper
{
	public static function map(Request $request)
	{
		return [
			'type'				            => $request->input('type'),
			'brand'			                => $request->input('brand'),
			'model'				            => $request->input('model'),
			'price'			                => $request->input('price'),
			'branch_id'			            => $request->input('branchId'),
		];
	}
}
