<?php
namespace App\Http\Controllers\Test;
use App\Http\Controllers\Controller;
 class TestController extends Controller{

 	function index(){
	\Illuminate\Support\Facades\Session::put('MessagesStatus',2);
 		return  view('test');
 	}



 }