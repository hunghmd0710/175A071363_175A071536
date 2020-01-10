<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');


$maj_name         = getValue("maj_name", "str", "POST", "", 1);
$maj_man          = getValue("maj_man", "str", "POST", "", 1);
$action           = getValue("action", "str", "POST", "");
if($action == "add"){
   if( $maj_name != ''){
      $sql  = "INSERT INTO majors (maj_name,maj_man) 
               VALUES ('" . $maj_name . "','" . $maj_man . "');";
      $result = $database->execute($sql);
      echo 'Đã thêm thành công';
      redirect("/admin/modules/majors/listing.php");
   }else{
      echo 'Chưa nhập tên ngành học';
   }
} 
?>
<div class="container">
    <h1>Thêm ngành học</h1>
   <hr>
   <div class="row">
      <div class="col-md-9 personal-info">
        <h3>Nhập thông tin</h3>
        <form action="" method="POST" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Tên ngành học:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="maj_name">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Mã ngành học:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="maj_man">
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