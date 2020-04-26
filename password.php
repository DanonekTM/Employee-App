<?php

require_once("core/init.php");

$login = new Login();
$functions = new Functions();

$file_included = true;

if (isset($_GET["token"], $_POST['old_password'], $_POST['new_password']) && !empty($_SESSION['token']) && strcasecmp($_SESSION['token'], $_GET["token"]) == 0)
{
	$samePass = $functions->isSamePass($_POST['old_password'], $_POST['new_password'], $_SESSION['token']);
}

if ($login->isUserLoggedIn())
{
	include("pages/change_password.php");
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