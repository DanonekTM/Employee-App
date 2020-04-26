<?php

// Config
define("DB_HOST", "127.0.0.1:1337");
define("DB_USER", "root");
define("DB_PASS", "localhost");
define("DB_NAME", "employee_app");

// Load bcrypt hashing
if (version_compare(PHP_VERSION, '5.3.7', '<'))
{
	exit("PHP version 5.3.7 or newer required!");
}
else if (version_compare(PHP_VERSION, '5.5.0', '<'))
{
	require_once("libraries/password_compatibility_library.php");
}

// Load classes
spl_autoload_register(function($class)
{
    require_once 'classes/' . $class . '.php';
});