<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<!-- bootstrap css -->
	<link rel="stylesheet" href="/Think03/Public/Admin/css/bootstrap.min.css" media="screen" />	
	<link rel="stylesheet" href="/Think03/Public/Admin/css/style.css" />	
	<!--响应式特性 css-->	
	<link href="/Think03/Public/Admin/css/bootstrap-responsive.min.css" rel="stylesheet">
	<!-- jquery -->
	<script type="text/javascript" src="/Think03/Public/Admin/js/jquery-1.8.3.min.js"></script>
	<!-- bootstrap.js -->
	<script type="text/javascript" src="/Think03/Public/Admin/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="row-fluid" id="header">	
		<div class="span8 offset2">				
			<h1 class="font">XXX后台</h1>
			<p class="lead">Bootstrap，来自 Twitter，是目前很受欢迎的前端框架。</p>
		</div>			
    </div>


	<div class="row-fluid" id="nav">	
		<div class="span8 offset2">
			<ul class="nav nav-pills">
				<li class="active">
					<a href="#">首页</a>
				</li>
				<li class="dropdown">
					<a href="#"  class="dropdown-toggle" data-toggle="dropdown" href="#">用户管理<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo U('User/add');?>">添加用户</a></li>
						<li><a href="<?php echo U('User/index');?>">用户列表</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#"  class="dropdown-toggle" data-toggle="dropdown" href="#">商品管理<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">添加商品</a></li>
						<li><a href="#">商品列表</a></li>
					</ul>
				</li>
				<li><a href="#">分类管理</a></li>
				<li><a href="#">系统设置</a></li>
				<li class="dropdown">
					<a href="#"  class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo ($_SESSION['adminInfo']['username']); ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">个人中心</a></li>
						<li><a href="<?php echo U('Login/logout');?>">注销</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>



	<div class="row-fluid" id="main">
		<div class="span8 offset2">	
			<form class="form-horizontal" method="post">
				<h3>添加用户</h3>
				<div class="control-group">
					<label class="control-label" for="inputEmail">用户名</label>
					<div class="controls">
						<input type="text" id="name" placeholder="name" name="username">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputEmail">密码</label>
					<div class="controls">
						<input type="password" placeholder="密码" name="pwd">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputEmail">确认密码</label>
					<div class="controls">
						<input type="password" placeholder="确认密码" name="pwd2">
					</div>
				</div>

				<div class="control-group">
					<div class="controls">
						<label class="checkbox">
							&nbsp;
						</label>
						<button class="btn btn-large btn-primary form-submit" type="submit">&nbsp;&nbsp;提交&nbsp;&nbsp;</button>
						<a class="btn btn-large btn-default" href="<?php echo U('User/index');?>">&nbsp;&nbsp;返回&nbsp;&nbsp;</a>
					</div>
				</div>
			</form>			
		</div>
	</div>

	
	<div class="row-fluid" id="footer">	
		<div class="span8 offset2">				
			<p>©2006 - 2013</p>				
		</div>			
    </div>
	
</body>
</html>