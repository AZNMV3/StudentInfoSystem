<?php
	require("../conn.php");
	session_start();
	$fo=new FrontOperation;
	$db=new DatabaseOperation;
	$fo->VerifyIdentity("MANAGER");
	$db->ClearAllInformation();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="refresh" content="3;url=index.php" />
	<title>清除成功！</title>
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
      <li>
      	<a href="index.php">首页</a>
      </li>
      <li class="divider-vertical"></li>
    </ul>
  </div>
</div>
<div class="container">
	<h1>已成功清除学生信息以及学生的登录账户。</h1>
    <p>系统将在3秒后返回管理首页。</p>
</div>
</body>
</html>