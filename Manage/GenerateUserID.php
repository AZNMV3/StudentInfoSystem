<?php
	function FormatNum($num)
	{
		$str=strval($num);
		if (ctype_digit(($str)))
		{
			if ($num>0 and $num<10)
			{
				return "000".$str;
			}
			elseif ($num>=10 and $num<100)
			{
				return "00".$str;
			}
			elseif ($num>=100 and $num<1000)
			{
				return "0".$str;
			}
		}
		else
		{
			return "Function FormatNum Error : The parameter is not a positive integer";
		}
	}
	require("../conn.php");
	session_start();
	$db=new DatabaseOperation;
	$fo=new FrontOperation;
	$fo->VerifyIdentity("MANAGER");
	$db->Connect("RW");
	//if ($_POST)
	//{
		$sql="DELETE FROM ".SQL_USER_TABLE_NAME;
		mysql_query($sql);   //先将用户表中原有内容清空
		//for ($i=1; $i<$_POST["txt_Num_of_Student"]+1; $i++)
		for ($i=1; $i<$_GET["txt_Num_of_Student"]+1; $i++)
		{
			$UserIDList[$i]="13220043".FormatNum($i);
			$PasswordList[$i]=strval(rand(10000000,99999999));
			$sql="INSERT INTO ".SQL_USER_TABLE_NAME." ";
			$sql.="(`id`, `password`) VALUES "."('$UserIDList[$i]', '$PasswordList[$i]')";
			mysql_query($sql);
		}
		$db->Export(SQL_USER_TABLE_NAME,mb_convert_encoding("学生账号列表","gbk","utf-8"));
		//for ($i=1; $i<$_POST["txt_Num_of_Student"]+1; $i++)
		for ($i=1; $i<$_GET["txt_Num_of_Student"]+1; $i++)    //将密码经过MD5加密后再更新数据库，使得数据库中存储的是加密后的数据
		{
			$PasswordList[$i]=md5($PasswordList[$i]);
			$sql="UPDATE ".SQL_USER_TABLE_NAME." SET ";
			$sql.="`id`='$UserIDList[$i]', `password`='$PasswordList[$i]'";
			$sql.=" WHERE `id`='$UserIDList[$i]'";
			mysql_query($sql);
		}
	//}
?>