<?php
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
	header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT"); 
	header("Cache-Control: no-cache, must-revalidate"); 
	header("Pramga: no-cache"); 
	require("conn.php");
	session_start();
	$fo=new FrontOperation;
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>登录</title>
	<link href="http://mini.jiasule.com/framework/bootstrap/2.3.1/css/bootstrap.css" rel="stylesheet">
	<link href="http://mini.jiasule.com/framework/bootstrap/2.3.1/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- <link href="css/docs.css" rel="stylesheet"> -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
	<script src="http://mini.jiasule.com/framework/bootstrap/2.3.1/js/bootstrap.min.js" type="text/javascript"></script>
	<style>
    h1, h2, h3, .masthead p, .subhead p, .marketing h2, .lead
{
  font-family: "Helvetica Neue", Helvetica, Arial, "Microsoft Yahei UI", "Microsoft YaHei", SimHei, "\5B8B\4F53", simsun, sans-serif;
  font-weight: normal;
}
</style>
</head>
<body>
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="#">学生信息录入系统</a>
    <ul class="nav">
      <li class="active">
      	<a href="#">首页</a>
      </li>
      <li class="divider-vertical"></li>
      <form class="navbar-form pull-left" method="post" action="index.php">
		<input type="text" class="span2" name="txtUsername" placeholder="用户ID">
        <input type="password" class="span2" name="txtPassword" placeholder="密码">
		<button type="submit" class="btn" name="btnLogin">登录</button>
	  </form> 
    </ul>
  </div>
</div>
<div class="container">
	<h1 align="center">这里是学生信息录入系统的首页。</h1>
    <h3 align="center">请在上方的登录栏中输入你的账号和密码并登录，以将你的信息录入至系统中。</h3>
	<?php
	if($_POST)
	{
		$user=trim($_POST["txtUsername"]);
		$psw=trim(md5($_POST["txtPassword"]));
		$db=new DatabaseOperation;
		$db->Connect("READ");
		if($db->if_user_is_exist($user,$psw)>0)
		{
			$_SESSION["ID"]=$user;
			$_SESSION["password"]=$psw;
			$db->Get_User_Data($_SESSION["ID"]);
			$fo->JumpTo("Step1.php");
		}
		elseif ($db->if_user_is_exist($user,$psw)<0)
		{
			$_SESSION["ID"]=$user;
			$_SESSION["password"]=$psw;
			$fo->JumpTo("/Manage/index.php");
		}
	else
		{
			echo "<div class=\"alert\">";
			echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
			echo "<strong>登录失败.</strong>请检查用户名或密码是否出错.";
			echo "</div>";
		}
	}
	?>
	<blockquote class="pull-right">
		<p>The place changes and goes, like a wind, like clouds,</p>
		<p>like the traces of the heart, no halt at the places...</p>
		<small>A part of lyrics of the song <cite title="Ana">Ana</cite></small>
	</blockquote>
</div>

</body>
</html>