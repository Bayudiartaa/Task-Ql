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
        $this->middleware(['permission:permissions.index']);
    }


    public function index()
    {
        $permissions = Permission::all();

        return view('permission.index', ['permissions' => $permissions]);
    }
}
