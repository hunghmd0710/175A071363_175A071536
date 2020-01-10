<?php
require_once("inc_security.php");
$username	= getValue("username", "str", "POST", "", 1);
$password	= getValue("password", "str", "POST", "", 1);
$action		= getValue("action", "str", "POST", "");
$logged     = getValue("logged", "str", "SESSION", 0);
if($action == "login"){
	$sql    = "SELECT * FROM admin  WHERE adm_login_name = '" . $username . "'
              AND adm_password = '" . $password . "'";
  $result = $database->getOneRow($sql);
  if(count($result) > 0){
      $_SESSION["logged"]     = 1;
      $_SESSION["adm_id"]     = $result['adm_id'];
      $_SESSION["adm_name"]   = $result['adm_name'];
      $_SESSION["adm_type"]     = $result['adm_type'];
     
      $logged                 = 1;
  }else{
      echo 'Dang nhap that bai';
  }
}   
if($logged == 1){
   redirect($urlDefaul);
   exit();
}
?>
<!DOCTYPE HTML>
<html>
<head>   
   <title>Đăng nhập</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
   <link rel="shortcut icon" href=""/>
   <link rel="stylesheet" type="text/css" href="/admin/themes/css/bootstrap.min.css" />
   <link rel="stylesheet" type="text/css" href="/admin/themes/css/font-awesome.min.css" />
   <link rel="stylesheet" type="text/css" href="/admin/themes/css/AdminLTE.min.css" />
   <link rel="stylesheet" type="text/css" href="/admin/themes/css/skin/skin-blue.min.css" />
   <link rel="stylesheet" type="text/css" href="/admin/themes/css/admin.css" />
   <script src="/admin/themes/js/jQuery-2.1.3.min.js" type="text/javascript"></script>
   <script src="/admin/themes/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
   <script src="/admin/themes/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="/admin/themes/js/app.min.js" type="text/javascript"></script>
</head>
<body class="login-page">
   <div class="login-box">
      <div class="login-logo">
      <a href="<?=url_javarscript_void()?>">Đăng nhập</a>
      </div>
      <div class="login-box-body">
      <p class="login-box-msg">Đăng nhập để bắt đầu ...</p>
      <form action="<?=$urlLogin?>" method="post" accept-charset="utf-8">    
         <div class="form-group has-feedback">
            <input name="username" value="" type="text" class="form-control" placeholder="Tên đăng nhập"/>
         </div>
         <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu"/>
         </div>
         <div class="row">
            <div class="col-md-8 col-xs-4"></div>            
            <div class="col-md-4 col-xs-8">
               <input type="hidden" value="login" name="action"/>
               <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng Nhập</button>
            </div>            
         </div>
         </form>    
      <div class="social-auth-links text-center"></div>    
      <!-- <a href="#">Quên mật khẩu?</a><br> -->
      </div> 
   </div>

</body>
</html>
