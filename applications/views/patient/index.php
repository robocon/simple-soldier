<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="text-right">
			<div class=""><a href="<?=getUrl();?>patient/form" class="btn btn-default">เพิ่มข้อมูล</a></div>
		</div>
		<div class="">
			<div class=""><h3 class="page-header">รายชื่อผู้งดเว้นเกณฑ์ทหาร</h3></div>
		</div>
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>ชื่อ-สกุล</th>
						<th>เลขบัตรปชช.</th>
						<th>เลขกฎกระทรวง</th>
						<th>แพทย์ผู้ตรวจ</th>
						<th>วันที่ตรวจ</th>
						<th>จัดการ</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					foreach ($items as $key => $item) {
						
						$fullname = $item['firstname'].' '.$item['lastname'];
						$pre_dr = json_decode($item['doctor']);

						$doctor = implode("<br>", $pre_dr);

						$item_token = generate_token('item'.$item['id']);
						?>
						<tr>
							<td><?=$i;?></td>
							<td>
								<a href="#"><?=$fullname;?></a>
							</td>
							<td><?=$item['idcard'];?></td>
							<td><?=$item['regula'];?></td>
							<td><?=$doctor;?></td>
							<td><?=$item['date_add'];?></td>
							<td>
								<a href="<?=getUrl();?>patient/delete/<?=$item['id'];?>/<?=$item_token;?>" class="del_item">ลบ</a> | 
								<a href="<?=getUrl();?>patient/edit/<?=$item['id'];?>/<?=$item_token;?>">แก้ไข</a>
							</td>
						</tr>
						<?php
						$i++;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function(){
	$(document).on('click', '.del_item', function(){
		var c = confirm('ยืนยันการลบข้อมูล');
		if( c === false ){
			return false;
		}
	});
});
</script>