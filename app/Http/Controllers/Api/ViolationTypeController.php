<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreViolationsTypeRequest;
use App\Http\Requests\UpdateViolationsTypeRequest;
use App\Http\Resources\ViolationTypeResource;
use App\Models\ViolationsType;
use Illuminate\Http\Request;

class ViolationTypeController extends Controller
{

    public function index(Request $request)
    {
        $violations_types = ViolationsType::all('*');
        return response()->json([
            'message' => 'Succes get all data',
            'data' => $violations_types
        ]);
    }

    public function store(StoreViolationsTypeRequest $request)
    {
        $violations_types = ViolationsType::create($request->all());
        return response()->json(
            [
                'message' => 'Success create data',
                'data' => new ViolationTypeResource($violations_types)
            ]
        );
    }

    public function update(UpdateViolationsTypeRequest $request, ViolationsType $violations_types)
    {

        $validate = $request->validated();
        $violations_types->update($validate);
        return response()->json(
            [
                'message' => 'Success update data',
                'data' => $violations_types
            ]
        );
    }

    public function destroy(ViolationsType $violations_types)
    {
        $violations_types->delete();
        return response()->json(
            [
                'message' => 'Success delete data',
            ]
        );
    }
}
