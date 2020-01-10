<?php
require_once("inc_security.php");
$sub_id        = getValue("id", "int", "GET", 0);

//Lay du lieu tin can sua
$query      = "SELECT * FROM subjects WHERE sub_id = " . $sub_id;
$dataSub  = $database->getOneRow($query);
if(count($dataSub) <=0 ){
   echo 'Không có tên môn học';
   die();
}
//Lay du lieu tin can sua
      $query      = "DELETE FROM subjects WHERE sub_id = " . $sub_id;
      $dataSub = $database->execute($query);

      redirect("/admin/modules/subjects/listing.php");
?>