<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');

//Lấy user
$query      = "SELECT * FROM plans 
INNER JOIN subjects ON sub_id = pla_sub_id
LIMIT 10 ";
$dataPla   = $database->query($query);
?>
<!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Danh sách kế hoạch dự kiến</h1>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="">
                <div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                    <tr role="row">
              <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;">Môn học</th>
              <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;">Ngày</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 142px;">Đia điểm</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 142px;">Thời gian</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 50px;">Cập nhật</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 50px;">Xóa</th>
          </tr>
                  </thead>
          <?php
          foreach ($dataPla as $key => $row) {
             ?>
             <tr>
                <td>
                  <p><?=$row['sub_name']?></p>
                </td>
                <td>
                   <div>
                      <?=$row['pla_date']?>
                   </div>
                </td>
                <td>
                  <p><?=$row['pla_did']?></p>
                </td>
                <td>
                  <p><?=$row['pla_time']?></p>
                </td>
                <td>
                   <a href="/admin/modules/plans/edit.php?id=<?=$row['pla_id']?>">Sửa</a>
                </td>
                <td>
                  <a href="/admin/modules/plans/delete.php?id=<?=$row['pla_id']?>">Xóa</a>
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
