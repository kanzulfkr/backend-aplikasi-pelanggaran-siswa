<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Violation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecapitulationController extends Controller
{
    public function index(Request $request)
    {
        $defaultCID = DB::table('class_names')->orderBy('id')->value('id') ?? 1;
        $cns = DB::table('student_classes')->select('student_id')->where('class_name_id', '=', $request->input('class_id', $defaultCID))->get()->pluck('student_id')->toArray();

        $violations = DB::table('violations')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('student.name', 'like', '%' . $name . '%');
            })->join('violations_types', 'violations.violations_types_id', '=', 'violations_types.id')->join('students', 'violations.student_id', '=', 'students.id')->join('teachers', 'violations.officer_id', '=', 'teachers.id')->join('users as student', 'students.user_id', '=', 'student.id')->join('users as officer', 'teachers.user_id', '=', 'officer.id')->join('student_classes', 'violations.student_id', '=', 'student_classes.student_id')
            ->whereIn('violations.student_id', $cns)
            ->select(
                'student.id as user_id',
                'student.name as SName',
                'students.nisn',
                'officer.id as officer_id',
                'officer.name as officer_name',
                'violations.id',
                'violations.catatan',
                'violations_types.name as VTName',
                'violations_types.point',
                DB::raw('DATE_FORMAT(violations.created_at, "%d %M %Y") as created_at')
            )
            ->where('is_validate', 'like', '1')
            ->get();

        $defaultClassId = DB::table('class_names')->orderBy('id')->value('id') ?? 1;
        $student_class = DB::table('student_classes')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('US.name', 'like', '%' . $name . '%');
            })->join('class_names', 'student_classes.class_name_id', '=', 'class_names.id')->join('students', 'student_classes.student_id', '=', 'students.id')->join('users as US', 'students.user_id', '=', 'US.id')->select('student_classes.id', 'US.name as SName', 'class_names.name as CName', 'class_names.id as CId')->where('class_names.id', '=', $request->input('class_id', $defaultClassId))
            ->orderBy('student_classes.id', 'desc')
            ->paginate(10);
        // $totalUser = $violations->pluck('user_id')->unique()->count();
        // $totalViolations = $violations->count();

        $violationsByUser = $violations->groupBy('user_id');
        $usersData = [];
        foreach ($violationsByUser as $userId => $userViolations) {
            $user = User::find($userId);
            $violationsTotal = $userViolations->count();
            $pointTotal = $userViolations->sum('point');
            $firstViolation = $userViolations->first();
            $idd = $firstViolation ? $firstViolation->id : null;
            $nisn = $firstViolation ? $firstViolation->nisn : null;
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
                'nisn' => $nisn,
                'violations_total' => $violationsTotal,
                'point_total' => $pointTotal,
                'status' => $status,
                'violations' => $userViolations,
            ];
            $usersData[] = $userData;
        }

        $className = DB::table('class_names')->select('name', 'id')->paginate(10);
        $classIdByRequest = DB::table('student_classes')->whereIn('student_id', $cns)->select('class_name_id')->first();
        $toArray = $classIdByRequest ? (array) $classIdByRequest : null;
        $classId = $toArray == '' ? null : $toArray['class_name_id'];
        return view('pages.student_class.recapitulation ', compact('student_class', 'className', 'usersData', 'violations', 'classId'));
    }

    function print(Request $request)
    {
        $defaultCID = DB::table('class_names')->orderBy('id')->value('id') ?? 1;
        $cns = DB::table('student_classes')
            ->select('student_id')
            ->where('class_name_id', '=', $request->input('class_id_print', $defaultCID))
            ->get()
            ->pluck('student_id')
            ->toArray();
        $violations = DB::table('violations')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('student.name', 'like', '%' . $name . '%');
            })
            ->join('violations_types', 'violations.violations_types_id', '=', 'violations_types.id')
            ->join('students', 'violations.student_id', '=', 'students.id')
            ->join('teachers', 'violations.officer_id', '=', 'teachers.id')
            ->join('users as student', 'students.user_id', '=', 'student.id')
            ->join('users as officer', 'teachers.user_id', '=', 'officer.id')
            ->join('student_classes', 'violations.student_id', '=', 'student_classes.student_id')
            ->whereIn('violations.student_id', $cns)
            ->select(
                'student.id as user_id',
                'student.name as SName',
                'students.nisn',
                'officer.id as officer_id',
                'officer.name as officer_name',
                'violations.id',
                'violations.catatan',
                'violations_types.name as VTName',
                'violations_types.point',
                DB::raw('DATE_FORMAT(violations.created_at, "%d %M %Y") as created_at')
            )
            ->where('is_validate', 'like', '1')

            ->get();

        $defaultClassId = DB::table('class_names')->orderBy('id')->value('id') ?? 1;
        $student_class = DB::table('student_classes')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('US.name', 'like', '%' . $name . '%');
            })
            ->join('class_names', 'student_classes.class_name_id', '=', 'class_names.id')
            ->join('students', 'student_classes.student_id', '=', 'students.id')
            ->join('users as US', 'students.user_id', '=', 'US.id')
            ->select('student_classes.id', 'US.name as SName', 'class_names.name as CName', 'class_names.id as CId')
            ->where('class_names.id', '=', $request->input('class_id', $defaultClassId))
            ->orderBy('student_classes.id', 'desc')
            ->paginate(10);
        $className = DB::table('class_names')->select('name', 'id')->paginate(10);

        $violationsByUser = $violations->groupBy('user_id');
        $usersData = [];
        $totalUser = $violations->pluck('user_id')->unique()->count();
        $totalViolations = $violations->count();

        foreach ($violationsByUser as $userId => $userViolations) {
            $user = User::find($userId);
            $violationsTotal = $userViolations->count();
            $pointTotal = $userViolations->sum('point');
            $firstViolation = $userViolations->first();
            $idd = $firstViolation ? $firstViolation->id : null;
            $nisn = $firstViolation ? $firstViolation->nisn : null;
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
                'nisn' => $nisn,
                'violations_total' => $violationsTotal,
                'point_total' => $pointTotal,
                'status' => $status,
                'violations' => $userViolations,
            ];
            $usersData[] = $userData;
        }
        $classNameByRequest = DB::table('student_classes')->whereIn('student_id', $cns)->join('class_names', 'student_classes.class_name_id', '=', 'class_names.id')->join('teachers', 'class_names.wali_kelas_id', '=', 'teachers.id')->join('users', 'teachers.user_id', '=', 'users.id')->select('class_names.name', 'users.name as Uname')->first();
        $toArray = $classNameByRequest ? (array) $classNameByRequest : null;

        return view('pages.student_class.print-pdf', compact('usersData', 'toArray'));

        // view()->share('usersData', $usersData);
        // $pdf = Pdf::loadView('pages.student_class.print-pdf');
        // return $pdf->download('rekap ' . $toArray['name'] . '.pdf');
    }
    public function ayang()
    {
        return view('pages.ayang.tes');
    }
}
