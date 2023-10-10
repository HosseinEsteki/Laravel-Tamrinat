<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'user_id',
        'role_id',
        'permission_id'
    ];

    public function field(){
        if(isset($this->role_id)){
            return ['key'=>'سطح دسترسی','value'=>$this->role];
        }
        if(isset($this->permission_id)){
            return ['key'=>'نقش','value'=>$this->permission];
        }
        return null;
    }

//    Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function permission(){
        return $this->belongsTo(Permission::class);
    }
}
