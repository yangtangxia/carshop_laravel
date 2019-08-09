<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理——首页</title>
    <link rel="stylesheet" type="text/css" href="/css/admin/common.css"/>
    <link rel="stylesheet" type="text/css" href="/css/admin/main.css"/>
    <script type="text/javascript" src="/js/admin/modernizr.min.js"></script>
</head>
<body>

{{-- head头部--}}
@include('admin/common/head')

{{--左边导航--}}
@include('admin/common/left')

{{--内容区域--}}
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><span><span><a target="_blank" style="color:#f00; margin:0 20px;" href=""></a></span></span></div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>快捷操作</h1>
            </div>
            <div class="result-content">
                <div class="short-wrap">
                    <a href="__MODULE__/Cate/add"><i class="icon-font">&#xe001;</i>新增栏目</a>
                    <a href="__MODULE__/Article/add"><i class="icon-font">&#xe005;</i>新增文章</a>
                    <a href="__MODULE__/Link/add"><i class="icon-font">&#xe048;</i>新增链接</a>
                </div>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>系统运行基本信息</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">操作系统</label><span class="res-info">WINNT</span>
                    </li>
                    <li>
                        <label class="res-lab">运行环境</label><span class="res-info">PHP+MySQL+Apache</span>
                    </li>
                    <li>
                        <label class="res-lab">PHP运行版本</label><span class="res-info">PHP5.3</span>
                    </li>
                    <li>
                        <label class="res-lab">上传附件限制</label><span class="res-info">2M</span>
                    </li>
                    <li>
                        <label class="res-lab">当前时间</label>
                        <span class="res-info">
                        	<script>
                        		var d=new Date();
                        		document.write(d.getFullYear()+'-'+d.getMonth()+'-'+d.getDay()+'　'+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds())
                        	</script>
                        </span>
                    </li>
                    <li>
                        <label class="res-lab">服务器域名/IP</label><span class="res-info">localhost [ 127.0.0.1 ]</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>