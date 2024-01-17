<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreViolationRequest;
use App\Http\Requests\UpdateViolationRequest;
use App\Models\User;
use App\Models\Violation;
use App\Models\ViolationsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViolationController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $violations = DB::table('violations')
            ->join('violations_types', 'violations.violations_types_id', '=', 'violations_types.id')
            ->join('students', 'violations.student_id', '=', 'students.id')
            ->join('teachers', 'violations.officer_id', '=', 'teachers.id')
            ->join('users as student', 'students.user_id', '=', 'student.id')
            ->join('users as officer', 'teachers.user_id', '=', 'officer.id')
            ->select('violations.id', 'violations.is_validate', 'student.name as student_name', 'students.nisn', 'officer.name as office_name', 'violations_types.name as violation_name', 'violations_types.point', 'violations.catatan', DB::raw('DATE_FORMAT(violations.created_at, "%d %M %Y") as created_at'))
            ->where('student.name', 'like', '%' . $keyword . '%')
            ->orWhere('violations_types.name', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.violations.index', compact('violations'));
    }

    public function create()
    {
        $violations_types = ViolationsType::orderBy('point', 'asc')->get();
        // $students = User::where('roles', '6')->get();
        // $officers = User::where('roles', '5')->get();
        $students =  DB::table('students')
            ->join('users', 'students.user_id', '=', 'users.id')
            ->select('users.name', 'students.id', 'students.user_id as student_id')
            ->paginate(10);
        $officers =  DB::table('teachers')
            ->join('users', 'teachers.user_id', '=', 'users.id')
            ->select('users.name', 'teachers.id', 'teachers.user_id as student_id')
            ->where('roles', '=', 2)
            ->orWhere('roles', '=', 5)
            ->paginate(10);
        $loginUser = Auth::user();
        return view('pages.violations.create', compact('violations_types', 'students', 'officers', 'loginUser'));
    }

    public function store(StoreViolationRequest $request)
    {
        Violation::create($request->all());
        return redirect()->route('violations.index')->with('success', 'Berhasil menambahkan pelanggaran siswa');
    }

    public function edit(Violation $violation)
    {
        $violations_type = ViolationsType::get();
        // $student = User::where('roles', '6')->get();
        // $officer = User::where('roles', '5')->get();
        $student =  DB::table('students')
            ->join('users', 'students.user_id', '=', 'users.id')
            ->select('users.name', 'students.id', 'students.user_id as student_id')
            ->paginate(10);
        $officer =  DB::table('teachers')
            ->join('users', 'teachers.user_id', '=', 'users.id')
            ->select('users.name', 'teachers.id', 'teachers.user_id as student_id')
            ->where('roles', '=', 2)
            ->orWhere('roles', '=', 5)
            ->paginate(10);
        $loginUser = Auth::user();
        return view('pages.violations.edit', compact('violations_type', 'student', 'officer', 'loginUser'))->with('violation', $violation);
    }

    public function update(UpdateViolationRequest $request, Violation $violation)
    {
        $validate = $request->validated();
        $violation->update($validate);
        return redirect(route('violations.index'))->with('success', 'Berhasil memperbarui data pelanggaran');
    }

    public function destroy(Violation $violation)
    {
        $violation->delete();
        return redirect(route('violations.index'))->with('success', 'Berhasil menghapus data pelanggaran');
    }
}
