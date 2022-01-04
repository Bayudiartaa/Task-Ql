<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
     //constructor
    //untuk mengatur hanya user yg diizinkan mengakses menu permission yg bisa mengakses
    public function __construct()
    {
        $this->middleware(['permission:permissions.index|permissions.create|permissions.edit|permission.delete']);
    }


    public function index()
    {
        $permissions = Permission::all();

        return view('permission.index', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Show form for creating permissions
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name'
        ]);

        Permission::create($request->only('name'));

        return redirect()->route('permission.index')->with('success','Data Permission Berhasil Di Buat');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission  = Permission::findOrFail($id);
        return view('permission.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,'.$id
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update($request->only('name'));

        return redirect()->route('permission.index')->with('success','Data Permission Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permission.index')->with('success', 'Data Permission Berhasil Di Hapus');
    }
}
