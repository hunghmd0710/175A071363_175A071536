<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');


$adm_name          = getValue("adm_name", "str", "POST", "", 1);
$adm_login_name    = getValue("adm_login_name", "str", "POST", "", 1);
$adm_password      = getValue("adm_password", "str", "POST", "", 1);
$adm_email         = getValue("adm_email", "str", "POST", "", 1);
$adm_type          = 3;
$action            = getValue("action", "str", "POST", "");
if($action == "add"){
   if( $adm_name != ''){
      $sql  = "INSERT INTO admin (adm_name,adm_login_name,adm_password,adm_email,adm_type) 
               VALUES ('" . $adm_name . "','" . $adm_login_name . "','" . $adm_password ."','" . $adm_email ."','" . $adm_type ."');";
      $result = $database->execute($sql);
      echo 'Đã thêm thành công';
      redirect("/admin/modules/giao_vien/listing.php");
   }else{
      echo 'Chưa nhập tên';
   }
}   
?>
<div class="container">
    <h1>Thêm giảng viên</h1>
   <hr>
   <div class="row">
      <div class="col-md-9 personal-info">
        <h3>Nhập thông tin giảng viên</h3>
        <form action="" method="POST" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Tên giảng viên:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="adm_name">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Tên đăng nhập:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="adm_login_name">
            </div>
          </div>
           <div class="form-group">
            <label class="col-lg-3 control-label">Mật khẩu:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="adm_password">
            </div>
          </div>
           <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="adm_email">
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