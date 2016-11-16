<div class="leftnav">
    <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
    <h2><span class="icon-user"></span>基本设置</h2>
    <ul style="display:block">
        <li><a href="info.html" target="right"><span class="icon-caret-right"></span>网站设置</a></li>
        <li><a href="pass.html" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
        <li><a href="page.html" target="right"><span class="icon-caret-right"></span>单页管理</a></li>
        <li><a href="adv.html" target="right"><span class="icon-caret-right"></span>首页轮播</a></li>
        <li><a href="book.html" target="right"><span class="icon-caret-right"></span>留言管理</a></li>
        <li><a href="column.html" target="right"><span class="icon-caret-right"></span>栏目管理</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>栏目管理</h2>
    <ul style="display:block">
        <li><a href="{{route('personal.classifylist')}}" @if(getCurrentAction()['method'] == 'Classifylist' || getCurrentAction()['method'] == 'Addclassify' || getCurrentAction()['method'] == 'Editclassify')  class ='on' @endif ><span class="icon-caret-right "></span>分类管理</a></li>
        <li><a href="{{route('personal.articlelist')}}"   @if(getCurrentAction()['method'] == 'Articlelist')  class ='on' @endif><span class="icon-caret-right"></span>内容管理</a></li>
        <li><a href="{{route('personal.addcontent')}}"  @if(getCurrentAction()['method'] == 'Addcontent')  class ='on' @endif><span class="icon-caret-right"></span>添加内容</a></li>

    </ul>
</div>

<script type="text/javascript">
    $(function(){
//        $(".leftnav h2").click(function(){
//            //$(this).next().slideToggle(200);
//            $(this).toggleClass("on");
//        })
        $(".leftnav ul li a").click(function(){
            $("#a_leader_txt").text($(this).text());
            $(".leftnav ul li a").removeClass("on");
            $(this).addClass("on");
        })
    });
</script>
<ul class="bread">
    <li><a href="{:U('Index/info')}" target="right" class="icon-home"> 首页</a></li>
    <li><a href="##" id="a_leader_txt">网站信息</a></li>
    <li><b>当前语言：</b><span style="color:red;">中文</php></span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>