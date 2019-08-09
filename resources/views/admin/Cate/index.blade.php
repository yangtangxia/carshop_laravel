<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理——栏目管理</title>
    <script src="/js/admin/jquery.js"></script>

    @include('admin/common/style')
    
</head>
<body>
@include('admin/common/head')
<div class="container clearfix">

    @include('admin/common/left')
    
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="admin/index/index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">栏目管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/jscss/admin/design/index" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <!--<a href="__MODULE__/Cate/add"><i class="icon-font"></i>新增栏目</a>-->
                        <a href="/admin/cate/create"><input type="button" class="icon-font" value="新增栏目" /></a>
                        <!--<a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>-->
                        <input type="submit" class="icon-font" form="myform" formaction="__CONTROLLER__/dels" formmethod="post" onclick="return confirm('确定删除吗？')" value="批量删除" />
                        <input type="submit" class="icon-font" form="myform" formaction="__CONTROLLER__/sortcate" formmethod="post" value="更新排序" />
                        
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input id="checks" name="checks" type="checkbox" /></th>
                            <th>排序</th>
                            <th>ID</th>
                            <th>栏目名称</th>
                            <th>栏目类型</th>
                            <th>缩略图</th>
                            <th>PC端/手机端</th>
                            <th>操作</th>
                        </tr>

                       @foreach($list as $key => $vo)

                        <tr>
                            <td class="tc">
                            	<input name="ids[]" class="checkall" value="{{$vo->id}}" type="checkbox" />
                            </td>
                            <td>
                                <input name="id" value="{{$vo->id}}" type="hidden"/>
                                <input class="common-input sort-input" name="{$vo->id}" value="{{$vo->sort}}" type="text" />
                            </td>
                            <td>{{$vo->id}}</td>
                            <td>
                            	<?php
                            	if($vo->level == 0){
                            		echo $vo->name;
                            	}else{
                            		echo '│';
                            		echo str_repeat('——',$vo->level * 2).$vo->name;
                            	}
                            	?>
                            </td>
                            <td>
                            	<if condition="$vo->type eq 1">
                            		列表
                            	</if>
                            	<if condition="$vo->type eq 2">
                            		单页
                            	</if>
                            	<if condition="$vo->type eq 3">
                            		留言
                            	</if>
                            	<if condition="$vo->type eq 4">
                            		招聘
                            	</if>
                            	<if condition="$vo->type eq 5">
                            		车辆列表
                            	</if>
                            	<if condition="$vo->type eq 6">
                            		荣誉列表
                            	</if>
                            	<if condition="$vo->type eq 7">
                            		求职
                            	</if>
                            </td>
                            <td>
                            	<if condition="$vo->pic neq ''">
                            		<img src="{{$vo->pic}}" width="40px" height="40px"/>
                            		<else />
                            		暂无缩略图
                            	</if>

                            </td>
                            <td>
                            <if condition="$vo->pc eq 1">
                            		PC端
                            	</if>
                            	<if condition="$vo->pc eq 0">
                            		手机端
                            	</if>
                            </td>
                            <td>
                                <a class="link-update" href="/admin/cate/edit?id={{$vo->id}}">修改</a>
                                <a class="link-del" onclick="return confirm('确定删除吗？')" href="/admin/cate/delete?id={{$vo->id}}">删除</a>
                            </td>
                        </tr>
                        @endforeach
                        {{--laravel框架简单分页--}}
                        {{--{{ $link}}--}}
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script>
	$("#checks").click(function(){
		if($(this).attr("checked")){
			$(".checkall").attr("checked","checked");
		}else{
			$(".checkall").removeAttr("checked");
		}
	});
</script>