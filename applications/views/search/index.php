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
                            <th>โรคที่ตรวจพบ</th>
                            <th title="กฎกระทรวงฉบับที่ ๗๔/๕๐ และฉบับแก้ไข/เพิ่มเติมฉบับที่ ๗๕/๕๕ และ ๗๖/๕๕">กฎกระทรวง</th>
                            <th>แพทย์ผู้ตรวจ</th>
							<th>
								ที่อยู่
							</th>
                            <th>วันที่ได้รับการตรวจ</th>
							<th>
								โรงพยาบาล
							</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						// dump($patient_list);
                        $i = 1;
                        foreach ($patient_list as $key => $patient) {

							$doctor = json_decode($patient['doctor']);
							$doctor_name = implode("<br>", $doctor);

							$token = generate_token('view_pdf');
                            ?>
                            <tr>
                                <td><?=$i;?></td>
                                <td>
									<a href="<?=getUrl();?>pdf/base/<?=$patient['id'];?>/<?=$token;?>" target="_blank"><?=$patient['name'];?><br><?=$patient['idcard'];?></a>
								</td>
                                <td><?=$patient['diag'];?></td>
								<td>ข้อ <?=$patient['regula'];?></td>

                                <td>
                                    <?php

									echo $doctor_name;
                                    ?>
                                </td>
								<td><?=$patient['house_no'].' '.$patient['tambon'].' '.$patient['amphur'].' '.$patient['province'].' '.$patient['zipcode'];?></td>
                                <td><?=ymd_tothai($patient['date_add']);?></td>
								<td>
									<?php
									$hos_id = $patient['hos_id'];
                                    echo $hospital_list[$hos_id];
									?>
								</td>
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
        ?>
    </div>
</div>
