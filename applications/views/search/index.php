<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">

        <fieldset>
            <legend>ค้นหา</legend>
            <form action="<?=getUrl();?>search" method="post">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">เลขบัตรประชาชน</label>
                            <input type="text" class="idcard form-control" name="idcard" value="<?=( !empty($idcard) ) ? $idcard : '' ;?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">โรงพยาบาล</label>
                            <select name="hos_id" class="form-control">
                                <option value="all">ทั้งหมด</option>
                                <?php
                                $hospital_list = array();
                                foreach ($hospitals as $key => $hos) {

                                    $hos_id = $hos['id'];
                                    $hospital_list[$hos_id] = $hos['name'];

                                    $select = ( $hos_id == $hos_select ) ? 'selected' : '' ;
                                    ?>
                                    <option value="<?=$hos_id;?>" <?=$select;?> ><?=$hos['name'];?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">ชื่อ-สกุล</label>
                            <input type="text" class="name form-control" name="name" value="<?=( !empty($name) ) ? $name : '' ;?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">จังหวัด</label>
                            <input type="text" class="province form-control" name="province" value="<?=( !empty($province) ) ? $province : '' ;?>">
                            <div class="row test_pv_name"></div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">ปีที่ได้รับตรวจ</label>
                            <?php
                            echo getYearList('year', true, $def_year, $year_range, 'form-control');
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">ค้นหา</button>
                            <input type="hidden" name="token" value="<?=generate_token('search_patient');?>">
                            <input type="hidden" name="action" value="start_search">
                        </div>
                    </div>
                </div>
            </form>
        </fieldset>
	</div>
</div>
<script type="text/javascript">
$(function(){

    /*
    $(document).on('keyup','.province',function(){
        
        var province_txt = $.trim($(this).val());
        var token = '<?=generate_token('search_province');?>';
        if( province_txt.length > 0 ){
            $.ajax({
                url: '<?=getUrl();?>search/get_province',
                data: {'province': province_txt,'token': token},
                method: 'post',
                dataType: 'json',
                success: function(lists){
                    
                    if( lists.length > 0 ){
                        var li_txt = '';
                        for( var i=0; i<lists.length; i++ ){
                            var item = lists[i];
                            li_txt += '<li class="pv_item" data-pv="'+item.name+'">'+item.name+'</li>';
                        }
                        
                        var test = '<ul class="parent_pv">'+li_txt+'</ul>';
                        $('.test_pv_name').html(test);
                    }

                    if( $('.pv_item').length > 0 ){
                        $(document).on('click','.pv_item',function(){
                            var get_pv = $(this).attr('data-pv');
                            $('.province').val(get_pv);
                            $('.parent_pv').remove();
                        });
                    }
                    
                }
            });
        }
    });
    */

});
</script>
<div class="row">
	<div class="col-sm-12">
        <?php
        if ( count($patient_list) > 0 ) {
            ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ชื่อ-สกุล<br>เลขบัตรปชช.</th>
                            <th width="23%">โรคที่ตรวจพบ</th>
                            <th title="กฎกระทรวงฉบับที่ ๗๔/๕๐ และฉบับแก้ไข/เพิ่มเติมฉบับที่ ๗๕/๕๕ และ ๗๖/๕๕">กฎกระทรวง</th>
                            <th width="15%">แพทย์ผู้ตรวจ</th>
							<th width="15%">ที่อยู่</th>
                            <th width="14%">วันที่ได้รับการตรวจ</th>
							<th>โรงพยาบาล</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($patient_list as $key => $patient) {

							$doctor = json_decode($patient['doctor']);
							$doctor_name = implode("<br>", $doctor);

							$token = generate_token('view_pdf');
                            $tkPrintpt = generate_token('print_pt');
                            ?>
                            <tr>
                                <td><?=$i;?></td>
                                <td>
                                    <?php
                                    if( empty($patient['cert']) ){
                                        echo $patient['name'].'<br>'.to_thai_number($patient['idcard']);
                                    }else{
                                        ?>
                                        <a href="<?=getUrl();?>pdf/base/<?=$patient['id'];?>/<?=$token;?>" target="_blank"><?=$patient['name'];?><br><?=to_thai_number($patient['idcard']);?></a>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td><?=$patient['diag'];?></td>
								<td>ข้อ <?=to_thai_number($patient['regula']);?></td>

                                <td>
                                    <?php
									echo $doctor_name;
                                    ?>
                                </td>
								<td>
                                    <?php 
                                        $full_address = $patient['house_no'].' '.( isset($patient['tambon']) ? 'ต.'.$patient['tambon'] : '' ).' '.( isset($patient['amphur']) ? 'อ.'.$patient['amphur'] : '' ).' '.$patient['province'].' '.$patient['zipcode'];
                                        echo to_thai_number($full_address);
                                    ?>
                                </td>
                                <td><?=to_thai_number(ymd_tothai($patient['date_add']));?></td>
								<td>
									<?php
									$hos_id = $patient['hos_id'];
                                    echo $hospital_list[$hos_id];
									?>
								</td>
                                <td><a href="<?=getUrl();?>printpt/base/<?=$patient['id'];?>/<?=$tkPrintpt;?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                </svg></a></td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        }
        
        if( !empty($action) && count($patient_list) === 0 ){
            ?>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="alert alert-warning text-center">ไม่พบข้อมูล</div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
