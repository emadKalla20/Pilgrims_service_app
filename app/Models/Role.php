<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function isThereAdminRole(){
        $role = Role::where('name','like',"%admin%")->first();
        return $role != null ? true : false;
    }
}
