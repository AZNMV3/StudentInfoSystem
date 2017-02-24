<?php
	require("define.php");
	class DatabaseOperation
	{
		function Connect($PRIVILEGES)
		{
			if ($PRIVILEGES=="ROOT")
			{
				$con=mysql_connect(SQL_HOST_NAME,SQL_USER_NAME,SQL_PASSWORD);
			}
			elseif ($PRIVILEGES=="READ")
			{
				$con=mysql_connect(SQL_HOST_NAME,SQL_READ_USER_NAME,SQL_READ_USER_PASSWORD);
			}
			elseif ($PRIVILEGES=="WRITE")
			{
				$con=mysql_connect(SQL_HOST_NAME,SQL_WRITE_USER_NAME,SQL_WRITE_USER_PASSWORD);
			}
			elseif ($PRIVILEGES=="RW")
			{
				$con=mysql_connect(SQL_HOST_NAME,SQL_RW_USER_NAME,SQL_RW_USER_PASSWORD);
			}
			if (!$con)
			{
				die("Database connect error ".mysql_error());
			}
			mysql_select_db(SQL_DATABASE);
			mysql_query("SET NAMES utf8");
		}
		
		function if_user_is_exist($user,$psw)
		{
			$OrdinaryUserQuery="SELECT * FROM ".SQL_USER_TABLE_NAME." WHERE id='$user' and password='$psw'";
			$Result_OrdinaryUserQuery=mysql_query($OrdinaryUserQuery);
			if (mysql_num_rows($Result_OrdinaryUserQuery)==0)
			{
				$ManagerQuery="SELECT * FROM ".SQL_MANAGER_TABLE_NAME." WHERE id='$user' and password='$psw'";
				$Result_ManagerQuery=mysql_query($ManagerQuery);
				return 0-mysql_num_rows($Result_ManagerQuery);    //用户为管理员时返回负数
			}
			else
			{
				return mysql_num_rows($Result_OrdinaryUserQuery);  //用户为普通用户时返回正数
			}
		}
		
		function Get_Grade_And_Class()
		{
			$Query="Select * from ".SQL_CONFIG_TABLE_NAME;
			$result = mysql_query($Query);
			while($row = mysql_fetch_row($result))
			{
				for($j=0; $j<mysql_num_fields($result);$j++)
				{
					switch ($j)
					{
						case 0:
							$_SESSION["Grade"]=$row[$j];
							break;
						case 1:
							$_SESSION["Class"]=$row[$j];
							break;
					}
				}
			}
		}	
		
		function Type_In_Data($UserID,$SchoolID,$Name,$UsedName,$Nation,$StateAndRegions,$IDCertType,$IDNumber,$BirthplaceCode,$NativePlace,$HKMRTW,$PoliticalState,$HealthState,$Birthday,$Gender,$HukouPlace,$HukouState,$Period_of_Validity_of_IDCerf,$Specialty,$Date_of_Admission,$StudentID,$Way_of_Admission,$Grade,$Way_of_going_to_School,$Class,$StudentSource,$CurrentAddr,$Postcode,$MailingAddr,$Email,$HomeAddr,$WebsiteAddr,$PhoneNumber,$If_is_the_Only_One_Child,$If_learn_in_regular_class,$If_Accepted_Preschool_Edu,$Kind_of_Disability,$If_Stay_at_home_Child,$If_gov_buy_XueWei,$If_Child_of_Migrant_worker,$If_Subvention_is_Needed,$If_Orphan,$If_has_Allowance,$If_Child_of_Martyr,$Distance_To_School,$If_Schoolbus_is_Needed,$Transpotation_To_School,$Member_Name_1,$Member_HukouPlace_1,$Member_Relationship_1,$Member_Phone_1,$Member_Relationship_Explanation_1,$If_Guardian_1,$Member_Nation_1,$Member_IDCertType_1,$Member_Workplace_1,$Member_IDNumber_1,$Member_CurrentAddr_1,$Member_Job_1,$Member_Name_2,$Member_HukouPlace_2,$Member_Relationship_2,$Member_Phone_2,$Member_Relationship_Explanation_2,$If_Guardian_2,$Member_Nation_2,$Member_IDCertType_2,$Member_Workplace_2,$Member_IDNumber_2,$Member_CurrentAddr_2,$Member_Job_2)
		{
			$sql="Select * from ".SQL_INFO_TABLE_NAME." where UserID='$UserID'";
			$result = mysql_query($sql);
			$row = mysql_fetch_row($result);
			if ($row[1]!=null)      //当用户ID字段不为空时（即用户已与信息关联）执行更新语句，否则执行插入语句
			{
				$sql="UPDATE ".SQL_INFO_TABLE_NAME." SET ";
				$sql.="`UserID`='$UserID', `SchoolID`='$SchoolID', `Name`='$Name', `UsedName`='$UsedName', `Nation`='$Nation', `StateAndRegions`='$StateAndRegions', `IDCertType`='$IDCertType', `IDNumber`='$IDNumber', `BirthplaceCode`='$BirthplaceCode', `NativePlace`='$NativePlace', `HKMRTW`='$HKMRTW', `PoliticalState`='$PoliticalState', `HealthState`='$HealthState', `Birthday`='$Birthday', `Gender`='$Gender', `HukouPlace`='$HukouPlace', `HukouState`='$HukouState', `Period_of_Validity_of_IDCerf`='$Period_of_Validity_of_IDCerf', `Specialty`='$Specialty', `Date_of_Admission`='$Date_of_Admission', `StudentID`='$StudentID', `Way_of_Admission`='$Way_of_Admission', `Grade`='$Grade', `Way_of_going_to_School`='$Way_of_going_to_School', `Class`='$Class', `StudentSource`='$StudentSource', `CurrentAddr`='$CurrentAddr', `Postcode`='$Postcode', `MailingAddr`='$MailingAddr', `Email`='$Email', `HomeAddr`='$HomeAddr', `WebsiteAddr`='$WebsiteAddr', `PhoneNumber`='$PhoneNumber', `If_is_the_Only_One_Child`='$If_is_the_Only_One_Child', `If_learn_in_regular_class`='$If_learn_in_regular_class', `If_Accepted_Preschool_Edu`='$If_Accepted_Preschool_Edu', `Kind_of_Disability`='$Kind_of_Disability', `If_Stay_at_home_Child`='$If_Stay_at_home_Child', `If_gov_buy_XueWei`='$If_gov_buy_XueWei', `If_Child_of_Migrant_worker`='$If_Child_of_Migrant_worker', `If_Subvention_is_Needed`='$If_Subvention_is_Needed', `If_Orphan`='$If_Orphan', `If_has_Allowance`='$If_has_Allowance', `If_Child_of_Martyr`='$If_Child_of_Martyr', `Distance_To_School`='$Distance_To_School', `If_Schoolbus_is_Needed`='$If_Schoolbus_is_Needed', `Transpotation_To_School`='$Transpotation_To_School', `Member_Name_1`='$Member_Name_1', `Member_HukouPlace_1`='$Member_HukouPlace_1', `Member_Relationship_1`='$Member_Relationship_1', `Member_Phone_1`='$Member_Phone_1', `Member_Relationship_Explanation_1`='$Member_Relationship_Explanation_1', `If_Guardian_1`='$If_Guardian_1', `Member_Nation_1`='$Member_Nation_1', `Member_IDCertType_1`='$Member_IDCertType_1', `Member_Workplace_1`='$Member_Workplace_1', `Member_IDNumber_1`='$Member_IDNumber_1', `Member_CurrentAddr_1`='$Member_CurrentAddr_1', `Member_Job_1`='$Member_Job_1', `Member_Name_2`='$Member_Name_2', `Member_HukouPlace_2`='$Member_HukouPlace_2', `Member_Relationship_2`='$Member_Relationship_2', `Member_Phone_2`='$Member_Phone_2', `Member_Relationship_Explanation_2`='$Member_Relationship_Explanation_2', `If_Guardian_2`='$If_Guardian_2', `Member_Nation_2`='$Member_Nation_2', `Member_IDCertType_2`='$Member_IDCertType_2', `Member_Workplace_2`='$Member_Workplace_2', `Member_IDNumber_2`='$Member_IDNumber_2', `Member_CurrentAddr_2`='$Member_CurrentAddr_2', `Member_Job_2`='$Member_Job_2'";
				$sql.=" WHERE UserID='$UserID'";
			}
			else
			{
				$sql="INSERT INTO ".SQL_INFO_TABLE_NAME." ";
				$sql.="(`UserID`, `SchoolID`, `Name`, `UsedName`, `Nation`, `StateAndRegions`, `IDCertType`, `IDNumber`, `BirthplaceCode`, `NativePlace`, `HKMRTW`, `PoliticalState`, `HealthState`, `Birthday`, `Gender`, `HukouPlace`, `HukouState`, `Period_of_Validity_of_IDCerf`, `Specialty`, `Date_of_Admission`, `StudentID`, `Way_of_Admission`, `Grade`, `Way_of_going_to_School`, `Class`, `StudentSource`, `CurrentAddr`, `Postcode`, `MailingAddr`, `Email`, `HomeAddr`, `WebsiteAddr`, `PhoneNumber`, `If_is_the_Only_One_Child`, `If_learn_in_regular_class`, `If_Accepted_Preschool_Edu`, `Kind_of_Disability`, `If_Stay_at_home_Child`, `If_gov_buy_XueWei`, `If_Child_of_Migrant_worker`, `If_Subvention_is_Needed`, `If_Orphan`, `If_has_Allowance`, `If_Child_of_Martyr`, `Distance_To_School`, `If_Schoolbus_is_Needed`, `Transpotation_To_School`, `Member_Name_1`, `Member_HukouPlace_1`, `Member_Relationship_1`, `Member_Phone_1`, `Member_Relationship_Explanation_1`, `If_Guardian_1`, `Member_Nation_1`, `Member_IDCertType_1`, `Member_Workplace_1`, `Member_IDNumber_1`, `Member_CurrentAddr_1`, `Member_Job_1`, `Member_Name_2`, `Member_HukouPlace_2`, `Member_Relationship_2`, `Member_Phone_2`, `Member_Relationship_Explanation_2`, `If_Guardian_2`, `Member_Nation_2`, `Member_IDCertType_2`, `Member_Workplace_2`, `Member_IDNumber_2`, `Member_CurrentAddr_2`, `Member_Job_2`) VALUES ";
				$sql.="('$UserID', '$SchoolID', '$Name', '$UsedName', '$Nation', '$StateAndRegions', '$IDCertType', '$IDNumber', '$BirthplaceCode', '$NativePlace', '$HKMRTW', '$PoliticalState', '$HealthState', '$Birthday', '$Gender', '$HukouPlace', '$HukouState', '$Period_of_Validity_of_IDCerf', '$Specialty', '$Date_of_Admission', '$StudentID', '$Way_of_Admission', '$Grade', '$Way_of_going_to_School', '$Class', '$StudentSource', '$CurrentAddr', '$Postcode', '$MailingAddr', '$Email', '$HomeAddr', '$WebsiteAddr', '$PhoneNumber', '$If_is_the_Only_One_Child', '$If_learn_in_regular_class', '$If_Accepted_Preschool_Edu', '$Kind_of_Disability', '$If_Stay_at_home_Child', '$If_gov_buy_XueWei', '$If_Child_of_Migrant_worker', '$If_Subvention_is_Needed', '$If_Orphan', '$If_has_Allowance', '$If_Child_of_Martyr', '$Distance_To_School', '$If_Schoolbus_is_Needed', '$Transpotation_To_School', '$Member_Name_1', '$Member_HukouPlace_1', '$Member_Relationship_1', '$Member_Phone_1', '$Member_Relationship_Explanation_1', '$If_Guardian_1', '$Member_Nation_1', '$Member_IDCertType_1', '$Member_Workplace_1', '$Member_IDNumber_1', '$Member_CurrentAddr_1', '$Member_Job_1', '$Member_Name_2', '$Member_HukouPlace_2', '$Member_Relationship_2', '$Member_Phone_2', '$Member_Relationship_Explanation_2', '$If_Guardian_2', '$Member_Nation_2', '$Member_IDCertType_2', '$Member_Workplace_2', '$Member_IDNumber_2', '$Member_CurrentAddr_2', '$Member_Job_2')";
			}
			$result=mysql_query($sql);
			//此处由ZYF在2013年7月6日0:20完成。
		}
		
		function Get_User_Data($UserID)  //从信息表中获取相应用户的信息放入session中，实现登录后显示出该用户之前填写过的内容
		{
			$sql="Select * from ".SQL_INFO_TABLE_NAME." where UserID='$UserID'";
			$result = mysql_query($sql);
			while($row = mysql_fetch_row($result))
			{
				for($j=0; $j<mysql_num_fields($result);$j++)
				{
					//echo $j." ".mb_convert_encoding($row[$j],"gbk","utf-8")."</br>";
					//通过上面一句可知$j为何值时获取的为何值
					switch ($j)
					{
						case 2:
							$_SESSION["Name"]=$row[$j];
							break;
						case 3:
							$_SESSION["Gender"]=$row[$j];
							break;
						case 4:
							$_SESSION["Birthday"]=$row[$j];
							break;
						case 5:
							$_SESSION["BirthplaceCode"]=$row[$j];
							break;
						case 6:
							$_SESSION["NativePlace"]=$row[$j];
							break;
						case 7:
							$_SESSION["Nation"]=$row[$j];
							break;
						case 8:
							$_SESSION["StateAndRegions"]=$row[$j];
							break;
						case 9:
							$_SESSION["IDCertType"]=$row[$j];
							break;
						case 10:
							$_SESSION["IDNumber"]=$row[$j];
							break;
						case 11:
							$_SESSION["HKMRTW"]=$row[$j];
							break;
						case 12:
							$_SESSION["PoliticalState"]=$row[$j];
							break;
						case 13:
							$_SESSION["HealthState"]=$row[$j];
							break;
						case 14:
							$_SESSION["UsedName"]=$row[$j];
							break;
						case 15:
							$_SESSION["Period_of_Validity_of_IDCerf"]=$row[$j];
							break;
						case 16:
							$_SESSION["HukouPlace"]=$row[$j];
							break;
						case 17:
							$_SESSION["HukouState"]=$row[$j];
							break;
						case 18:
							$_SESSION["Specialty"]=$row[$j];
							break;
						case 20:
							$_SESSION["StudentID"]=$row[$j];
							break;
						case 21:
							$_SESSION["Grade"]=$row[$j];
							break;
						case 22:
							$_SESSION["Class"]=$row[$j];
							break;
						case 23:
							$_SESSION["Date_of_Admission"]=$row[$j];
							break;
						case 24:
							$_SESSION["Way_of_Admission"]=$row[$j];
							break;
						case 25:
							$_SESSION["Way_of_going_to_School"]=$row[$j];
							break;
						case 26:
							$_SESSION["StudentSource"]=$row[$j];
							break;
						case 27:
							$_SESSION["CurrentAddr"]=$row[$j];
							break;
						case 28:
							$_SESSION["MailingAddr"]=$row[$j];
							break;
						case 29:
							$_SESSION["HomeAddr"]=$row[$j];
							break;
						case 30:
							$_SESSION["PhoneNumber"]=$row[$j];
							break;
						case 31:
							$_SESSION["Postcode"]=$row[$j];
							break;
						case 32:
							$_SESSION["Email"]=$row[$j];
							break;
						case 33:
							$_SESSION["WebsiteAddr"]=$row[$j];
							break;
						case 34:
							$_SESSION["If_is_the_Only_One_Child"]=$row[$j];
							break;
						case 35:
							$_SESSION["If_Accepted_Preschool_Edu"]=$row[$j];
							break;
						case 36:
							$_SESSION["If_Stay_at_home_Child"]=$row[$j];
							break;
						case 37:
							$_SESSION["If_Child_of_Migrant_worker"]=$row[$j];
							break;
						case 38:
							$_SESSION["If_Orphan"]=$row[$j];
							break;
						case 39:
							$_SESSION["If_Child_of_Martyr"]=$row[$j];
							break;
						case 40:
							$_SESSION["If_learn_in_regular_class"]=$row[$j];
							break;
						case 41:
							$_SESSION["Kind_of_Disability"]=$row[$j];
							break;
						case 42:
							$_SESSION["If_gov_buy_XueWei"]=$row[$j];
							break;
						case 43:
							$_SESSION["If_Subvention_is_Needed"]=$row[$j];
							break;
						case 44:
							$_SESSION["If_has_Allowance"]=$row[$j];
							break;
						case 45:
							$_SESSION["Distance_To_School"]=$row[$j];
							break;
						case 46:
							$_SESSION["Transpotation_To_School"]=$row[$j];
							break;
						case 47:
							$_SESSION["If_Schoolbus_is_Needed"]=$row[$j];
							break;
						case 48:
							$_SESSION["Member_Name_1"]=$row[$j];
							break;
						case 49:
							$_SESSION["Member_Relationship_1"]=$row[$j];
							break;
						case 50:
							$_SESSION["Member_Relationship_Explanation_1"]=$row[$j];
							break;
						case 51:
							$_SESSION["Member_Nation_1"]=$row[$j];
							break;
						case 52:
							$_SESSION["Member_Workplace_1"]=$row[$j];
							break;
						case 53:
							$_SESSION["Member_CurrentAddr_1"]=$row[$j];
							break;
						case 54:
							$_SESSION["Member_HukouPlace_1"]=$row[$j];
							break;
						case 55:
							$_SESSION["Member_Phone_1"]=$row[$j];
							break;
						case 56:
							$_SESSION["If_Guardian_1"]=$row[$j];
							break;
						case 57:
							$_SESSION["Member_Job_1"]=$row[$j];
							break;
						case 58:
							$_SESSION["Member_IDNumber_1"]=$row[$j];
							break;
						case 59:
							$_SESSION["Member_Job_1"]=$row[$j];
							break;
						case 60:
							$_SESSION["Member_Name_2"]=$row[$j];
							break;
						case 61:
							$_SESSION["Member_Relationship_2"]=$row[$j];
							break;
						case 62:
							$_SESSION["Member_Relationship_Explanation_2"]=$row[$j];
							break;
						case 63:
							$_SESSION["Member_Nation_2"]=$row[$j];
							break;
						case 64:
							$_SESSION["Member_Workplace_2"]=$row[$j];
							break;
						case 65:
							$_SESSION["Member_CurrentAddr_2"]=$row[$j];
							break;
						case 66:
							$_SESSION["Member_HukouPlace_2"]=$row[$j];
							break;
						case 67:
							$_SESSION["Member_Phone_2"]=$row[$j];
							break;
						case 68:
							$_SESSION["If_Guardian_2"]=$row[$j];
							break;
						case 69:
							$_SESSION["Member_IDCertType_2"]=$row[$j];
							break;
						case 70:
							$_SESSION["Member_IDNumber_2"]=$row[$j];
							break;
						case 71:
							$_SESSION["Member_Job_2"]=$row[$j];
							break;
					}
				}
			}
		}
		
		function Export($TableName,$Filename)     //将MySQL以Excel文件的形式导出（非HTML标签形式）
		{
			$file_type = "vnd.ms-excel";
			$file_ending = "xls";
			if ($Filename==null or $Filename=="")
			{
				$SaveFilename=date("ymjhis");
			}
			else
			{
				$SaveFilename=$Filename;
			}
			header("Content-Type: application/$file_type;charset=utf8");
			header("Content-Disposition: attachment; filename=".$SaveFilename.".$file_ending"); 
			$now_date = date("Y-m-j H:i:s");
			$sql = "Select * from ".$TableName;       
			$result = mysql_query($sql) or die(mysql_error());
			$sep = "\t";
			for ($i = 0; $i < mysql_num_fields($result); $i++)
			{
				if ($TableName==SQL_INFO_TABLE_NAME)
				{
					switch (mysql_field_name($result,$i))    //将数据库中英文字段名变成可以看的东西
					{
						case "UserID":
							echo null;
							break;
						case "SchoolID":
							echo mb_convert_encoding("学校标识码","gbk","utf-8").$sep;
							break;
						case "Name":
							echo mb_convert_encoding("姓名","gbk","utf-8").$sep;
							break;
						case "UsedName":
							echo mb_convert_encoding("曾用名","gbk","utf-8").$sep;
							break;
						case "Nation":
							echo mb_convert_encoding("民族","gbk","utf-8").$sep;
							break;
						case "StateAndRegions":
							echo mb_convert_encoding("国籍/地区","gbk","utf-8").$sep;
							break;
						case "IDCertType":
							echo mb_convert_encoding("身份证件类型","gbk","utf-8").$sep;
							break;
						case "IDNumber":
							echo mb_convert_encoding("身份证件号","gbk","utf-8").$sep;
							break;
						case "BirthplaceCode":
							echo mb_convert_encoding("出生地行政区划代码","gbk","utf-8").$sep;
							break;
						case "NativePlace":
							echo mb_convert_encoding("籍贯","gbk","utf-8").$sep;
							break;
						case "HKMRTW":
							echo mb_convert_encoding("港澳台侨外","gbk","utf-8").$sep;
							break;
						case "PoliticalState":
							echo mb_convert_encoding("政治面貌","gbk","utf-8").$sep;
							break;
						case "HealthState":
							echo mb_convert_encoding("健康状况","gbk","utf-8").$sep;
							break;
						case "Birthday":
							echo mb_convert_encoding("出生日期","gbk","utf-8").$sep;
							break;
						case "Gender":
							echo mb_convert_encoding("性别","gbk","utf-8").$sep;
							break;
						case "HukouPlace":
							echo mb_convert_encoding("户口所在地行政区划","gbk","utf-8").$sep;
							break;
						case "HukouState":
							echo mb_convert_encoding("户口性质","gbk","utf-8").$sep;
							break;
						case "Period_of_Validity_of_IDCerf":
							echo mb_convert_encoding("身份证件有效期","gbk","utf-8").$sep;
							break;
						case "Specialty":
							echo mb_convert_encoding("特长","gbk","utf-8").$sep;
							break;
						case "Date_of_Admission":
							echo mb_convert_encoding("入学年月","gbk","utf-8").$sep;
							break;
						case "StudentID":
							echo mb_convert_encoding("班内学号","gbk","utf-8").$sep;
							break;
						case "Way_of_Admission":
							echo mb_convert_encoding("入学方式","gbk","utf-8").$sep;
							break;
						case "Grade":
							echo mb_convert_encoding("年级","gbk","utf-8").$sep;
							break;
						case "Way_of_going_to_School":
							echo mb_convert_encoding("就读方式","gbk","utf-8").$sep;
							break;
						case "Class":
							echo mb_convert_encoding("班级","gbk","utf-8").$sep;
							break;
						case "StudentSource":
							echo mb_convert_encoding("学生来源","gbk","utf-8").$sep;
							break;
						case "CurrentAddr":
							echo mb_convert_encoding("现住址","gbk","utf-8").$sep;
							break;
						case "Postcode":
							echo mb_convert_encoding("邮政编码","gbk","utf-8").$sep;
							break;
						case "MailingAddr":
							echo mb_convert_encoding("通信地址","gbk","utf-8").$sep;
							break;
						case "Email":
							echo mb_convert_encoding("电子信箱","gbk","utf-8").$sep;
							break;
						case "HomeAddr":
							echo mb_convert_encoding("家庭地址","gbk","utf-8").$sep;
							break;
						case "WebsiteAddr":
							echo mb_convert_encoding("主页地址","gbk","utf-8").$sep;
							break;
						case "PhoneNumber":
							echo mb_convert_encoding("联系电话","gbk","utf-8").$sep;
							break;
						case "If_is_the_Only_One_Child":
							echo mb_convert_encoding("是否独生子女","gbk","utf-8").$sep;
							break;
						case "If_learn_in_regular_class":
							echo mb_convert_encoding("随班就读","gbk","utf-8").$sep;
							break;
						case "If_Accepted_Preschool_Edu":
							echo mb_convert_encoding("是否受过学前教育","gbk","utf-8").$sep;
							break;
						case "Kind_of_Disability":
							echo mb_convert_encoding("残疾类型","gbk","utf-8").$sep;
							break;
						case "If_Stay_at_home_Child":
							echo mb_convert_encoding("是否留守儿童","gbk","utf-8").$sep;
							break;
						case "If_gov_buy_XueWei":
							echo mb_convert_encoding("是否由政府购买学位","gbk","utf-8").$sep;
							break;
						case "If_Child_of_Migrant_worker":
							echo mb_convert_encoding("是否进城务工人员随迁子女","gbk","utf-8").$sep;
							break;
						case "If_Subvention_is_Needed":
							echo mb_convert_encoding("是否需要申请资助","gbk","utf-8").$sep;
							break;
						case "If_Orphan":
							echo mb_convert_encoding("是否孤儿","gbk","utf-8").$sep;
							break;
						case "If_has_Allowance":
							echo mb_convert_encoding("是否享受一补","gbk","utf-8").$sep;
							break;
						case "If_Child_of_Martyr":
							echo mb_convert_encoding("是否烈士或优抚子女","gbk","utf-8").$sep;
							break;
						case "Distance_To_School":
							echo mb_convert_encoding("上下学距离","gbk","utf-8").$sep;
							break;
						case "If_Schoolbus_is_Needed":
							echo mb_convert_encoding("是否需要乘坐校车","gbk","utf-8").$sep;
							break;
						case "Transpotation_To_School":
							echo mb_convert_encoding("上下学方式","gbk","utf-8").$sep;
							break;
						case "Member_Name_1":
							echo mb_convert_encoding("成员1姓名","gbk","utf-8").$sep;
							break;
						case "Member_HukouPlace_1":
							echo mb_convert_encoding("成员1户口所在地行政区划","gbk","utf-8").$sep;
							break;
						case "Member_Relationship_1":
							echo mb_convert_encoding("成员1关系","gbk","utf-8").$sep;
							break;
						case "Member_Phone_1":
							echo mb_convert_encoding("成员1联系电话","gbk","utf-8").$sep;
							break;
						case "Member_Relationship_Explanation_1":
							echo mb_convert_encoding("成员1关系说明","gbk","utf-8").$sep;
							break;
						case "If_Guardian_1":
							echo mb_convert_encoding("成员1是否监护人","gbk","utf-8").$sep;
							break;
						case "Member_Nation_1":
							echo mb_convert_encoding("成员1民族","gbk","utf-8").$sep;
							break;
						case "Member_IDCertType_1":
							echo mb_convert_encoding("成员1身份证件类型","gbk","utf-8").$sep;
							break;
						case "Member_Workplace_1":
							echo mb_convert_encoding("成员1工作单位","gbk","utf-8").$sep;
							break;
						case "Member_IDNumber_1":
							echo mb_convert_encoding("成员1身份证件号","gbk","utf-8").$sep;
							break;
						case "Member_CurrentAddr_1":
							echo mb_convert_encoding("成员1现住址","gbk","utf-8").$sep;
							break;
						case "Member_Job_1":
							echo mb_convert_encoding("成员1职务","gbk","utf-8").$sep;
							break;
						case "Member_Name_2":
							echo mb_convert_encoding("成员2姓名","gbk","utf-8").$sep;
							break;
						case "Member_HukouPlace_2":
							echo mb_convert_encoding("成员2户口所在地行政区划","gbk","utf-8").$sep;
							break;
						case "Member_Relationship_2":
							echo mb_convert_encoding("成员2关系","gbk","utf-8").$sep;
							break;
						case "Member_Phone_2":
							echo mb_convert_encoding("成员2联系电话","gbk","utf-8").$sep;
							break;
						case "Member_Relationship_Explanation_2":
							echo mb_convert_encoding("成员2关系说明","gbk","utf-8").$sep;
							break;
						case "If_Guardian_2":
							echo mb_convert_encoding("成员2是否监护人","gbk","utf-8").$sep;
							break;
						case "Member_Nation_2":
							echo mb_convert_encoding("成员2民族","gbk","utf-8").$sep;
							break;
						case "Member_IDCertType_2":
							echo mb_convert_encoding("成员2身份证件类型","gbk","utf-8").$sep;
							break;
						case "Member_Workplace_2":
							echo mb_convert_encoding("成员2工作单位","gbk","utf-8").$sep;
							break;
						case "Member_IDNumber_2":
							echo mb_convert_encoding("成员2身份证件号","gbk","utf-8").$sep;
							break;
						case "Member_CurrentAddr_2":
							echo mb_convert_encoding("成员2现住址","gbk","utf-8").$sep;
							break;
						case "Member_Job_2":
							echo mb_convert_encoding("成员2职务","gbk","utf-8").$sep;
							break;
						case "AuxiliaryNumber":
							echo mb_convert_encoding("学籍辅号","gbk","utf-8").$sep;
							break;
						default:
							echo mysql_field_name($result,$i);
					}     
				}
				else if($TableName==SQL_USER_TABLE_NAME)
				{
					switch (mysql_field_name($result,$i))
					{
						case "id":
							echo mb_convert_encoding("ID","gbk","utf-8").$sep;
							break;
						case "password":
							echo mb_convert_encoding("密码","gbk","utf-8").$sep;
							break;
				}
				}
			}
			print("\r\n");
			$i = 0;
			while($row = mysql_fetch_row($result))
			{
			$schema_insert = "";
			for($j=0; $j<mysql_num_fields($result);$j++)
			{
				if(!isset($row[$j]))
					$schema_insert .= "NULL".$sep;
				elseif ($row[$j] != "")
					if (ctype_digit($row[$j]) and strlen($row[$j])>="10")
					{
						if ($TableName==SQL_INFO_TABLE_NAME and strlen($row[$j])=="12" and substr($row[$j],0,8)=="13220043")  //只有在信息表中才不输出以13220043开头的ID，否则调用该函数输出用户表时会出错
						{
							$schema_insert .= $sep;
						}
						else
						{
							$schema_insert .= "'".mb_convert_encoding($row[$j],"gbk","utf-8").$sep;
						}
					}
					else
					{
						$schema_insert .= mb_convert_encoding($row[$j],"gbk","utf-8").$sep;
					}
				else
					$schema_insert .= "".$sep;
			}
			$schema_insert = str_replace($sep."$", $sep, $schema_insert);
			$schema_insert .= "\t";
			print(trim($schema_insert));
			print "\r\n";
			$i++;
			}
			return (true);
		}
		
		function ClearAllInformation()
		{
			DatabaseOperation::Connect("WRITE");
			$sql="DELETE FROM ".SQL_USER_TABLE_NAME;
			mysql_query($sql);
			//$sql="DELETE FROM ".SQL_INFO_TABLE_NAME;
			//mysql_query($sql);
		}
	}
	class FrontOperation
	{
		function Echo_TextBox($TextboxName,$SessionName)
		//动态生成文本框，以实现在返回上一步时将之前填写过的内容填入文本框中
		//参数解释:
		//	TextboxName：指定要输出的文本框的名称，eg：txt_Member_Name_1
		//	SessionName：指定文本框所对应的session的名称，eg：Member_Name_1
		//	Step：指定文本框在哪一步中，eg：1
		{
			$EchoControl="<input name=\"".$TextboxName."\" type=\"text\" id=\"".$TextboxName."\" ";
			$EchoControl.="value=\"".$_SESSION[$SessionName]."\"";
			$EchoControl.=">";
			echo $EchoControl;
			$EchoControl="";
		}
		
		function JumpTo($Target)  //跳转到指定页面，$Target需包含后缀名
		{
			echo "<script language='javascript'>";
			echo "window.location.href='$Target'";
			echo "</script>";
		}
		
		function VerifyIdentity($Identity)
		{
			if (!$_SESSION)
			{
				if ($Identity=="USER")
				{
					$this->JumpTo("index.php");
					exit();
				}
				elseif ($Identity=="MANAGER")
				{
					header("HTTP/1.1 403 Forbidden");
					exit();
				}
			}
			DatabaseOperation::Connect("READ");
			$CurrentUserIdentity=DatabaseOperation::if_user_is_exist($_SESSION["ID"],$_SESSION["password"]);
			if ($CurrentUserIdentity>=0 and $Identity=="MANAGER")
			{
				header("HTTP/1.1 403 Forbidden");
				exit();
			}
		}
		
		function Logout()
		{
			session_start();
			$_SESSION=array();
			session_destroy();
		}
	}
?>