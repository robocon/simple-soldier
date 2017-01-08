<div class="row">
    <div class="col-sm-4"></div>
    <form class="col-sm-4" action="<?=getUrl();?>login" method="post">
        <div class="form-group">
            <label for="username">ชื่อผู้ใช้งาน</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="password">รหัสผ่าน</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
            <input type="hidden" name="token" value="<?=generate_token('login_user');?>">
        </div>
    </form>
</div>
