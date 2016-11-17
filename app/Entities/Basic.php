<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Basic extends Model
{

    public  $incrementing	=	true;
    public  $timestamps	=	true;
    protected $table 		= 	'basic';
    protected $primaryKey	=	'id';
    protected $guarded 		= 	[];
//    protected $hidden 		= 	['password','openid'];
    protected $fillable 	=	['title','friendship_link','domain_name','bottom_information','description'] ;
    
    
    
    
}
