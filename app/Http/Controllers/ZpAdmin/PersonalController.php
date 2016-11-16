<?php

namespace App\Http\Controllers\ZpAdmin;
use App\Http\Controllers\Controller;
use App\Entities\User;
use App\Entities\Category;
use Illuminate\Http\Request;
use EndaEditor;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;
class PersonalController extends Controller{
    public $user;
    /***判断是否登录*******/
    public function  __construct(){
        $this->user = Auth::user();
    }

    /**
     * @method  首页中心
     * @url /laboratory/
     * @access public
     * @return mixed
     * @author zhongpeng <zhongpeng@misrobot.com>
     * @date
     * @copyright 201６-201８ MIS misrobot.com Inc. All Rights Reserved
     */
    public function index(){
         return view('zpadmin.personal.center');

     }

    /**
     * @method 分类列表
     * @url /laboratory/
     * @access public
     * @return mixed
     * @author zhongpeng <zhongpeng@misrobot.com>
     * @date
     * @copyright 201６-201８ MIS misrobot.com Inc. All Rights Reserved
     */
    public function Classifylist(Category $category){
         $category = $category->GetCategoryAll();
         return view('zpadmin.personal.classifylist',['category'=>$category]);

     }

    /**
     * @method  添加分类
     * @url /laboratory/
     * @access public
     * @return mixed
     * @author zhongpeng <zhongpeng@misrobot.com>
     * @date
     * @copyright 201６-201８ MIS misrobot.com Inc. All Rights Reserved
     */
    public function Addclassify(){
         return view('zpadmin.personal.addclassify');

     }
    public function HandleAddclassify(CategoryRequest $request,Category $category){
        $res = $request->all();
        unset($res['_token']);
        if($category->create($res)){
            return redirect('yeyu/personal/classifylist')->with('status', '添加成功');
        }else{
            return redirect()->back()->withInput()->withErrors('添加失败');
        }




        //return view('zpadmin.personal.classifylsit');

    }


    /**
     * @method  编辑分类
     * @url /laboratory/
     * @access public
     * @return mixed
     * @author zhongpeng <zhongpeng@misrobot.com>
     * @date
     * @copyright 201６-201８ MIS misrobot.com Inc. All Rights Reserved
     */
    public function Editclassify(Category $category,Request $request){
        $this->validate($request,
            [
                'id'   => 'required|integer',
            ],
            [
                'id.required'   => 'id必需有',
                'id.integer'   => 'id必须为数字',
            ]
        );
        $id  = $request->get('id');
        $one = $category->GetCategoryOne($id);
        return view('zpadmin.personal.editclassify',['one'=>$one]);

    }
    public function HandleEditclassify(Category $category,CategoryRequest $request){
        $res = $request->all();
        unset($res['_token']);
        $cate = $category->find($request->id);
        if($cate->update($res)){
            return redirect('yeyu/personal/classifylist')->with('status', '修改成功');
        }else{
            return redirect()->back()->withInput()->withErrors('修改失败');
        }

    }

    /**
     * @method  添加文章
     * @url /laboratory/
     * @access public
     * @author zhongpeng <zhongpeng@misrobot.com>
     * @date
     * @copyright 201６-201８ MIS misrobot.com Inc. All Rights Reserved
     */
    public function Addcontent(){
        return view('zpadmin.personal.addcontent');
    }


    /**
     * @method  文件上传图片
     * @url /laboratory/
     * @access public
     * @return mixed
     * @author zhongpeng <zhongpeng@misrobot.com>
     * @date
     * @copyright 201６-201８ MIS misrobot.com Inc. All Rights Reserved
     */
    public function upload(){

        // path 为 public 下面目录，比如我的图片上传到 public/uploads 那么这个参数你传uploads 就行了

        $data = EndaEditor::uploadImgFile('path');

        return json_encode($data);

    }





}
