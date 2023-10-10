<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolePermissionsController extends Controller
{
    public function index(Role $role)
    {
        $role_permissions=$role->permissions->pluck('id');
        $permissions=Permission::all();
        return view('role-permissions',compact('role','permissions','role_permissions'));
    }

    public function store(Role $role, Request $request)
    {
        //این روش اولی بود که بلد بودم
//        $role->permissions()->detach();
//        $role->permissions()->attach($request->permissions);
        //این هم روش دوم هست
        $role->permissions()->sync($request->permissions);
        message('success');
        return back();
    }
}
