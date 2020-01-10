<?php
//Lay danh sach module
$arrModulePa      = array();
$arrModuleChild   = array();
$queryModule   = "SELECT * FROM modules ORDER BY mod_order ASC";
$dataModule    = $database->query($queryModule);

foreach ($dataModule as $key => $row) {
   if($row['mod_parent_id'] == 0){
      $arrModulePa[] = $row;
   }else{
      $arrModuleChild[$row['mod_parent_id']][] = $row;
   }   
}
$versionStyle  = '11111';
?>
<!DOCTYPE HTML>
<html>
<head>   
   <title><?=$page_title?></title>              
   <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
   <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport' />
   <link rel="shortcut icon" href=""/>
   <link rel="stylesheet" type="text/css" href="/admin/themes/css/bootstrap.min.css" />
   <link rel="stylesheet" type="text/css" href="/admin/themes/css/font-awesome.min.css" />
   <link rel="stylesheet" type="text/css" href="/admin/themes/css/skins/skin-blue.min.css" />
   <link rel="stylesheet" type="text/css" href="/admin/themes/css/AdminLTE.css" />
   <link rel="stylesheet" type="text/css" href="/admin/themes/css/admin.css?v=<?=$versionStyle?>" />
   <link rel="stylesheet" type="text/css" href="/admin/themes/css/bootstrap-datetimepicker.css" />
   <link rel="stylesheet" type="text/css" href="/admin/themes/plugin/summernote/dist/summernote.css" />
   
   <script src="/admin/themes/js/jQuery-2.1.3.min.js" type="text/javascript"></script>
   <script src="/admin/themes/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
   <script src="/admin/themes/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="/admin/themes/js/app.min.js" type="text/javascript"></script>
   
   <script src="/admin/themes/js/moment-with-locales.js" type="text/javascript"></script>
   <script src="/admin/themes/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
   <script src="/admin/themes/plugin/summernote/dist/summernote.min.js"></script>
   <script type="text/javascript" src="/admin/resource/ckeditor/ckeditor.js"></script>
   <script type="text/javascript" src="/admin/themes/js/jquery.jeditable.js"></script>
   
   <script type="text/javascript" src="/admin/themes/public/select2.js"></script>
   <link rel="stylesheet" href="/admin/themes/public/select2.css" type="text/css" />
  
   <script src="/admin/themes/js/admin.js" type="text/javascript"></script>
