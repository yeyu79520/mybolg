@extends('zpadmin.layout.base')
@section('content')

    <div class="panel admin-panel">
      <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
      <div class="padding border-bottom">
        <button type="button" class="button border-yellow" onclick="window.location.href='{{route('personal.addclassify')}}'"><span class="icon-plus-square-o"></span> 添加分类</button>
      </div>
      <table class="table table-hover text-center">
        <tr>
          <th width="5%">ID</th>
          <th width="15%">分类名</th>
          <th width="10%">排序</th>
          <th width="10%">操作</th>
        </tr>
        @foreach(@$category as $val)
          <tr>
            <td>{{$val->id}}</td>
            <td>{{$val->title}}</td>
            <td>{{$val->sort}}</td>
            <td><div class="button-group"> <a class="button border-main" href="{{route('personal.editclassify',['id'=>$val->id])}}"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="javascript:void(0)" onclick="return del(1,2)"><span class="icon-trash-o"></span> 删除</a> </div></td>
          </tr>
        @endforeach

      </table>
    </div>

@stop