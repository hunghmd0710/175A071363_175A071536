<?php
require_once("../../core/config.php");

$module_id     = "sub_id";
$moduleTable   = "subjects";

$modulePath    = $admRoot . 'subjects/';
$moduleListing = $modulePath . "listing.php";

if($logged != 1){
   redirect($urlLogin);
   exit();
}

?>