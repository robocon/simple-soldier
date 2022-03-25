<h3>กรุณาตรวจสอบข้อมูลของท่านอีกครั้ง ก่อนนำเข้าข้อมูลเข้าสู่ระบบ</h3>
<form action="<?=getUrl();?>patient/importcsv2" method="post" class="main-form">
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
    // dump($user);
    $firstname = $user[0];
    $lastname = $user[1];
    $idcard = $user[2];
    $house_no = $user[3];
    $tambon = $user[4];
    $amphur = $user[5];
    $province = $user[6];
    $zipcode = $user[7];
    $diag = $user[8];
    $regula = $user[9];
    $dr1 = $user[10];
    $dr2 = $user[11];
    $dr3 = $user[12];
    $day = $user[13];
    $month = $user[14];
    $year = $user[15];
    $hos_id = $user[16];

    // continue;
    // $pre_send = str_replace(',','|', trim($user));
    // list($firstname,$lastname,$idcard,$house_no,$tambon,$amphur,$province,$zipcode,$diag,$regula,$dr1,$dr2,$dr3,$day,$month,$year,$hos_id) = explode(',', $user);
    if(empty($lastname))
    {
        $firstname = str_replace(array('"','นาย'), '', $firstname);
        $firstname = trim(preg_replace("/\s+/", ' ', $firstname));

        list($firstname, $lastname) = explode(' ', $firstname);
    }

    $regula = str_replace('"', '', trim($regula));
    
    if(empty($dr2) && empty($dr3))
    {
        $dr_replace = str_replace(array("\n\r","\n","\r"),',', $dr1);
        if(strstr($dr_replace,', ,')==false)
        {
            list($dr1,$dr2,$dr3) = explode(',', $dr_replace);
            $dr1 = trim($dr1);
            $dr2 = trim($dr2);
            $dr3 = trim($dr3);
        }
        else
        {
            $dr1 = trim(preg_replace("/\s+/", '', $dr1));
        }
        
    }
    
    $idcard = str_replace('"', '', trim($idcard));
    $house_no = str_replace('"', '', trim($house_no));
    $amphur = str_replace('"', '', trim($amphur));
    $province = str_replace('"', '', trim($province));

    $pre_send = $firstname.'|'.$lastname.'|'.$idcard.'|'.$house_no.'|'.$tambon.'|'.$amphur.'|'.$province.'|'.$zipcode.'|'.$diag.'|'.$regula.'|'.$dr1.'|'.$dr2.'|'.$dr3.'|'.$day.'|'.$month.'|'.$year.'|'.$hos_id;
    
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
            <input type="hidden" name="data[<?=$i;?>]" value="<?=$pre_send;?>">
        </td>
    </tr>
    <?php
    $i++;
}
?>
</table>
<div class="form-group">
<button class="btn btn-link" type="button" onclick="window.history.back()"><i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ</button>
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