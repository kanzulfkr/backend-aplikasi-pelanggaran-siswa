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
            ->join('users as student', 'violations.student_id', '=', 'student.id')
            ->join('users as officer', 'violations.officer_id', '=', 'officer.id')
            ->select('violations.id', 'violations.is_validate', 'student.name as student_name', 'officer.name as office_name', 'violations_types.name as violation_name', 'violations_types.point', 'violations.catatan', DB::raw('DATE_FORMAT(violations.created_at, "%d %M %Y") as created_at'))
            ->where('student.name', 'like', '%' . $keyword . '%')
            ->orWhere('violations_types.name', 'like', '%' . $keyword . '%')
            ->paginate(10);
        return view('pages.violations.index', compact('violations'));
    }

    public function create()
    {
        $violations_types = ViolationsType::orderBy('point', 'asc')->get();
        $students = User::where('roles', 'siswa')->get();
        $officers = User::where('roles', 'guru')->get();
        $loginUser = Auth::user();
        return view('pages.violations.create', compact('violations_types', 'students', 'officers', 'loginUser'));
    }

    public function store(StoreViolationRequest $request)
    {
        Violation::create($request->all());
        return redirect()->route('violations.index')->with('success', 'violations created succesfully');
    }

    public function edit(Violation $violation)
    {
        // dd($violations);
        $violations_type = ViolationsType::get();
        $student = User::where('roles', 'siswa')->get();
        $officer = User::where('roles', 'guru')->get();
        $loginUser = Auth::user();
        return view('pages.violations.edit', compact('violations_type', 'student', 'officer', 'loginUser'))->with('violation', $violation);
    }

    public function update(UpdateViolationRequest $request, Violation $violation)
    {
        $validate = $request->validated();
        $violation->update($validate);
        return redirect(route('violations.index'))->with('success', 'Edit Schedule Successfully');
    }

    public function destroy(Violation $violation)
    {
        // dd($violation);
        $violation->delete();
        return redirect(route('violations.index'))->with('success', 'Delete Violations Successfully');
    }
}
