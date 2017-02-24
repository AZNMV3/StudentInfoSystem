<?php
	require("conn.php");
	$Html="<html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\"><body>"."\r\n";
	$Html.="<table width=\"700\" border=\"1\" align=\"center\" cellpadding=\"2\" cellspacing=\"1\">"."\r\n";
	$Html.="<tr align=\"center\">"."\r\n";
	$db=new DatabaseOperation;
	$db->Connect("READ");
	$sql="select * from ".SQL_INFO_TABLE_NAME;
	$result = mysql_query($sql);
	for ($i = 0; $i < mysql_num_fields($result); $i++)
	{
		$Html.="<td align=\"center\" nowrap=\"nowrap\">";
		switch (mysql_field_name($result,$i))
		{
			case "SchoolID":
				$Html.="学校标识码";
				break;
			case "Name":
				$Html.="姓名";
				break;
			case "UsedName":
				$Html.="曾用名";
				break;
			case "Nation":
				$Html.="民族";
				break;
			case "StateAndRegions":
				$Html.="国籍/地区";
				break;
			case "IDCertType":
				$Html.="身份证件类型";
				break;
			case "IDNumber":
				$Html.="身份证件号";
				break;
			case "BirthplaceCode":
				$Html.="出生地行政区划代码";
				break;
			case "NativePlace":
				$Html.="籍贯";
				break;
			case "HKMRTW":
				$Html.="港澳台侨外";
				break;
			case "PoliticalState":
				$Html.="政治面貌";
				break;
			case "HealthState":
				$Html.="健康状况";
				break;
			case "Birthday":
				$Html.="出生日期";
				break;
			case "Gender":
				$Html.="性别";
				break;
			case "HukouPlace":
				$Html.="户口所在地行政区划";
				break;
			case "HukouState":
				$Html.="户口性质";
				break;
			case "Period_of_Validity_of_IDCerf":
				$Html.="身份证件有效期";
				break;
			case "Specialty":
				$Html.="特长";
				break;
			case "Date_of_Admission":
				$Html.="入学年月";
				break;
			case "StudentID":
				$Html.="班内学号";
				break;
			case "Way_of_Admission":
				$Html.="入学方式";
				break;
			case "Grade":
				$Html.="年级";
				break;
			case "Way_of_going_to_School":
				$Html.="就读方式";
				break;
			case "Class":
				$Html.="班级";
				break;
			case "StudentSource":
				$Html.="学生来源";
				break;
			case "CurrentAddr":
				$Html.="现住址";
				break;
			case "Postcode":
				$Html.="邮政编码";
				break;
			case "MailingAddr":
				$Html.="通信地址";
				break;
			case "Email":
				$Html.="电子信箱";
				break;
			case "HomeAddr":
				$Html.="家庭地址";
				break;
			case "WebsiteAddr":
				$Html.="主页地址";
				break;
			case "PhoneNumber":
				$Html.="联系电话";
				break;
			case "If_is_the_Only_One_Child":
				$Html.="是否独生子女";
				break;
			case "If_learn_in_regular_class":
				$Html.="随班就读";
				break;
			case "If_Accepted_Preschool_Edu":
				$Html.="是否受过学前教育";
				break;
			case "Kind_of_Disability":
				$Html.="残疾类型";
				break;
			case "If_Stay_at_home_Child":
				$Html.="是否留守儿童";
				break;
			case "If_gov_buy_XueWei":
				$Html.="是否由政府购买学位";
				break;
			case "If_Child_of_Migrant_worker":
				$Html.="是否进城务工人员随迁子女";
				break;
			case "If_Subvention_is_Needed":
				$Html.="是否需要申请资助";
				break;
			case "If_Orphan":
				$Html.="是否孤儿";
				break;
			case "If_has_Allowance":
				$Html.="是否享受一补";
				break;
			case "If_Child_of_Martyr":
				$Html.="是否烈士或优抚子女";
				break;
			case "Distance_To_School":
				$Html.="上下学距离";
				break;
			case "If_Schoolbus_is_Needed":
				$Html.="是否需要乘坐校车";
				break;
			case "Transpotation_To_School":
				$Html.="上下学方式";
				break;
			case "Member_Name_1":
				$Html.="成员1姓名";
				break;
			case "Member_HukouPlace_1":
				$Html.="成员1户口所在地行政区划";
				break;
			case "Member_Relationship_1":
				$Html.="成员1关系";
				break;
			case "Member_Phone_1":
				$Html.="成员1联系电话";
				break;
			case "Member_Relationship_Explanation_1":
				$Html.="成员1关系说明";
				break;
			case "If_Guardian_1":
				$Html.="成员1是否监护人";
				break;
			case "Member_Nation_1":
				$Html.="成员1民族";
				break;
			case "Member_IDCertType_1":
				$Html.="成员1身份证件类型";
				break;
			case "Member_Workplace_1":
				$Html.="成员1工作单位";
				break;
			case "Member_IDNumber_1":
				$Html.="成员1身份证件号";
				break;
			case "Member_CurrentAddr_1":
				$Html.="成员1现住址";
				break;
			case "Member_Job_1":
				$Html.="成员1职务";
				break;
			case "Member_Name_2":
				$Html.="成员2姓名";
				break;
			case "Member_HukouPlace_2":
				$Html.="成员2户口所在地行政区划";
				break;
			case "Member_Relationship_2":
				$Html.="成员2关系";
				break;
			case "Member_Phone_2":
				$Html.="成员2联系电话";
				break;
			case "Member_Relationship_Explanation_2":
				$Html.="成员2关系说明";
				break;
			case "If_Guardian_2":
				$Html.="成员2是否监护人";
				break;
			case "Member_Nation_2":
				$Html.="成员2民族";
				break;
			case "Member_IDCertType_2":
				$Html.="成员2身份证件类型";
				break;
			case "Member_Workplace_2":
				$Html.="成员2工作单位";
				break;
			case "Member_IDNumber_2":
				$Html.="成员2身份证件号";
				break;
			case "Member_CurrentAddr_2":
				$Html.="成员2现住址";
				break;
			case "Member_Job_2":
				$Html.="成员2职务";
				break;
			case "AuxiliaryNumber":
				$Html.="学籍辅号";
				break;
			default:
				$Html.=mysql_field_name($result,$i);
		}
	}
		$Html.="</td>"."\r\n";
		$Html.="</tr>"."\r\n";
		$i=0;
		while($row = mysql_fetch_row($result)) 
		{   
			$Html.="<tr align=\"center\">"."\r\n";
			for($j=0; $j<mysql_num_fields($result);$j++) 
			{   
				$schema_insert = "";  
				$Html.="<td align=\"center\" nowrap=\"nowrap\">";
				if(!isset($row[$j]))       
					$schema_insert .= "NULL";       
				elseif ($row[$j] != "") 
					if (ctype_digit($row[$j]) and strlen($row[$j])>="10")
					{
						$schema_insert .= "'"."$row[$j]"; 
					}
					else
					{
						$schema_insert .= "$row[$j]";
					}
				else       
					$schema_insert .= "";
				$schema_insert = str_replace("$", "", $schema_insert);
				$Html.=$schema_insert;	
				$Html.="</td>"."\r\n";
			}
			$Html.="</tr>"."\r\n";
			$i++;       
		}
		$Html.='</table>';
		$Html.='</body></html>';
		
		$SaveFilename=date("ymjhis");
		$mime_type = 'application/vnd.ms-excel';
		header('Content-Type: ' . $mime_type);
		header('Content-Disposition: attachment; filename='.$SaveFilename.'.xls"');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		echo $Html;
?>