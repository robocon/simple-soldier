<div class="col-sm-3"></div>
<div class="col-sm-6">
	<div class="row text-right">
		<div class=""><a href="<?=getUrl();?>depart/form" class="btn btn-default">เพิ่มข้อมูล</a></div>
	</div>
	<div class="row">
		<div class=""><h3>รายชื่อโรงพยาบาล</h3></div>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>ชื่อรพ.</th>
				<th>จำนวน</th>
				<th>วันที่แก้ไข</th>
				<th>จัดการ</th>
				<th>เรียงลำดับ</th>
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
					<td><?=( ( !empty($item['page_count']) ) ? $item['page_count'] : 0 );?></td>
					<td><?=$item['latest_date'];?></td>
					<td>
						<a href="<?=getUrl();?>depart/edit/<?=$item['id'];?>">แก้ไข</a> |
						<a href="<?=getUrl();?>depart/delete/<?=$item['id'];?>" class="del_item" data-count="<?=$item['page_count'];?>">ลบ</a>
					</td>
					<td>
						<?php
						if( $number !== $max ){
							$next_id = $items[($i + 1)]['id'];
							?>
							<a href="<?=getUrl();?>depart/sort/down/<?=$item['id'];?>/<?=$next_id;?>" title="เลื่อนลง"><span class="glyphicon glyphicon-triangle-bottom"></span></a>
							<?php
						}

						if( $number !== 1 ){
							$prev_id = $items[($i - 1)]['id'];
							?>
							<a href="<?=getUrl();?>depart/sort/up/<?=$item['id'];?>/<?=$prev_id;?>" title="เลื่อนขึ้น"><span class="glyphicon glyphicon-triangle-top"></span></a>
							<?php
						}
						?>
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
