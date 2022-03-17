<div>
    <fieldset>
        <legend>นำเข้ารายชื่อผู้ยกเว้นแบบ CSV</legend>
        <!-- patient/importcsv -->
        <form action="<?=getUrl();?>patient/preview_csv" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlFile1">เลือกไฟล์นำเข้า</label>
                <input type="file" name="fileupload" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
            </div>
        </form>
    </fieldset>
</div>

<div>
    <div>
        <h3>โครงสร้างการนำเข้าข้อมูล</h3>
    </div>
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
    </table>
    <br>
    <h3>ตัวอย่างข้อมูล</h3>
    <p>ให้เรียงตามช่องในโปรแกรม Excel ตามตัวอย่างต่อไปนี้</p>
    <table class="table table-bordered">
        <tr>
            <td>ทรงธรรม</td>
            <td>เจริญค้า</td>
            <td>1529902xxxxxx</td>
            <td>10/2 ม.1</td>
            <td>บ่อแฮ้ว</td>
            <td>เมือง</td>
            <td>ลำปาง</td>
            <td>52000</td>
            <td>โรคหัวใจและหลอดเลือด</td>
            <td>ข้อ 2 (3)(ข) ลิ้นหัวใจพิการ</td>
            <td>พ.ต.แพทย์ผู้ตรวจ คนที่หนึ่ง</td>
            <td>พ.ท.แพทย์ผู้ตรวจ คนที่สอง</td>
            <td>พ.อ.แพทย์ผู้ตรวจ คนที่สาม</td>
            <td>17</td>
            <td>02</td>
            <td>2565</td>
            <td>1</td>
        </tr>
    </table>
    <div>
        <p class="font-weight-bold"><strong>เดือน ที่ตรวจ</strong></p>
        <table class="table">
            <?php 
            foreach ($full_months as $key => $month) {
                ?>
                <tr>
                    <td><?=$key;?></td>
                    <td><?=$month;?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <div>
        <p class="font-weight-bold"><strong>ปี ที่ตรวจ</strong></p>
        <p style="color: red;"><u>ให้ใส่เป็นปี ค.ศ.</u></p>
    </div>
    <div>
        <p class="font-weight-bold">สังกัด</p>
        <table class="table">
            <tr>
                <td>ID</td>
                <td>ชื่อสังกัด</td>
            </tr>
            <?php 
            foreach( $hospitals as $key => $hos ){
            ?>
            <tr>
                <td><?=$hos['id'];?></td>
                <td><?=$hos['name'];?></td>
            </tr>
            <?php 
            }
            ?>
        </table>
    </div>
</div>