<?php
require_once("../../core/config.php");

$module_id     = "use_id";
$moduleTable   = "users";

$modulePath    = $admRoot . 'users/';
$moduleListing = $modulePath . "listing.php";

if($logged != 1){
   redirect($urlLogin);
   exit();
}

?>