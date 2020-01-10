<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');


$new_title          = getValue("new_title", "str", "POST", "", 1);
$new_intro          = getValue("new_intro", "str", "POST", "", 1);
$new_author          = getValue("new_author", "str", "POST", "", 1);
$action            = getValue("action", "str", "POST", "");
if($action == "add"){
   if( $new_title != ''){
      $sql  = "INSERT INTO news (new_title,new_intro,new_author) 
               VALUES ('" . $new_title . "','" . $new_intro . "','" . $new_author ."');";
      $result = $database->execute($sql);
      echo 'Đã thêm thành công';
      redirect("/admin/modules/news/listing.php");
   }else{
      echo 'Chưa nhập tên';
   }
}   
?>
<div class="container">
    <h1>Thêm tin tức</h1>
   <hr>
   <div class="row">
      <div class="col-md-9 personal-info">
        <h3>Nhập thông tin</h3>
        <form action="" method="POST" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Tiêu đề:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="new_title">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Nội dung:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="new_intro">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Tác giả:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="new_author">
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
<style type="text/css">
   td {
      padding-bottom: 10px;
   }
</style>