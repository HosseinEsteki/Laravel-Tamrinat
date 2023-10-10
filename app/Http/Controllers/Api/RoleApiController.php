<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleApiController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('update-role');
        $roles=Role::all();
        return $roles->toJson();
    }
}
