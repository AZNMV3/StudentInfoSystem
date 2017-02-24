<?php
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
	header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT"); 
	header("Cache-Control: no-cache, must-revalidate"); 
	header("Pramga: no-cache"); 
	require("conn.php");
	session_start();
	$db=new DatabaseOperation;
	$db->Connect("READ");
	$db->Get_Grade_And_Class();
	$fo=new FrontOperation;
	$fo->VerifyIdentity("USER");
	if ($_POST)
	{
		$_SESSION["Name"]=$_POST["txtName"];
		$_SESSION["UsedName"]=$_POST["txtUsedName"];
		$_SESSION["Nation"]=$_POST["lstNation"];
		$_SESSION["StateAndRegions"]=$_POST["lstStateAndRegions"];
		$_SESSION["IDCertType"]=$_POST["lstIDCertType"];
		$_SESSION["IDNumber"]=$_POST["txtIDNumber"];
		$_SESSION["BirthplaceCode"]=$_POST["txtBirthplaceCode"];
		$_SESSION["NativePlace"]=$_POST["txtNativePlace"];
		$_SESSION["HKMRTW"]=$_POST["lstHKMRTW"];
		$_SESSION["PoliticalState"]=$_POST["lstPoliticalState"];
		$_SESSION["HealthState"]=$_POST["lstHealthState"];
		$_SESSION["Birthday"]=$_POST["txtBirthday"];
		$_SESSION["Gender"]=$_POST["lstGender"];
		$_SESSION["HukouPlace"]=$_POST["txtHukouPlace"];
		$_SESSION["HukouState"]=$_POST["lstHukouState"];
		$_SESSION["Period_of_Validity_of_IDCerf"]=$_POST["txt_Period_of_Validity_of_IDCerf"];
		$_SESSION["Specialty"]=$_POST["txtSpecialty"];
		$_SESSION["Date_of_Admission"]=$_POST["txt_Date_of_Admission"];
		$_SESSION["StudentID"]=$_POST["txtStudentID"];
		$_SESSION["Way_of_Admission"]=$_POST["lst_Way_of_Admission"];
		$_SESSION["Grade"]=$_POST["txtGrade"];
		$_SESSION["Way_of_going_to_School"]=$_POST["lst_Way_of_going_to_School"];
		$_SESSION["Class"]=$_POST["lstClass"];
		$_SESSION["StudentSource"]=$_POST["lstStudentSource"];
		$_SESSION["CurrentAddr"]=$_POST["txtCurrentAddr"];
		$_SESSION["Postcode"]=$_POST["txtPostcode"];
		$_SESSION["MailingAddr"]=$_POST["txtMailingAddr"];
		$_SESSION["Email"]=$_POST["txtEmail"];
		$_SESSION["HomeAddr"]=$_POST["txtHomeAddr"];
		$_SESSION["WebsiteAddr"]=$_POST["txtWebsiteAddr"];
		$_SESSION["PhoneNumber"]=$_POST["txtPhoneNumber"];
		$_SESSION["If_is_the_Only_One_Child"]=$_POST["lst_If_is_the_Only_One_Child"];
		$_SESSION["If_learn_in_regular_class"]=$_POST["lst_If_learn_in_regular_class"];
		$_SESSION["If_Accepted_Preschool_Edu"]=$_POST["lst_If_Accepted_Preschool_Edu"];
		$_SESSION["Kind_of_Disability"]=$_POST["lst_Kind_of_Disability"];
		$_SESSION["If_Stay_at_home_Child"]=$_POST["lst_If_Stay_at_home_Child"];
		$_SESSION["If_gov_buy_XueWei"]=$_POST["lst_If_gov_buy_XueWei"];
		$_SESSION["If_Child_of_Migrant_worker"]=$_POST["lst_If_Child_of_Migrant_worker"];
		$_SESSION["If_Subvention_is_Needed"]=$_POST["lst_If_Subvention_is_Needed"];
		$_SESSION["If_Orphan"]=$_POST["lst_If_Orphan"];
		$_SESSION["If_has_Allowance"]=$_POST["lst_If_has_Allowance"];
		$_SESSION["If_Child_of_Martyr"]=$_POST["lst_If_Child_of_Martyr"];
		$_SESSION["Distance_To_School"]=$_POST["txt_Distance_To_School"];
		$_SESSION["If_Schoolbus_is_Needed"]=$_POST["lst_If_Schoolbus_is_Needed"];
		$_SESSION["Transpotation_To_School"]=$_POST["lst_Transpotation_To_School"];
		$fo->JumpTo("Step2.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="http://mini.jiasule.com/framework/bootstrap/2.3.1/css/bootstrap.css" rel="stylesheet">
	<link href="http://mini.jiasule.com/framework/bootstrap/2.3.1/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- <link href="css/docs.css" rel="stylesheet"> -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
	<script src="http://mini.jiasule.com/framework/bootstrap/2.3.1/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
	$(function()
	{
		$("#txtCurrentAddr").blur(function()
		{
			var CurrentAddr=$("#txtCurrentAddr").attr("value");
			var MailingAddr=$("#txtMailingAddr").attr("value");
			var HomeAddr=$("#txtHomeAddr").attr("value");
			if(MailingAddr == undefined && HomeAddr == undefined)
			{
				$("#txtMailingAddr").attr("value",CurrentAddr);
				$("#txtHomeAddr").attr("value",CurrentAddr);
			}
		}
		)
	})
	
	</script>
	<style>
    h1, h2, h3, .masthead p, .subhead p, .marketing h2, .lead
{
  font-family: "Helvetica Neue", Helvetica, Arial, "Microsoft Yahei UI", "Microsoft YaHei", SimHei, "\5B8B\4F53", simsun, sans-serif;
  font-weight: normal;
}
</style>
<title>学生基本信息表</title>
<!-- 
	TAT 我对不起英语老师！好多项的ID都是随便翻译来的，准确率根本无法保证……麻烦凑合着看吧……    
	PS：凡是用一个单词能表示其意思的项，我都是用控件类别+单词/词组命名的；如果不能，我会用下划线来连接每个单词。
    PS2：请注意下拉列表中每一项对应的值……
    PS3：这段话在编辑完成后请删除，如果要留点彩蛋什么的话，随意

										ZYF,  2013.6.28
-->
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
		<li class="active">
        	<a href="#">第一步：填写自己的基本资料</a>
         </li>
         <li>
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
<h1>学生基本信息表</h1>
<p>&nbsp;</p>
<form action="Step1.php" method="post">
<table class="table table-striped table-bordered">
  <tr>
    <td colspan="4"><h3 align="center">学生个人基础信息</h3></td>
    </tr>
  <tr>
    <td>姓名：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txtName","Name");
		?></td>
    <td>曾用名：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txtUsedName","UsedName");
		?></td>
  </tr>
  <tr>
    <td>民族：</td>
    <td><select name="lstNation" id="lstNation">
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
    <td>国籍/地区：</td>
    <td><select name="lstStateAndRegions" id="lstStateAndRegions">
<option value="中国" selected>中国</option>
<option value="阿富汗">阿富汗</option>
<option value="安哥拉">安哥拉</option>
<option value="安圭拉">安圭拉</option>
<option value="阿尔巴尼亚">阿尔巴尼亚</option>
<option value="安道尔">安道尔</option>
<option value="荷属安的列斯">荷属安的列斯</option>
<option value="阿联酋">阿联酋</option>
<option value="阿根廷">阿根廷</option>
<option value="亚美尼亚">亚美尼亚</option>
<option value="美属萨摩亚">美属萨摩亚</option>
<option value="南极洲">南极洲</option>
<option value="法属南部领土">法属南部领土</option>
<option value="安提瓜和巴布达">安提瓜和巴布达</option>
<option value="澳大利亚">澳大利亚</option>
<option value="奥地利">奥地利</option>
<option value="阿塞拜疆">阿塞拜疆</option>
<option value="布隆迪">布隆迪</option>
<option value="比利时">比利时</option>
<option value="贝宁">贝宁</option>
<option value="布基纳法索">布基纳法索</option>
<option value="孟加拉国">孟加拉国</option>
<option value="保加利亚">保加利亚</option>
<option value="巴林">巴林</option>
<option value="巴哈马">巴哈马</option>
<option value="波黑">波黑</option>
<option value="白俄罗斯">白俄罗斯</option>
<option value="伯利兹">伯利兹</option>
<option value="百慕大">百慕大</option>
<option value="玻利维亚">玻利维亚</option>
<option value="巴西">巴西</option>
<option value="巴巴多斯">巴巴多斯</option>
<option value="文莱">文莱</option>
<option value="不丹">不丹</option>
<option value="布维岛">布维岛</option>
<option value="博茨瓦纳">博茨瓦纳</option>
<option value="中非">中非</option>
<option value="加拿大">加拿大</option>
<option value="科科斯群岛">科科斯群岛</option>
<option value="瑞士">瑞士</option>
<option value="智利">智利</option>
<option value="阿鲁巴">阿鲁巴</option>
<option value="科特迪瓦">科特迪瓦</option>
<option value="喀麦隆">喀麦隆</option>
<option value="刚果(金)">刚果(金)</option>
<option value="刚果(布)">刚果(布)</option>
<option value="库克群岛">库克群岛</option>
<option value="哥伦比亚">哥伦比亚</option>
<option value="科摩罗">科摩罗</option>
<option value="佛得角">佛得角</option>
<option value="哥斯达黎加">哥斯达黎加</option>
<option value="古巴">古巴</option>
<option value="圣诞岛">圣诞岛</option>
<option value="开曼群岛">开曼群岛</option>
<option value="塞浦路斯">塞浦路斯</option>
<option value="捷克">捷克</option>
<option value="德国">德国</option>
<option value="吉布提">吉布提</option>
<option value="多米尼克">多米尼克</option>
<option value="丹麦">丹麦</option>
<option value="多米尼加">多米尼加</option>
<option value="阿尔及利亚">阿尔及利亚</option>
<option value="厄瓜多尔">厄瓜多尔</option>
<option value="埃及">埃及</option>
<option value="厄立特里亚">厄立特里亚</option>
<option value="西撒哈拉">西撒哈拉</option>
<option value="西班牙">西班牙</option>
<option value="爱沙尼亚">爱沙尼亚</option>
<option value="埃塞俄比亚">埃塞俄比亚</option>
<option value="芬兰">芬兰</option>
<option value="斐济">斐济</option>
<option value="马尔维纳斯群岛">马尔维纳斯群岛</option>
<option value="法国">法国</option>
<option value="法罗群岛">法罗群岛</option>
<option value="密克罗尼西亚">密克罗尼西亚</option>
<option value="加蓬">加蓬</option>
<option value="英国（独立领土公民，出国不用）">英国（独立领土公民，出国不用）</option>
<option value="英国（海外国民，出国不用）">英国（海外国民，出国不用）</option>
<option value="英国（海外公民，出国不用）">英国（海外公民，出国不用）</option>
<option value="英国（保护公民，出国不用）">英国（保护公民，出国不用）</option>
<option value="英国">英国</option>
<option value="英国（隶属，出国不用）">英国（隶属，出国不用）</option>
<option value="格鲁吉亚">格鲁吉亚</option>
<option value="加纳">加纳</option>
<option value="直布罗陀">直布罗陀</option>
<option value="几内亚">几内亚</option>
<option value="瓜德罗普">瓜德罗普</option>
<option value="冈比亚">冈比亚</option>
<option value="几内亚比绍">几内亚比绍</option>
<option value="赤道几内亚">赤道几内亚</option>
<option value="希腊">希腊</option>
<option value="格林纳达">格林纳达</option>
<option value="格陵兰">格陵兰</option>
<option value="危地马拉">危地马拉</option>
<option value="法属圭亚那">法属圭亚那</option>
<option value="关岛">关岛</option>
<option value="圭亚那">圭亚那</option>
<option value="香港">香港</option>
<option value="赫德岛和麦克唐纳岛">赫德岛和麦克唐纳岛</option>
<option value="洪都拉斯">洪都拉斯</option>
<option value="克罗地亚">克罗地亚</option>
<option value="海地">海地</option>
<option value="匈牙利">匈牙利</option>
<option value="印度尼西亚">印度尼西亚</option>
<option value="印度">印度</option>
<option value="英属印度洋领土">英属印度洋领土</option>
<option value="爱尔兰">爱尔兰</option>
<option value="伊朗">伊朗</option>
<option value="伊拉克">伊拉克</option>
<option value="冰岛">冰岛</option>
<option value="以色列">以色列</option>
<option value="意大利">意大利</option>
<option value="牙买加">牙买加</option>
<option value="约旦">约旦</option>
<option value="日本">日本</option>
<option value="约翰斯顿岛">约翰斯顿岛</option>
<option value="哈萨克斯坦">哈萨克斯坦</option>
<option value="肯尼亚">肯尼亚</option>
<option value="吉尔吉斯斯坦">吉尔吉斯斯坦</option>
<option value="柬埔寨">柬埔寨</option>
<option value="基里巴斯">基里巴斯</option>
<option value="圣基茨和尼维斯">圣基茨和尼维斯</option>
<option value="韩国">韩国</option>
<option value="科威特">科威特</option>
<option value="老挝">老挝</option>
<option value="黎巴嫩">黎巴嫩</option>
<option value="利比里亚">利比里亚</option>
<option value="利比亚">利比亚</option>
<option value="圣卢西亚">圣卢西亚</option>
<option value="列支敦士登">列支敦士登</option>
<option value="斯里兰卡">斯里兰卡</option>
<option value="莱索托">莱索托</option>
<option value="立陶宛">立陶宛</option>
<option value="卢森堡">卢森堡</option>
<option value="拉脱维亚">拉脱维亚</option>
<option value="澳门">澳门</option>
<option value="摩洛哥">摩洛哥</option>
<option value="摩纳哥">摩纳哥</option>
<option value="摩尔多瓦">摩尔多瓦</option>
<option value="马达加斯加">马达加斯加</option>
<option value="马尔代夫">马尔代夫</option>
<option value="墨西哥">墨西哥</option>
<option value="马绍尔群岛">马绍尔群岛</option>
<option value="中途岛">中途岛</option>
<option value="前南马其顿">前南马其顿</option>
<option value="马里">马里</option>
<option value="马耳他">马耳他</option>
<option value="缅甸">缅甸</option>
<option value="蒙古">蒙古</option>
<option value="北马里亚纳">北马里亚纳</option>
<option value="莫桑比克">莫桑比克</option>
<option value="毛里塔尼亚">毛里塔尼亚</option>
<option value="蒙特塞拉特">蒙特塞拉特</option>
<option value="马提尼克">马提尼克</option>
<option value="毛里求斯">毛里求斯</option>
<option value="马拉维">马拉维</option>
<option value="马来西亚">马来西亚</option>
<option value="马约特">马约特</option>
<option value="纳米比亚">纳米比亚</option>
<option value="新喀里多尼亚">新喀里多尼亚</option>
<option value="尼日尔">尼日尔</option>
<option value="诺福克岛">诺福克岛</option>
<option value="尼日利亚">尼日利亚</option>
<option value="尼加拉瓜">尼加拉瓜</option>
<option value="纽埃">纽埃</option>
<option value="荷兰">荷兰</option>
<option value="挪威">挪威</option>
<option value="尼泊尔">尼泊尔</option>
<option value="瑙鲁">瑙鲁</option>
<option value="中间地带">中间地带</option>
<option value="新西兰">新西兰</option>
<option value="阿曼">阿曼</option>
<option value="巴基斯坦">巴基斯坦</option>
<option value="巴拿马">巴拿马</option>
<option value="皮特凯恩">皮特凯恩</option>
<option value="秘鲁">秘鲁</option>
<option value="菲律宾">菲律宾</option>
<option value="帕劳">帕劳</option>
<option value="巴布亚新几内亚">巴布亚新几内亚</option>
<option value="波兰">波兰</option>
<option value="波多黎各">波多黎各</option>
<option value="朝鲜">朝鲜</option>
<option value="葡萄牙">葡萄牙</option>
<option value="巴拉圭">巴拉圭</option>
<option value="巴勒斯坦">巴勒斯坦</option>
<option value="法属波利尼西亚">法属波利尼西亚</option>
<option value="卡塔尔">卡塔尔</option>
<option value="留尼汪">留尼汪</option>
<option value="罗马尼亚">罗马尼亚</option>
<option value="俄罗斯">俄罗斯</option>
<option value="卢旺达">卢旺达</option>
<option value="沙特阿拉伯">沙特阿拉伯</option>
<option value="苏丹">苏丹</option>
<option value="塞内加尔">塞内加尔</option>
<option value="塞尔维亚">塞尔维亚</option>
<option value="新加坡">新加坡</option>
<option value="南乔治亚岛和南桑德韦奇岛">南乔治亚岛和南桑德韦奇岛</option>
<option value="圣赫勒拿">圣赫勒拿</option>
<option value="斯瓦尔巴岛和扬马延岛">斯瓦尔巴岛和扬马延岛</option>
<option value="所罗门群岛">所罗门群岛</option>
<option value="塞拉利昂">塞拉利昂</option>
<option value="萨尔瓦多">萨尔瓦多</option>
<option value="圣马力诺">圣马力诺</option>
<option value="索马里">索马里</option>
<option value="圣皮埃尔和密克隆">圣皮埃尔和密克隆</option>
<option value="塞班">塞班</option>
<option value="圣多美和普林西比">圣多美和普林西比</option>
<option value="苏里南">苏里南</option>
<option value="斯洛伐克">斯洛伐克</option>
<option value="斯洛文尼亚">斯洛文尼亚</option>
<option value="瑞典">瑞典</option>
<option value="斯威士兰">斯威士兰</option>
<option value="锡金">锡金</option>
<option value="塞舌尔">塞舌尔</option>
<option value="叙利亚">叙利亚</option>
<option value="特克斯和凯科斯群岛">特克斯和凯科斯群岛</option>
<option value="乍得">乍得</option>
<option value="多哥">多哥</option>
<option value="泰国">泰国</option>
<option value="塔吉克斯坦">塔吉克斯坦</option>
<option value="托克劳">托克劳</option>
<option value="土库曼斯坦">土库曼斯坦</option>
<option value="东帝汶">东帝汶</option>
<option value="汤加">汤加</option>
<option value="特立尼达和多巴哥">特立尼达和多巴哥</option>
<option value="突尼斯">突尼斯</option>
<option value="土耳其">土耳其</option>
<option value="图瓦卢">图瓦卢</option>
<option value="台湾">台湾</option>
<option value="坦桑尼亚">坦桑尼亚</option>
<option value="乌干达">乌干达</option>
<option value="乌克兰">乌克兰</option>
<option value="美国本土外小岛屿">美国本土外小岛屿</option>
<option value="联合国">联合国</option>
<option value="乌拉圭">乌拉圭</option>
<option value="美国">美国</option>
<option value="乌兹别克斯坦">乌兹别克斯坦</option>
<option value="梵蒂冈">梵蒂冈</option>
<option value="圣文森特和格林纳丁斯">圣文森特和格林纳丁斯</option>
<option value="委内瑞拉">委内瑞拉</option>
<option value="英属维尔京群岛">英属维尔京群岛</option>
<option value="美属维尔京群岛">美属维尔京群岛</option>
<option value="越南">越南</option>
<option value="瓦努阿图">瓦努阿图</option>
<option value="威克岛">威克岛</option>
<option value="瓦利斯和富图纳群岛">瓦利斯和富图纳群岛</option>
<option value="萨摩亚">萨摩亚</option>
<option value="无国籍（无国籍人）">无国籍（无国籍人）</option>
<option value="被联合国承认的难民">被联合国承认的难民</option>
<option value="不被联合国承认的难民">不被联合国承认的难民</option>
<option value="国籍不明">国籍不明</option>
<option value="也门">也门</option>
<option value="南斯拉夫">南斯拉夫</option>
<option value="南非">南非</option>
<option value="扎伊尔">扎伊尔</option>
<option value="赞比亚">赞比亚</option>
<option value="津巴布韦">津巴布韦</option>
<option value="国籍不详">国籍不详</option>
    </select></td>
  </tr>
  <tr>
    <td>身份证件类型：</td>
    <td><select name="lstIDCertType" id="lstIDCertType">
<option value="居民身份证">居民身份证</option>
<option value="香港特区护照/身份证明">香港特区护照/身份证明</option>
<option value="澳门特区护照/身份证明">澳门特区护照/身份证明</option>
<option value="台湾居民来往大陆通行证">台湾居民来往大陆通行证</option>
<option value="境外永久居住证">境外永久居住证</option>
<option value="护照">护照</option>
<option value="其他">其他</option>
    
    </select></td>
    <td>身份证件号码：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txtIDNumber","IDNumber");
		?></td>
  </tr>
  <tr>
    <td>出生地行政规划代码：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txtBirthplaceCode","BirthplaceCode");
		?></td>
    <td>籍贯：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txtNativePlace","NativePlace");
		?></td>
  </tr>
  <tr>
    <td>是否为港澳台侨外：</td>
    <td><select name="lstHKMRTW" id="lstHKMRTW">
<option value="否">否</option>
<option value="香港同胞">香港同胞</option>
<option value="香港同胞亲属">香港同胞亲属</option>
<option value="澳门同胞">澳门同胞</option>
<option value="澳门同胞亲属">澳门同胞亲属</option>
<option value="台湾同胞">台湾同胞</option>
<option value="台湾同胞亲属">台湾同胞亲属</option>
<option value="华侨">华侨</option>
<option value="侨眷">侨眷</option>
<option value="归侨">归侨</option>
<option value="归侨子女">归侨子女</option>
<option value="归国留学人员">归国留学人员</option>
<option value="非华裔中国人">非华裔中国人</option>
<option value="外籍华裔人">外籍华裔人</option>
<option value="外国人">外国人</option>
<option value="其他">其他</option>

    </select></td>
    <td>特长：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txtSpecialty","Specialty");
		?></td>
  </tr>
  <tr>
    <td>政治面貌：</td>
    <td><select name="lstPoliticalState" id="lstPoliticalState">
<option value="共青团员" selected>共青团员</option>
<option value="群众">群众</option>
<option value="少先队员">少先队员</option>
<option value="中共党员">中共党员</option>
<option value="中共预备党员">中共预备党员</option>
</select></td>
    <td>健康状况：</td>
    <td><select name="lstHealthState" id="lstHealthState">
    <option value="健康或良好" selected>健康或良好</option>
<option value="一般或较弱">一般或较弱</option>
<option value="有慢性病">有慢性病</option>
<option value="有生理缺陷">有生理缺陷</option>
<option value="残疾">残疾</option>
    </select></td>
  </tr>
  <tr>
    <td>出生日期：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txtBirthday","Birthday");
		?></td>
    <td>性别：</td>
    <td><select name="lstGender" id="lstGender">
    <option value="男">男</option>
    <option value="女">女</option></select></td>
  </tr>
  <tr>
    <td>户口所在地行政规划：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txtHukouPlace","HukouPlace");
		?></td>
    <td>户口性质：</td>
    <td><select name="lstHukouState" id="lstHukouState">
      <option value="农业户口">农业户口</option>
      <option value="非农业户口">非农业户口</option>
    </select></td>
  </tr>
  <tr>
    <td>身份证件有效期（格式如19980101-20130101）：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Period_of_Validity_of_IDCerf","Period_of_Validity_of_IDCerf");
		?></td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="4"><h3 align="center">学生学籍基本信息</h3></td>
  </tr>
  <tr>
    <td>年级：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txtGrade","Grade");
		?></td>
    <td>班级：</td>
    <td>
    	<?php
			echo "<select name=\"lstClass\" id=\"lstClass\">";
			for ($i=1;$i<$_SESSION["Class"]+1;$i++)
			{
				echo "<option value=\"".$i."\">".$i."</option>";
			}
			echo "</select>";
		?></td>
  </tr>
  <tr>
    <td>班内学号：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txtStudentID","StudentID");
		?></td>
    <td>入学年月：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Date_of_Admission","Date_of_Admission");
		?></td>
  </tr>
  <tr>
    <td>学生来源：</td>
    <td><select name="lstStudentSource" id="lstStudentSource">
      <option value="正常入学">正常入学</option>
      <option value="借读">借读</option>
      <option value="其他">其他</option>
    </select></td>
    <td>就读方式：</td>
    <td><select name="lst_Way_of_going_to_School" id="lst_Way_of_going_to_School">
      <option value="走读">走读</option>
      <option value="住校">住校</option>
    </select></td>
  </tr>
  <tr>
    <td>入学方式：</td>
    <td><select name="lst_Way_of_Admission" id="lst_Way_of_Admission">
      <option value="就近入学">就近入学</option>
      <option value="统一招生考试/普通入学">统一招生考试/普通入学</option>
      <option value="体育特招">体育特招</option>
      <option value="艺术特招">艺术特招</option>
      <option value="义务教育阶段其他">义务教育阶段其他</option>
      <option value="高中阶段其他">高中阶段其他</option>
    </select></td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="4"><h3 align="center">学生个人联系信息</h3></td>
    </tr>
	
  <tr>
    <td>现住址：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txtCurrentAddr","CurrentAddr");
		?></td>
    <td>邮政编码：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txtPostcode","Postcode");
		?></td>
  </tr>
  <tr>
    <td>通信地址：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txtMailingAddr","MailingAddr");
		?></td>
    <td>电子邮箱：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txtEmail","Email");
		?></td>
  </tr>
  <tr>
    <td>家庭地址：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txtHomeAddr","HomeAddr");
		?></td>
    <td>主页地址：</td>
    <td><?php
        	$fo->Echo_TextBox("txtWebsiteAddr","WebsiteAddr");
		?></td>
  </tr>
  <tr>
    <td>联系电话：</td>
    <td><?php
        	$fo->Echo_TextBox("txtPhoneNumber","PhoneNumber");
		?></td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="4"><h3 align="center">学生个人扩展信息</h3></td>
    </tr>
  <tr>
    <td>是否为独生子女：</td>
    <td><select name="lst_If_is_the_Only_One_Child" id="lst_If_is_the_Only_One_Child">
      <option value="是" selected="selected">是</option>
      <option value="否">否</option>
    </select></td>
    <td>是否随班就读：</td>
    <td><select name="lst_If_learn_in_regular_class" id="lst_If_learn_in_regular_class">
      <option value="非随班就读" selected="selected">非随班就读</option>
      <option value="视力残疾随班就读">视力残疾随班就读</option>
      <option value="听力残疾随班就读">听力残疾随班就读</option>
      <option value="智力残疾随班就读">智力残疾随班就读</option>
      <option value="其他残疾随班就读">其他残疾随班就读</option>
    </select></td>
  </tr>
  <tr>
    <td>是否受过学前教育：</td>
    <td><select name="lst_If_Accepted_Preschool_Edu" id="lst_If_Accepted_Preschool_Edu">
      <option value="是" selected="selected">是</option>
      <option value="否">否</option>
    </select></td>
    <td>残疾类型：</td>
    <td><select name="lst_Kind_of_Disability" id="lst_Kind_of_Disability">
    <option value="无残疾" selected="selected">无残疾</option>
<option value="视力残疾">视力残疾</option>
<option value="听力残疾">听力残疾</option>
<option value="言语残疾">言语残疾</option>
<option value="肢体残疾">肢体残疾</option>
<option value="智力残疾">智力残疾</option>
<option value="智力残疾">智力残疾</option>
<option value="多重残疾">多重残疾</option>
<option value="其他残疾">其他残疾</option>
    </select></td>
  </tr>
  <tr>
    <td>是否为留守儿童：</td>
    <td><select name="lst_If_Stay_at_home_Child" id="lst_If_Stay_at_home_Child">
    <option value="非留守儿童" selected="selected">非留守儿童</option>
<option value="单亲留守儿童">单亲留守儿童</option>
<option value="双亲留守儿童">双亲留守儿童</option>
    </select></td>
    <td>是否由政府购买学位：</td>
    <td><select name="lst_If_gov_buy_XueWei" id="lst_If_gov_buy_XueWei">
      <option value="否" selected="selected">否</option>
      <option value="是">是</option>
    </select></td>
  </tr>
  <tr>
    <td>是否为进城务工人员随迁子女：</td>
    <td><select name="lst_If_Child_of_Migrant_worker" id="lst_If_Child_of_Migrant_worker">
      <option value="否" selected="selected">否</option>
      <option value="是">是</option>
    </select></td>
    <td>是否需要申请资助：</td>
    <td><select name="lst_If_Subvention_is_Needed" id="lst_If_Subvention_is_Needed">
      <option value="否" selected="selected">否</option>
      <option value="是">是</option>
    </select></td>
  </tr>
  <tr>
    <td>是否为孤儿：</td>
    <td><select name="lst_If_Orphan" id="lst_If_Orphan">
      <option value="否" selected="selected">否</option>
      <option value="是">是</option>
    </select></td>
    <td>是否享受一补：</td>
    <td><select name="lst_If_has_Allowance" id="lst_If_has_Allowance">
      <option value="否" selected="selected">否</option>
      <option value="是">是</option>
    </select></td>
  </tr>
  <tr>
    <td>是否为烈士或优抚子女：</td>
    <td><select name="lst_If_Child_of_Martyr" id="lst_If_Child_of_Martyr">
      <option value="否" selected="selected">否</option>
      <option value="是">是</option>
    </select></td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="4"><h3 align="center">学生上下学交通方式</h3></td>
    </tr>
  <tr>
    <td>上下学距离（公里）：</td>
    <td>
    	<?php
        	$fo->Echo_TextBox("txt_Distance_To_School","Distance_To_School");
		?></td>
    <td>是否需要乘坐校车：</td>
    <td><select name="lst_If_Schoolbus_is_Needed" id="lst_If_Schoolbus_is_Needed">
      <option value="是">是</option>
      <option value="否" selected="selected">否</option>
    </select></td>
  </tr>
  <tr>
    <td>上下学交通方式：</td>
    <td><select name="lst_Transpotation_To_School" id="lst_Transpotation_To_School">
      <option value="步行">步行</option>
      <option value="自行车（含摩托车、电动自行车）" selected="selected">自行车（含摩托车、电动自行车）</option>
      <option value="公共交通（含城市公交、农村客运、地铁）">公共交通（含城市公交、农村客运、地铁）</option>
      <option value="家长自行接送">家长自行接送</option>
      <option value="校车">校车</option>
      <option value="其他">其他</option>
    </select></td>
    <td colspan="2">&nbsp;</td>
    </tr>
  </table>
  <input type="submit" name="btnNext" id="btnNext" value="下一步" class="btn" align="right">
</form>
</div>

</body>
</html>