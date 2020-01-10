<?php
require_once("../../core/config.php");

$module_id     = "new_id";
$moduleTable   = "news";

$modulePath    = $admRoot . 'news/';
$moduleListing = $modulePath . "listing.php";

if($logged != 1){
   redirect($urlLogin);
   exit();
}

?>