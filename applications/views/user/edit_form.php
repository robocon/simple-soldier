<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <h3 class="page-header">แก้ไขข้อมูลผู้ใช้งาน</h3>
        <form class="" action="<?=getUrl();?>user/save_edit_form" method="post">
            <div class="form-group">
                <label for="fullname">ชื่อสกุล</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Firstname Lastname" value="<?=$item['fullname'];?>">
            </div>
            <div class="form-group">
                <label for="email">อีเมล์</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="<?=$item['email'];?>">
                <span class="email-txt"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-save">บันทึก</button>
                <input type="hidden" name="token" value="<?=generate_token('save_edit_form');?>">
            </div>
        </form>
    </div>
</div>
