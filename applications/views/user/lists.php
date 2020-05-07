<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
		<div class="text-right">
			<div class="">
				<a href="<?=getUrl();?>user/form" class="btn btn-default">เพิ่มข้อมูล</a>
				<a href="<?=getUrl();?>user/csvform" class="btn btn-default">เพิ่มข้อมูล CSV</a>
			</div>
		</div>
	    <div class="">
			<div class=""><h3 class="page-header">ผู้ใช้งาน</h3></div>
		</div>
		<table class="table">
	        <thead>
	            <tr>
	                <th>#</th>
	                <th>ชื่อ-สกุล</th>
					<th>ชื่อผู้ใช้งาน</th>
	                <th>ระดับ</th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php
	            $i = 1;
	            foreach( $users as $key => $user ){
	            ?>
	            <tr>
	                <td><?=$i;?></td>
	                <td><?=$user['fullname'];?></td>
					<td><?=$user['username'];?></td>
	                <td><?=$user['level'];?></td>
	            </tr>
	            <?php
	                $i++;
	            }
	            ?>
	        </tbody>
	    </table>
	</div>
</div>
