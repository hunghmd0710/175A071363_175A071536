<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');
$maj_id        = getValue("id", "int", "GET", 0);

//Lay du lieu tin can sua
$query      = "SELECT * FROM majors WHERE maj_id = " . $maj_id;
$dataMaj  = $database->getOneRow($query);


if(count($dataMaj) <=0 ){
   echo 'Không có ngành học';
   die();
}


$maj_name              = getValue("maj_name", "str", "POST", "", 1);
$maj_man               = getValue("maj_man", "str", "POST", "", 1);
$action                = getValue("action", "str", "POST", "");
if($action == "edit"){
   if( $maj_name  != ''){
      $sql  = "UPDATE  majors SET maj_name  = '" . $maj_name  . "',
               maj_man = '" . $maj_man . "'
               WHERE maj_id = " . $maj_id ;
      $result = $database->execute($sql);
      echo 'Đã cập nhật thành công';
      //Lay du lieu tin can sua
      $query      = "SELECT * FROM majors WHERE maj_id = " . $maj_id;
      $dataMaj  = $database->getOneRow($query);

      redirect("/admin/modules/majors/listing.php");
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
            <label class="col-lg-3 control-label">Tên ngành:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="maj_name" value="<?=$dataMaj['maj_name']?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Mã ngành:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="maj_man" value="<?=$dataMaj['maj_man']?>">
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