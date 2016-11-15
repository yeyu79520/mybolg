<?php

namespace App\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    public  $incrementing	=	true;
    public  $timestamps	=	true;
    protected $table 		= 	'users';
    protected $primaryKey	=	'id';
    protected $guarded 		= 	[];
//    protected $hidden 		= 	['password','openid'];
    protected $fillable 	=	['name','password','mobile','email'] ;

 



}