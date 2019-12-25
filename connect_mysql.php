<?php
require_once "../config/config.php";

$sql	= "SELECT * FROM news ORDER BY new_id";
$result = $database->query($sql);
var_dump($result);

?>