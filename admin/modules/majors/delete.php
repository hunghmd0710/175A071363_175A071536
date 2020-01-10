<?php
require_once("inc_security.php");
$maj_id        = getValue("id", "int", "GET", 0);

//Lay du lieu tin can sua
$query      = "SELECT * FROM majors WHERE maj_id = " . $maj_id;
$dataMaj  = $database->getOneRow($query);
if(count($dataMaj) <=0 ){
   echo 'Không có tên ngành học';
   die();
}
//Lay du lieu tin can sua
      $query      = "DELETE FROM majors WHERE maj_id = " . $maj_id;
      $dataMaj = $database->execute($query);

      redirect("/admin/modules/majors/listing.php");
?>