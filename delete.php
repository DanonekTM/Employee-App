<?php

require_once("core/init.php");

$login = new Login();
$functions = new Functions();

$file_included = true;

if (isset($_GET["token"], $_GET['userId']) && !empty($_SESSION['token']) && strcasecmp($_SESSION['token'], $_GET["token"]) == 0)
{
	$deletedStatus = $functions->deleteEmployee($_GET['userId']);
}

if ($login->isUserLoggedIn())
{
	include("pages/delete_employee.php");
}
else
{
?>
	<html>
	<head><title>404 Not Found</title></head>
	<body bgcolor="white">
	<center><h1>404 Not Found</h1></center>
	<hr><center>nginx</center>
	</body>
	</html>
	<!-- a padding to disable MSIE and Chrome friendly error page -->
	<!-- a padding to disable MSIE and Chrome friendly error page -->
	<!-- a padding to disable MSIE and Chrome friendly error page -->
	<!-- a padding to disable MSIE and Chrome friendly error page -->
	<!-- a padding to disable MSIE and Chrome friendly error page -->
	<!-- a padding to disable MSIE and Chrome friendly error page -->
<?php
}
?>