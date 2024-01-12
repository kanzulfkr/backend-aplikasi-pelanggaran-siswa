<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreViolationRequest;
use App\Http\Requests\UpdateViolationRequest;
use App\Http\Resources\ViolationResource;
use App\Http\Resources\ViolationUserResource;
use App\Models\Violation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViolationController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user();
        $violations = DB::table('violations')
            ->join('violations_types', 'violations.violations_types_id', '=', 'violations_types.id')
            ->join('users as student', 'violations.student_id', '=', 'student.id')
            ->join('users as officer', 'violations.officer_id', '=', 'officer.id')
            ->select(
                'violations.id',
                'violations.is_validate',
                'student.name as student_name',
                'officer.name as officer_name',
                'violations_types.name as violation_name',
                'violations_types.point',
                'violations.catatan',
                'violations.created_at'
            )
            ->where('student_id', '=', $user->id)
            ->paginate(10);
        $total_point = 0;
        foreach ($violations as $violation) {
            $total_point += $violation->point;
        }
        return response()->json(
            [
                'message' => 'Success get data',
                'data' => [
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'identity_number' => $user->identity_number,
                    'total_point' => $total_point,
                    'violations' =>
                    ViolationUserResource::collection($violations),
                ]
            ]
        );
    }

    public function all(Request $request)
    {
        $violations = DB::table('violations')
            ->join('violations_types', 'violations.violations_types_id', '=', 'violations_types.id')
            ->join('users as student', 'violations.student_id', '=', 'student.id')
            ->join('users as officer', 'violations.officer_id', '=', 'officer.id')
            ->select(
                'violations.id',
                'student.name as student_name',
                'officer.name as officer_name',
                'violations_types.name as violation_name',
                'violations_types.point',
                'violations.catatan',
                'violations.is_validate',
                'violations.created_at'
            )
            ->paginate(10);
        return response()->json(
            [
                'message' => 'Success get data',
                'data' =>  ViolationUserResource::collection($violations),
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
