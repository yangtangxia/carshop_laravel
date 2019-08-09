<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理——栏目修改</title>
    @include('admin/common/style')
    <!--引入编辑器-->
    @include('admin/common/ueditor')
</head>
<body>
@include('admin/common/head')
<div class="container clearfix">
    @include('admin/common/left')
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">栏目管理</a><span class="crumb-step">&gt;</span><span>栏目修改</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/admin/cate/update" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <table class="insert-tab" width="100%">
                    	<input type="hidden" id="id" name="id" value="{{$cates->id}}"/>
                        <tbody>
                        	<tr>
                            	<th width="120"><i class="require-red">*</i>上级分类：</th>
	                            <td>
	                                <select name="parentid" id="parentid" class="required">
	                                    <option value="0">顶级栏目</option>
                                        @foreach($cateres as $key => $v)
                                            @if ($v->id == $cates->parentid)
                                                <option value="{{$v->id}}" selected > <?php echo str_repeat('——',$v->level);?>{{$v->name}}</option>
                                            @else
                                                <option value="{{$v->id}}"> <?php echo str_repeat('——',$v->level);?>{{$v->name}}</option>
                                            @endif
                                        @endforeach
	                                </select>
	                            </td>
                       		</tr>
                            <tr>
                                <th><i class="require-red">*</i>栏目名称：</th>
                                <td>
                                    <input class="common-text required" id="name" name="name" size="50" value="{{$cates->name}}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>是否是PC端：</th>
                                <td>
                                    @if ($cates->pc == 1)
                                        <input class="common-text required" id="pc" name="pc" size="50" value="1" checked="checked" type="radio">是
                                        <input class="common-text required" id="pc" name="pc" size="50" value="0" type="radio">否
                                    @else
                                        <input class="common-text required" id="pc" name="pc" size="50" value="1" type="radio">是
                                        <input class="common-text required" id="pc" name="pc" size="50" value="0" checked="checked" type="radio">否
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>栏目类型：</th>
                                <td>
                                    <input class="common-text required" id="type" name="type" size="50" value="1" type="radio" <?php if ($cates->type == 1) { echo 'checked="checked"';} ?>>列表
                                    <input class="common-text required" id="type" name="type" size="50" value="2" type="radio" <?php if ($cates->type == 2) { echo 'checked="checked"';} ?>>单页
                                    <input class="common-text required" id="type" name="type" size="50" value="3" type="radio" <?php if ($cates->type == 3) { echo 'checked="checked"';} ?>>留言
                                    <input class="common-text required" id="type" name="type" size="50" value="4" type="radio" <?php if ($cates->type == 4) { echo 'checked="checked"';} ?>>招聘列表
                                    <input class="common-text required" id="type" name="type" size="50" value="5" type="radio" <?php if ($cates->type == 5) { echo 'checked="checked"';} ?>>车辆列表
                                    <input class="common-text required" id="type" name="type" size="50" value="6" type="radio" <?php if ($cates->type == 6) { echo 'checked="checked"';} ?>>荣誉列表
                                    <input class="common-text required" id="type" name="type" size="50" value="7" type="radio" <?php if ($cates->type == 7) { echo 'checked="checked"';} ?>>求职表
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>栏目级别：</th>
                                <td>
                                    <input class="common-text required" id="class" name="class" size="50" value="1" type="radio" <?php if ($cates->class == 1) { echo 'checked="checked"';} ?> >顶级
                                    <input class="common-text required" id="class" name="class" size="50" value="2" type="radio" <?php if ($cates->class == 2) { echo 'checked="checked"';} ?> >二级
                                    <input class="common-text required" id="class" name="class" size="50" value="3" type="radio" <?php if ($cates->class == 3) { echo 'checked="checked"';} ?> >三级
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>缩略图：</th>
                                <td>
                                	<input name="pic" id="pic" type="file">
                                	<img src="{$cates.pic}" width="60px" height="60px"/>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>关键字：</th>
                                <td>
                                    <input class="common-text required" id="keyword" name="keyword" size="50" value="{{$cates->keyword}}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red"></i>描述：</th>
                                <td>
                                    <textarea rows="5" cols="50" name="desc" id="desc">{{$cates->desc}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>内容：</th>
                                <td><textarea name="content" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10">{{$cates->content}}</textarea></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>