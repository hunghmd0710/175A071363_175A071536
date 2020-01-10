<?php
require_once("inc_security.php");
$adm_id     = getValue("adm_id", "int", "SESSION", 0);


if($logged != 1){
   redirect($urlLogin);
   exit();
}


include_once('../../layout/layout_top.php');
//Lay thong tin ca nhan
$query      = "SELECT * FROM admin WHERE adm_id = " . $adm_id;
$dataAdmin  = $database->getOneRow($query);

if(count($dataAdmin) > 0){
?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Thông tin của bạn</h3>
      </div><!-- /.box-header -->
      <div class="box-body">                
          
          <div class="row">
              <div class="col-sm-12" >
                  <table class="table table-bordered table-hover" >
                        <tbody>
                          <tr>
                            <td>Tên đăng nhập</td>
                            <td><?=$dataAdmin['adm_login_name']?></td>
                          </tr>
                          <tr>
                            <td>Số điện thoại</td>
                            <td><?=$dataAdmin['adm_phone']?></td>
                          </tr>
                          <tr>
                            <td>Địa chỉ email</td>
                            <td><?=$dataAdmin['adm_email']?></td>
                          </tr>
                          
                        </tbody>
                  </table>
              </div>
          <!-- /.box-body -->
          </div>
         </div>
      </div>
   </div>
</div>
<?php
}
include_once('../../layout/layout_bottom.php');
?>
   
    


