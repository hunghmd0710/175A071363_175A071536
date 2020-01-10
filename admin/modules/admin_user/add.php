<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');


$adm_name          = getValue("adm_name", "str", "POST", "", 1);
$adm_login_name    = getValue("adm_login_name", "str", "POST", "", 1);
$adm_password      = getValue("adm_password", "str", "POST", "", 1);
$adm_email         = getValue("adm_email", "str", "POST", "", 1);
$adm_type          = getValue("adm_type", "int", "POST", "", 1);
$action            = getValue("action", "str", "POST", "");
if($action == "add"){
   if( $adm_name != ''){
      $sql  = "INSERT INTO admin (adm_name,adm_login_name,adm_password,adm_email,adm_type) 
               VALUES ('" . $adm_name . "','" . $adm_login_name . "','" . $adm_password ."','" . $adm_email ."','" . $adm_type ."');";
      $result = $database->execute($sql);
      echo 'Đã thêm thành công';
      redirect("/admin/modules/admin_user/listing.php");
   }else{
      echo 'Chưa nhập tên';
   }
}   
?>

<div class="container">
    <h1>Thêm mới thông tin</h1>
   <hr>
   <div class="row">
      <div class="col-md-9 personal-info">
        <h3>Nhập thông tin</h3>
        <form action="" method="POST" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Họ tên:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="adm_name">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Tài khoản đăng nhập:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="adm_login_name">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="adm_email">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="adm_password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" class="info">Loại quản lý:</label>
            <td>
               <select name="adm_type">
                  <?php
                  foreach ($arrAdminType as $key => $value) {
                     ?>
                     <option value="<?=$key?>"><?=$value?></option>
                     <?php
                  }
                  ?>
                  
               </select>
            </td>
         </div>
          <div class="form-group">
               
               <td class="col-md-3 control-label" class="info">
                  <input type="hidden" name="action" value="add">
                  <input type="submit" name="" value="Cập nhật">
               </td>
            </div>
     </form>
      </div>
  </div>
</div>
<hr>

<?php

include_once('../../layout/layout_bottom.php');
?>
<style type="text/css">
   td {
      padding-bottom: 10px;
   }
</style>