<?php
require_once("../../core/config.php");

$module_id     = "pla_id";
$moduleTable   = "plans";

$modulePath    = $admRoot . 'plans/';
$moduleListing = $modulePath . "listing.php";

if($logged != 1){
   redirect($urlLogin);
   exit();
}

?>