<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreViolationRequest;
use App\Http\Requests\UpdateViolationRequest;
use App\Models\Student;
use App\Models\Teacher;
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
            ->select('violations.id', 'violations.is_validate', 'violations.is_confirm', 'student.name as student_name', 'students.nisn', 'officer.name as office_name', 'violations_types.name as violation_name', 'violations_types.point', 'violations.catatan', DB::raw('DATE_FORMAT(violations.created_at, "%d %M %Y") as created_at'))
            ->where('student.name', 'like', '%' . $keyword . '%')
            ->orWhere('violations_types.name', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.violations.index', compact('violations'));
    }

    public function create()
    {
        $auth = Auth::user();
        $students = Student::all();
        $officers = Teacher::all();
        $loginUser = Teacher::where('user_id', '=', $auth->id)->first();
        $violations_types = ViolationsType::orderBy('point', 'asc')->get();

        return view('pages.violations.create', compact('loginUser', 'students', 'officers', 'violations_types'));
    }

    public function store(StoreViolationRequest $request)
    {
        Violation::create($request->all());
        return redirect()->route('violations.index')->with('success', 'Berhasil menambahkan pelanggaran siswa');
    }

    public function edit(Violation $violation)
    {
        $auth = Auth::user();
        $student = Student::all();
        $officer = Teacher::all();
        $violations_type = ViolationsType::get();
        $loginUser = Teacher::where('user_id', '=', $auth->id)->first();
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
