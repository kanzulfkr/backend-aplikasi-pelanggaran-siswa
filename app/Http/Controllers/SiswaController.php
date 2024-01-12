<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $users = DB::table('users')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->where('roles', 'like', 'siswa')
            ->select('id', 'name', 'email', 'identity_number', 'address', 'phone', DB::raw('DATE_FORMAT(created_at, "%d %M %Y") as created_at'))
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.siswa.index', compact('users'));
    }

    public function create()
    {
        return view('pages.siswa.create');
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

        return redirect(route('siswa.index'))->with('success', 'New User Successfully Added');
    }

    public function edit(User $user)
    {
        return view('pages.users.edit')->with('user', $user);
    }

    public function show(string $id)
    {
        //
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validate = $request->validated();
        $user->update($validate);
        return redirect(route('siswa.index'))->with('success', 'Edit User Successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('siswa.index'))->with('success', 'Delete User Successfully');
    }
}
