<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="__MODULE__/Index/index">首页</a></li>
                <li><a href="__APP__/Home/Index/index" target="_blank">前台首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="__MODULE__/Admin/edit/id/<?php echo session('id');?>">欢迎您—><?php echo session('rolename');?>:<?php echo session('username');?></a></li>
                <li><a href="__MODULE__/Admin/edit/id/<?php echo session('id');?>">修改密码</a></li>
                <li><a href="__MODULE__/Admin/logout">退出</a></li>
            </ul>
        </div>
    </div>
</div>

