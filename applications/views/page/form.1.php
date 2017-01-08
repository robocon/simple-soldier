<link href="<?=getUrl();?>assets/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<script type="text/javascript" src="<?=getUrl();?>assets/js/bootstrap-colorpicker.min.js"></script>

<div class="col-sm-3"></div>
<div class="col-sm-6">
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
            <textarea id="elm1" name="elm1" rows="20" cols="50" class="tinymce"></textarea>
            <script type="text/javascript">
                textboxio.replace('#elm1');
            </script>
        </div>
		
        <div class="form-group">
            <div class="row page-container">
                <?php
				$col_num = 0;
                if( isset($item['data']) ){
                    
					$data_lists = json_decode($item['data']);
					
					// Main to Columns
					
					foreach ($data_lists as $key => $lists) {
						++$col_num;
					?>
					<div class="main-col">
					<div style="text-align: right;"><div class="glyphicon glyphicon-remove btn-col-remove" aria-hidden="true" title="ลบแถว" style="cursor: pointer;"></div></div>
					<div class="">
					<?php
						 // 
						$per_col = ( 12 / count($lists) );
						$row_num = 0;

						// Columns to Rows
						foreach ($lists as $col_key => $columns) {
						?>
						<div class="col-md-<?=$per_col;?> in-row" style="background: #eeeeee;">
						<div>
						<?php
							
							$item_number = $col_num.$row_num;
							// Call object
							foreach($columns as $obj_key => $obj){
								
								?>
								<div class="form-group">
									<label for="">เลือกไฟล์</label>
									<div class="img_preview">
										<img src="<?=getUrl().$obj->img_path;?>" class="demo_<?=$item_number;?> person-img" alt="Image preview...">
										<input type="file" class="form-control img_select" name="image_txt<?=$item_number;?>" data-number="<?=$item_number;?>" id="test_img_upload">
										<input type="hidden" class="img64_<?=$item_number;?>" name="img64_<?=$item_number;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="">ข้อความ</label>
									<input type="text" class="form-control" name="detail">
								</div>
								<div class="form-group">
									<label for="">ตำแหน่งข้อความ</label>
									<div class="form-inline">
										<div class="radio">
											<label>
												<input type="radio" name="align<?=$item_number;?>" value="left" checked> ซ้าย
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="align<?=$item_number;?>" value="center"> กลาง
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="align<?=$item_number;?>" value="right"> ขวา
											</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="">สี</label>
									<input type="text" name="color" value="#000000" class="form-control cp2" />
								</div>
								<?php
							}
							$row_num++;
						?>
						</div>
						</div>
						<?php
						}
					?>
					</div>
					</div>
					
					<?php
					} // foreach
                }
                ?>
            </div> <!-- row page-container -->
        </div> <!-- form-group -->
        <div class="form-group">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">เพิ่มแถว</button>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary btn-save">บันทึกข้อมูล</button>
            <input type="hidden" name="form_data" id="form-json">
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">ชุดข้อมูล</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">จำนวน Column</label>
                    <select class="form-control col_number" name="col_number" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">รูปแบบข้อมูล</label>
                    <div class="radio">
                        <label>
                            <input type="radio" class="col_type" name="col_type" id="" value="2" checked> ข้อความ
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" class="col_type" name="col_type" id="" value="3"> รูปและข้อความ
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary col-submit">ตกลง</button>
            </div>
        </div>
    </div>
</div>

<script type="text/template" class="div_txt">
<div class="form-group">
    <label for="">ข้อความ</label>
    <input type="text" class="form-control" name="detail">
</div>
<div class="form-group">
    <label for="">ตำแหน่งข้อความ</label>
    <div class="form-inline">
        <div class="radio">
            <label>
                <input type="radio" name="align{{item_number}}" value="left" checked> ซ้าย
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="align{{item_number}}" value="center"> กลาง
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="align{{item_number}}" value="right"> ขวา
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="">สี</label>
    <input type="text" name="color" value="#000000" class="form-control cp2" />
</div>
<input type="hidden" value="txt">
</script>

<script type="text/template" class="div_img">
<div class="form-group">
    <label for="">เลือกไฟล์</label>
    <div class="img_preview">
        <img src="" class="demo_{{item_number}} person-img" alt="Image preview...">
        <input type="file" class="form-control img_select" name="image_txt{{item_number}}" data-number="{{item_number}}" id="test_img_upload">
        <input type="hidden" class="img64_{{item_number}}" name="img64_{{item_number}}">
    </div>
</div>
<div class="form-group">
    <label for="">ข้อความ</label>
    <input type="text" class="form-control" name="detail">
