<?php
	require("conn.php");
	$fo=new FrontOperation;
	$fo->Logout();
	$fo->JumpTo("index.php");
?>
