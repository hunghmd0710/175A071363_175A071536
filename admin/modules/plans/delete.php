<?php
require_once("inc_security.php");
$pla_id        = getValue("id", "int", "GET", 0);

//Lay du lieu tin can sua
$query      = "SELECT * FROM plans WHERE pla_id = " . $pla_id;
$dataPla  = $database->getOneRow($query);
if(count($dataPla) <=0 ){
   echo 'Không có tên môn học';
   die();
}
//Lay du lieu tin can sua
      $query      = "DELETE FROM plans WHERE pla_id = " . $pla_id;
      $dataSub = $database->execute($query);

      redirect("/admin/modules/plans/listing.php");
?>