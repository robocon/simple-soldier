<div class="col-sm-2"></div>
<div class="col-sm-8">
    <form action="<?=getUrl();?>page/save" method="post" class="main-form">
        <div class="form-group">
            <label for="">ชื่อเพจ</label>
            <input type="text" class="form-control" name="title" value="<?=$item['title'];?>">
        </div>
        <div class="row">
            <div class="form-group col-sm-4">
                <label for="">กองแผนก</label>
                <select class="form-control" name="depart">
                    <?php
                    foreach( $categories as $key => $category ){
                        $selected = ( $category['id'] == $item['category'] ) ? 'selected="selected"' : '' ;
						?>
						<option value="<?=$category['id'];?>" <?=$selected;?>><?=$category['name'];?></option>
						<?php
					}
                    ?>
                </select>
            </div>
        </div>
		<div class="form-group">
            <script type="text/javascript" src="<?=getUrl();?>assets/textboxio-client/textboxio/textboxio.js"></script>
            <textarea id="elm1" name="elm1" rows="20" cols="50" class="tinymce"><?=$item['data'];?></textarea>
            <script type="text/javascript">
                textboxio.replace('#elm1');
            </script>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary btn-save">บันทึกข้อมูล</button>
            <button type="button" class="btn btn-link" onclick="window.history.back(-1);">ยกเลิก</button>
            <input type="hidden" name="form_data" id="form-json">
            <input type="hidden" name="form_status" value="<?=$form_status;?>">
            <input type="hidden" name="page_id" value="<?=$page_id;?>">
        </div>
    </form>
</div>
<script type="text/javascript">
$(function(){

    // บันทึกฟอร์ม
    $(document).on('click', '.btn-save', function(){
        $('.main-form').submit();
    });
});
</script>