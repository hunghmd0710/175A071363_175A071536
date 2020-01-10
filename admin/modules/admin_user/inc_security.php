<?php
require_once("../../core/config.php");

$module_id     = "adm_id";
$moduleTable   = "admin";

$modulePath    = $admRoot . 'admin/';
$moduleListing = $modulePath . "listing.php";

if($logged != 1){
   redirect($urlLogin);
   exit();
}

?>