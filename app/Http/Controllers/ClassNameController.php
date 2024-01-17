<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassNameRequest;
use App\Http\Requests\UpdateClassNameRequest;
use App\Models\ClassName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassNameController extends Controller
{
    public function index(Request $request)
    {
        $class_names = DB::table('class_names')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->join('teachers', 'class_names.wali_kelas_id', '=', 'teachers.id')
            ->join('users', 'teachers.user_id', '=', 'users.id')
            ->select('class_names.id', 'class_names.name as class_name', 'teachers.nip', 'teachers.gender', 'users.name', 'users.email', 'users.address', 'users.phone', DB::raw('DATE_FORMAT(users.created_at, "%d %M %Y") as created_at'))
            ->orderBy('class_names.id', 'asc')
            ->paginate(10);
        return view('pages.class_names.index', compact('class_names'));
    }

    public function create()
    {
        $wali_kelas =  DB::table('teachers')
            ->join('users', 'teachers.user_id', '=', 'users.id')
            ->select('users.name', 'teachers.id', 'teachers.user_id')
            ->where('users.roles', 'like', '%4%')
            ->paginate(10);
        return view('pages.class_names.create', compact('wali_kelas'));
    }

    public function store(StoreClassNameRequest $request)
    {
        ClassName::create($request->all());
        return redirect()->route('class-names.index')->with('success', 'Berhasil menambahkan data kelas');
    }

    public function edit(ClassName $class_name)
    {
        $walikelas = $class_name->walikelas;
        $user =  DB::table('teachers')
            ->join('users', 'teachers.user_id', '=', 'users.id')
            ->select('users.name', 'teachers.id', 'teachers.user_id')
            ->where('users.roles', 'like', '%4%')
            ->paginate(10);
        return view('pages.class_names.edit', compact('user', 'walikelas', 'class_name'));
    }

    public function update(UpdateClassNameRequest $request, ClassName $class_name)
    {
        $validate = $request->validated();
        $class_name->update($validate);
        return redirect(route('class-names.index'))->with('success', 'Berhasil memperbarui data kelas');
    }

    public function destroy(ClassName $class_name)
    {
        $class_name->delete();
        return redirect(route('class-names.index'))->with('success', 'Berhasil menghapus data kelas');
    }
}
