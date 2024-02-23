<?php

namespace App\Http\Controllers\Security;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Test;

class RolePermission extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::get();
        $permissions = Permission::get();
        $tests = Test::all();
        return view('test-module.permissions', compact('roles', 'permissions','tests'));
        // return view('test-module.permissions', compact('tests'));
    }

    public function store(Request $request)
    {
        //code here
    }
}
