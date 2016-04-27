<?php

session_start();

defined('DOC_ROOT') || define('DOC_ROOT', __DIR__);
define('HTTP_ROOT', $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']));

$Root_Path = "http://".$_SERVER['SERVER_NAME']."/"; 
$siteName = '';
$metaKeywords = '';
$copyright = '';
$web_url = '';
$url_create_date = '';
$type_web = '';
$adminEmail = '';
$active_theme = '';

//Title
$title = '';
$metaDescription = '';
 
?>
 
