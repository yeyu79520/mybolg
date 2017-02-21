<?php
namespace App\Http\Controllers\Test;
use App\Http\Controllers\Controller;
 class TestController extends Controller{

 	function index(){
 		//echo __DIR__;
 		// echo dirname(dirname(dirname(dirname(__FILE__))));
 		$fp = fopen(__DIR__.'/data.txt', 'a');
		  $time= time()."\r\n";
		 fwrite($fp, $time);
		
		 fclose($fp);




 	}



 }