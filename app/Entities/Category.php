<?php 
namespace App\Entities;
use Illuminate\Database\Eloquent\Model;
class Category extends Model{

    public  $incrementing	=	true;
    public  $timestamps	=	true;
    protected $table 		= 	'category';
    protected $primaryKey	=	'id';
    protected $guarded 		= 	[];
//    protected $hidden 		= 	['password','openid'];
    protected $fillable 	=	['title','pid','key','sort'] ;

    public function GetCategoryAll(){
        return $this->orderBy('sort')->get();
        
    }
    public function GetCategoryOne($id){
        return $this->where(['id'=>$id])->first();

    }
    
    
}