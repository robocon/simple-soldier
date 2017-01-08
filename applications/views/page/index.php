<div class="col-sm-2"></div>
<div class="col-sm-8">
	<?php
	if( isset($x_msg) ){
		?>
		<div class="row">
			<p class="bg-warning" style="padding: 15px;"><?=$x_msg;?></p>
		</div>
		<?php
	}
	?>
	<div class="row text-right">
		<div class=""><a href="<?=getUrl();?>page/form" class="btn btn-default">เพิ่มข้อมูล</a></div>
	</div>
	<div class="row">
		<div class=""><h3>รายการข้อมูล</h3></div>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>ชื่อชื่อป่วย</th>
				<th>ชื่อกองแผนก</th>
				<th>ชื่อผู้เขียน</th>
				<th>วันที่แก้ไข</th>
				<th>จัดการ</th>
				<th>เรียงลำดับ</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach( $groups as $key => $items ){

				$i = 0;
				$number = 1;
				$max = count($items);


				foreach($items as $item_key => $item){
					?>
					<tr>
						<td><?=$number;?></td>
						<td><?=$item['title'];?></td>
						<td><?=$item['name'];?></td>
						<td><?=$item['author'];?></td>
						<td><?=$item['date_add'];?></td>
						<td>
							<a href="<?=getUrl();?>page/edit/<?=$item['id'];?>">แก้ไข</a> |
							<a href="<?=getUrl();?>page/delete/<?=$item['id'];?>" class="del_item">ลบ</a>
						</td>
						<td>
							<?php
							if( $number !== $max ){
								$next_id = $items[($i + 1)]['id'];
								?>
								<a href="<?=getUrl();?>page/sort/down/<?=$item['id'];?>/<?=$next_id;?>" title="เลื่อนลง"><span class="glyphicon glyphicon-triangle-bottom"></span></a>
								<?php
							}

							if( $number !== 1 ){
								$prev_id = $items[($i - 1)]['id'];
								?>
								<a href="<?=getUrl();?>page/sort/up/<?=$item['id'];?>/<?=$prev_id;?>" title="เลื่อนขึ้น"><span class="glyphicon glyphicon-triangle-top"></span></a>
								<?php
							}
							?>
						</td>
					</tr>
					<?php
					$i++;
					$number++;
				}
			}
			?>
		</tbody>
	</table>
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