</head>
<body class="sidebar-mini skin-blue sidebar-collapse">
  <div class="wrapper">
    <header class="main-header">    
      <a href="/admin/modules/account/info.php" class="logo">
        <span class="logo-mini"><b><?=$con_mini_title?></b></span>
        <span class="logo-lg"><b><?=$con_project_title?></b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu ">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="true">
              <img src="/admin/themes/imgs/avatar.png" class="user-image" alt="User Image" />
              <span class="hidden-xs">Xin chào: <?=$adm_name?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Body -->
               <li class="user-body">
                  <a href="<?=$urlInfo?>">Xem thông tin</a>
               </li>
               <li class="user-body">
                  <a href="<?=$urlUpdateInfo?>">Cập nhật thông tin</a>
               </li> 
               <li class="user-body">
                  <a href="<?=$urlChangePass?>">Đổi mật khẩu</a>
               </li>                           
               <li class="user-footer">
                  <div class="pull-right">                  
                     <a class="btn btn-default btn-flat" href="<?=$urlLogout?>">Đăng xuất</a>
                  </div>
               </li>
            </ul>
          </li>
        </ul>
      </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="/admin/themes/imgs/avatar.png" class="img-circle"
                 alt="User Image"/>
          </div>
          <div class="pull-left info">
            <p><?=$adm_name?></p>
            <a href="<?=$urlLogout?>">Đăng Xuất <i class="fa fa-fw fa-sign-in"></i></a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
         <ul id="ex-menu-left" class="sidebar-menu">
            <li class="header">CHỨC NĂNG</li>
               <?php
               $moduleNow  = "";
               $arrUrl  = explode("/admin/modules/",$url_now);
               if(isset($arrUrl[1])){
                  $url_now1   = $arrUrl[1];
                  $arrUrl2    = explode("/",$url_now1);
                  $moduleNow  = $arrUrl2[0];
               }              
               //quản trị viên///
               if($adm_type == 1){                  
               ?>
               <li class="treeview">
                  <a href="<?=url_javarscript_void()?>">
                    <i class="fa fa-folder"></i>
                    <span>Tài khoản</span>
                    <i class="fa fa-fw fa-angle-double-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                        <li class="">
                              <a href="/admin/modules/admin_user/listing.php">
                              <i class="fa fa-fw fa-angle-double-right"></i>
                                 Danh sách                                                   
                              </a>
                           </li> 

                           <li class="">
                              <a href="/admin/modules/admin_user/add.php">
                              <i class="fa fa-fw fa-angle-double-right"></i>
                                 Thêm mới                          
                              </a>
                           </li> 
                     </ul>                                                                        
                </li>
                <?php
                }


                ////Quản lý
                 if($adm_type == 2){                  
               ?>
               <li class="treeview">
                  <a href="<?=url_javarscript_void()?>">
                    <i class="fa fa-users "></i>
                    <span>Quản lý</span>
                    <i class="fa fa-fw fa-angle-double-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                        <li class="">
                              <a href="/admin/modules/giao_vien/listing.php">
                              <i class="fa fa-fw fa-angle-double-right"></i>
                                 Danh sách                                                   
                              </a>
                           </li> 

                           <li class="">
                              <a href="/admin/modules/giao_vien/add.php">
                              <i class="fa fa-fw fa-angle-double-right"></i>
                                 Thêm mới                          
                              </a>
                           </li> 
                     </ul>                                                                        
                </li>

                <li class="treeview">
                  <a href="<?=url_javarscript_void()?>">
                    <i class="fa fa-briefcase"></i>
                    <span>Ngành học</span>
                    <i class="fa fa-fw fa-angle-double-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                        <li class="">
                              <a href="/admin/modules/majors/listing.php">
                              <i class="fa fa-fw fa-angle-double-right"></i>
                                 Danh sách                                                   
                              </a>
                           </li> 

                           <li class="">
                              <a href="/admin/modules/majors/add.php">
                              <i class="fa fa-fw fa-angle-double-right"></i>
                                 Thêm mới                          
                              </a>
                           </li> 
                     </ul>                                                                        
                </li>



                <li class="treeview">
                  <a href="<?=url_javarscript_void()?>">
                    <i class="fa fa-briefcase"></i>
                    <span>Môn học</span>
                    <i class="fa fa-fw fa-angle-double-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                        <li class="">
                              <a href="/admin/modules/subjects/listing.php">
                              <i class="fa fa-fw fa-angle-double-right"></i>
                                 Danh sách                                                   
                              </a>
                           </li> 

                           <li class="">
                              <a href="/admin/modules/subjects/add.php">
                              <i class="fa fa-fw fa-angle-double-right"></i>
                                 Thêm mới                          
                              </a>
                           </li> 
                     </ul>                                                                        
                </li>
                <li class="treeview">
                  <a href="<?=url_javarscript_void()?>">
                    <i class="fa fa-child"></i>
                    <span>Sinh viên</span>
                    <i class="fa fa-fw fa-angle-double-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                        <li class="">
                              <a href="/admin/modules/users/listing.php">
                              <i class="fa fa-fw fa-angle-double-right"></i>
                                 Danh sách                                                   
                              </a>
                           </li> 

                           <li class="">
                              <a href="/admin/modules/users/listing.php">
                              <i class="fa fa-fw fa-angle-double-right"></i>
                                 Thêm mới                          
                              </a>
                           </li> 
                     </ul>                                                                        
                </li>

                <?php
                }


                ////giảng viên
                if($adm_type == 3){
                  ?>
                  <li class="treeview">
                  <a href="<?=url_javarscript_void()?>">
                    <i class="fa fa-book"></i>
                    <span>Tin tức</span>
                    <i class="fa fa-fw fa-angle-double-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                        <li class="">
                              <a href="/admin/modules/news/listing.php">
                              <i class="fa fa-fw fa-angle-double-right"></i>
                                 Danh sách                                                   
                              </a>
                           </li> 

                           <li class="">
                              <a href="/admin/modules/news/add.php">
                              <i class="fa fa-fw fa-angle-double-right"></i>
                                 Thêm mới                          
                              </a>
                           </li> 
                     </ul>                                                                        
                </li>
                  <?php
                }

                ?>
                <li class="treeview">
                  <a href="<?=url_javarscript_void()?>">
                    <i class="fa fa-briefcase"></i>
                    <span>Kế hoạch giảng dạy</span>
                    <i class="fa fa-fw fa-angle-double-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                        <li class="">
                              <a href="/admin/modules/plans/listing.php">
                              <i class="fa fa-fw fa-angle-double-right"></i>
                                 Danh sách                                                   
                              </a>
                           </li> 

                           <li class="">
                              <a href="/admin/modules/plans/add.php">
                              <i class="fa fa-fw fa-angle-double-right"></i>
                                 Thêm mới                          
                              </a>
                           </li> 
                     </ul>                                                                        
                </li>                                        
            
            </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
    <section class="content">