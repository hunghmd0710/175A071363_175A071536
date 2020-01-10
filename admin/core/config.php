<?php
session_start();	
error_reporting(E_ALL);
require_once("../../../classes/database.php");
require_once("../../../functions/functions.php");
require_once("../../../functions/rewrite_url.php");

$database            = new database();

$admRoot             = "/admin/modules/";
$con_project_title   = "BTL";
$page_title          = $con_project_title;
$con_mini_title      = "Admin";
$url_now             = getURL(1,1,1,1);         

$urlLogin            = "/admin/modules/account/login.php";
$urlLogout           = "/admin/modules/account/logout.php";
$urlDefaul           = "/admin/modules/account/info.php";
$urlInfo             = "/admin/modules/account/info.php";
$urlUpdateInfo       = "/admin/modules/account/update_info.php";
$urlChangePass       = "/admin/modules/account/change_pass.php";
$ajaPath             = "/admin/modules/ajax/";

$adm_name     	= getValue("adm_name", "str", "SESSION", '');
$adm_id     	= getValue("adm_id", "str", "SESSION", 0);
$logged     	= getValue("logged", "str", "SESSION", 0);
$adm_type		= getValue("adm_type", "str", "SESSION", 0);
$arrAdminType	= array('1' => 'Quản trị', 2 => 'Quản lý', 3 => 'Giáo viên');

ob_clean();                                     

?>