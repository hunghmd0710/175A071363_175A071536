<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');

//Lấy user
$query      = "SELECT * FROM users LIMIT 10 ";
$dataUse   = $database->query($query);
?>
<!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Danh sách sinh viên</h1>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="">
                <div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                    <tr role="row">
					    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 195px;">Tài khoản</th>
					    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 195px;">Mã sinh viên</th>
					    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 142px;">Tên đăng nhập</th>
					    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 66px;">Password</th>
					    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 295px;">Email</th>
					    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 132px;">Cập nhật</th>
					    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 132px;">Xóa</th>
					</tr>
                  </thead>
					<?php
					foreach ($dataUse as $key => $row) {
					   ?>
					   <tr>
					      <td>
					         <div>
					            <?=$row['use_name']?>
					         </div>
					      </td>
					      <td>
					         <div>
					            <?=$row['use_ma']?>
					         </div>
					      </td>
					      <td>
					         
					         <p><?=$row['use_login_name']?></p>
					      </td>
					      <td>
					         
					         <p><?=$row['use_password']?></p>
					      </td>
					      <td>
					        <p>
					            <?=$row['use_email']?>
					        </p>
					    </td>
					      <td>
					         <a href="/admin/modules/users/edit.php?id=<?=$row['use_id']?>">Sửa</a>
					      </td>
					      <td>
					      	<a href="/admin/modules/users/delete.php?id=<?=$row['use_id']?>">Xóa</a>
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
</table>
<style type="text/css">
   .table_view{
      width: 100%;
   }
.table_view, th, td {
      border: 1px solid black;
}


</style>
