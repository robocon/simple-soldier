<div>
    <fieldset>
        <legend>นำเข้าข้อมูลผู้ใช้งานแบบ CSV</legend>
        <form action="<?=getUrl();?>user/importcsv" method="post" enctype="multipart/form-data">
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
            <td>ชื่อ-สกุล</td>
            <td>สังกัด</td>
            <td>อีเมล์</td>
            <td>ชื่อผู้ใช้งาน</td>
            <td>รหัสผ่าน</td>
            <td>ระดับผู้ใช้งาน</td>
        </tr>
    </table>
    <div>
        <p class="font-weight-bold">ระดับผู้ใช้งาน</p>
        <table class="table">
            <tr>
                <td>user</td>
                <td>ผู้ใช้งานทั่วไป</td>
            </tr>
            <tr>
                <td>admin</td>
                <td>หัวหน้าแต่ละหน่วยงาน</td>
            </tr>
            <tr>
                <td>super admin</td>
                <td>ผู้ดูแลระบบ</td>
            </tr>
        </table>
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