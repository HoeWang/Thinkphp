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




	<div class="row-fluid" id="login">
		<div class="span8 offset2">		
			<form class="form-horizontal" action="" method="post">
			
				<!-- 显示错误信息 -->
				<div class="alert alert-error" style="display:none">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<h4></h4>
				</div>

				<h3>登陆</h3>
				<div class="control-group">
					<label class="control-label" for="inputName">用户名</label>
					<div class="controls">
						<input type="text" name="username" id="inputName" placeholder="用户名">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPassword">密码</label>
					<div class="controls">
						<input type="password" name="pwd" id="inputPassword" placeholder="密码">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<label class="checkbox">
							&nbsp;
						</label>
						<button type="submit" class="btn btn-large btn-primary form-submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;登陆&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
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