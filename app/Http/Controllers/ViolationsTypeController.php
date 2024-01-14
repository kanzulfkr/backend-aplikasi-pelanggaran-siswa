<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreViolationsTypeRequest;
use App\Http\Requests\UpdateViolationsTypeRequest;
use App\Models\ViolationsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViolationsTypeController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');

        $violations_types = DB::table('violations_types')

            ->select('id', 'name', 'point', 'type')
            ->where('name', 'like', '%' . $name . '%')
            ->orderBy('point', 'asc')
            ->paginate(10);

        return view('pages.violations_type.index', compact('violations_types'));
    }

    public function create()
    {
        return view('pages.violations_type.create');
    }

    public function store(StoreViolationsTypeRequest $request)
    {
        ViolationsType::create($request->all());
        return redirect()->route('violations-types.index')->with('success', 'Subject created succesfully');
    }

    public function edit(ViolationsType $violations_type)
    {
        return view('pages.violations_type.edit')->with('violations_type', $violations_type);
    }

    public function update(UpdateViolationsTypeRequest $request, ViolationsType $violations_type)
    {
        $validate = $request->validated();
        $violations_type->update($validate);
        return redirect(route('violations-types.index'))->with('success', 'Edit Subject Successfully');
    }

    public function destroy(ViolationsType $violations_type)
    {
        // dd($violations_type);
        $violations_type->delete();
        return redirect(route('violations-types.index'))->with('success', 'Delete Subject Successfully');
    }
}
