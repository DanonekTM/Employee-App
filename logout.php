<?php

require_once("core/init.php");

$login = new Login();
$functions = new Functions();

if ($login->isUserLoggedIn())
{
	if (isset($_GET["token"]) && !empty($_SESSION['token']) && strcasecmp($_SESSION['token'], $_GET["token"]) == 0)
	{
		if (isset($_SESSION['session_started']) && $_SESSION['session_started'])
		{
			$functions->databaseSession("stop");
		}
		$login->doLogout();
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