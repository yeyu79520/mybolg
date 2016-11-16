@extends('zpadmin.layout.base')
@section('content')
  <div class="panel admin-panel margin-top">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
    <div class="body-content">
      <form method="post" class="form-x" action="{{route('personal.handle_addclassify')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
          <div class="label">
            <label>上级分类：</label>
          </div>
          <div class="field">
            <select name="pid" class="input w50">
              <option value="0">请选择分类</option>
            </select>
            <div class="tips">不选择上级分类默认为一级分类</div>
          </div>
        </div>
        <div class="form-group">
          <div class="label">
            <label>分类标题：</label>
          </div>
          <div class="field">
            <input type="text" class="input w50" name="title" />
            <div class="tips"></div>
          </div>
        </div>
        <div class="form-group">
          <div class="label">
            <label>分类关键字：</label>
          </div>
          <div class="field">
            <input type="text" class="input" name="key" />
          </div>
        </div>
        <div class="form-group">
          <div class="label">
            <label>排序：</label>
          </div>
          <div class="field">
            <input type="text" class="input w50" name="sort" value="1"  data-validate="number:排序必须为数字" />
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

