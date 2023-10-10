<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('users',function (){
    $users=\App\Models\User::all();
    return json_encode($users);
});
Route::get('roles',[App\Http\Controllers\Api\RoleApiController::class,'index'])->middleware('auth:sanctum');


//Bearer 1|laravel_sanctum_yKgv8i05OIlFuXY0029xo3bHx8NvapRzBxPhhPref9c07242
Route::get('auth/{userId}',function ($userId){
    return \App\Models\User::find($userId)->createToken('MyApi')->plainTextToken;
});
