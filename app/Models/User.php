<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_id_num',
        'phone_num',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adminRole(){
        return $this->belongsTo(Role::class,'role_id','id');
    }

    /**
     * Checks if there is an account for the main user on the site
     * The site will not work until an account is created for the site administrator
     * Is there is an account for the admin the will return true
     */

    public function isThereAdmin(){
//        $adminUser = User::where('role_id','like',1)->first();
//        return $adminUser != null ? true : false;
//        $users = User::all();
//        $isThereAdmin = false;
//        foreach ($users as $user){
//            $adminRole = $user->adminRole->name;
//            if($adminRole == 'admin'){ $isThereAdmin = true; break;}
//        }
//        return $isThereAdmin;
    }
}
