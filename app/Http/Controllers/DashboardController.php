<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Violation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // source statistic chart and pie chart
        $vioStats = DB::table('violations')->select(DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->where('is_validate', 'like', '1')->groupBy(DB::raw("Month(created_at)"))->pluck('count');
        $vioTypesStats = DB::table('violations')->join('violations_types', 'violations.violations_types_id', '=', 'violations_types.id')->select(DB::raw("violations_types.type as type"), DB::raw("COUNT(*) as count"))->whereYear('violations.created_at', date('Y'))->where('is_validate', 'like', '1')->groupBy('violations_types.type')->get();
        $todayVio = DB::table('violations')->whereDate('created_at', Carbon::today())->where('is_validate', 'like', '1')->count();
        $thisMonthVio = DB::table('violations')->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->where('is_validate', 'like', '1')->count();
        $lastMonthViolations = DB::table('violations')->whereYear('created_at', date('Y'))->whereMonth('created_at', Carbon::now()->subMonth()->month)->where('is_validate', 'like', '1')->count();
        $percentageIncrease = 0;
        if ($lastMonthViolations > 0) $percentageIncrease = (($thisMonthVio - $lastMonthViolations) / $lastMonthViolations) * 100;
        $thisYearVio = DB::table('violations')->whereYear('created_at', date('Y'))->where('is_validate', 'like', '1')->count();
        $lastYearViolations = DB::table('violations')->whereYear('created_at', Carbon::now()->subYear()->year)->where('is_validate', 'like', '1')->count();
        $percentageIncreaseYear = 0;
        if ($lastYearViolations > 0)  $percentageIncreaseYear = (($thisYearVio - $lastYearViolations) / $lastYearViolations) * 100;
        $violationsByClass = DB::table('student_classes')->join('violations', 'student_classes.student_id', '=', 'violations.student_id')->join('class_names', 'class_names.id', '=', 'student_classes.class_name_id')->select('class_names.name', DB::raw('COUNT(*) as total_violations'))->where('is_validate', 'like', '1')->groupBy('student_classes.class_name_id', 'class_names.name')->get();

        // source data general dashboard 
        $studentTotal = Student::all()->count();
        $teacherTotal = Teacher::all()->count();
        $violationTotal = Violation::all()->count();
        $violationValidate = Violation::where('is_validate', '=', 1)->count();
        $violationUnValidate = Violation::where('is_validate', '=', 0)->count();
        $totalsData = [
            'teacherTotal' => $teacherTotal,
            'studentTotal' => $studentTotal,
            'violationTotal' => $violationTotal,
            'violationValidate' => $violationValidate,
            'violationUnValidate' => $violationUnValidate,
        ];

        $recentViolations  = Violation::orderBy('id', 'desc')->take(6)->get();
        $unValidateViolations  = Violation::orderBy('id', 'desc')->where('is_validate', '=', 0)->get();
        $violationProgress = Violation::orderBy('id', 'desc')->take(6)->get();
        $usersProgress = [];
        foreach ($violationProgress as $violation) {
            $studentId = $violation->student_id;
            if (!isset($usersProgress[$studentId])) {
                $usersProgress[$studentId] = [
                    'student_id' => $studentId,
                    'name' => $violation->student->user->name,
                    'gender' => $violation->student->gender,
                    'nisn' => $violation->student->nisn,
                    'total_points' => 0,
                ];
            }
            $usersProgress[$studentId]['total_points'] += $violation->violationsType->point;
        }
        $auth = Auth::user()->roles;
        if ($auth == 1) {
            return view('pages.app.dashboard-admin', compact('totalsData', 'usersProgress', 'recentViolations'));
        } elseif ($auth == 2) {
            return view('pages.app.dashboard-tata-tertib', compact('totalsData', 'usersProgress', 'recentViolations', 'unValidateViolations'));
        } elseif ($auth == 3) {
            return view('pages.app.dashboard-wakasek', compact('violationsByClass', 'vioStats', 'todayVio', 'thisMonthVio', 'percentageIncrease', 'percentageIncreaseYear', 'thisYearVio', 'vioTypesStats', 'totalsData', 'usersProgress', 'recentViolations'));
        } else {
            return view('pages.app.dashboard-guru', compact('totalsData', 'usersProgress', 'recentViolations'));
        }
    }
}
