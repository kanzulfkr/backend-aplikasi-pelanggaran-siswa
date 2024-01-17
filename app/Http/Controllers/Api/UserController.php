<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Http\Resources\TeacherResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\ViolationPointResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->user()->id;

        $user = User::join('students', 'students.user_id', '=', 'users.id')
            ->select('students.gender', 'students.nisn', 'users.name', 'users.id', 'users.email', 'users.phone', 'users.address', 'users.roles')
            ->where('students.user_id', $userId)
            ->first();

        return response()->json([
            'message' => 'Get data user successfully',
            'data' => new UserResource($user),
        ]);
    }


    public function point(Request $request)
    {
        $user = $request->user();
        $violations = DB::table('violations')
            ->join('violations_types', 'violations.violations_types_id', '=', 'violations_types.id')
            ->join('students', 'violations.student_id', '=', 'students.id')
            ->join('teachers', 'violations.officer_id', '=', 'teachers.id')
            ->join('users as student', 'students.user_id', '=', 'student.id')
            ->join('users as officer', 'teachers.user_id', '=', 'officer.id')
            ->select(
                'violations.id',
                'student.id as user_id',
                'student.name as student_name',
                'officer.name as officer_name',
                'violations_types.name as violations_types_name',
                'violations_types.point',
                'violations_types.type',
                'violations.catatan',
                'violations.is_validate',
                'violations.created_at',
            )
            ->where('students.user_id', '=', $user->id)
            ->paginate(10);

        $violation_total = $violations->total();
        $point_total = 0;
        foreach ($violations as $violation) {
            $point_total += $violation->point;
        }

        if ($point_total < 5) {
            $status = 'aman ajah';
        } else {
            switch (true) {
                case ($point_total <= 10):
                    $status = 'Pembinaan';
                    break;
                case ($point_total <= 15):
                    $status = 'Panggilan orang tua ke-1 dan surat peringatan';
                    break;
                case ($point_total <= 22):
                    $status = 'Panggilan orang tua ke-2 dan surat peringatan bermaterai';
                    break;
                case ($point_total <= 30):
                    $status = 'Panggilan Orang Tua ke-3 dan Scorsing I selama 3 hari';
                    break;
                case ($point_total <= 39):
                    $status = 'Panggilan Orang Tua Ke-4 dan Scorsing II selama 1 minggu';
                    break;
                default:
                    $status = 'Panggilan orang tua dan siswa dikembalikan ke orang tua selamanya. Dan sekolah memberikan kesempatan untuk mutasi sekolah';
                    break;
            }
        }
        return response()->json(
            [
                'message' => 'Success get data',
                'data' => [
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'violation_total' => $violation_total,
                    'point_total' => $point_total,
                    'status' => $status,
                    'violations' =>
                    ViolationPointResource::collection($violations),
                ]
            ]
        );
    }

    public function student()
    {
        $students = DB::table('students')
            ->join('users', 'students.user_id', '=', 'users.id')
            ->select('*')
            ->get();
        return response()->json(
            [
                'message' => 'Success get data',
                'data' => StudentResource::collection($students)
            ]
        );
    }

    public function teacher()
    {
        $teachers = DB::table('teachers')
            ->join('users', 'teachers.user_id', '=', 'users.id')
            ->select('*')
            ->get();
        return response()->json(
            [
                'message' => 'Success get data',
                'data' => TeacherResource::collection($teachers)
            ]
        );
    }
}
