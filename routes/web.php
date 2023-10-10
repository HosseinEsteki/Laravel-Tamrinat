<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

//تابع Transaction میگوید بیا و ی سری کار توی دیتابیس انجام بده. اگه هرکدومش با شکست مواجه شد، تغییرات قبلی رو هم برگردون.  "تامام"
Route::get('transaction', function () {
    $permissions = DB::transaction(function () {
        $permission=\App\Models\Permission::find(1);
        $permission->delete();
        $role=\App\Models\Role::first()->delete();
        return \App\Models\Permission::all();
    });
     return $permissions;
});


Route::get('/', function () {
    return view('welcome');
// محدود کردن تعداد درخواست ها بر حسب دقیقه، بطور دیفالت 30 در خواست در دقیقه
//})->middleware('throttle');
//10 در خواست در دقیقه
//})->middleware('throttle:10');
//10 در خواست در 2 دقیقه
})->middleware('throttle:10,2');
//throttle:request,minute
Route::get('select2', function () {
    return view('select2');
})->name('select2');

Route::get('first_inject', function () {
    return view('first-inject');
})->name('first-inject');
/**
 * DropZone
 */
Route::get('dropzone',[\App\Http\Controllers\DropzoneController::class,'index'])->name('dropzone');
Route::post('/send', [\App\Http\Controllers\DropzoneController::class,'send']);
// End Dropzone
Route::get('test',[\App\Http\Controllers\DropzoneController::class,'test'])->name('ggg');
Route::get('lity',[\App\Http\Controllers\PagesController::class,'lity']);

Route::get('linkeZamanDar',function (){
$url = Storage::temporaryUrl('6.webp', now()->addMinutes(5));
   return $url;
});
Route::get('roles-api',[\App\Http\Controllers\PagesController::class,'RolesApi']);















Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('users/{user}', [\App\Http\Controllers\UserController::class, 'show'])->name('users.show');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/permissions', \App\Http\Controllers\PermissionController::class)
    ->only(['index', 'store', 'update', 'destroy', 'edit'])
    ->names([
        'index' => 'permissions',
        'store' => 'permissions.store',
        'edit' => 'permissions.edit',
        'update' => 'permissions.update',
        'destroy' => 'permissions.destroy'
    ]);

Route::resource('/roles', \App\Http\Controllers\RoleController::class)
    ->only(['index', 'store', 'update', 'destroy', 'edit'])
    ->names(['index' => 'roles',
        'store' => 'roles.store',
        'edit' => 'roles.edit',
        'update' => 'roles.update',
        'destroy' => 'roles.destroy'
    ]);
Route::get('/role-permissions/{role}', [\App\Http\Controllers\RolePermissionsController::class, 'index'])->name('role.permissions');
Route::post('/role-permissions/{role}/store', [\App\Http\Controllers\RolePermissionsController::class, 'store'])->name('role.permissions.store');
Route::get('/actions',[\App\Http\Controllers\ActionController::class,'index'])->name('actions');

