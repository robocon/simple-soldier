<div class="col-sm-4"></div>
<form class="col-sm-4" action="<?=getUrl();?>user/login" method="post">
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
		<?php
		if( $open_register === true ){
			?><span><a href="<?=getUrl();?>user/register_form">สมัครสมาชิก</a></span><?php
		}
		?>
    </div>
    <?php
    $msg = Session_Helper::get('x_msg');
    if( $msg !== false ){
        ?>
        <div class="form-group">
            <p class="text-warning"><?=$msg;?></p>
        </div>
        <?php
        Session_Helper::set('x_msg', false);
    }
    ?>
</form>
