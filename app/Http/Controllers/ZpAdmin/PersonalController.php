<?php

namespace App\Http\Controllers\ZpAdmin;
use App\Http\Controllers\Controller;
use App\Entities\User;
use App\Entities\Category;
use Illuminate\Http\Request;
use EndaEditor;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ArticleRequest;
use App\Entities\Article;
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
            $cates = $category->GetCategoryAll();
            $cate = serialize($cates->toArray());
             Cache::forever('category',$cate);
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
        if(empty($one)){
            return redirect()->back()->withInput()->withErrors('没有该类id');
        }
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
        $category = unserialize(Cache::get('category'));
        if(empty($category)){
            return redirect('yeyu/personal/classifylist')->with('status', '请添加分类');
        }
        return view('zpadmin.personal.addcontent',['category'=>$category]);
    }

    public function HandleAddcontent(ArticleRequest $request,Article $article){
        $res = $request->all();

        unset($res['_token']);
        if($article->create($res)){
            return redirect('yeyu/personal/classifylist')->with('status', '添加成功');
        }else{
            return redirect()->back()->withInput()->withErrors('添加失败');
        }
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

    /**
     * @method  文章列表
     * @url /laboratory/
     * @access public
     * @author zhongpeng
     * @date
     * @copyright 201６-201８ M Inc. All Rights Reserved
     */
    public function Articlelist(Article $article){
        $articles = $article->getArticleAll();
        $articles = $articles->toArray();
        return view('zpadmin.personal.articlelist',['articles'=>$articles]);
  }

    /**
     * @method 修改文章
     * @url /laboratory/
     * @access public
     * @param Request $request
     * @param Article $article
     * @author zhongpeng
     * @date
     * @copyright 201６-201８ M Inc. All Rights Reserved
     */
    public function EditArticle(Request $request, Article $article){
        $this->validate($request,
            [
                'id'   => 'required|integer',
            ],
            [
                'id.required'   => '数据不合法',
                'id.integer'   => '数据不合法',
            ]
        );
        $category = unserialize(Cache::get('category'));
        $one = $article->getArticleOne($request->get('id'));
        $one->content = EndaEditor::MarkDecode($one->content);
       // $one->content  =htmlentities($one->content);
        //dd($one);
       
        return view('zpadmin.personal.editarticle',['one'=>$one,'category'=>$category]);
        
        
    }




}
