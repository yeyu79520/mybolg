<?php

namespace App\Http\Controllers\ZpAdmin;
use App\Http\Controllers\Controller;
use App\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PersonalController extends Controller{
    public $user;
    /***判断是否登录*******/
    public function  __construct(){
        $this->user = Auth::user();
    }
     public function index(){
         return view('zpadmin.personal.center');

     }
}
