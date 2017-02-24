<?php
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
	header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT"); 
	header("Cache-Control: no-cache, must-revalidate"); 
	header("Pramga: no-cache"); 
	require("conn.php");
	session_start();
	$fo=new FrontOperation;
	$fo->Logout();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="refresh" content="3;url=index.php" />
	<title>填写完成</title>
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
      	<a href="#">首页</a>
      </li>
      <li class="divider-vertical"></li>
		<li>
       	  <a href="#">第一步：填写自己的基本资料</a>
      </li>
         <li>
       	   <a href="#">第二步：填写家庭成员或监护人信息</a>
      </li>
      <li>
          	<a href="#">第三步：最后检查</a>
           </li>
          <li class="active">
          	<a href="#">第四步：填写完成</a>
            </li>
    </ul>
  </div>
</div>
<div class="container">
	<h1>填写完成！</h1>
    <p>系统将在3秒后自动注销。</p>
</div>
</body>
</html>