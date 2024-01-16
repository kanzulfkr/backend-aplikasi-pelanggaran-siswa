<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateParentsRequest;
use App\Http\Requests\StoreParentsRequest;
use App\Models\Parents;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParentsController extends Controller
{
    public function index(Request $request)
    {
        $parents = DB::table('parents')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->join('users', 'parents.user_id', '=', 'users.id')
            ->join('students', 'parents.student_id', '=', 'students.id')
            ->join('users as US', 'students.user_id', '=', 'US.id')
            ->select('parents.id', 'US.name as USname', 'parents.student_id', 'parents.job_title', 'parents.gender', 'users.name', 'users.email', 'users.address', 'users.phone', DB::raw('DATE_FORMAT(users.created_at, "%d %M %Y") as created_at'))
            ->orderBy('parents.id', 'desc')
            ->paginate(10);
        return view('pages.parents.index', compact('parents'));
    }

    public function create()
    {
        $student =  DB::table('students')
            ->join('users', 'students.user_id', '=', 'users.id')
            ->select('users.name', 'students.id', 'students.user_id')
            ->paginate(10);
        return view('pages.parents.create', compact('student'));
    }

    public function store(StoreParentsRequest $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'roles' => $request['roles'],
            'phone' => $request['phone'],
            'address' => $request['address'],
        ]);
        Parents::create([
            'user_id' => $user->id,
            'student_id' => $request['student_id'],
            'gender' => $request['gender'],
            'job_title' => $request['job_title'],
        ]);
        return redirect(route('parents.index'))->with('success', 'New Parents Successfully Added');
    }

    public function edit(Parents $parent)
    {
        $student = $parent->student;
        $user =  DB::table('students')
            ->join('users', 'students.user_id', '=', 'users.id')
            ->select('users.name', 'students.id', 'students.user_id as student_id')
            ->paginate(10);
        return view('pages.parents.edit', compact('user', 'student', 'parent'));
    }

    public function update(UpdateParentsRequest $request, Parents $parent)
    {
        $user = $parent->user;
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
        ]);
        $parent->update([
            'student_id' => $request['student_id'],
            'gender' => $request['gender'],
            'job_title' => $request['job_title'],
        ]);

        return redirect(route('parents.index'))->with('success', 'Parents Information Updated');
    }


    public function destroy(Parents $parent)
    {
        $parent->delete();
        $parent->user()->delete();
        return redirect(route('parents.index'))->with('success', 'Delete Parents Successfully');
    }
}
