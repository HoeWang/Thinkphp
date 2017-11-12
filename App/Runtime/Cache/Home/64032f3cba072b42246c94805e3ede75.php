<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户首页</title>
</head>
<script type="text/javascript" src="/Think03/App/Home/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/Think03/App/Home/Public/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/Think03/App/Home/Public/bootstrap-3.3.7/css/bootstrap.min.css">
<style type="text/css">
 		.btns div ul{
 			position:absolute;
 			left:40%;
 		}
 	</style>
<body class="container">

	
		
		<a class="btn btn-default" href="<?php echo U('User/add');?>" role="button">注册</a>
		<form>
			<input type="text" name="username" / >
			<input type="submit" value="搜索">

		</form>
	<div class="content">
	<table class="table table-hover j8-table" style="text-align:center">

		<tr style="font-size:20px">
			<td>ID</td>
			<td>用户名</td>
			<td>性别</td>
			<td>添加时间</td>
			<td>操作</td>
		</tr>
	
	<?php if(is_array($list)): foreach($list as $k=>$v): ?><tr>
			<td><?php echo ($v['id']); ?></td>
			<td><?php echo ($v['username']); ?></td>
			<td><?php echo ($v['sex']); ?></td>
			<td><?php echo ($v['addtime']); ?></td>
			<td uid="<?php echo ($v['id']); ?>"><button type='button' class='btn btn-danger btn-xs zz-del ' >删除</button>|<a href="<?php echo U('User/update',array('id'=>$v[id]));?>"><button type="button" class="btn btn-info btn-xs zz-update " >修改</button></a></td>
			<!-- array('id'=>$v[id])) -->
			<!-- <?php echo U('User/del',array('id'=>$v[id]));?> -->
		</tr><?php endforeach; endif; ?>
	
	</table>
	</div>
		<div class="btns"><?php echo ($btn); ?></div>
	
</body>
<script type="text/javascript">
	//给分页类标签进行嵌套样式：
	$('.btns div').children().wrap('<li></li>').parent().parent().wrapInner('<ul class="pagination"></ul>').attr('title','shei');




	//ajax请求删除
	$('.j8-table tr td .zz-del').click(function(){
		console.log('diandao le');
		var re = confirm('确定删除吗？');
		if(re){
			var uid = $(this).parent().attr('uid');
			var that = $(this).parent().parent();
			console.log(uid,that);
			$.ajax({
				url:"<?php echo U('User/del');?>",
				type:'get',
				data:'id=' + uid,
				async:true,
				success:function(res){
					
						that.remove();
						console.log(res);
					
				},
				error:function(a){
					// console.log(a);
					alert('error');
				}
			});
		}
	});

	//无刷新分页
	//第一次点击的时候会有对a链接的双层嵌套，一开始网页加载完是已经嵌套了的，但是替换html后变成了没有嵌套的就可以追加嵌套
	$('body').delegate('.btns a','click',function(){

        var url = $(this).attr('href');

        $.ajax({
            type:'get',
            url:url,
            success:function(res){
            	console.log(res);
            	btn = res.page;
            	delete res.page;
            	console.log(btn);
            	$('.btns').html(btn);
            	$('.btns div').children().wrap('<li></li>').parent().parent().wrapInner('<ul class="pagination"></ul>').attr('title','shei');
            	div="";

            	for(var k in res){
            		div+= "<tr><td>"+res[k].id+"</td><td>"+res[k].username+"</td><td>"+res[k].sex+"</td><td>"+res[k].addtime+"</td><td uid='"+res[k].id+"'><button type='button' class='btn btn-danger btn-xs zz-del ' >删除</button>|<a href='<?php echo U('User/update',array('id'=>"+res[k].id+"));?>'><button type='button' class='btn btn-info btn-xs zz-update ' >修改</button></a></td></tr>";
			}
			div = "<table class='table table-hover j8-table' style='text-align:center'><tr style='font-size:20px'><td>ID</td><td>用户名</td><td>性别</td><td>添加时间</td><td>操作</td></tr>" + div + "</table>";
            	console.log(div);
            	$('.content').html(div);
  //           
            }
        });
        return false;
    });
</script>
</html>