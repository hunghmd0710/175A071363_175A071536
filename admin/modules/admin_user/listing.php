<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');

//Lấy tin
$query      = "SELECT * FROM admin  LIMIT 10 ";
$dataAdmin   = $database->query($query);
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Danh sách tài khoản</h1>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="">
                <div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                    <tr role="row">
                   <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 195px;">Tài khoản</th>
                   <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 142px;">Tên đăng nhập</th>
                   <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 66px;">Password</th>
                   <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 200px;">Email</th>
                   <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 50px;">Chức vụ</th>
                   <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 50px;">Cập nhật</th>
                   <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 50px;">Xóa</th>
               </tr>
                  </thead>
               <?php
               foreach ($dataAdmin as $key => $row) {
                  ?>
                  <tr>
                     <td>
                        <div>
                           <?=$row['adm_name']?>
                        </div>
                     </td>
                     <td>
                        
                        <p><?=$row['adm_login_name']?></p>
                     </td>
                     <td>
                        
                        <p><?=$row['adm_password']?></p>
                     </td>
                     <td>
                       <p>
                           <?=$row['adm_email']?>
                       </p>
                      </td>

                      <td>
                       <p>
                           <?php
                           if(isset($arrAdminType[$row['adm_type']])){
                            echo $arrAdminType[$row['adm_type']];
                           }
                           ?>
                       </p>
                      </td>

                     <td>
                        <a href="/admin/modules/admin_user/edit.php?id=<?=$row['adm_id']?>">Sửa</a>
                     </td>
                     <td>
                        <a href="/admin/modules/admin_user/delete.php?id=<?=$row['adm_id']?>">Xóa</a>
                     </td>
                  </tr>
   <?php
}
?>
   

                </table>
            </div>
        </div>
</div>
</div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
    </div>
<?php

include_once('../../layout/layout_bottom.php');
?>