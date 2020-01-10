<?php
require_once("../../core/config.php");

$module_id     = "maj_id";
$moduleTable   = "majors";

$modulePath    = $admRoot . 'majors/';
$moduleListing = $modulePath . "listing.php";

if($logged != 1){
   redirect($urlLogin);
   exit();
}

?>