<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');


$use_name          = getValue("use_name", "str", "POST", "", 1);
$use_ma            = getValue("use_ma", "str", "POST", "", 1);
$use_login_name    = getValue("use_login_name", "str", "POST", "", 1);
$use_password	    = getValue("use_password", "str", "POST", "", 1);
$use_email         = getValue("use_email", "str", "POST", "", 1);
$action            = getValue("action", "str", "POST", "");
if($action == "add"){
   if( $use_name != ''){
      $sql  = "INSERT INTO users (use_name,use_login_name,use_password,use_email,use_ma) 
               VALUES ('" . $use_name . "','" . $use_login_name . "','" . $use_password ."','" . $use_email ."','" . $use_ma . "');";
      $result = $database->execute($sql);
      echo 'Đã thêm thành công';
   }else{
      echo 'Chưa nhập tên sinh viên';
   }
} 
?>
<div  class="main_content">
   <h1>Thêm tài khoản sinh viên</h1>
   
   <form action="" method="POST">
      <table class="middle-table-center">
         <tbody>
            <tr>
               <td class="info" align="right">Tên tài khoản: &nbsp;</td>
               <td>
                  <input type="text" name="use_name">
               </td>
            </tr>
            <tr>
               <td class="info" align="right">Mã sinh viên: &nbsp;</td>
               <td>
                  <input type="text" name="use_ma">
               </td>
            </tr>
            <tr>
               <td class="info" align="right">Tên đăng nhập: &nbsp;</td>
               <td>
                  <input type="text" name="use_login_name">
               </td>
            </tr>
            <tr>
               <td class="info" align="right">Mật khẩu: &nbsp;</td>
               <td>
                  <input type="password" name="use_password">
               </td>
            </tr>
            <tr>
               <td class="info" align="right">Email: &nbsp;</td>
               <td>
                  <input type="text" name="use_email">
               </td>
            </tr>
            <tr>
               
               <td class="info">
                  <input type="hidden" name="action" value="add">
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
   td {
      padding-bottom: 10px;
   }
</style>