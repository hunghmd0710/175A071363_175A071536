<?php
require_once("inc_security.php");
$new_id        = getValue("id", "int", "GET", 0);

//Lay du lieu tin can sua
$query      = "SELECT * FROM news WHERE new_id = " . $new_id;
$dataMaj  = $database->getOneRow($query);
if(count($dataMaj) <=0 ){
   echo 'Không có tên ngành học';
   die();
}
//Lay du lieu tin can sua
      $query      = "DELETE FROM news WHERE new_id = " . $new_id;
      $dataMaj = $database->execute($query);

      redirect("/admin/modules/news/listing.php");
?>