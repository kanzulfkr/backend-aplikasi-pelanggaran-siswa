<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreViolationRequest;
use App\Http\Requests\UpdateValidationRequest;
use App\Http\Requests\UpdateViolationRequest;
use App\Http\Resources\ViolationCompleteResource;
use App\Http\Resources\ViolationResource;
use App\Models\User;
use App\Models\Violation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViolationController extends Controller
{

    public function index(Request $request)
    {
        $violations = DB::table('violations')
            ->join('violations_types', 'violations.violations_types_id', '=', 'violations_types.id')
            ->join('students', 'violations.student_id', '=', 'students.id')
            ->join('teachers', 'violations.officer_id', '=', 'teachers.id')
            ->join('users as student', 'students.user_id', '=', 'student.id')
            ->join('users as officer', 'teachers.user_id', '=', 'officer.id')
            ->select(
                'violations.id',
                'students.id as student_id',
                'student.name as student_name',
                'teachers.id as officer_id',
                'officer.name as officer_name',
                'violations_types.id as violations_types_id',
                'violations_types.name as violation_name',
                'violations_types.point',
                'violations_types.type',
                'violations.catatan',
                'violations.is_validate',
                'violations.created_at'
            )
            ->orderBy('id', 'desc')
            ->get();
        $total = $violations->count();
        return response()->json(
            [
                'message' => 'Success get data',
                'total' => $total,
                'data' =>  ViolationCompleteResource::collection($violations),
            ]
        );
    }

    public function recap()
    {
        $violations = DB::table('violations')
            ->join('violations_types', 'violations.violations_types_id', '=', 'violations_types.id')
            ->join('students', 'violations.student_id', '=', 'students.id')
            ->join('teachers', 'violations.officer_id', '=', 'teachers.id')
            ->join('users as student', 'students.user_id', '=', 'student.id')
            ->join('users as officer', 'teachers.user_id', '=', 'officer.id')
            ->select(
                'student.id as user_id',
                'student.name as user_name',
                'officer.id as officer_id',
                'officer.name as officer_name',
                'violations.id',
                'violations_types.name as violations_types_name',
                'violations_types.point',
                'violations_types.type',
                'violations.catatan',
                'violations.is_validate',
                'violations.created_at',
            )
            ->get();

        // Group the violations by user_id manually
        $violationsByUser = $violations->groupBy('user_id');
        $usersData = [];
        $totalUser = $violations->pluck('user_id')->unique()->count();
        $totalViolations = $violations->count();

        // loop for all users violation
        foreach ($violationsByUser as $userId => $userViolations) {
            $user = User::find($userId);
            $violationTotalUser = $userViolations->count();
            $pointTotal = $userViolations->sum('point');

            $status = 'aman ajah';
            if ($pointTotal < 5) {
                $status = 'aman ajah';
            } else {
                switch (true) {
                    case ($pointTotal <= 10):
                        $status = 'Pembinaan';
                        break;
                    case ($pointTotal <= 15):
                        $status = 'Panggilan orang tua ke-1 dan surat peringatan';
                        break;
                    case ($pointTotal <= 22):
                        $status = 'Panggilan orang tua ke-2 dan surat peringatan bermaterai';
                        break;
                    case ($pointTotal <= 30):
                        $status = 'Panggilan Orang Tua ke-3 dan Scorsing I selama 3 hari';
                        break;
                    case ($pointTotal <= 39):
                        $status = 'Panggilan Orang Tua Ke-4 dan Scorsing II selama 1 minggu';
                        break;
                    default:
                        $status = 'Panggilan orang tua dan siswa dikembalikan ke orang tua selamanya. Dan sekolah memberikan kesempatan untuk mutasi sekolah';
                        break;
                }
            }
            $userData = [
                'user_id' => $userId,
                'name' => $user->name,
                'violations_total_user' => $violationTotalUser,
                'point_total' => $pointTotal,
                'status' => $status,
                'violations' => $userViolations,
            ];
            $usersData[] = $userData;
        }

        // return response()->json(
        //     [
        //         'message' => 'Success get data',
        //         'total_users' => $totalUser,
        //         'total_violations' => $totalViolations,
        //         'data' => $usersData,
        //     ]
        // );
        return response()->json(
            $usersData,

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
