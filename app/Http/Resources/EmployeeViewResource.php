<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeViewResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'IdNumber'              => $this->id_number,
            'name'                  => $this->name,
            'magneticCard'          => $this->magnetic_card,
            'externalId'            => $this->external_id,
            'gender'                => $this->gender,
            'phone'                 => $this->phone,
            'address'               => $this->address,
            'birthDate'             => $this->birth_date,
            'workStartDate'         => $this->work_start_date,
            'isCashier'             => $this->is_cashier,
            'isDeliveryPerson'      => $this->is_delivery_person,
            'isManager'             => $this->is_manager,
            'isMinusApprove'        => $this->is_minus_approve,
            'isDiscountApprove'     => $this->is_discount_approve,
            'canViewReport'         => $this->can_view_report,
            'canRunZ'               => $this->can_run_z,
            'canViewX'              => $this->can_view_x,
            'canMakeRefund'         => $this->can_make_refund,
            'canDeleteSales'        => $this->can_delete_sales,
            'canChangePrice'        => $this->can_change_price,
            'isActive'              => $this->is_active,
            'byShiftCalculation'    => $this->by_shift_calculation,
            'contactName'           => $this->contact_name,
            'contactPhone'          => $this->contact_phone,
            'contactCloseness'      => $this->contact_closeness,
            'bank'                  => $this->bank_id,
            'branch'                => $this->bank_branch_id,
            'bankAccountNumber'     => $this->bank_account_number,
        ];
    }
}
