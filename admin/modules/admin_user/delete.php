<?php
require_once("inc_security.php");
$adm_id        = getValue("id", "int", "GET", 0);

//Lay du lieu tin can sua
$query      = "SELECT * FROM admin WHERE adm_id = " . $adm_id;
$dataadm  = $database->getOneRow($query);
if(count($dataadm) <=0 ){
   echo 'Khong co ten adm';
   die();
}
//Lay du lieu tin can sua
      $query      = "DELETE FROM admin WHERE adm_id = " . $adm_id;
      $dataadm = $database->execute($query);

      redirect("/admin/modules/admin_user/listing.php");
?>