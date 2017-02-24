<?php
	require("../conn.php");
	session_start();
	$fo=new FrontOperation;
	$fo->VerifyIdentity("MANAGER");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>学生信息录入系统</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="http://mini.jiasule.com/framework/bootstrap/2.3.1/css/bootstrap.css" rel="stylesheet">
	<link href="http://mini.jiasule.com/framework/bootstrap/2.3.1/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- <link href="css/docs.css" rel="stylesheet"> -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
	<script src="http://mini.jiasule.com/framework/bootstrap/2.3.1/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
	<div class="navbar">
	<div class="navbar-inner">
		<a class="brand" href="#">学生信息录入系统</a>
		<ul class="nav">
			<li>
				<a href="index.php">管理首页</a>
			</li>
			<li class="divider-vertical"></li>
		</ul>
		<ul class="nav pull-right">
			<li>
				<a href="../Logout.php">注销</a>
			</li>
		</ul>
	</div>
	</div>
<div class="container">
  <form action="GenerateUserID.php" method="get" name="GenerateUserID">
	<h3>生成供学生登录的帐号列表</h3>
	<input name="txt_Num_of_Student" type="text" placeholder="请输入学生总人数">
	<button class="btn" type="submit" name="btnGenerate" id="btnGenerate">生成学生帐号列表并导出</button>
	</form>
	<h3>清除学生信息以及学生的登录账户</h3>
	<p class="text-warning"><strong>注意：此操作不可逆转！！</strong></p>
	<div class="btn-group">
		<a href="ClearAllInformation.php" class="btn">清除数据</a>
	</div>
	<p></p>
	<h3>设置当前录入的年级及此年级的班级总数</h3>
	<form action="SetGradeAndClass.php" method="post" name="SetGradeAndClass">
	<div class="control-group">
		<label class="control-label" for="inputIcon"><h4>当前录入的年级</h4></label>
		<div class="controls">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-chevron-right"></i></span>
				<select name="lstCurrentGrade">
					<option value="七年级" selected="selected">七年级</option>
					<option value="八年级">八年级</option>
					<option value="九年级">九年级</option>
				</select>
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputIcon"><h4>当前录入的年级共有几个班？</h4></label>
		<div class="controls">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-chevron-right"></i></span>
				<input name="txt_Num_of_Class" type="text" placeholder="班级总数">
			</div>
		</div>
	</div>
	<button class="btn" type="submit" name="btnSetGradeAndClass" id="btnSetGradeAndClass">保存年级和班级信息</button>
	</form>
	<p></p>
	<h3>管理员账户设置</h3>
	<div class="btn-group">
		<a href="ChangePassword.php" class="btn">修改管理员密码</a>
	</div>
</div>
</body>
</html>