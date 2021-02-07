<?php

namespace App\Http\Controllers;

use App\Http\Repositories\BranchRepository;
use App\Http\Resources\BranchResource;
use App\Http\Resources\SelectItemResource;
use App\Mappers\Request\BranchMapper as BranchRequestMapper;

use App\Mappers\DataTable\BranchMapper;
use App\Models\Branch;
use App\Services\DataTableManager;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    public function select() {
        $branches = Branch::select('id', 'name')->get();
        return response(SelectItemResource::collection($branches), 200);
    }

    public function index(Request $request)
    {
        $paginator = DataTableManager::getInstance(BranchRepository::getBranches(), $request->all(), BranchMapper::map())->getQuery();
        return  response([
            'items' => BranchResource::collection((collect($paginator->items()))),
        ], 200);
    }

    public function store(Request $request)
    {
        $fields = BranchRequestMapper::map($request);
        if (Branch::saveInstance($fields))
            return response(['message' => 'Branch Created']);

        return response(['message' => 'Bad request'], 400);
    }

    public function show(Branch $branch)
    {
        return response(new BranchResource($branch),200);
    }

    public function update(Request $request, Branch $branch)
    {
        if ($branch->update(BranchRequestMapper::map($request)))
            return response(['message' => 'Branch Created'], 201);

        return response(['message' => 'Bad Request'], 400);
    }

    public function destroy(Branch $branch) {
        if ($branch->delete())
            return response(['message' => 'Branch Deleted'], 200);
        return response(['message' => 'Bad request'], 400);

    }
}
