<?php
    require_once "../config/config.php";  
    $pageTile = 'Đăng nhập';

    
$action = '';
if(isset($_POST['action'])){
    $action = $_POST['action'];
    if($action == 'login'){
        $name = $_POST['acc'];
        $pass = $_POST['pass'];

        $sql    = "SELECT * FROM users  WHERE use_login_name = '" . $name . "'
                    AND use_password = '" . $pass . "'";
        $result = $database->query($sql);
        if(count($result) > 0){
            echo 'Dang nhap thanh cong';
        }else{
            echo 'Dang nhap that bai';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en"><head>
	<?php
    require_once "../includes/inc_head.php";
    ?>
</head>
<body >
	
<?php
    require_once "../includes/inc_header.php";
    require_once "../includes/inc_login_main.php";
    require_once "../includes/inc_footer.php";
    ?>


</body>
</html>