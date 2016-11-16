<!DOCTYPE html>
<html lang="zh-cn">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <script src="{{asset('yeyu_admin/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/layer/layer.js')}}"></script>
    @section('editjs')
            <!-- 加载编辑器  -->



    <!-- 结束编辑器  -->
    @show
    <title>后台管理中心</title>
    <link rel="stylesheet" href="{{asset('yeyu_admin/css/pintuer.css')}}">
    <link rel="stylesheet" href="{{asset('yeyu_admin/css/admin.css')}}">


</head>

@section('zpcss')
     <!-- 加载新的css  -->      
@show
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
    <div class="logo margin-big-left fadein-top">
        <h1><img src="{{asset('yeyu_admin/images/y.jpg')}}" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
    </div>
    <div class="head-l"><a class="button button-little bg-green" href="" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="login.html"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<?php
function getCurrentAction()
{
    $action = \Route::current()->getActionName();
    list($class, $method) = explode('@', $action);
    $class = substr(strrchr($class,'\\'),1);

    return ['controller' => $class, 'method' => $method];
}
?>
@include('zpadmin.layout.menu')


<div class="admin">
    @section('content')
    @show
</div>


@section('zpjs')
    <?php
    $errorsInfo =(array)$errors->getMessages();
    $status    = session('status');

    if(!empty($errorsInfo))
    {
        $errorsInfo = array_shift($errorsInfo);
        //dd($errorsInfo);
    }

    ?>
    <script>
        <!-- 加载新的js  -->

        @if(!empty($errorsInfo))
          layer.msg('{{$errorsInfo[0]}}', {
            icon: 6,
            time: 1000 //2秒关闭（如果不配置，默认是3秒）
        })
        @endif

        @if(!empty($status))
          layer.msg('{{$status}}', {
            icon: 6,
            time: 1000 //2秒关闭（如果不配置，默认是3秒）
        })
        @endif

    </script>
@show
<div style="text-align:center;">
    <p>来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
</html>