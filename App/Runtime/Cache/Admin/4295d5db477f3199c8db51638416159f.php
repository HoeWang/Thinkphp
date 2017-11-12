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
		    <form class="form-search fr">
		    	<input type="text" name="username" value="<?php echo I('username');?>" class="input-medium" placeholder="用户名">
		    	<select name="sex">
					<option value="">--请选择--</option>
					<option <?php echo ($_GET['sex']==='0'?'selected':''); ?> value="0">女</option>
					<option <?php echo ($_GET['sex']==1?'selected':''); ?> value="1">男</option>
					<option <?php echo ($_GET['sex']==2?'selected':''); ?> value="2">妖</option>
				</select>
		    	<button type="submit" class="btn">搜索</button>
		    </form>

			<table class="table table-striped" style="width:100%;text-align:center">
				<thead style="text-align:center">
				<tr >
					<th style="width:10%;">ID</th>
					<th style="width:20%">用户名</th>
					<th style="width:20%">性别</th>
					<th style="width:25%">添加时间</th>
					<th style="width:25%">操作</th>
				</tr>
				</thead>
				<tbody>
				
				<?php if(empty($list)): ?><tr><td colspan="5"><h3>暂无数据~~~</h3></td></tr>
				<?php else: ?>
				<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
						<td><?php echo ($v['id']); ?></td>
						<td><?php echo ($v["username"]); ?></td>
						<td><?php echo ($v['sex']); ?></td>
						<td><?php echo ($v['addtime']); ?></td>
						<td>
							<a class='btn btn-danger' onclick="del(this, <?php echo ($v['id']); ?>)" href="javascript:void(0);">删除</a>
							<a class='btn btn-info' href="<?php echo U('edit', ['id'=>$v['id']]);?>">修改</a>
						</td>
					</tr><?php endforeach; endif; endif; ?>
					
				</tbody>
			</table>
			<div class="pagination">
				<ul>
					<?php echo ($btn); ?>
				</ul>
			</div>
			<script>
				// 假装搞了个样式
				$('.pagination a,.pagination span').unwrap('<div></div>').wrap('<li></li>');

				function del(obj, id)
				{
					var re = confirm('确定删除吗?');
					if(re){
					$.post('<?php echo U("ajaxDel");?>', 'id='+id, function(res){
						if (res.status == 1) {
							$(obj).parent().parent().remove();
						} else {
							alert('删除失败');
						}
					});
				}
				}

				//无刷新分类
		$('body').delegate('.pagination a','click',function(){

        var url = $(this).attr('href');

        $.ajax({
            type:'get',
            url:url,
            success:function(res){
            	console.log(res);
            	btn = res.page;
            	delete res.page;
            	console.log(btn);
            	$('.pagination ul').html(btn);
            	$('.pagination a,.pagination span').unwrap('<div></div>').wrap('<li></li>');
            	div="<?php if(empty($list)): ?><tr><td colspan='5'><h3>暂无数据~~~</h3></td></tr><?php else: ?>";

            	for(var k in res){
            		div+= "<tr><td>"+ res[k].id +"</td><td>"+ res[k].username +"</td><td>"+ res[k].sex +"</td><td>"+ res[k].addtime +"</td><td><a class='btn btn-danger' onclick='del(this, "+ res[k].id +")' href='javascript:void(0);'>删除</a><a class='btn btn-info' href='<?php echo U('edit', ['id'=>"+ res[k].id +"]);?>'>修改</a></td></tr>";
			}
				div = div + "<?php endif; ?>";
            	console.log(div);
            	$('tbody').html(div);
  //           
            }
        });
        return false;
    });


			</script>
		</div>
	</div>

	
	<div class="row-fluid" id="footer">	
		<div class="span8 offset2">				
			<p>©2006 - 2013</p>				
		</div>			
    </div>
	
</body>
</html>