</div>
<div class="form-group">
    <label for="">ตำแหน่งข้อความ</label>
    <div class="form-inline">
        <div class="radio">
            <label>
                <input type="radio" name="align{{item_number}}" value="left" checked> ซ้าย
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="align{{item_number}}" value="center"> กลาง
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="align{{item_number}}" value="right"> ขวา
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="">สี</label>
    <input type="text" name="color" value="#000000" class="form-control cp2" />
</div>
<input type="hidden" name="item_type" value="txt_img">
</script>


<script type="text/javascript">
$(function(){

	if( $('.cp2').length > 0 ){
		$('.cp2').colorpicker();
	}

    var col_div = 0;

    // ไม่ให้ input radio มันซ้ำกัน
    var row_num = parseInt('<?=$col_num;?>');

    // ปุ่มเพิ่มแถว
    $(document).on('click', '.add-btn', function(){
        var contain = $('.page-container');
        var colTemplate = $('.input-col').html();
        $('body').append(colTemplate);
    });

    // หน้าฟอร์มจากปุ่มเพิ่มแถว
    $(document).on('click', '.col-submit', function(){

        // จำนวน column
        var col_number = $('.col_number').val();
        // column ทั้งหมด อิงจาก bootstrap
        var div_width = 12;
        var per_col = (div_width / col_number);

        var type = parseInt($('.col_type:checked').val());
        var inner_txt = '';
        ++row_num;

        var html_txt = '<div class="main-col">';
        html_txt += '<div style="text-align: right;"><div class="glyphicon glyphicon-remove btn-col-remove" aria-hidden="true" title="ลบแถว" style="cursor: pointer;"></div></div>';
        html_txt += '<div class="">';
        for( var i=0; i<col_number; i++){
            
            if( type == 1 ){

            }else if( type == 2 ){
                inner_txt = $('.div_txt').html();
            }else if( type == 3 ){
                inner_txt = $('.div_img').html();
            }

            html_txt += '<div class="col-md-'+per_col+' in-row" style="background: #eeeeee;">';
            
            var replace_txt = inner_txt.replace(/({{item_number}})/g, row_num+''+i);
            
            html_txt += '<div>'+replace_txt+'</div>';
            html_txt += '</div>';
        }
        html_txt += '</div>';
        html_txt += '</div>';

        var contain = $('.page-container');
        contain.append(html_txt);

        $('#myModal').modal('hide');
        $('.cp2').colorpicker();
    });

    // ปิดหน้า lightbox
    $(document).on('click', '.close-input-btn', function(){
        $(this).parents('.lightbox').remove();
    });

    // ลบแถว
    $(document).on('click', '.btn-col-remove', function(){
        var c = confirm('ต้องการลบข้อมูลทั้งหมดในแถว?');
        if( c === true ){
            $(this).parents('.main-col').remove();
        }else{
            return false;
        }
    });

    // บันทึกฟอร์ม
    $(document).on('click', '.btn-save', function(){
        var test_form = $('.main-form').serializeArray();
        var count_col = 0;
        var new_items = [];

        // ไล่อ่านแต่ละ column
        $('.main-col').each(function(){
            ++count_col;

            var count_row = 0;
            var test_txt = [];
            // ไอ่อ่านแต่ละ rows
            $(this).find('.in-row').each(function(){
                ++count_row;
                var item_key = count_col+''+count_row;
                
                // เก็บข้อมูล input ของแต่ละ rows
                var items = $(this).find('input').serializeArray();
                var new_rows = [];
                $(items).each(function( key, item ){

                    // parse key and value
                    new_rows.push('"'+item.name+'":"'+item.value+'"');

                }); // Each item

                //  
                test_txt.push('[{'+new_rows.join()+'}]');
                
            }); // END in-row
            
            new_items.push('['+test_txt.join().toString()+']');

        }); // END main-col
        
        // var pre_data = $.parseJSON('['+new_items.join().toString()+']');
        var pre_data = '['+new_items.join().toString()+']';
        console.log(pre_data);
		return false;
        //@todo
        // send ajax
        $('#form-json').val(pre_data);

        $('.main-form').submit();

    });

	// show thumb after selected image
    $(document).on('change', '.img_select', function(){
        var uniNum = $(this).attr('data-number');
        var preview = document.querySelector('.demo_'+uniNum);
        // preview.height = 200;

        var file = this.files[0];
        var reader = new FileReader();
        reader.addEventListener("load", function () {
            
            preview.src = reader.result;
            $('.img64_'+uniNum).val(reader.result);
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    });

});
</script>