<?php

require_once("core/init.php");

$login = new Login();
$functions = new Functions();
$file_included = true;

if ($login->isUserLoggedIn())
{
	include("pages/logged_in.php");
}
else
{
	include("pages/not_logged_in.php");
}