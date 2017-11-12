<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	312<br>
	<?=$name?>
	<?php echo ($age); ?>
	<?php echo ($list['size']); ?>
	<?php echo ($list["height"]); ?>

	<h2>输出预定义变量</h2>
	<?php echo ($_GET['id']); ?>

	<?php echo ($_GET['id']); ?>
	<?php echo (session('id')); ?>

	定义好的这两种输出常量都可以
	<?php echo (HOST); ?>
	<?php echo (HOST); ?>

	<h2>在模板中使用函数</h2>
	在模板中使用函数的的两种方法
	<?php echo (md5($name)); ?><br>
	<?php echo (time($name)); ?><br>
	<?php echo date('Y-m-d',time());?><br>

	<hr>
	在$name不存在的情况下,赋值
	<?php echo ((isset($names) && ($names !== ""))?($names):"老子才是艳辉"); ?>

	<h2>点语法</h2>
	<?php echo ($list['height']); ?><br>
	<?php echo ($list["height + 60"]); ?> //这种不行,会被解析成$list['height +60']<br>
	

	<h2>末班替换</h2>
	/Think03 <br>

	/Think03	<br>

	/Think03/Home <BR>

	/Think03/Home/Index

	<hr>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="pic" />
		<input type="text" name="yzm" /><img src="<?php echo U('yzm');?>" onclick="this.src='<?php echo U('yzm');?>'">
		<button>验证</button>

	<form action="/Think03/Home/Index/doadd"></form>


	<form action="/Think03/Home/Index/doadd"></form>

</body>
</html>