<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');

//Lấy user
$query      = "SELECT * FROM majors ";
$dataMaj    = $database->query($query);
$arrMaj     = [];
foreach ($dataMaj as $key => $row) {
   $maj_id     = $row['maj_id'];
   $maj_name   = $row['maj_name'];
   $arrMaj[$maj_id]  = $maj_name;
}                      
$sub_name         = getValue("sub_name", "str", "POST", "", 1);
$sub_man          = getValue("sub_man", "str", "POST", "", 1);
$sub_tc           = getValue("sub_tc", "int", "POST", "", 1);
$action           = getValue("action", "str", "POST", "");
$sub_maj_id       = getValue("sub_maj_id", "int", "POST", "", 1);



if($action == "add"){
   if( $sub_name != ''){
      $sql  = "INSERT INTO subjects (sub_name,sub_man,sub_tc,sub_maj_id) 
               VALUES ('" . $sub_name . "','" . $sub_man . "','" . $sub_tc ."','" . $sub_maj_id ."');";
      $result = $database->execute($sql);
      echo 'Đã thêm thành công';
      redirect("/admin/modules/subjects/listing.php");
   }else{
      echo 'Chưa nhập tên môn học';
   }
} 
?>
<div class="container">
    <h1>Thêm môn học</h1>
   <hr>
   <div class="row">
      <div class="col-md-9 personal-info">
        <h3>Nhập thông tin</h3>
        <form action="" method="POST" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Tên môn học:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="sub_name">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Mã môn học:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="sub_man">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Số tín chỉ:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="sub_tc">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Ngành học:</label>
            <div class="col-lg-8">
              <td>
                  <select name="sub_maj_id">
                  <?php
                  foreach ($arrMaj as $key => $value) {
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
            <tr>
               <td class="info">
                  <input type="hidden" name="action" value="add">
                  <input type="submit" name="" value="Cập nhật">
               </td>
            </tr>
         </div>
      </table>
   </form>
<?php

include_once('../../layout/layout_bottom.php');
?>