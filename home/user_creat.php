<?php
require_once "../config/config.php";

$sql	= "INSERT INTO users (use_name,use_login_name,use_password) 
			VALUES ('Hung','hungdm','123456');";
$result = $database->execute($sql);
var_dump($result);

?>