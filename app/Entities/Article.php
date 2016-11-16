<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public  $incrementing	=	true;
    public  $timestamps	=	true;
    protected $table 		= 	'article';
    protected $primaryKey	=	'id';
    protected $guarded 		= 	[];
    protected $fillable 	=	['title','cid','content','attribute','key'];

    public function getCateTitle(){
        return $this->hasOne('App\Entities\Category','id','cid');

    }
    public function getArticleOne($id){
        return $this->where(['id'=>$id])->first();

    }
    public function getArticleAll(){
       return  $this->with('getCateTitle')->get();
    }
}
