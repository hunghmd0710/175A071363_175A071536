<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');
$use_id        = getValue("id", "int", "GET", 0);

//Lay du lieu tin can sua
$query      = "SELECT * FROM users WHERE use_id = " . $use_id;
$dataUse  = $database->getOneRow($query);


if(count($dataUse) <=0 ){
   echo 'Không có sinh viên';
   die();
}


$use_name              = getValue("use_name", "str", "POST", "", 1);
$use_ma                = getValue("use_ma", "str", "POST", "", 1);
$use_login_name        = getValue("use_login_name", "str", "POST", "", 1);
$use_password          = getValue("use_password", "str", "POST", "", 1);
$use_email             = getValue("use_email", "str", "POST", "", 1);
$action                = getValue("action", "str", "POST", "");
if($action == "edit"){
   if( $use_name  != ''){
      $sql  = "UPDATE  users SET use_name  = '" . $use_name  . "',
               use_login_name = '" . $use_login_name . "',use_password = '" . $use_password ."',use_email = '" . $use_email . "',use_ma  = '" . $use_ma  . "'
               WHERE use_id = " . $use_id ;
      $result = $database->execute($sql);
      echo 'Đã cập nhật thành công';
      //Lay du lieu tin can sua
      $query      = "SELECT * FROM users WHERE use_id = " . $use_id;
      $dataUse  = $database->getOneRow($query);

      redirect("/admin/modules/users/listing.php");
   }else{
      echo 'Chưa nhập tên';
   }
}   
?>
<div  class="main_content">
   <h1>Sửa tài khoản</h1>
   
   <form action="" method="POST">
      <table class="middle-table-center">
         <tbody>
            <tr>
               <td class="info" align="right">Tài khoản: &nbsp;</td>
               <td>
                  <input class="form_input_txt"  type="text" name="use_name" value="<?=$dataUse['use_name']?>">
               </td>
            </tr>
            <tr>
               <td class="info" align="right">Mã sinh viên: &nbsp;</td>
               <td>
                  <input class="form_input_txt"  type="text" name="use_ma" value="<?=$dataUse['use_ma']?>">
               </td>
            </tr>
            <tr>
               <td class="info" align="right">Tên đăng nhập: &nbsp;</td>
               <td>
                  <textarea name="use_login_name" class="use_login_name"><?=$dataUse['use_login_name']?></textarea>
               </td>
            </tr>

            <tr>
               <td class="info" align="right">Mật khẩu: &nbsp;</td>
               <td>
                  <textarea name="use_password" class="use_password"><?=$dataUse['use_password']?></textarea>
               </td>
            </tr>
            <tr>
               <td class="info" align="right">Email: &nbsp;</td>
               <td>
                  <input type="Email" name="use_email" value="<?=$dataUse['use_email']?>">
               </td>
            </tr>
            <tr>

               
               <td class="info">
                  <input type="hidden" name="action" value="edit">
                  <input type="submit" name="" value="Cập nhật">
               </td>
               
              
            </tr>
            
         </tbody>
      </table>
   </form>

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