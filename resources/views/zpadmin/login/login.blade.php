<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>登录</title>
    <link rel="stylesheet" href="{{asset('yeyu_admin/css/pintuer.css')}}">
    <link rel="stylesheet" href="{{asset('yeyu_admin/css/admin.css')}}">
    <script src="{{asset('yeyu_admin/js/jquery.js')}}"></script>
    <script src="{{asset('yeyu_admin/js/pintuer.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/layer/layer.js')}}"></script>
</head>
<?php
$errorsInfo =(array)$errors->getMessages();
if(!empty($errorsInfo))
{
    $errorsInfo = array_shift($errorsInfo);
}
?>
<script type="text/javascript">
            @if(!empty($errorsInfo))

                $(window).load(function(){
                    layer.msg('{{ $errorsInfo[0] }}', {icon: 8,time: 2000});
                })
    @endif
</script>
<body>
<div class="bg"></div>
<div class="container">
    <div class="line bouncein">
        <div class="xs6 xm4 xs3-move xm4-move">
            <div style="height:150px;"></div>

            <div class="media media-y margin-big-bottom">
            </div>
            <form action="{{route('yeyu.loginop')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="panel loginbox">
                    <div class="text-center margin-big padding-big-top"><h1>后台管理中心</h1></div>
                    <div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
                        <div class="form-group">
                            <div class="field field-icon-right">
                                <input type="text" class="input input-big" name="name" placeholder="登录账号" data-validate="required:请填写账号" />
                                <span class="icon icon-user margin-small"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="field field-icon-right">
                                <input type="password" class="input input-big" name="password" placeholder="登录密码" data-validate="required:请填写密码" />
                                <span class="icon icon-key margin-small"></span>
                            </div>
                        </div>

                    </div>
                    <div style="padding:30px;"><input type="submit" class="button button-block bg-main text-big input-big" value="登录"></div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>