<?php
	require("conn.php");
	$SaveFilename=date("ymjhis");
	$db=new DatabaseOperation;
	$db->Connect("READ");
	$file_type = "vnd.ms-excel";      
	$file_ending = "xls";  
	header("Content-Type: application/$file_type;charset=utf8");   
	header("Content-Disposition: attachment; filename=".$SaveFilename.".$file_ending"); 
	//echo "<html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\">";
	//header("Pragma: no-cache");            
	$now_date = date("Y-m-j H:i:s");       
	//$title = "数据库名:SQL_DATABASE,数据表:SQL_INFO_TABLE_NAME,备份日期:$now_date";       
	$sql = "Select * from ".SQL_INFO_TABLE_NAME;       
	$ALT_Db = mysql_select_db(SQL_DATABASE) or die("Couldn't select database");
	$result = mysql_query($sql) or die(mysql_error());    
	//echo("$title\r\n");       
	$sep = "\t";       
	for ($i = 0; $i < mysql_num_fields($result); $i++) {
		if (
		switch (mysql_field_name($result,$i))
		{
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
				$schema_insert .= "'".mb_convert_encoding($row[$j],"gbk","utf-8").$sep;
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
?>
