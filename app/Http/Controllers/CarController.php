<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CarRepository;
use App\Http\Resources\CarResource;
use App\Mappers\Request\CarMapper as CarRequestMapper;
use App\Mappers\DataTable\CarMapper;
use App\Models\Car;
use App\Services\DataTableManager;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $paginator = DataTableManager::getInstance(CarRepository::getCars(), $request->all(), CarMapper::map())->getQuery();
        return response([
            'items' => CarResource::collection((collect($paginator->items()))),
        ], 200);
    }

    public function store(Request $request)
    {
        $fields = CarRequestMapper::map($request);
        if (Car::saveInstance($fields))
            return response(['message' => 'Car created Successfully'], 200);

        return response(['message' => 'Bad request'], 400);
    }

    public function show(Car $car)
    {
        return response(new CarResource($car), 200);
    }

    public function update(Request $request, Car $car)
    {
        if ($car->update(CarRequestMapper::map($request)))
        {
            return response(['message' => 'Car Created'], 201);
        }
        return response(['message' => 'Bad Request'], 400);
     }

     public function destroy(Car $car)
     {
         if($car->delete())
             return response(['message' => 'Car Deleted'], 200);

         return response(['message' => 'Bad request'], 400);

     }
}
