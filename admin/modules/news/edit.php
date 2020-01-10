<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');
$new_id        = getValue("id", "int", "GET", 0);

//Lay du lieu tin can sua
$query      = "SELECT * FROM news WHERE new_id = " . $new_id;
$dataNew  = $database->getOneRow($query);


if(count($dataNew) <=0 ){
   echo 'Không có ngành học';
   die();
}
$new_title          = getValue("new_title", "str", "POST", "", 1);
$new_intro          = getValue("new_intro", "str", "POST", "", 1);
$new_author          = getValue("new_author", "str", "POST", "", 1);
$action            = getValue("action", "str", "POST", "");
if($action == "edit"){
   if( $new_title   != ''){
      $sql  = "UPDATE  news SET new_title   = '" . $new_title   . "',
      new_intro = '" . $new_intro . "',new_author = '" . $new_author . "'
      WHERE new_id = " . $new_id ;
      $result = $database->execute($sql);
      echo 'Đã cập nhật thành công';
      //Lay du lieu tin can sua
      $query      = "SELECT * FROM news WHERE new_id = " . $new_id;
      $dataNew  = $database->getOneRow($query);

      redirect("/admin/modules/news/listing.php");
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
         <label class="col-lg-3 control-label">Tiêu đề tin:</label>
         <div class="col-lg-8">
           <input class="form-control" type="text" name="new_title" value="<?=$dataNew['new_title']?>">
        </div>
     </div>
     <div class="form-group">
      <label class="col-lg-3 control-label">Nội dung tin:</label>
      <div class="col-lg-8">
        <input class="form-control" type="text" name="new_intro" value="<?=$dataNew['new_intro']?>">
     </div>
  </div>
  <div class="form-group">
   <label class="col-lg-3 control-label">Tác giả:</label>
   <div class="col-lg-8">
     <input class="form-control" type="text" name="new_author" value="<?=$dataNew['new_author']?>">
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


<?php

include_once('../../layout/layout_bottom.php');
?>