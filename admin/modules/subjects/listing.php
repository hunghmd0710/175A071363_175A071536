<?php
require_once("inc_security.php");      
include_once('../../layout/layout_top.php');

//Lấy user
$query      = "SELECT * FROM subjects 
INNER JOIN majors ON maj_id = sub_maj_id
LIMIT 10 "
;
$dataSub   = $database->query($query);

?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Danh sách môn học</h1>
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="">
			<div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
				<thead>
					<tr role="row">
						<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 195px;">Tên môn học</th>
						<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 142px;">Mã môn học</th>
						<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 195px;">Ngành học</th>
						<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 66px;">Số tín chỉ</th>
						<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 50px;">Cập nhật</th>
						<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 50px;">Xóa</th>
					</tr>
				</thead>
				<?php
				foreach ($dataSub as $key => $row) {
					?>
					<tr>
						<td>
							<div>
								<?=$row['sub_name']?>
							</div>
						</td>
						<td>
							<p><?=$row['sub_man']?></p>
						</td>
						<td>
							<p><?=$row['maj_name']?></p>
						</td>
						<td>
							<p><?=$row['sub_tc']?></p>
						</td>
						<td>
							<a href="/admin/modules/subjects/edit.php?id=<?=$row['sub_id']?>">Sửa</a>
						</td>
						<td>
							<a href="/admin/modules/subjects/delete.php?id=<?=$row['sub_id']?>">Xóa</a>
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
