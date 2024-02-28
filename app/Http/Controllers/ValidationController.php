<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateValidationRequest;
use App\Models\Violation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ValidationController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $violations = DB::table('violations')
            ->where('is_validate', 'like', '0')
            ->join('violations_types', 'violations.violations_types_id', '=', 'violations_types.id')
            ->join('students', 'violations.student_id', '=', 'students.id')
            ->join('teachers', 'violations.officer_id', '=', 'teachers.id')
            ->join('users as student', 'students.user_id', '=', 'student.id')
            ->join('users as officer', 'teachers.user_id', '=', 'officer.id')
            ->select('violations.id', 'violations.violations_types_id', 'students.nisn', 'violations.student_id', 'violations.officer_id', 'violations.is_validate', 'violations.is_confirm', 'student.name as student_name', 'officer.name as office_name', 'violations_types.name as violation_name', 'violations_types.point', 'violations.catatan')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('student.name', 'like', '%' . $keyword . '%')
                    ->orWhere('violations_types.name', 'like', '%' . $keyword . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.validations.index', compact('violations'));
    }

    public function update(UpdateValidationRequest $request, Violation $violation)
    {
        $validate = $request->validated();
        $violation->update($validate);
        return redirect()->route('validation.index')->with('success', 'Berhasil melakukan validasi pelanggaran ');
    }
}
