<h3>กรุณาตรวจสอบข้อมูลของท่านอีกครั้ง ก่อนนำเข้าข้อมูลเข้าสู่ระบบ</h3>
<form action="" method="post">


<table class="table table-bordered">
    <tr>
        <td>ชื่อ</td>
        <td>สกุล</td>
        <td>เลขบัตรประชาชน</td>
        <td>บ้านเลขที่</td>
        <td>ตำบล</td>
        <td>อำเภอ</td>
        <td>จังหวัด</td>
        <td>รหัสไปรณีย์</td>
        <td>โรคที่ตรวจพบ</td>
        <td>กฎกระทรวงข้อที่</td>
        <td>แพทย์ผู้ตรวจ1</td>
        <td>แพทย์ผู้ตรวจ2</td>
        <td>แพทย์ผู้ตรวจ3</td>
        <td>วัน ที่ตรวจ</td>
        <td>เดือน ที่ตรวจ</td>
        <td>ปี ที่ตรวจ</td>
        <td>รหัสสังกัด</td>
    </tr>
<?php 
$i = 1;
foreach($users as $user){
    list($firstname,$lastname,$idcard,$house_no,$tambon,$amphur,$province,$zipcode,$diag,$regula,$dr1,$dr2,$dr3,$day,$month,$year,$hos_id) = explode(',', $user);
    ?>
    <tr>
        <td><?=$firstname;?></td>
        <td><?=$lastname;?></td>
        <td><?=$idcard;?></td>
        <td><?=$house_no;?></td>
        <td><?=$tambon;?></td>
        <td><?=$amphur;?></td>
        <td><?=$province;?></td>
        <td><?=$zipcode;?></td>
        <td><?=$diag;?></td>
        <td><?=$regula;?></td>
        <td><?=$dr1;?></td>
        <td><?=$dr2;?></td>
        <td><?=$dr3;?></td>
        <td><?=$day;?></td>
        <td><?=$month;?></td>
        <td><?=$year;?></td>
        <td>
            <?php 
            echo $hos_id;
            ?>
            <input type="hidden" name="firstname[<?=$i;?>][]" value="<?=$firstname;?>">
            <input type="hidden" name="lastname[<?=$i;?>][]" value="<?=$lastname;?>">
            <input type="hidden" name="idcard[<?=$i;?>][]" value="<?=$idcard;?>">
            <input type="hidden" name="house_no[<?=$i;?>][]" value="<?=$house_no;?>">
            <input type="hidden" name="tambon[<?=$i;?>][]" value="<?=$tambon;?>">
            <input type="hidden" name="amphur[<?=$i;?>][]" value="<?=$amphur;?>">
            <input type="hidden" name="province[<?=$i;?>][]" value="<?=$province;?>">
            <input type="hidden" name="zipcode[<?=$i;?>][]" value="<?=$zipcode;?>">
            <input type="hidden" name="diag[<?=$i;?>][]" value="<?=$diag;?>">
            <input type="hidden" name="regula[<?=$i;?>][]" value="<?=$regula;?>">
            <input type="hidden" name="dr1[<?=$i;?>][]" value="<?=$dr1;?>">
            <input type="hidden" name="dr2[<?=$i;?>][]" value="<?=$dr2;?>">
            <input type="hidden" name="dr3[<?=$i;?>][]" value="<?=$dr3;?>">
            <input type="hidden" name="day[<?=$i;?>][]" value="<?=$day;?>">
            <input type="hidden" name="month[<?=$i;?>][]" value="<?=$month;?>">
            <input type="hidden" name="year[<?=$i;?>][]" value="<?=$year;?>">
            <input type="hidden" name="hos_id[<?=$i;?>][]" value="<?=$hos_id;?>">
        </td>
    </tr>
    <?php
    $i++;
}
?>
</table>
<div class="form-group">
<button class="btn btn-primary" type="button" onclick="window.history.back()"><i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ</button>
    <button class="btn btn-primary" type="submit">ดำเนินการบันทึกข้อมูล <i class="glyphicon glyphicon-arrow-right"></i></button>
</div>
</form>

<a class="btn btn-info" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
แก้ปัญหาภาษาไทยเพี้ยน <i class="glyphicon glyphicon-info-sign"></i>
</a>
<div class="collapse" id="collapseExample">
    <div class="well">
        <img src="<?=getUrl();?>assets/images/fix-font-excel.jpg" alt="">
        <p>จากนั้นให้ทำการ Restart เครื่อง 1 ครั้ง</p>
    </div>
</div>