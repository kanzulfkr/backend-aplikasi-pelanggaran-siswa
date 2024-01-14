<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\ViolationPointResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        return response()->json(
            [
                'message' => 'Get data user successfully',
                'data' => new UserResource($user),
            ]
        );
    }

    public function point(Request $request)
    {
        $user = $request->user();
        $violations = DB::table('violations')
            ->join('violations_types', 'violations.violations_types_id', '=', 'violations_types.id')
            ->join('users as student', 'violations.student_id', '=', 'student.id')
            ->join('users as officer', 'violations.officer_id', '=', 'officer.id')
            ->select(
                'violations.id',
                'student.name as student_name',
                'officer.name as officer_name',
                'violations_types.name as violations_types_name',
                'violations_types.point',
                'violations_types.type',
                'violations.catatan',
                'violations.is_validate',
                'violations.created_at',
            )
            ->where('student_id', '=', $user->id)
            ->paginate(10);

        // variable tambahan
        $violation_total = $violations->total();
        $point_total = 0;

        // operasi hitung total pelanggaran
        foreach ($violations as $violation) {
            $point_total += $violation->point;
        }

        // operasi kondisi status tindak lanjut siswa
        if ($point_total < 5) {
            $status = 'aman ajah';
        } else if ($point_total >= 5 && $point_total <= 10) {
            $status = 'Pembinaan';
        } else if ($point_total > 10 && $point_total <= 15) {
            $status = 'Panggilan orang tua ke-1 dan surat peringatan';
        } else if ($point_total > 15 && $point_total <= 22) {
            $status = 'Panggilan orang tua ke-2 dan surat peringatan bermaterai';
        } else if ($point_total > 22 && $point_total <= 30) {
            $status = 'Panggilan Orang Tua ke-3 dan Scorsing I selama 3 hari';
        } else if ($point_total > 30 && $point_total <= 39) {
            $status = 'Panggilan Orang Tua Ke- 4 dan Scorsing II selama 1 minggu';
        } else {
            $status = 'Panggilan orang tua  dan siswa dikembalikan ke orang tua selamanya. Dan sekolah memberikan kesempatan untuk mutasi sekolah';
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
}
