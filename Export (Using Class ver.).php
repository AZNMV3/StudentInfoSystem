<?php
	require("conn.php");
	$db=new DatabaseOperation;
	$db->connect(READ);
	$db->Export(SQL_INFO_TABLE_NAME);
?>