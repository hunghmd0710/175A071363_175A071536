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

$pla_date          = getValue("pla_date", "str", "POST", "", 1);
$pla_did           = getValue("pla_did", "str", "POST", "", 1);
$pla_time          = getValue("pla_time", "str", "POST", "", 1);
$action            = getValue("action", "str", "POST", "");
$pla_sub_id       = getValue("pla_sub_id", "int", "POST", "", 1);
if($action == "add"){
   if( $pla_date != ''){
      $sql  = "INSERT INTO plans (pla_date,pla_did,pla_time,pla_sub_id) 
               VALUES ('" . $pla_date . "','" . $pla_did . "','" . $pla_time ."','" . $pla_sub_id ."');";
      $result = $database->execute($sql);
      echo 'Đã thêm thành công';
      redirect("/admin/modules/plans/listing.php");
   }else{
      echo 'Chưa nhập tên';
   }
}   
?>
<div class="container">
    <h1>Thêm kế hoạch</h1>
   <hr>
   <div class="row">
      <div class="col-md-9 personal-info">
        <h3>Nhập thông tin</h3>
        <form action="" method="POST" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Môn học:</label>
            <div class="col-lg-8">
              <td>
                  <select name="pla_sub_id">
                  <?php
                  foreach ($arrSub as $key => $value) {
                     ?>
                     <option value="<?=$key?>"><?=$value?></option>
                     <?php
                  }
                  ?>
                  
               </select>
               </td>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Ngày:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="pla_date">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Địa điểm:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="pla_did">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Thời gian:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="pla_time">
            </div>
          </div>
          <div class="form-group">
            <tr>
               <td class="info">
                  <input type="hidden" name="action" value="add">
                  <input type="submit" name="" value="Cập nhật">
               </td>
            </tr>
         </div>
      </table>
   </form>

</div>
<?php

include_once('../../layout/layout_bottom.php');
?>