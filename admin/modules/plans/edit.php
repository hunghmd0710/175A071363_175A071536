<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');
$query      = "SELECT * FROM subjects ";
$dataSub    = $database->query($query);
$arrSub     = [];
foreach ($dataSub as $key => $row) {
   $sub_id     = $row['sub_id'];
   $sub_name   = $row['sub_name'];
   $arrSub[$sub_id]  = $sub_name;
}  
$pla_id        = getValue("id", "int", "GET", 0);

//Lay du lieu tin can sua
$query      = "SELECT * FROM plans WHERE pla_id = " . $pla_id;
$dataPla  = $database->getOneRow($query);


if(count($dataPla) <=0 ){
   echo 'Không có ngành học';
   die();
}
$pla_date          = getValue("pla_date", "str", "POST", "", 1);
$pla_did           = getValue("pla_did", "str", "POST", "", 1);
$pla_time          = getValue("pla_time", "str", "POST", "", 1);
$action            = getValue("action", "str", "POST", "");
$pla_sub_id       = getValue("pla_sub_id", "int", "POST", "", 1);
if($action == "edit"){
   if( $pla_date  != ''){
      $sql  = "UPDATE  plans SET pla_date  = '" . $pla_date  . "',
      pla_did = '" . $pla_did . "',pla_time = '" . $pla_time  . "',pla_sub_id = '" . $pla_sub_id  . "'
      WHERE pla_id = " . $pla_id ;
      $result = $database->execute($sql);
      echo 'Đã cập nhật thành công';
      //Lay du lieu tin can sua
      $query      = "SELECT * FROM plans WHERE pla_id = " . $pla_id;
      $dataPla  = $database->getOneRow($query);

      redirect("/admin/modules/plans/listing.php");
   }else{
      echo 'Chưa nhập tên';
   }
}   
?>
<div class="container">
  <h1>Sửa thông tin</h1>
  <hr>
  <div class="row">
   <div class="col-md-9 personal-info">
    <h3>Sủa thông tin</h3>
    <form action="" method="POST" class="form-horizontal" role="form">

      <div class="form-group">
         <label class="col-lg-3 control-label">Môn học</label>
         <div class="col-lg-8">
          <select name="pla_sub_id">
                  <?php
                  foreach ($arrSub as $key => $value) {
                     ?>
                     <option value="<?=$key?>"><?=$value?></option>
                     <?php
                  }
                  ?>
            </select>
       </div>
    </div>
    <div class="form-group">
    <label class="col-lg-3 control-label">Ngày:</label>
    <div class="col-lg-8">
       <input class="form-control" type="text" name="pla_date" value="<?=$dataPla['pla_date']?>">
    </div>
 </div>
 <div class="form-group">
   <label class="col-lg-3 control-label">Địa điểm: </label>
   <div class="col-lg-8">
    <input class="form-control" type="text" name="pla_did" value="<?=$dataPla['pla_did']?>">
 </div>
</div>
<div class="form-group">
   <label class="col-lg-3 control-label">Mã ngành học: </label>
   <div class="col-lg-8">
    <input class="form-control" type="text" name="pla_time" value="<?=$dataPla['pla_time']?>">
 </div>
</div>
<div class="form-group">

   <td class="col-md-3 control-label" class="info">
      <input type="hidden" name="action" value="edit">
      <input type="submit" name="" value="Cập nhật">
   </td>
</div>
</form>
</div>
</div>
</div>
<?php

include_once('../../layout/layout_bottom.php');
?>
<style type="text/css">
   .form_input_txt{
      width: 300px;
   }
   td {
      padding-bottom: 10px;
   }
</style>