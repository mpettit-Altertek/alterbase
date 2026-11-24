<?php
// Version
define('VERSION', '1.0.0');

// Configuration
if (is_file('config.php')) {
	require_once('config.php');
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Startup
require_once(DIR_SYSTEM . 'startup.php');

start('admin');