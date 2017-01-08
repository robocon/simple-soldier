<div class="col-sm-3"></div>
<div class="col-sm-6">
	<form action="<?=getUrl();?>depart/save" method="post" id="mainForm">
		<div class="form-group">
            <label for="">ชื่อโรงพยาบาล</label>
            <input type="text" class="form-control" id="title" name="title" value="<?=$title;?>">
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary btn-save" id="save">บันทึกข้อมูล</button>
            <a href="<?=getUrl();?>depart" class="btn btn-link">ยกเลิก</a>
            <input type="hidden" name="id" value="<?=$id;?>">
            <input type="hidden" name="form" value="<?=$form;?>">
        </div>
	</form>
</div>
<script type="text/javascript">
$(function(){
	$(document).on('click', '#save', function(){
		var title = $('#title').val();
		if( title.trim() === '' ){
			alert('กรุณาใสชื่อ');
			return false;
		}
		$('#mainForm').submit();
	});
});
</script>
