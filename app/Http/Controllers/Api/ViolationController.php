<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreViolationRequest;
use App\Http\Requests\UpdateValidationRequest;
use App\Http\Requests\UpdateViolationRequest;
use App\Http\Resources\ViolationCompleteResource;
use App\Http\Resources\ViolationResource;
use App\Models\Violation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViolationController extends Controller
{

    public function index(Request $request)
    {
        $violations = DB::table('violations')
            ->join('violations_types', 'violations.violations_types_id', '=', 'violations_types.id')
            ->join('users as student', 'violations.student_id', '=', 'student.id')
            ->join('users as officer', 'violations.officer_id', '=', 'officer.id')
            ->select(
                'violations.id',
                'student.id as student_id',
                'student.name as student_name',
                'officer.id as officer_id',
                'officer.name as officer_name',
                'violations_types.id as violations_types_id',
                'violations_types.name as violation_name',
                'violations_types.point',
                'violations_types.type',
                'violations.catatan',
                'violations.is_validate',
                'violations.created_at'
            )
            ->paginate(10);
        $total = $violations->total();
        return response()->json(
            [
                'message' => 'Success get data',
                'total' => $total,
                'data' =>  ViolationCompleteResource::collection($violations),
            ]
        );
    }

    public function store(StoreViolationRequest $request)
    {
        $violation = Violation::create($request->all());
        return           response()->json(
            [
                'message' => 'Success create data',
                'data' => new ViolationResource($violation)
            ]
        );
    }

    public function update(UpdateViolationRequest $request, Violation $violation)
    {

        $validate = $request->validated();
        $violation->update($validate);
        return response()->json(
            [
                'message' => 'Success update data',
                'data' => $violation
            ]
        );
    }

    public function validation(UpdateValidationRequest $request, Violation $violation)
    {

        $validate = $request->validated();
        $violation->update($validate);
        return response()->json(
            [
                'message' => 'Success validate data',
                'data' => $violation->is_validate
            ]
        );
    }

    public function destroy(Violation $violation)
    {
        $violation->delete($violation);
        return response()->json(
            [
                'message' => 'Success delete data',
            ]
        );
    }
}
