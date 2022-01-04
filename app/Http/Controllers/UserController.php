<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
     //index halaman user
    public function index(Request $request){
        $users = User::orderBy('id', 'DESC')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::latest()->get();
        return view('user.create', compact('roles'));
    }

    //save new user
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        //set user ke role yang dipilih
        $user->assignRole($request->role);

        if($user){
            //redirect dengan pesan sukses
            return redirect()->route('user.index')->with('success','Data Berhasil Disimpan!');
        }
        else{
            return redirect()->route('user.index')->with('error','Data Gagal Disimpan!');
        }
    }

    //show edit page
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::latest()->get();
        $userRole = $user->roles->pluck('name','name')->get();
        return view('user.edit', compact('roles', 'user', 'userRole'));
    }

    //proses update
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|min:6|confirmed',
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);

        if($request->password == ""){
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        }
        else{
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        }

        //assign ke role baru
        $user->syncRoles($request->role);

        if($user){
            //redirect dengan pesan sukses
            return redirect()->route('user.index')->with('success','Data Berhasil Diperbarui!');
        }
        else{
            return redirect()->route('user.index')->with('error','Data Gagal Disimpan!');
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users')->with('success', 'Data Berhasil DiHapus');
    }
}
