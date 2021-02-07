<?php

namespace App\Mappers\Request;

use Illuminate\Http\Request;

class EmployeeMapper
{
	public static function map(Request $request)
	{
		return [
			'id_number'				        => $request->input('IdNumber'),
			'name'			                => $request->input('name'),
			'magnetic_card'				    => $request->input('magnetCard'),
			'external_id'			        => $request->input('externalId'),
			'gender'			            => $request->input('gender'),
			'phone'			                => $request->input('phone'),
			'address'			            => $request->input('address'),
			'birth_date'			        => $request->input('birthDate'),
			'work_start_date'			    => $request->input('workStartDate'),
			'is_cashier'			        => boolval($request->input('isCashier')),
			'is_delivery_person'		    => boolval($request->input('isDeliveryPerson')),
			'is_manager'		            => boolval($request->input('isManager')),
			'is_minus_approve'		        => boolval($request->input('isMinusApprove')),
			'is_discount_approve'		    => boolval($request->input('isDiscountApprove')),
			'can_view_report'		        => boolval($request->input('canViewReport')),
			'can_run_z'			            => boolval($request->input('canRunZ')),
			'can_view_x'				    => boolval($request->input('isLocked')),
			'can_make_refund'				=> boolval($request->input('isBlocked')),
			'can_delete_sales'      	    => boolval($request->input('isElatResident')),
			'can_change_price'				=> boolval($request->input('obligo')),
			'is_active'		                => boolval($request->input('isActive')),
			'by_shift_calculation'		    => boolval($request->input('byShiftCalculation')),
            'contact_name'                  => $request->input('contactName'),
			'contact_phone'		            => $request->input('contactPhone'),
			'contact_closeness'		        => $request->input('contactCloseness'),
            'bank_id'                       => $request->input('bank'),
            'bank_branch_id'                => $request->input('branch'),
            'bank_account_number'           => $request->input('bankAccountNumber'),
		];
	}
}
