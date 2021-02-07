<?php

namespace App\Http\Controllers;

use App\Http\Repositories\EmployeeRepository;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\EmployeeViewResource;
use App\Mappers\DataTable\EmployeeMapper;
use App\Mappers\Request\EmployeeMapper as EmployeeRequestMapper;
use App\Models\Employee;
use App\Services\DataTableManager;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $paginator = DataTableManager::getInstance(EmployeeRepository::getEmployees(), $request->all(), EmployeeMapper::map())->getQuery();
        return response([
            'items' => EmployeeResource::collection(collect($paginator->items())),
            'total' => $paginator->total(),
            'lastPage' => $paginator->lastPage()
        ],200);
    }

    public function store(Request $request)
    {
        $fields = EmployeeRequestMapper::map($request);
        if (Employee::saveInstance($fields))
            return response()->json(['message' => 'Employee created successfully'], 201);

        return response()->json(['message' => 'Bad Request'], 400);
    }

    public function show(Employee $employee)
    {
        return response(new EmployeeViewResource($employee),200);
    }

    public function update(Request $request, Employee $employee)
    {
       if ($employee->update(EmployeeRequestMapper::map($request))){
           return response(['message' => 'Employee Created'], 201);
       }
       return response(['message' => 'Bad Request'], 400);
    }

    public function destroy(Employee $employee)
    {
        if ($employee->delete())
            return response(['message' => 'Employee Deleted'], 200);

        return response(['message' => 'Bad request'], 400);
    }
}
