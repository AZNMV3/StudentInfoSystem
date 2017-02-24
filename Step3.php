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
			$db=new DatabaseOperation;
			$db->Connect("WRITE");
			$db->Type_In_Data($_SESSION["ID"],SCHOOL_ID,$_SESSION["Name"],$_SESSION["UsedName"],$_SESSION["Nation"],$_SESSION["StateAndRegions"],$_SESSION["IDCertType"],$_SESSION["IDNumber"],$_SESSION["BirthplaceCode"],$_SESSION["NativePlace"],$_SESSION["HKMRTW"],$_SESSION["PoliticalState"],$_SESSION["HealthState"],$_SESSION["Birthday"],$_SESSION["Gender"],$_SESSION["HukouPlace"],$_SESSION["HukouState"],$_SESSION["Period_of_Validity_of_IDCerf"],$_SESSION["Specialty"],$_SESSION["Date_of_Admission"],$_SESSION["StudentID"],$_SESSION["Way_of_Admission"],$_SESSION["Grade"],$_SESSION["Way_of_going_to_School"],$_SESSION["Class"],$_SESSION["StudentSource"],$_SESSION["CurrentAddr"],$_SESSION["Postcode"],$_SESSION["MailingAddr"],$_SESSION["Email"],$_SESSION["HomeAddr"],$_SESSION["WebsiteAddr"],$_SESSION["PhoneNumber"],$_SESSION["If_is_the_Only_One_Child"],$_SESSION["If_learn_in_regular_class"],$_SESSION["If_Accepted_Preschool_Edu"],$_SESSION["Kind_of_Disability"],$_SESSION["If_Stay_at_home_Child"],$_SESSION["If_gov_buy_XueWei"],$_SESSION["If_Child_of_Migrant_worker"],$_SESSION["If_Subvention_is_Needed"],$_SESSION["If_Orphan"],$_SESSION["If_has_Allowance"],$_SESSION["If_Child_of_Martyr"],$_SESSION["Distance_To_School"],$_SESSION["If_Schoolbus_is_Needed"],$_SESSION["Transpotation_To_School"],$_SESSION["Member_Name_1"],$_SESSION["Member_HukouPlace_1"],$_SESSION["Member_Relationship_1"],$_SESSION["Member_Phone_1"],$_SESSION["Member_Relationship_Explanation_1"],$_SESSION["If_Guardian_1"],$_SESSION["Member_Nation_1"],$_SESSION["Member_IDCertType_1"],$_SESSION["Member_Workplace_1"],$_SESSION["Member_IDNumber_1"],$_SESSION["Member_CurrentAddr_1"],$_SESSION["Member_Job_1"],$_SESSION["Member_Name_2"],$_SESSION["Member_HukouPlace_2"],$_SESSION["Member_Relationship_2"],$_SESSION["Member_Phone_2"],$_SESSION["Member_Relationship_Explanation_2"],$_SESSION["If_Guardian_2"],$_SESSION["Member_Nation_2"],$_SESSION["Member_IDCertType_2"],$_SESSION["Member_Workplace_2"],$_SESSION["Member_IDNumber_2"],$_SESSION["Member_CurrentAddr_2"],$_SESSION["Member_Job_2"]);
			//此处由ZYF在2013年7月6日0:20完成。
			$fo->JumpTo("Step4.php");
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>最后检查</title>
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
         <li>
         	<a href="Step2.php">第二步：填写家庭成员或监护人信息</a>
          </li>
          <li class="active">
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
	<h1>最后检查</h1>
	<p>请仔细检查数据是否有误。若有误，可点击上方的导航栏或页面下方的“上一步”回到相应页面。</p>
    <form action="Step3.php" method="post">
    <table class="table table-striped table-bordered">
  <tr>
    <td colspan="4"><h3 align="center">学生个人基础信息</h3></td>
    </tr>
  <tr>
    <td>姓名：</td>
    <td><?php echo $_SESSION["Name"]; ?></td>
    <td>曾用名：</td>
    <td><?php echo $_SESSION["UsedName"]; ?></td>
  </tr>
  <tr>
    <td>民族：</td>
    <td><?php echo $_SESSION["Nation"]; ?></td>
    <td>国籍/地区：</td>
    <td><?php echo $_SESSION["StateAndRegions"]; ?></td>
  </tr>
  <tr>
    <td>身份证件类型：</td>
    <td><?php echo $_SESSION["IDCertType"]; ?></td>
    <td>身份证件号码：</td>
    <td><?php echo $_SESSION["IDNumber"]; ?></td>
  </tr>
  <tr>
    <td>出生地行政规划代码：</td>
    <td><?php echo $_SESSION["BirthplaceCode"]; ?></td>
    <td>籍贯：</td>
    <td><?php echo $_SESSION["NativePlace"]; ?></td>
  </tr>
  <tr>
    <td>是否为港澳台侨外：</td>
    <td><?php echo $_SESSION["HKMRTW"]; ?></td>
    <td>特长：</td>
    <td><?php echo $_SESSION["Specialty"]; ?></td>
  </tr>
  <tr>
    <td>政治面貌：</td>
    <td><?php echo $_SESSION["PoliticalState"]; ?></td>
    <td>健康状况：</td>
    <td><?php echo $_SESSION["HealthState"]; ?></td>
  </tr>
  <tr>
    <td>出生日期：</td>
    <td><?php echo $_SESSION["Birthday"]; ?></td>
    <td>性别：</td>
    <td><?php echo $_SESSION["Gender"]; ?></td>
  </tr>
  <tr>
    <td>户口所在地行政规划：</td>
    <td><?php echo $_SESSION["HukouPlace"]; ?></td>
    <td>户口性质：</td>
    <td><?php echo $_SESSION["HukouState"]; ?></td>
  </tr>
  <tr>
    <td>身份证件有效期（格式如19980101-20130101）：</td>
    <td><?php echo $_SESSION["Period_of_Validity_of_IDCerf"]; ?></td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="4"><h3 align="center">学生学籍基本信息</h3></td>
  </tr>
  <tr>
    <td>年级：</td>
    <td><?php echo $_SESSION["Grade"]; ?></td>
    <td>班级：</td>
    <td><?php echo $_SESSION["Class"]; ?></td>
  </tr>
  <tr>
    <td>班内学号：</td>
    <td><?php echo $_SESSION["StudentID"]; ?></td>
    <td>入学年月：</td>
    <td><?php echo $_SESSION["Date_of_Admission"]; ?></td>
  </tr>
  <tr>
    <td>学生来源：</td>
    <td><?php echo $_SESSION["StudentSource"]; ?></td>
    <td>就读方式：</td>
    <td><?php echo $_SESSION["Way_of_going_to_School"]; ?></td>
  </tr>
  <tr>
    <td>入学方式：</td>
    <td><?php echo $_SESSION["Way_of_Admission"]; ?></td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="4"><h3 align="center">学生个人联系信息</h3></td>
    </tr>
  <tr>
    <td>现住址：</td>
    <td><?php echo $_SESSION["CurrentAddr"]; ?></td>
    <td>邮政编码：</td>
    <td><?php echo $_SESSION["Postcode"]; ?></td>
  </tr>
  <tr>
    <td>通信地址：</td>
    <td><?php echo $_SESSION["MailingAddr"]; ?></td>
    <td>电子邮箱：</td>
    <td><?php echo $_SESSION["Email"]; ?></td>
  </tr>
  <tr>
    <td>家庭地址：</td>
    <td><?php echo $_SESSION["HomeAddr"]; ?></td>
    <td>主页地址：</td>
    <td><?php echo $_SESSION["WebsiteAddr"]; ?></td>
  </tr>
  <tr>
    <td>联系电话：</td>
    <td><?php echo $_SESSION["PhoneNumber"]; ?></td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="4"><h3 align="center">学生个人扩展信息</h3></td>
    </tr>
  <tr>
    <td>是否为独生子女：</td>
    <td><?php echo $_SESSION["If_is_the_Only_One_Child"]; ?></td>
    <td>是否随班就读：</td>
    <td><?php echo $_SESSION["If_learn_in_regular_class"]; ?></td>
  </tr>
  <tr>
    <td>是否受过学前教育：</td>
    <td><?php echo $_SESSION["If_Accepted_Preschool_Edu"]; ?></td>
    <td>残疾类型：</td>
    <td><?php echo $_SESSION["Kind_of_Disability"]; ?></td>
  </tr>
  <tr>
    <td>是否为留守儿童：</td>
    <td><?php echo $_SESSION["If_Stay_at_home_Child"]; ?></td>
    <td>是否由政府购买学位：</td>
    <td><?php echo $_SESSION["If_gov_buy_XueWei"]; ?></td>
  </tr>
  <tr>
    <td>是否为进城务工人员随迁子女：</td>
    <td><?php echo $_SESSION["If_Child_of_Migrant_worker"]; ?></td>
    <td>是否需要申请资助：</td>
    <td><?php echo $_SESSION["If_Subvention_is_Needed"]; ?></td>
  </tr>
  <tr>
    <td>是否为孤儿：</td>
    <td><?php echo $_SESSION["If_Orphan"]; ?></td>
    <td>是否享受一补：</td>
    <td><?php echo $_SESSION["If_has_Allowance"]; ?></td>
  </tr>
  <tr>
    <td>是否为烈士或优抚子女：</td>
    <td><?php echo $_SESSION["If_Child_of_Martyr"]; ?></td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="4"><h3 align="center">学生上下学交通方式</h3></td>
    </tr>
  <tr>
    <td>上下学距离（公里）：</td>
    <td><?php echo $_SESSION["Distance_To_School"]; ?></td>
    <td>是否需要乘坐校车：</td>
    <td><?php echo $_SESSION["If_Schoolbus_is_Needed"]; ?></td>
  </tr>
  <tr>
    <td>上下学交通方式：</td>
    <td><?php echo $_SESSION["Transpotation_To_School"]; ?></td>
    <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
    <td colspan="4"><h3 align="center">家庭成员一</h3></td>
    </tr>
  <tr>
    <td>姓名：</td>
    <td><?php echo $_SESSION["Member_Name_1"]; ?></td>
    <td>户口所在地：</td>
    <td><?php echo $_SESSION["Member_HukouPlace_1"]; ?></td>
  </tr>
  <tr>
    <td>关系：</td>
    <td><?php echo $_SESSION["Member_Relationship_1"]; ?></td>
    <td>联系电话：</td>
    <td><?php echo $_SESSION["Member_Phone_1"]; ?></td>
  </tr>
  <tr>
    <td>关系说明：</td>
    <td><?php echo $_SESSION["Member_Relationship_Explanation_1"]; ?></td>
    <td>是否监护人：</td>
    <td><?php echo $_SESSION["If_Guardian_1"]; ?></td>
  </tr>
  <tr>
    <td>民族：</td>
    <td><?php echo $_SESSION["Member_Nation_1"]; ?></td>
    <td>身份证件类型：</td>
    <td><?php echo $_SESSION["Member_IDCertType_1"]; ?></td>
  </tr>
  <tr>
    <td>工作单位：</td>
    <td><?php echo $_SESSION["Member_Workplace_1"]; ?></td>
    <td>身份证件号：</td>
    <td><?php echo $_SESSION["Member_IDNumber_1"]; ?></td>
  </tr>
  <tr>
    <td>现住址：</td>
    <td><?php echo $_SESSION["Member_CurrentAddr_1"]; ?></td>
    <td>职务：</td>
    <td><?php echo $_SESSION["Member_Job_1"]; ?></td>
  </tr>
  <tr>
    <td colspan="4"><h3 align="center">家庭成员二</h3></td>
    </tr>
  <tr>
    <td>姓名：</td>
    <td><?php echo $_SESSION["Member_Name_2"]; ?></td>
    <td>户口所在地：</td>
    <td><?php echo $_SESSION["Member_HukouPlace_1"]; ?></td>
  </tr>
  <tr>
    <td>关系：</td>
    <td><?php echo $_SESSION["Member_Relationship_2"]; ?></td>
    <td>联系电话：</td>
    <td><?php echo $_SESSION["Member_Phone_2"]; ?></td>
  </tr>
  <tr>
    <td>关系说明：</td>
    <td><?php echo $_SESSION["Member_Relationship_Explanation_2"]; ?></td>
    <td>是否监护人：</td>
    <td><?php echo $_SESSION["If_Guardian_2"]; ?></td>
  </tr>
  <tr>
    <td>民族：</td>
    <td><?php echo $_SESSION["Member_Nation_2"]; ?></td>
    <td>身份证件类型：</td>
    <td><?php echo $_SESSION["Member_IDCertType_2"]; ?></td>
  </tr>
  <tr>
    <td>工作单位：</td>
    <td><?php echo $_SESSION["Member_Workplace_2"]; ?></td>
    <td>身份证件号：</td>
    <td><?php echo $_SESSION["Member_IDNumber_2"]; ?></td>
  </tr>
  <tr>
    <td>现住址：</td>
    <td><?php echo $_SESSION["Member_CurrentAddr_2"]; ?></td>
    <td>职务：</td>
    <td><?php echo $_SESSION["Member_Job_2"]; ?></td>
  </tr>
  </table>
  <a href="Step2.php" class="btn" name="btnBack" id="btnBack">上一步</a>
  <input type="submit" name="btnNext" id="btnNext" value="下一步" class="btn" align="right">
  </form>
</div>
</body>
</html>