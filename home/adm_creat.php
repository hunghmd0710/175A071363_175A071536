<?php
require_once "../config/config.php";

$sql	= "INSERT INTO admin (adm_name,adm_login_name,adm_password) 
			VALUES ('Hungdong','admin1','123456');";
$result = $database->execute($sql);
var_dump($result);

?>