<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		<div class="text-right">
			<a href="<?=getUrl();?>hospital/form" class="btn btn-default">เพิ่มข้อมูล</a>
		</div>
		<h3 class="page-header">รายชื่อโรงพยาบาล</h3>
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>ชื่อรพ.</th>
					<th>จัดการ</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$number = 1;
				$i = 0;
				$max = count($items);
				foreach( $items as $key => $item ){
					?>
					<tr>
						<td><?=$number;?></td>
						<td><?=$item['name'];?></td>
						<td>
							<a href="<?=getUrl();?>hospital/edit/<?=$item['id'];?>">แก้ไข</a> |
							<a href="<?=getUrl();?>hospital/delete/<?=$item['id'];?>" class="del_item" data-count="<?=$item['page_count'];?>">ลบ</a>
						</td>
					</tr>
					<?php
					$number++;
					$i++;
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$(document).on('click', '.del_item', function(){
		var count_item = parseInt($(this).attr('data-count'));
		if( count_item > 0 ){
			alert('กรุณาลบข้อมูลหน้าก่อน');
			return false;
		}

		var c = confirm('ยืนยันการลบข้อมูล');
		if( c === false ){
			return false;
		}
	});
});
</script>
