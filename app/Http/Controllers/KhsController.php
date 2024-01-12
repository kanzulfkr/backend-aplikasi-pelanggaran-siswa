<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKhsRequest;
use App\Models\Khs;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KhsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $khs = DB::table('khs')
            ->select('khs.*', 'users.name', 'subjects.title')
            ->join('users', 'khs.student_id', '=', 'users.id')
            ->join('subjects', 'khs.subject_id', '=', 'subjects.id')

            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->orderBy('khs.id', 'desc')
            ->paginate(10);

        return view('pages.khs.index', compact('khs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {

        // $data['mahasiswa'] =  DB::connection('mysql')
        //     ->table('users')
        //     ->where('roles', 'mahasiswa')
        //     ->pluck('name', 'id');
        // $data['mahasiswa_data'] = null;

        // $data['matakuliah'] =  DB::connection('mysql')
        //     ->table('subjects')
        //     ->pluck('title', 'id');
        // $data['matakuliah_data'] = null;

        $subjects = Subject::get();
        $users = User::where('roles', 'mahasiswa')->get();
        return view('pages.khs.create', compact('subjects', 'users'));
    }

    public function store(StoreKhsRequest $request)
    {
        Khs::create([
            'subject_id' => $request['subject_id'],
            'student_id' => $request['student_id'],
            'nilai' => $request['nilai'],
            'grade' => $request['grade'],
            'keterangan' => $request['keterangan'],
            'tahun_akademik' => $request['tahun_akademik'],
            'semester' => $request['semester'],
            'created_by' => $request['created_by'],
            'updated_by' => $request['created_by'],
        ]);

        return redirect(route('khs.index'))->with('success', 'New User Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit($id)
    {

        $khs = Khs::select('khs.*', 'users.name', 'subjects.title')
            ->join('users', 'khs.student_id', '=', 'users.id')
            ->join('subjects', 'khs.subject_id', '=', 'subjects.id')
            ->find($id);

        return view('pages.khs.edit', compact('khs'));
    }

    public function update(Request $request, $id)
    {
        $khs = Khs::find($id);

        $khs->update($request->all());

        return redirect()->route('khs.index')->with('success', 'KHS updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $khs = Khs::select('khs.*', 'users.name', 'subjects.title')
            ->join('users', 'khs.student_id', '=', 'users.id')
            ->join('subjects', 'khs.subject_id', '=', 'subjects.id')
            ->find($id);

        $khs->delete();
        return redirect()->route('khs.index')->with('success', 'Delete KHS Successfully');
    }
}
