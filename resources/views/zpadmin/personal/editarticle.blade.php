@extends("zpadmin.layout.base")
@section('editjs')
        <!-- 加载编辑器  -->
@include('editor::head')

{{--结束--}}
@stop
@section("content")
    <div class="panel admin-panel">
        <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
        <div class="body-content">
            <form method="post" class="form-x" action="{{route('personal.handle_editarticle')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $one->id }}">
                <div class="form-group">
                    <div class="label">
                        <label style="font-size:10pt;">分类标题：</label>
                    </div>
                    <div class="field">
                        <select name="cid" class="input w50">
                            <option value="">请选择分类</option>
                            @foreach(@$category as $val)
                                <option value="{{$val['id']}}" @if($one->cid == $val['id'])  selected @endif>{{$val['title']}}</option>
                            @endforeach
                        </select>
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label style="font-size:10pt;">标题：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50" value="{{$one->title}}" name="title" data-validate="required:请输入标题" />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label style="font-weight: normal; font-size:10pt">其他属性：</label>
                    </div>
                    <div class="field" style="padding-top:8px;">
                        首页 <input id="ishome"   name="attribute" type="radio" @if($one->attribute==0)  checked @endif value="0" />
                        推荐 <input id="isvouch"  name="attribute" type="radio" @if($one->attribute==1)  checked @endif value="1"/>
                        置顶 <input id="istop"    name="attribute" type="radio" @if($one->attribute==2)  checked @endif value="2"/>

                    </div>
                </div>

                <div class="form-group">
                    <div class="label">
                        <label style="font-weight: normal; font-size:10pt;">内容：</label>
                    </div>
                    <div class="field">
                        {{--<textarea name="content" class="input" style="height:450px; border:1px solid #ddd;"></textarea>--}}
                        <textarea id='myEditor' name="content">
                                {{ $one->content}}
                       </textarea>

                        <div class="tips"></div>

                    </div>
                </div>

                <div class="clear"></div>
                <div class="form-group">
                    <div class="label">
                        <label style="font-weight: normal;font-size:10pt">关键字标题：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input" name="key" value="{{$one->key}}" />
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