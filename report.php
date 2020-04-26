<?php

require_once("core/init.php");

$login = new Login();
$functions = new Functions();

$file_included = true;

if (isset($_GET['userId']) && $login->isUserLoggedIn())
{	
	$report = $functions->getReport($_GET['userId']);
	$employee_info = $functions->getEmployeeInfoById($_GET['userId']);
	
	include("pages/employee_report.php");
}
else if ($login->isUserLoggedIn())
{
	include("pages/employee_report_view.php");
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