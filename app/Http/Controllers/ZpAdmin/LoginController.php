<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/13
 * Time: 20:56
 */
namespace App\Http\Controllers\ZpAdmin;
use App\Http\Controllers\Controller;
use App\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller{

   public function login(){
//        $tes =[
//            'name'=>'yeyu79520',
//            'password'=>bcrypt('795200'),
//            'email'=>'414604667@qq,com',
//            'mobile'=>'13648056469',
//
//        ];
//    User::create($tes);
      return   view( 'zpadmin.login.login');
    }

    /**
     * @method
     * @url /laboratory/    登录处理
     * @access public
     * @param Request $request
     * @return mixed
     * @author zhongpeng <zhongpeng@misrobot.com>
     * @date
     * @copyright 201６-201８ MIS misrobot.com Inc. All Rights Reserved
     */
    public function loginop(Request $request){

        $name =$request->get('name');
        $password =$request->get('password');
        $res = $this->verify($name,$password);
       try{
           $res = $this->verify($name,$password);
           if($res){
               return redirect('yeyu/personal/index');
           }else{

              return  redirect()->back()->withErrors('账号或者密码有误');
           }
       }catch (\Exception $ex){
           print $ex->getMessage();
       }

    }

    /**
     * @method
     * @url /laboratory/ 登录验证
     * @access public
     * @param $name
     * @param $password
     * @return bool
     * @author zhongpeng <zhongpeng@misrobot.com>
     * @date
     * @copyright 201６-201８ MIS misrobot.com Inc. All Rights Reserved
     */
    public function verify($name, $password)
    {
        if(strlen($name)<3 || strlen($password)<6)
        {
            return false;
        }

        if (Auth::attempt(['name' => $name, 'password' =>$password])    ||
            Auth::attempt(['mobile' => $name, 'password' =>$password])  ||
            Auth::attempt(['email' => $name, 'password' =>$password])
        )
        {
            return Auth::id();
        }

        else {
            return false;
        }
    }
    public function Loginout(){
        Auth::logout();
        return redirect()->route('yeyu.login');
        
    }


}

