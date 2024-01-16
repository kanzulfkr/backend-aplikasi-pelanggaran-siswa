<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $teachers = DB::table('teachers')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })

            ->join('users', 'teachers.user_id', '=', 'users.id')
            ->where(function ($query) {
                $query->where('users.roles', 'like', '%2%')
                    ->orWhere('users.roles', 'like', '%3%')
                    ->orWhere('users.roles', 'like', '%4%')
                    ->orWhere('users.roles', 'like', '%5%');
            })
            ->select('teachers.id', 'teachers.nip', 'teachers.gender', 'users.roles', 'users.name', 'users.email', 'users.address', 'users.phone', DB::raw('DATE_FORMAT(users.created_at, "%d %M %Y") as created_at'))
            ->orderBy('teachers.id', 'asc')
            ->paginate(10);
        return view('pages.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('pages.teachers.create');
    }

    public function store(StoreGuruRequest $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'roles' => $request['roles'],
            'phone' => $request['phone'],
            'address' => $request['address'],
        ]);
        Teacher::create([
            'user_id' => $user->id,
            'gender' => $request['gender'],
            'nip' => $request['nip'],
        ]);

        return redirect(route('teachers.index'))->with('success', 'New User Successfully Added');
    }

    public function edit(Teacher $teacher)
    {
        $user = User::where('id', '=', $teacher->user_id)->get();
        return view('pages.teachers.edit', compact('user', 'teacher'));
    }

    public function update(UpdateGuruRequest $request, Teacher $teacher)
    {
        $user = $teacher->user;
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'roles' => $request['roles'],
            'phone' => $request['phone'],
            'address' => $request['address'],
        ]);
        $teacher->update([
            'gender' => $request['gender'],
            'nip' => $request['nip'],
        ]);

        return redirect(route('teachers.index'))->with('success', 'Teacher Information Updated');
    }


    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        $teacher->user()->delete();
        return redirect(route('teachers.index'))->with('success', 'Delete Teachers Successfully');
    }
}
