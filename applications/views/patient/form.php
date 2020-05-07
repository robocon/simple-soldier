<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <h3 class="page-header">แบบฟอร์มผู้ป่วยงดเว้นเกณฑ์ทหาร</h3>
        <form action="<?=getUrl();?>patient/save" method="post" class="main-form" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">ชื่อ</label>
                        <div class="input-group">
                            <span class="input-group-addon">นาย</span>
                            <input type="text" class="firstname form-control" name="firstname" value="<?=( !empty($item['firstname']) ) ? $item['firstname'] : '' ;?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">สกุล</label>
                        <input type="text" class="lastname form-control" name="lastname" value="<?=( !empty($item['lastname']) ) ? $item['lastname'] : '' ;?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">เลขบัตรประชาชน</label>
                        <input type="text" class="idcard form-control" name="idcard" value="<?=( !empty($item['idcard']) ) ? $item['idcard'] : '' ;?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">บ้านเลขที่</label>
                        <input type="text" class="house_no form-control" name="house_no" value="<?=( !empty($item['house_no']) ) ? $item['house_no'] : '' ;?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">ตำบล</label>
                        <input type="text" class="tambon form-control" name="tambon" value="<?=( !empty($item['tambon']) ) ? $item['tambon'] : '' ;?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">อำเภอ</label>
                        <input type="text" class="amphur form-control" name="amphur" value="<?=( !empty($item['amphur']) ) ? $item['amphur'] : '' ;?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">จังหวัด</label>
                        <!--
                        <input type="text" class="province form-control" name="province" value="<?=( !empty($item['province']) ) ? $item['province'] : '' ;?>">
                        -->
                        <select class="form-control" name="province">
                        <option value="">เลือกจังหวัด</option>
                        <?php
                        foreach ($provinces as $key => $pv_name) {
                            $selected = ( $item['province'] == $pv_name['name_th'] ) ? 'selected="selected"' : '' ;
                            ?>
                            <option value="<?=$pv_name['name_th'];?>" <?=$selected;?> ><?=$pv_name['name_th'];?></option>
                            <?php
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">รหัสไปรณีย์</label>
                        <input type="text" class="zipcode form-control" name="zipcode" value="<?=( !empty($item['zipcode']) ) ? $item['zipcode'] : '' ;?>">
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">โรคที่ตรวจพบ</label>
                        <input type="text" class="diag form-control" name="diag" value="<?=( !empty($item['diag']) ) ? $item['diag'] : '' ;?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">กฎกระทรวงข้อที่</label>
                        <input type="text" class="regula form-control" name="regula" value="<?=( !empty($item['regula']) ) ? $item['regula'] : '' ;?>" placeholder="เช่น ๒(๙)(ค)">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">แพทย์ผู้ตรวจ</label>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="doctor form-control" name="doctor[]" value="<?=( !empty($item['doctor']['0']) ) ? $item['doctor']['0'] : '' ;?>" placeholder="คนที่1">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="doctor form-control" name="doctor[]" value="<?=( !empty($item['doctor']['1']) ) ? $item['doctor']['1'] : '' ;?>" placeholder="คนที่2">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="doctor form-control" name="doctor[]" value="<?=( !empty($item['doctor']['2']) ) ? $item['doctor']['2'] : '' ;?>" placeholder="คนที่3">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">วันที่ตรวจ</label>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <?=getDateList('day', $day, 'form-control');?>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <?=getMonthList('month', $month, 'form-control');?>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <?php
                                    $year_chk = get_year_checkup(true, true);
                                    echo getYearList('year', true, $year, range(2016, $year_chk), 'form-control');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">ใบสำคัญความเห็นแพทย์</label>
                        <input type="file" name="cert" class="form-control">
                        <span>* อนุญาตเฉพาะไฟล์ .pdf เท่านั้น</span>
                        <?php
                        if( isset($item['cert']) && file_exists('files/'.$item['cert']) !== false && $id > 0 ){
                            $token = generate_token('view_pdf');
                            ?>
                            <div class="">
                                <object data="<?=getUrl();?>pdf/base/<?=$item['id'];?>/<?=$token;?>" type="application/pdf" style="width: 100%; height: 400px;">
                                alt : <a href="<?=getUrl();?>pdf/base/<?=$item['id'];?>/<?=$token;?>" target="_blank"><?=$item['cert'];?></a>
                                </object>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-save">บันทึกข้อมูล</button>
                        <button type="button" class="btn btn-link" onclick="window.history.back(-1);">ยกเลิก</button>
                        <input type="hidden" name="token" value="<?=generate_token('save_patient');?>">
                        <input type="hidden" name="id" value="<?=$id;?>">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
$(function(){

    // บันทึกฟอร์ม
    $(document).on('click', '.btn-save', function(){

        var dr_invalid = false
        for (var i = 0; i < $('.doctor').length; i++) {
            var dr_test = $.trim($('.doctor').eq(i).val());
            if ( dr_test === '' ) {
                dr_invalid = true;
            }
        }

        var input_invalid = false;
        var msg = '';

        if( $.trim($('.firstname').val()) == '' ){
            msg = 'กรุณาใส่ชื่อ';
            input_invalid = true;
            $('.firstname').focus();

        }else if ( $.trim($('.lastname').val()) == '' ) {
            msg = 'กรุณาใส่นามสกุล';
            input_invalid = true;
            $('.lastname').focus();

        }else if ( $.trim($('.idcard').val()) == '' ) {
            msg = 'กรุณาใส่เลขบัตรประชาชน';
            input_invalid = true;
            $('.idcard').focus();

        }else if ( $.trim($('.idcard').val()) != '' ) {

            // if( $.trim($('.idcard').val().length) < 13 ){
            //     msg = 'เลขบัตรประชาชนต้องมีอย่างน้อย 13ตัว';
            //     input_invalid = true;
            //     $('.idcard').focus();
            // }
            
        }else if ( $.trim($('.house_no').val()) == '' ) {
            msg = 'กรุณาใส่เลขที่บ้าน';
            input_invalid = true;
            $('.house_no').focus();

        }else if ( $.trim($('.tambon').val()) == '' ) {
            msg = 'กรุณาใส่ชื่อตำบล';
            input_invalid = true;
            $('.tambon').focus();

        }else if ( $.trim($('.amphur').val()) == '' ) {
            // msg = 'กรุณาใส่ชื่ออำเภอ';
            // input_invalid = true;
            // $('.amphur').focus();

        }else if ( $.trim($('.province').val()) == '' ) {
            msg = 'กรุณาใส่ชื่อจังหวัด';
            input_invalid = true;
            $('.province').focus();

        }else if ( $.trim($('.diag').val()) == '' ) {
            msg = 'กรุณาใส่โรคที่ตรวจพบ';
            input_invalid = true;
            $('.diag').focus();

        }else if ( $.trim($('.regula').val()) == '' ) {
            msg = 'กรุณาใส่ข้อกฎกระทรวง';
            input_invalid = true;
            $('.regula').focus();

        }else if ( dr_invalid === true ) {
            msg = 'กรุณาใส่ชื่อแพทย์ผู้ตรวจให้ครบทั้ง 3ท่าน';
            input_invalid = true;

        }


        if ( input_invalid === true ) {
            alert(msg);
            return false;
        }else if ( input_invalid === false ) {

            $('.main-form').submit();

        }

    });

});
</script>
