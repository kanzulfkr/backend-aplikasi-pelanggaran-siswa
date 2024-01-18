<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Violation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = DB::table('users')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->where('roles', 'like', '5')
            ->select('id', 'name', 'email', 'phone', 'address', DB::raw('DATE_FORMAT(created_at, "%d %M %Y") as created_at'))
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.users.index', compact('users',));
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'roles' => $request['roles'],
            'phone' => $request['phone'],
            'address' => $request['address'],
        ]);

        return redirect(route('user.index'))->with('success', 'New User Successfully Added');
    }

    public function edit(User $user)
    {
        return view('pages.users.edit')->with('user', $user);
    }

    public function show(string $id)
    {
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validate = $request->validated();
        $user->update($validate);
        return redirect(route('user.index'))->with('success', 'Edit User Successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('user.index'))->with('success', 'Delete User Successfully');
    }
    public function dashboard()
    {
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
        $violationProgress = Violation::orderBy('id', 'desc')->get();
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
        return view('pages.app.dashboard', compact('totalsData', 'usersProgress', 'recentViolations'));
    }
}
