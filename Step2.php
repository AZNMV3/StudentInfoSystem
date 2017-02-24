<?php
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
	header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT"); 
	header("Cache-Control: no-cache, must-revalidate"); 
	header("Pramga: no-cache"); 
	require("conn.php");
	session_start();
	$fo=new FrontOperation;
	$fo->VerifyIdentity("USER");
	if ($_POST)
	{
		$_SESSION["Member_Name_1"]=$_POST["txt_Member_Name_1"];
		$_SESSION["Member_HukouPlace_1"]=$_POST["txt_Member_HukouPlace_1"];
		$_SESSION["Member_Relationship_1"]=$_POST["txt_Member_Relationship_1"];
		$_SESSION["Member_Phone_1"]=$_POST["txt_Member_Phone_1"];
		$_SESSION["Member_Relationship_Explanation_1"]=$_POST["txt_Member_Relationship_Explanation_1"];
		$_SESSION["If_Guardian_1"]=$_POST["lst_If_Guardian_1"];
		$_SESSION["Member_Nation_1"]=$_POST["lst_Member_Nation_1"];
		$_SESSION["Member_IDCertType_1"]=$_POST["lst_Member_IDCertType_1"];
		$_SESSION["Member_Workplace_1"]=$_POST["txt_Member_Workplace_1"];
		$_SESSION["Member_IDNumber_1"]=$_POST["txt_Member_IDNumber_1"];
		$_SESSION["Member_CurrentAddr_1"]=$_POST["txt_Member_CurrentAddr_1"];
		$_SESSION["Member_Job_1"]=$_POST["txt_Member_Job_1"];
		$_SESSION["Member_Name_2"]=$_POST["txt_Member_Name_2"];
		$_SESSION["Member_HukouPlace_2"]=$_POST["txt_Member_HukouPlace_2"];
		$_SESSION["Member_Relationship_2"]=$_POST["txt_Member_Relationship_2"];
		$_SESSION["Member_Phone_2"]=$_POST["txt_Member_Phone_2"];
		$_SESSION["Member_Relationship_Explanation_2"]=$_POST["txt_Member_Relationship_Explanation_2"];
		$_SESSION["If_Guardian_2"]=$_POST["lst_If_Guardian_2"];
		$_SESSION["Member_Nation_2"]=$_POST["lst_Member_Nation_2"];
		$_SESSION["Member_IDCertType_2"]=$_POST["lst_Member_IDCertType_2"];
		$_SESSION["Member_Workplace_2"]=$_POST["txt_Member_Workplace_2"];
		$_SESSION["Member_IDNumber_2"]=$_POST["txt_Member_IDNumber_2"];
		$_SESSION["Member_CurrentAddr_2"]=$_POST["txt_Member_CurrentAddr_2"];
		$_SESSION["Member_Job_2"]=$_POST["txt_Member_Job_2"];
		$fo->JumpTo("Step3.php");
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>学生家庭成员或监护人信息</title>
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
			<li>
				<a href="Step1.php">第一步：填写自己的基本资料</a>
			</li>
			<li class="active">
				<a href="#">第二步：填写家庭成员或监护人信息</a>
			</li>
			<li>
				<a href="#">第三步：最后检查</a>
			</li>
			<li>
				<a href="#">第四步：填写完成</a>
			</li>
		</ul>
		<ul class="nav pull-right">
		<li>
			<a href="Logout.php">注销</a>
		</li>
	</ul>	
	</div>
</div>
<div class="container">
<h1>学生家庭成员或监护人信息</h1>
<p>&nbsp;</p>
<form action="Step2.php" method="post">
<table class="table table-striped table-bordered">
  <tr>
    <td colspan="4"><h3 align="center">成员一</h3></td>
    </tr>
  <tr>
    <td>姓名：</td>
    <td>
    	<?php
			$fo->Echo_TextBox("txt_Member_Name_1","Member_Name_1");
		?>
    </td>
    <td>户口所在地：</td>
    <td>
    	<?php
			$fo->Echo_TextBox("txt_Member_HukouPlace_1","Member_HukouPlace_1");
		?>
    </td>
  </tr>
  <tr>
    <td>关系：</td>
    <td>
        <?php
			$fo->Echo_TextBox("txt_Member_Relationship_1","Member_Relationship_1");
		?>
    </td>
    <td>联系电话：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Member_Phone_1","Member_Phone_1");
		?>
    </td>
  </tr>
  <tr>
    <td>关系说明：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Member_Relationship_Explanation_1","Member_Relationship_Explanation_1");
		?></td>
    <td>是否监护人：</td>
    <td><select name="lst_If_Guardian_1" id="lst_If_Guardian_1">
      <option value="是" selected="selected">是</option>
      <option value="否">否</option>
    </select></td>
  </tr>
  <tr>
    <td>民族：</td>
    <td><select name="lst_Member_Nation_1" id="lst_Member_Nation_1">
<option value="汉族" selected>汉族</option>
<option value="蒙古族">蒙古族</option>
<option value="回族">回族</option>
<option value="藏族">藏族</option>
<option value="维吾尔族">维吾尔族</option>
<option value="苗族">苗族</option>
<option value="彝族">彝族</option>
<option value="壮族">壮族</option>
<option value="布依族">布依族</option>
<option value="朝鲜族">朝鲜族</option>
<option value="满族">满族</option>
<option value="侗族">侗族</option>
<option value="瑶族">瑶族</option>
<option value="白族">白族</option>
<option value="土家族">土家族</option>
<option value="哈尼族">哈尼族</option>
<option value="哈萨克族">哈萨克族</option>
<option value="傣族">傣族</option>
<option value="黎族">黎族</option>
<option value="傈僳族">傈僳族</option>
<option value="佤族">佤族</option>
<option value="畲族">畲族</option>
<option value="高山族">高山族</option>
<option value="拉祜族">拉祜族</option>
<option value="水族">水族</option>
<option value="东乡族">东乡族</option>
<option value="纳西族">纳西族</option>
<option value="景颇族">景颇族</option>
<option value="柯尔克孜族">柯尔克孜族</option>
<option value="土族">土族</option>
<option value="达斡尔族">达斡尔族</option>
<option value="仫佬族">仫佬族</option>
<option value="羌族">羌族</option>
<option value="布朗族">布朗族</option>
<option value="撒拉族">撒拉族</option>
<option value="毛难族">毛难族</option>
<option value="仡佬族">仡佬族</option>
<option value="锡伯族">锡伯族</option>
<option value="阿昌族">阿昌族</option>
<option value="普米族">普米族</option>
<option value="塔吉克族">塔吉克族</option>
<option value="怒族">怒族</option>
<option value="乌孜别克族">乌孜别克族</option>
<option value="俄罗斯族">俄罗斯族</option>
<option value="鄂温克族">鄂温克族</option>
<option value="德昂族">德昂族</option>
<option value="保安族">保安族</option>
<option value="裕固族">裕固族</option>
<option value="京族">京族</option>
<option value="塔塔尔族">塔塔尔族</option>
<option value="独龙族">独龙族</option>
<option value="鄂伦春族">鄂伦春族</option>
<option value="赫哲族">赫哲族</option>
<option value="门巴族">门巴族</option>
<option value="珞巴族">珞巴族</option>
<option value="基诺族">基诺族</option>
<option value="穿青人族">穿青人族</option>
<option value="其他">其他</option>
<option value="外国血统中国籍人士">外国血统中国籍人士</option>
    </select></td>
    <td>身份证件类型：</td>
    <td><select name="lst_Member_IDCertType_1" id="lst_Member_IDCertType_1">
<option value="居民身份证" selected="selected">居民身份证</option>
<option value="香港特区护照/身份证明">香港特区护照/身份证明</option>
<option value="澳门特区护照/身份证明">澳门特区护照/身份证明</option>
<option value="台湾居民来往大陆通行证">台湾居民来往大陆通行证</option>
<option value="境外永久居住证">境外永久居住证</option>
<option value="护照">护照</option>
<option value="其他">其他</option>
    </select></td>
  </tr>
  <tr>
    <td>工作单位：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Member_Workplace_1","Member_Workplace_1");
		?></td>
    <td>身份证件号：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Member_IDNumber_1","Member_IDNumber_1");
		?></td>
  </tr>
  <tr>
    <td>现住址：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Member_CurrentAddr_1","Member_CurrentAddr_1");
		?></td>
    <td>职务：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Member_Job_1","Member_Job_1");
		?>
    </td>
  </tr>
  <tr>
    <td colspan="4"><h3 align="center">成员二</h3></td>
    </tr>
  <tr>
    <td>姓名：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Member_Name_2","Member_Name_2");
		?></td>
    <td>户口所在地：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Member_HukouPlace_2","Member_HukouPlace_2");
		?></td>
  </tr>
  <tr>
    <td>关系：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Member_Relationship_2","Member_Relationship_2");
		?></td>
    <td>联系电话：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Member_Phone_2","Member_Phone_2");
		?></td>
  </tr>
  <tr>
    <td>关系说明：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Member_Relationship_Explanation_2","Member_Relationship_Explanation_2");
		?></td>
    <td>是否监护人：</td>
    <td><select name="lst_If_Guardian_2" id="lst_If_Guardian_2">
      <option value="是" selected="selected">是</option>
      <option value="否">否</option>
    </select></td>
  </tr>
  <tr>
    <td>民族：</td>
    <td><select name="lst_Member_Nation_2" id="lst_Member_Nation_2">
<option value="汉族" selected>汉族</option>
<option value="蒙古族">蒙古族</option>
<option value="回族">回族</option>
<option value="藏族">藏族</option>
<option value="维吾尔族">维吾尔族</option>
<option value="苗族">苗族</option>
<option value="彝族">彝族</option>
<option value="壮族">壮族</option>
<option value="布依族">布依族</option>
<option value="朝鲜族">朝鲜族</option>
<option value="满族">满族</option>
<option value="侗族">侗族</option>
<option value="瑶族">瑶族</option>
<option value="白族">白族</option>
<option value="土家族">土家族</option>
<option value="哈尼族">哈尼族</option>
<option value="哈萨克族">哈萨克族</option>
<option value="傣族">傣族</option>
<option value="黎族">黎族</option>
<option value="傈僳族">傈僳族</option>
<option value="佤族">佤族</option>
<option value="畲族">畲族</option>
<option value="高山族">高山族</option>
<option value="拉祜族">拉祜族</option>
<option value="水族">水族</option>
<option value="东乡族">东乡族</option>
<option value="纳西族">纳西族</option>
<option value="景颇族">景颇族</option>
<option value="柯尔克孜族">柯尔克孜族</option>
<option value="土族">土族</option>
<option value="达斡尔族">达斡尔族</option>
<option value="仫佬族">仫佬族</option>
<option value="羌族">羌族</option>
<option value="布朗族">布朗族</option>
<option value="撒拉族">撒拉族</option>
<option value="毛难族">毛难族</option>
<option value="仡佬族">仡佬族</option>
<option value="锡伯族">锡伯族</option>
<option value="阿昌族">阿昌族</option>
<option value="普米族">普米族</option>
<option value="塔吉克族">塔吉克族</option>
<option value="怒族">怒族</option>
<option value="乌孜别克族">乌孜别克族</option>
<option value="俄罗斯族">俄罗斯族</option>
<option value="鄂温克族">鄂温克族</option>
<option value="德昂族">德昂族</option>
<option value="保安族">保安族</option>
<option value="裕固族">裕固族</option>
<option value="京族">京族</option>
<option value="塔塔尔族">塔塔尔族</option>
<option value="独龙族">独龙族</option>
<option value="鄂伦春族">鄂伦春族</option>
<option value="赫哲族">赫哲族</option>
<option value="门巴族">门巴族</option>
<option value="珞巴族">珞巴族</option>
<option value="基诺族">基诺族</option>
<option value="穿青人族">穿青人族</option>
<option value="其他">其他</option>
<option value="外国血统中国籍人士">外国血统中国籍人士</option>
    </select></td>
    <td>身份证件类型：</td>
    <td><select name="lst_Member_IDCertType_2" id="lst_Member_IDCertType_2">
<option value="居民身份证" selected="selected">居民身份证</option>
<option value="香港特区护照/身份证明">香港特区护照/身份证明</option>
<option value="澳门特区护照/身份证明">澳门特区护照/身份证明</option>
<option value="台湾居民来往大陆通行证">台湾居民来往大陆通行证</option>
<option value="境外永久居住证">境外永久居住证</option>
<option value="护照">护照</option>
<option value="其他">其他</option>
    </select></td>
  </tr>
  <tr>
    <td>工作单位：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Member_Workplace_2","Member_Workplace_2");
		?></td>
    <td>身份证件号：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Member_IDNumber_2","Member_IDNumber_2");
		?></td>
  </tr>
  <tr>
    <td>现住址：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Member_CurrentAddr_2","Member_CurrentAddr_2");
		?></td>
    <td>职务：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Member_Job_2","Member_Job_2");
		?></td>
  </tr>
</table>
<a href="Step1.php" class="btn" name="btnBack" id="btnBack">上一步</a>
<input type="submit" name="btnNext" id="btnNext" value="下一步" class="btn" align="right">
</form>
</div>
</body>
</html>