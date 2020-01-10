<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');
$sub_id          = getValue("id", "int", "GET", 0);

$query      = "SELECT * FROM majors ";
$dataMaj    = $database->query($query);
$arrMaj     = [];
foreach ($dataMaj as $key => $row) {
   $maj_id     = $row['maj_id'];
   $maj_name   = $row['maj_name'];
   $arrMaj[$maj_id]  = $maj_name;
}
//Lay du lieu tin can sua
$query      = "SELECT * FROM subjects WHERE sub_id  = " . $sub_id  ;
$dataSub  = $database->getOneRow($query);


if(count($dataSub) <=0 ){
   echo 'Không có môn học được thêm';
   die();
}


$sub_name              = getValue("sub_name", "str", "POST", "", 1);
$sub_man               = getValue("sub_man", "str", "POST", "", 1);
$sub_tc                = getValue("sub_tc", "int", "POST", "", 1);
$action                = getValue("action", "str", "POST", "");
$sub_maj_id            = getValue("sub_maj_id", "int", "POST", "", 1);

if($action == "edit"){
   if( $sub_name  != ''){
      $sql  = "UPDATE  subjects SET sub_name  = '" . $sub_name  . "',
      sub_man = '" . $sub_man . "',sub_tc = '" . $sub_tc ."',sub_maj_id = '" . $sub_maj_id . "'
      WHERE sub_id    = " . $sub_id  ;
      $result = $database->execute($sql);
      echo 'Đã cập nhật thành công';
      //Lay du lieu tin can sua
      $query      = "SELECT * FROM subjects WHERE sub_id  = " . $sub_id  ;
      $dataSub  = $database->getOneRow($query);

      redirect("/admin/modules/subjects/listing.php");
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
      <label class="col-lg-3 control-label">Tên môn học:</label>
      <div class="col-lg-8">
       <input class="form-control" type="text" name="sub_name" value="<?=$dataSub['sub_name']?>">
    </div>
 </div>
 <div class="form-group">
   <label class="col-lg-3 control-label">Mã môn học:</label>
   <div class="col-lg-8">
    <input class="form-control" type="text" name="sub_man" value="<?=$dataSub['sub_man']?>">
 </div>
</div>
<div class="form-group">
   <label class="col-lg-3 control-label">Ngành học:</label>
   <div class="col-lg-8">
    <select name="sub_maj_id">
      <?php
      foreach ($arrMaj as $key => $value) {
         ?>
         <option value="<?=$key?>"><?=$value?></option>
         <?php
      }
      ?>
      </select>
   </div>
</div>
<div class="form-group">
   <label class="col-lg-3 control-label">Số tín chỉ:</label>
   <div class="col-lg-8">
    <input class="form-control" type="text" name="sub_tc" value="<?=$dataSub['sub_tc']?>">
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
</div>
<?php

include_once('../../layout/layout_bottom.php');
?>