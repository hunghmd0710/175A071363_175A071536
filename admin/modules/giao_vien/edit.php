<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');
$adm_id        = getValue("id", "int", "GET", 0);

//Lay du lieu tin can sua
$query      = "SELECT * FROM admin WHERE adm_type = 3 AND adm_id = " . $adm_id;
$dataadm  = $database->getOneRow($query);


if(count($dataadm) <=0 ){
   echo 'Khong co ten adm';
   die();
}


$adm_name          = getValue("adm_name", "str", "POST", "", 1);
$adm_login_name    = getValue("adm_login_name", "str", "POST", "", 1);
$adm_password      = getValue("adm_password", "str", "POST", "", 1);
$adm_email          = getValue("adm_email", "str", "POST", "", 1);
$action           = getValue("action", "str", "POST", "");

if($action == "edit"){
   if( $adm_name != ''){
      $sql  = "UPDATE  admin SET adm_name = '" . $adm_name . "',
               adm_login_name = '" . $adm_login_name . "',adm_password = '" . $adm_password ."',adm_email='" . $adm_email. "'
               WHERE adm_id = " . $adm_id ;
      $result = $database->execute($sql);
      echo 'Da cap nhat thanh cong';
      //Lay du lieu tin can sua
      $query      = "SELECT * FROM admin WHERE adm_id = " . $adm_id;
      $dataadm = $database->getOneRow($query);

      redirect("/admin/modules/giao_vien/listing.php");
   }else{
      echo 'Chua nhap tieu de';
   }
}   
?>
/////

<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');
$adm_id        = getValue("id", "int", "GET", 0);

//Lay du lieu tin can sua
$query      = "SELECT * FROM admin WHERE adm_id = " . $adm_id;
$dataadm  = $database->getOneRow($query);


if(count($dataadm) <=0 ){
   echo 'Khong co ten adm';
   die();
}


$adm_name          = getValue("adm_name", "str", "POST", "", 1);
$adm_login_name    = getValue("adm_login_name", "str", "POST", "", 1);
$adm_password      = getValue("adm_password", "str", "POST", "", 1);
$adm_email          = getValue("adm_email", "str", "POST", "", 1);
$adm_type          = getValue("adm_type", "int", "POST", "", 1);
$action           = getValue("action", "str", "POST", "");

if($action == "edit"){
   if( $adm_name != ''){
      $sql  = "UPDATE  admin SET adm_name = '" . $adm_name . "',
               adm_login_name = '" . $adm_login_name . "',adm_password = '" . $adm_password ."',adm_email='" . $adm_email. "',adm_type='" . $adm_type . "'
               WHERE adm_id = " . $adm_id ;
      $result = $database->execute($sql);
      echo 'Da cap nhat thanh cong';
      //Lay du lieu tin can sua
      $query      = "SELECT * FROM admin WHERE adm_id = " . $adm_id;
      $dataadm = $database->getOneRow($query);

      redirect("/admin/modules/admin_user/listing.php");
   }else{
      echo 'Chua nhap tieu de';
   }
}   
?>
<div class="container">
    <h1>Sửa thông tin</h1>
   <hr>
   <div class="row">
      <div class="col-md-9 personal-info">
        <h3>Nhập thông tin</h3>
        <form action="" method="POST" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Họ tên:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="adm_name" value="<?=$dataadm['adm_name']?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Tài khoản đăng nhập:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="adm_login_name" value="<?=$dataadm['adm_login_name']?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="adm_email" value="<?=$dataadm['adm_email']?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="adm_password" value="<?=$dataadm['adm_password']?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" class="info">Loại quản lý:</label>
            <tr>
               <td class="info" align="right">Loại quản lý: &nbsp;</td>
               <td>
                  <select name="adm_type">
                     <?php
                     foreach ($arrAdminType as $key => $value) {
                        ?>
                        <option <?php if($dataadm['adm_type'] == $key ){ echo 'selected="selected" '; } ?> value="<?=$key?>"><?=$value?></option>
                        <?php
                     }
                     ?>
                     
                  </select>
               </td>
            </tr>
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
<style type="text/css">
   .form_input_txt{
      width: 300px;
   }
</style>