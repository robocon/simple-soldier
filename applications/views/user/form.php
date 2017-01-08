<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <h3 class="page-header">ฟอร์มผู้ใช้งาน</h3>
        <div>
            <form action="<?=getUrl();?>user/save" method="post" name="adminForm" id="adminForm">
                <div class="form-group">
                    <label for="fullname">ชื่อสกุล</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Firstname Lastname">
                </div>
                <?php
                if ( $this->user->level === 'super admin' ) {
                    ?>
                    <div class="form-group">
                        <label for="hospital">สังกัด รพ.</label>
                        <select name="hospital" id="hospital" class="form-control">
                            <?php
                            foreach ($hospitals as $key => $item) {
                                ?>
                                <option value="<?=$item['id'];?>"><?=$item['name'];?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <?php
                }else{
                    ?>
                    <input type="hidden" name="hospital" value="<?=$this->user->hos_id;?>">
                    <?php
                }
                ?>
                <div class="form-group">
                    <label for="email">อีเมล์</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
                    <span class="email-txt"></span>
                </div>
                <div class="form-group">
                    <label for="username">ชื่อผู้ใช้งาน</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    <span class="username-txt"></span>
                </div>
                <div class="form-group">
                    <label for="password">รหัสผ่าน</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="confirmpass">ยืนยันรหัสผ่าน</label>
                    <input type="text" class="form-control" id="confirmpass" name="confirmpass" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <label for="level">ระดับผู้ใช้งาน</label>
                    <select name="level" id="level" class="form-control">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <?php
                        if ( $this->user->level === 'super admin' ) {
                            ?>
                            <option value="super admin">Super Admin</option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-save">บันทึก</button>
                    <input type="hidden" name="token" value="<?=generate_token('save_user');?>">
                    <a href="<?=getUrl();?>user" class="btn btn-link">ยกเลิก</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){

    var token = '<?=generate_token('check_email');?>';
    var email_check = false;
    $('.btn-save').attr('disabled');

    $(document).on('blur', '#email', function(){
        var email = $('#email');
        var email_contain = email.parent();
        var email_txt = $('.email-txt');
        if( $.trim(email.val()) !== '' ){
            $.ajax({
                url: '<?=getUrl();?>user/check_email',
                data: {'email': email.val(),'token': token},
                method: 'post',
                dataType: 'json',
                success: function(txt){
                    if( txt.checker === 'valid' ){
                        email_check = true;
                        email_contain.removeClass('has-error text-danger');
                        email_txt.text('');

                    }else if( txt.checker === 'invalid' ){
                        email_contain.addClass('has-error text-danger');
                        email_txt.text('อีเมล์มีผู้ใช้งานแล้ว');

                    }else{
                        email_contain.addClass('has-error text-danger');
                        email_txt.text('รูปแบบอีเมล์ไม่ถูกต้อง');

                    }
                }
            });
        }
    });

    var username_check = false;
    $(document).on('blur', '#username', function(){
        var username = $('#username');
        var token = '<?=generate_token('check_username');?>';
        var username_txt = $('.username-txt');
        if( username.val() !== '' ){
            $.ajax({
                url: '<?=getUrl();?>user/check_username',
                data: {'username': username.val(),'token': token},
                method: 'post',
                dataType: 'json',
                success: function(txt){
                    if( txt.checker === 'valid' ){
                        username_check = true;
                        username.parent().removeClass('has-error text-danger');
                        username_txt.text('');

                    }else if( txt.checker === 'invalid' ){
                        username_check = false;
                        username.parent().addClass('has-error text-danger');
                        username_txt.text('ชื่อผู้ใช้งานซ้ำ');

                    }
                }
            });
        }
    });

    // บันทึกฟอร์ม
    $(document).on('click', '.btn-save', function(){

        var fullname = $('#fullname');
        var email = $('#email');
        var username = $('#username');
        var password = $('#password');
        var confirmpass = $('#confirmpass');

        var msg = '';
        if( fullname.val() === '' ){
            msg = 'กรุณาใส่ชื่อ-สกุล';
            fullname.focus();
        }else if( email.val() === '' ){
            msg = 'กรุณาใส่อีเมล์';
            email.focus();
        }else if( email.val() !== '' && email_check === false ){
            msg = 'รูปแบบอีเมล์ไม่ถูกต้อง หรือมีผู้ใช้งานอีเมล์นี้แล้ว';
        }else if( username.val() === '' ){
            msg = 'กรุณาใส่ชื่อผู้ใช้งาน';
            username.focus();
        }else if( username.val() !== '' && username_check === false ){
            msg = 'ชื่อผู้ใช้งานมีคนอื่นใช้แล้ว';
        }else if( password.val() === '' ){
            msg = 'กรุณาใส่รหัสผ่าน';
            password.focus();
        }else if( password.val() !== confirmpass.val() ){
            msg = 'กรุณายืนยันรหัสผ่านให้ตรงกัน';
        }

        if( msg !== '' ){
            alert(msg);
            return false;
        }

        $('#adminForm').submit();
    });
});
</script>
