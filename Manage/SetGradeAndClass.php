<?php
	require("../conn.php");
	session_start();
	$db=new DatabaseOperation;
	$fo=new FrontOperation;
	//$fo->VerifyIdentity("MANAGER");
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
		<?php
			if ($_POST)
			{
				$db->Connect("WRITE");
				$Query="SELECT * FROM ".SQL_CONFIG_TABLE_NAME;
				$result = mysql_query($Query);
				if (mysql_num_rows($result)==0)
				{
					$Query="INSERT INTO ".SQL_CONFIG_TABLE_NAME." ";
					$Query.="(CurrentGrade, Num_of_Class) VALUES ";
					$Query.="('".$_POST["lstCurrentGrade"]."', '".$_POST["txt_Num_of_Class"]."')";
					$result = mysql_query($Query);
				}
				else
				{
					$Query="UPDATE ".SQL_CONFIG_TABLE_NAME." SET ";
					$Query.="CurrentGrade='".$_POST["lstCurrentGrade"]."', Num_of_Class='".$_POST["txt_Num_of_Class"]."'";
					$result = mysql_query($Query);
				}
				if ($result==true)
				{
					echo "<h1>已成功保存年级和班级信息！</h1>";
				}
				else
				{
					echo "<h1>不好意思，保存年级和班级信息失败了！</h1>";
				}
				echo "<p>请点击下面的按钮以返回。</p>";
				echo "<a href=\"index.php\" class=\"btn\">返回管理首页</a>";
			}
		?>
	</div>
</html>