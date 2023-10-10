<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use function PHPUnit\Framework\isEmpty;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('update-role');
        $roles = Role::all();
        $roleEdit = session('role');
        return view('roles', compact('roles', 'roleEdit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @throws ValidationException
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'role_id' => 'integer',
//            'name' => 'required|string|max:100',
////            if you have an array, you should use this way
////            'email.*' =>'required|email'
//        ]);
        $roleId = $request->role_id;
        if (isset($roleId)) {
            $role = Role::find($roleId);
            $role->name = $request->name;

        } else {
            $role = new Role($request->all());
        }
        $role->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        session()->flash('role', $role);
        return redirect(route('roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {

        $role->delete();
        return back();
    }

}
