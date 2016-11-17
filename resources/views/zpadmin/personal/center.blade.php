@extends('zpadmin.layout.base')
@section('content')

    <!-- <iframe scrolling="auto" rameborder="0" src='info.blade.php' name="right" width="100%" height="100%"></iframe> -->
    <div class="panel admin-panel">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 网站信息</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="{{route('personal.index')}}">
            <div class="form-group">
                <div class="label">
                    <label>网站标题：</label>
                </div>
                <div class="field">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" class="input" name="title" value="{{@$basics->title}}" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>网站域名：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="domain_name" value="{{@$basics->domain_name}}" />
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>网站关键字：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="s_key" value="{{@$basics->s_key}}" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>网站描述：</label>
                </div>
                <div class="field">
                    <textarea class="input" name="description">{{@$basics->description}}</textarea>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label> 友情链接：</label>
                </div>
                <div class="field">
                    <textarea class="input" name="friendship_link">{{@$basics->friendship_link}}</textarea>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>底部信息：</label>
                </div>
                <div class="field">
                    <textarea name="bottom_information" class="input" style="height:120px;">{{@$basics->bottom_information}}</textarea>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>

@stop