<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = DB::table('students')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->join('users', 'students.user_id', '=', 'users.id')
            ->select('students.id', 'students.nisn', 'students.gender', 'users.name', 'users.email', 'users.address', 'users.phone', DB::raw('DATE_FORMAT(users.created_at, "%d %M %Y") as created_at'))
            ->orderBy('students.id', 'desc')
            ->paginate(10);
        return view('pages.students.index', compact('students'));
    }

    public function create()
    {
        return view('pages.students.create');
    }

    public function store(StoreSiswaRequest $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'roles' => $request['roles'],
            'phone' => $request['phone'],
            'address' => $request['address'],
        ]);
        Student::create([
            'user_id' => $user->id,
            'gender' => $request['gender'],
            'nisn' => $request['nisn'],
        ]);

        return redirect(route('students.index'))->with('success', 'Berhasil menambahkan data siswa');
    }

    public function edit(Student $student)
    {
        $user = User::where('id', '=', $student->user_id)->get();
        return view('pages.students.edit', compact('user', 'student'));
    }

    public function update(UpdateSiswaRequest $request, Student $student)
    {
        $user = $student->user;
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
        ]);
        $student->update([
            'gender' => $request['gender'],
            'nisn' => $request['nisn'],
        ]);

        return redirect(route('students.index'))->with('success', 'Berhasil memperbarui data siswa');
    }


    public function destroy(Student $student)
    {
        $student->delete();
        $student->user()->delete();
        return redirect(route('students.index'))->with('success', 'Berhasil menghapus data siswa');
    }
}
