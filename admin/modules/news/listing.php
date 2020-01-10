<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');

//Lấy user
$query      = "SELECT * FROM news LIMIT 10 ";
$dataNew   = $database->query($query);
?>
<!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Danh sách tin tức</h1>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="">
                <div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                    <tr role="row">
              <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;">Tiêu đề</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 142px;">Nội dung</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 80px;">Tác giả</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 50px;">Cập nhật</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 50px;">Xóa</th>
          </tr>
                  </thead>
          <?php
          foreach ($dataNew as $key => $row) {
             ?>
             <tr>
                <td>
                   <div>
                      <?=$row['new_title']?>
                   </div>
                </td>
                <td>
                  <p><?=$row['new_intro']?></p>
                </td>
                <td>
                  <p><?=$row['new_author']?></p>
                </td>
                <td>
                   <a href="/admin/modules/news/edit.php?id=<?=$row['new_id']?>">Sửa</a>
                </td>
                <td>
                  <a href="/admin/modules/news/delete.php?id=<?=$row['new_id']?>">Xóa</a>
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
