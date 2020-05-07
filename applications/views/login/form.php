<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center logo-home">
        <img src="<?=getUrl();?>assets/images/e-med-logo.png" width="360" class="img-responsive" >
    </div>
</div>
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
            <center><button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button></center>
            <input type="hidden" name="token" value="<?=generate_token('login_user');?>">
        </div>
    </form>
</div>
