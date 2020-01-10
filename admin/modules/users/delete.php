<?php
require_once("inc_security.php");
$use_id        = getValue("id", "int", "GET", 0);

//Lay du lieu tin can sua
$query      = "SELECT * FROM users WHERE use_id = " . $use_id;
$dataUse  = $database->getOneRow($query);
if(count($dataUse) <=0 ){
   echo 'Không có tên sinh viên';
   die();
}
//Lay du lieu tin can sua
      $query      = "DELETE FROM users WHERE use_id = " . $use_id;
      $dataUse = $database->execute($query);

      redirect("/admin/modules/users/listing.php");
?>