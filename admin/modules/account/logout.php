<?php
require_once("inc_security.php");
$_SESSION["logged"]     = 0;
$_SESSION["adm_id"]   = 0;
$_SESSION["adm_name"]   = '';
redirect($urlLogin);
exit();
?>