<?php

require_once("core/init.php");

$login = new Login();
$functions = new Functions();

$file_included = true;

if (isset($_SESSION['session_started']))
{
	if ($login->isUserLoggedIn())
	{
		include("pages/control_panel.php");
	}
}
else if ($login->isUserLoggedIn())
{
	if ($login->isUserLoggedIn())
	{
		$_SESSION['session_started'] = true;
		$functions->databaseSession("start");
		include("pages/control_panel.php");
	}
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